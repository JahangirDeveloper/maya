var User = {
	setupEvents: function() {
		  FB.init({
			    appId      : fbAppId,
			    status     : true,
			    xfbml      : true,
			    version    : 'v2.6'
			  });
		  
		// Facebook social login
		$("body").on("click", "[data-event='oauth-facebook']", function(e) {
			e.preventDefault();
			
			console.log("Facebook login event");
			
			$("#oauth-error").empty().hide();

			FB.login(function(response) {
				if (response.status === "connected") {
					// Logged into your app and Facebook
					var accessToken = response.authResponse.accessToken;
					
					FB.api("/me", function(response) {
						var data = {
							accessToken: accessToken
						};

						$.post(baseURL + "/account/oauth/facebook", data, function(res) {
							if (typeof res.success != "undefined" && res.success) {
								if (typeof response.url !== "undefined" && response.url.length > 0) {
									window.location = response.url;
								} else {
									window.location = baseURL;
								}
							}
							
							if (typeof res.error != "undefined" && res.error) {
								$("#oauth-error").html(res.errorText).fadeIn("fast");
							}
						});
					});
				} else if (response.status === "not_authorized") {
					// The person is logged into Facebook, but not your app.
					$("#oauth-error").html("You have denied access to your Facebook profile, please try again.").fadeIn("fast");
				} else {
					// The person is not logged into Facebook, so we're
					// not sure if they are logged into this app or not.
					$("#oauth-error").html("You are not logged in to Facebook, please log in and try again.").fadeIn("fast");
				}
			}, {
				scope : "public_profile, email"
			});
		});
	},
	init : function() {
		try {
			User.setupEvents();
		}
		catch (e) {
			console.log('Error setting up events: ' + e.message);
		}
	}
};