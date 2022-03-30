var NotifyService = {

	hash: null,
	stompClient: null,
	url: null,

	init: function (hash, url) {
		NotifyService.hash = hash;
		NotifyService.url = url;
		NotifyService.connect();
	},
	connect: function () {
		console.log("NotifyService: Connecting...");

		var socket = new SockJS(NotifyService.url);

		NotifyService.stompClient = Stomp.over(socket);
		NotifyService.stompClient.connect({
			company: "HeezBeez",
			topic: NotifyService.hash
		}, function (frame) {
			NotifyService.stompClient.subscribe("/topic/cart/" + NotifyService.hash,
					function (msg) {
						NotifyService.messageReceived(msg);
					});
		});
	},
	disconnect: function () {
		NotifyService.disconnected = true;
		NotifyService.stompClient.disconnect();
	},
	send: function (message) {
		NotifyService.stompClient.send("/app/listener", {
			topic: NotifyService.hash
		}, message);
	},
	messageReceived: function (msg) {
		var parsed = JSON.parse(msg.body);

		$.get(baseURL + "/booking/info/" + parsed.data.bookingId, function (response) {
			if (parsed.data.state == "EXPIRING") {
				$(document).trigger("booking:expiring", {
					id: parsed.data.bookingId
				});

				noty({
					theme: "jamaliki",
					animation: {
	                    open: "animated bounceIn",
	                    close: "animated bounceOut"
	                },
					layout: "topRight",
					closeWith: ["button"],
					type: "information",
					text: "Your booking of " + response.salonServiceName + " is about to expire.",
					buttons: [{
						text: "OK",
					  	onClick: function($noty) {
					  		$noty.close();
					  	}
					}],
					killer: true
				});
			}

			if (parsed.data.state == "EXPIRED") {
				$(document).trigger("booking:expired", {
					id: parsed.data.bookingId
				});

				noty({
					theme: "jamaliki",
					animation: {
	                    open: "animated bounceIn",
	                    close: "animated bounceOut"
	                },
					layout: "topRight",
					closeWith: ["button"],
					type: "information",
					text: "Your booking of " + response.salonServiceName + " has expired.",
					buttons: [{
						text: "OK",
					  	onClick: function($noty) {
					  		$noty.close();
					  	}
					}, {
					  	text: "Need more time",
					  	onClick: function($noty) {
					  		$noty.close();

					  		$.get(baseURL + "/booking/reserve/" + parsed.data.bookingId, function (response) {
					  			$(document).trigger("booking:rereserve", {
									id: id
								});

					  			if (typeof response.result != "undefined") {
					  				if (response.result) {
					  					noty({
											theme: "jamaliki",
											animation: {
							                    open: "animated bounceIn",
							                    close: "animated bounceOut"
							                },
											layout: "topRight",
											closeWith: ["button"],
											type: "information",
											text: "Your booking reservation has been extended.",
											buttons: [{
												text: "OK",
											  	onClick: function($noty) {
											  		$noty.close();
											  	}
											}],
											killer: true
										});
					  				} else {
					  					noty({
											theme: "jamaliki",
											animation: {
							                    open: "animated bounceIn",
							                    close: "animated bounceOut"
							                },
											layout: "topRight",
											closeWith: ["button"],
											type: "information",
											text: "We're sorry the time slot appears to be taken already, please book this service again.",
											buttons: [{
												text: "OK",
											  	onClick: function($noty) {
											  		$noty.close();
											  	}
											}],
											killer: true
										});

					  					$.get(baseURL + "/cart/remove/" + parsed.data.bookingId, function (response) {
					  						$(document).trigger("booking:removed", {
					  							id: parsed.data.bookingId
					  						});

					  						$.get(baseURL + "/cart/info", function (response) {
					  							$(document).trigger("cart:updated", {
					  								count: response.count
					  							});

					  							$(".cart button .count").text(response.count);
					  						});
					  					});
					  				}
					  			}
					  		});
					  	}
					}],
					killer: true
				});

				if (!isMobile()) {
					if ($("#menu-cart").is(":visible")) {
						$("#account-social div.cart button").trigger("click");
					}
				} else {
					if ($("#mobile-menu-cart").is(":visible")) {
						var $mobileMenu = $("#mobile-menu-cart");

						$mobileMenu.fadeOut(500, "easeInOutExpo", function () {
							$("#dim").hide();
						});
					}
				}
			}
		});
	}
};
