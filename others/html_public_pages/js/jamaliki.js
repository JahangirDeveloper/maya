$(function () {

	/*
	 * Global variables
	 */

	var cww = $(window).width();
	var lat = null,
		long = null;
	// Set this early so we have some information before geocoder does it's job
	var locationName = Geo.city;
	var haveLocationInfoReady = false;
	var haveLocationNameReady = false;
	var hasHistorySupport = false;

	if (window.history && window.history.pushState) {
		hasHistorySupport = true;
	}

	function isMobile() {
		var ww = $(window).width();

		if (ww <= 600) {
			return true;
		}

		return false;
	}

	// Expose for notify service
	window.isMobile = isMobile;

	function isNarrow() {
		var ww = $(window).width();

		if (ww > 600 && ww <= 1000) {
			return true;
		}

		return false;
	}

	/*
	 * Underscore template settings
	 */

	_.templateSettings = {
		interpolate: /\<\@\=(.+?)\@\>/gim,
		evaluate: /\<\@(.+?)\@\>/gim,
		escape: /\<\@\-(.+?)\@\>/gim
	};

	/*
	 * Swipers
	 */

	// Front page featured salons
	var featuredSalonsSwiper = null;

	function setupFeaturedSalonsSwiper(count) {
		if ($("#featured-salons").length == 0) {
			return;
		}

		if (featuredSalonsSwiper != null) {
			featuredSalonsSwiper.destroy(true, true);
		}

		if (count == null) {
			count = 4;

			if (isMobile()) {
				count = 1;
			}

			if (isNarrow()) {
				count = 2;
			}
		}

		featuredSalonsSwiper = new Swiper("#featured-salons .swiper-container", {
			spaceBetween: 20,
			slidesPerView: count,
			grabCursor: true,
			pagination: ".swiper-pagination",
			paginationClickable: true,
			autoplay: 5000,
			preventClicks: false,
			preventClicksPropagation: false,
			nextButton: ".mobile-right",
		    prevButton: ".mobile-left",
			onInit: function(swiper) {
				$("#featured-salons").animate({
					opacity: 1
				}, 1000);
			}
		});
	}

	setupFeaturedSalonsSwiper(null);

	// Salon details
	var salonDetailsSwiper = new Swiper("#salon-details .salon-gallery .swiper-container", {
		pagination: ".swiper-pagination",
        paginationClickable: true,
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev",
        grabCursor: true
	});

	/*
	 * Account menu
	 */

	$("body").on("click", "#account-social div.account button", function (e) {
		var $this = $(this);
		var $menu = $("#menu-account");

		if (!isMobile()) {
			if ($("#menu-cart").is(":visible")) {
				$("#account-social div.cart button").trigger("click");
			}

			if ($("#menu-menu").is(":visible")) {
				$("#account-social div.menu button").trigger("click");
			}

			if ($menu.is(":visible")) {
				$menu.fadeOut(500, "easeInOutExpo");
			} else {
				var offset = $this.offset();

				if ($("html").hasClass("rtl")) {
					$menu.css({
						left: offset.left + "px",
						top: (offset.top + $this.height() + 10) + "px"
					});
				} else {
					$menu.css({
						right: ($(window).width() - (offset.left + $this.width())) + "px",
						top: (offset.top + $this.height() + 10) + "px"
					});
				}

				$menu.fadeIn(500, "easeInOutExpo");
			}
		} else {
			var $mobileMenu = $("#mobile-menu-user");
			var wH = $(window).height();
			var cH = wH - 50;

			if (!$mobileMenu.is(":visible")) {
				$("#dim").show();
				$mobileMenu.find(".content").css({
					"height": cH + "px",
					"max-height": cH + "px",
				});
				$mobileMenu.fadeIn(500, "easeInOutExpo");
			} else {
				$mobileMenu.fadeOut(500, "easeInOutExpo", function () {
					$("#dim").hide();
				});
			}
		}
	});

	/*
	 * Cart menu
	 */

	$("body").on("click", "#account-social div.cart button", function (e) {
		var $this = $(this);
		var $menu = $("#menu-cart");

		if (!isMobile()) {
			if ($("#menu-account").is(":visible")) {
				$("#account-social div.account button").trigger("click");
			}

			if ($("#menu-menu").is(":visible")) {
				$("#account-social div.menu button").trigger("click");
			}

			if ($menu.is(":visible")) {
				$menu.fadeOut(500, "easeInOutExpo");
			} else {
				$.get(baseURL + "/ajax/cart/dropdown", function(response) {
					$menu.find(".menu-content").html(response);

					var offset = $this.offset();

					if ($("html").hasClass("rtl")) {
						$menu.css({
							left: offset.left + "px",
							top: (offset.top + $this.height() + 10) + "px"
						});
					} else {
						$menu.css({
							right: ($(window).width() - (offset.left + $this.width())) + "px",
							top: (offset.top + $this.height() + 10) + "px"
						});
					}

					$menu.fadeIn(500, "easeInOutExpo");
				});
			}
		} else {
			var $mobileMenu = $("#mobile-menu-cart");
			var wH = $(window).height();
			var cH = wH - 50;

			if (!$mobileMenu.is(":visible")) {
				$.get(baseURL + "/ajax/cart/dropdown", function(response) {
					$("#dim").show();
					$mobileMenu.find(".content").html(response);

					if ($mobileMenu.find(".content li").length > 0) {
						cH -= 50;
						$mobileMenu.find(".footer").show();
						$mobileMenu.find(".content button[data-event='menu-checkout']").remove();
					} else {
						$mobileMenu.find(".footer").hide();
					}

					$mobileMenu.find(".content").css({
						"height": cH + "px",
						"max-height": cH + "px",
					});
					$mobileMenu.fadeIn(500, "easeInOutExpo");
				});
			} else {
				$mobileMenu.fadeOut(500, "easeInOutExpo", function () {
					$("#dim").hide();
				});
			}
		}
	});

	/*
	 * Menu menu
	 */

	$("body").on("click", "#account-social div.menu button", function (e) {
		var $this = $(this);
		var $menu = $("#menu-menu");

		if (!isMobile()) {
			if ($("#menu-account").is(":visible")) {
				$("#account-social div.account button").trigger("click");
			}

			if ($("#menu-cart").is(":visible")) {
				$("#account-social div.cart button").trigger("click");
			}

			if ($menu.is(":visible")) {
				$menu.fadeOut(500, "easeInOutExpo");
			} else {
				var offset = $this.offset();

				if ($("html").hasClass("rtl")) {
					$menu.css({
						left: offset.left + "px",
						top: (offset.top + $this.height() + 10) + "px"
					});
				} else {
					$menu.css({
						right: ($(window).width() - (offset.left + $this.width())) + "px",
						top: (offset.top + $this.height() + 10) + "px"
					});
				}

				$menu.fadeIn(500, "easeInOutExpo");
			}
		} else {
			var $mobileMenu = $("#mobile-menu-main");
			var wH = $(window).height();
			var cH = wH - 50;

			if (!$mobileMenu.is(":visible")) {
				$("#dim").show();
				$mobileMenu.find(".content").css({
					"height": cH + "px",
					"max-height": cH + "px",
				});
				$mobileMenu.fadeIn(500, "easeInOutExpo");
			} else {
				$mobileMenu.fadeOut(500, "easeInOutExpo", function () {
					$("#dim").hide();
				});
			}
		}
	});

	/*
	 * Menu hiding
	 */
	$("body").on("mouseup", function (e) {
		if (!isMobile()) {
			var $container = $("#menu-account, #menu-cart, #menu-menu");

			if (!$container.is(e.target) && $container.has(e.target).length === 0)
			{
				if ($("#menu-account").is(":visible")) {
					$("#account-social div.account button").trigger("click");
				}

				if ($("#menu-cart").is(":visible")) {
					$("#account-social div.cart button").trigger("click");
				}

				if ($("#menu-menu").is(":visible")) {
					$("#account-social div.menu button").trigger("click");
				}
			}
		}
	});

	/*
	 * Mobile menu close
	 */

	$("body").on("click", ".mobile-menu .title .fa-times", function (e) {
		$(".mobile-menu:visible").fadeOut(500, "easeInOutExpo", function () {
			$("#dim").hide();
		});
	});

	/*
	 * Geolocation
	 */

	function setLocationFromGeo() {
		lat = Geo.lat;
		long = Geo.lon;
		locationName = Geo.city;

		haveLocationInfoReady = true;
		haveLocationNameReady = true;

		// Publish lat/long
		$.cookie("GEOLOC", lat + ":" + long);
	}

	function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
		var R = 6371; // Radius of the earth in km
		var dLat = deg2rad(lat2 - lat1);
		var dLon = deg2rad(lon2 - lon1);
		var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
			Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
			Math.sin(dLon / 2) * Math.sin(dLon / 2);
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		var d = R * c; // Distance in km

		return d.toFixed(1);
	}

	function deg2rad(deg) {
		return deg * (Math.PI / 180)
	}

	function updateDistances() {
		if (haveLocationInfoReady) {
			$("[data-trigger='distance-update']").each(function () {
				var itemLat = $(this).attr("data-lat");
				var itemLon = $(this).attr("data-lon");

				$(this).text(getDistanceFromLatLonInKm(itemLat, itemLon, lat, long));
			});
		} else {
			setTimeout(function () {
				updateDistances();
			}, 1000);
		}
	}

	updateDistances();

	if (navigator.geolocation) {
		function success(position) {
			if ((lat == position.coords.latitude) && (long == position.coords.longitude)) {
				console.log("We're at same position, skipping lookup.");

				return;
			} else {
				lat = position.coords.latitude;
				long = position.coords.longitude;

				haveLocationInfoReady = true;
			}

			// Publish lat/long
			$.cookie("GEOLOC", lat + ":" + long);

			var geocoder = new google.maps.Geocoder();
			var latLng = new google.maps.LatLng(lat, long);

			geocoder.geocode({
				"latLng": latLng,
				"language": "en"
			}, process);

			function process(data) {
				if (data && data.length > 0) {
					var j, i, c, o = {};

					for (j = 0; j < data.length; j++) {
						comps = data[j].address_components;

			            for (i = 0; i < comps.length; i++) {
			                c = comps[i];

			                if (c.types && c.types.length > 0) {
			                    o[c.types[0]] = c.long_name;
			                    o[c.types[0] + '_s'] = c.short_name;
			                }
			            }
					}

		            var location = {
		                street: o.route || "",
		                neighborhood: o.neighborhood || "",
		                town: o.sublocality || "",
		                city: o.locality || "",
		                region: o.administrative_area_level_1 || "",
		                country: o.country || "",
		                countryCode: o.country_s || "",
		                postalCode: o.postal_code || "",
		                streetNumber: o.street_number || ""
		            };

		            locationName = location.neighborhood + ", " + location.city;

		            haveLocationNameReady = true;
		        }
			}
		}

		function error(error) {
			console.log("There was an error, falling back to IP based geo location.");

			switch(error.code) {
		        case error.PERMISSION_DENIED:
		        	console.log("User denied the request for Geolocation.");

		            break;
		        case error.POSITION_UNAVAILABLE:
		        	console.log("Location information is unavailable.");

		            break;
		        case error.TIMEOUT:
		        	console.log("The request to get user location timed out.");

		            break;
		        case error.UNKNOWN_ERROR:
		        	console.log("An unknown error occurred.");

		            break;
		    }

			setLocationFromGeo();
		}

		navigator.geolocation.watchPosition(success, error);
	} else {
		console.log("HTML5 geolocation not supported, falling back to IP based geo location.");

		setLocationFromGeo();
	}

	function countSalonsNear() {
		if (haveLocationInfoReady) {
			$.get(baseURL + "/ajax/salons/near/count", function(response) {
				$("#nearCount").text(response);
				$(".wrap-loading").hide();
				$(".wrap-result").fadeIn();
			});
		} else {
			// Delay until we have precise location information
			setTimeout(function () {
				countSalonsNear();
			}, 1000);
		}
	}

	if ($(".found-marker").length > 0) {
		countSalonsNear();
	}

	/*
	 * Country, city, area dropdowns
	 */

	// Fetch cities by country
	function updateCitiesByCountry() {
		var $countries = $("#country");
		var $cities = $("#city");
		var countryId = $countries.val();

		$cities.empty();
		$cities.append("<option value=\"\">Select city ...</option>");

		if (countryId == "") {
			return;
		}

		$.get(baseURL + "/ajax/cities/" + countryId, function (response) {
			$.each(response, function (k, v) {
				$cities.append("<option value=\"" + v.id + "\">" + v.name + "</option>");
			});
		});

		$("#city").trigger("change");
	}

	$("body").on("change", "#country[data-trigger='city-update']", function (e) {
		updateCitiesByCountry();
	});

	// Fetch areas by city
	function updateArasByCity() {
		var $cities = $("#city");
		var $areas = $("#area");
		var cityId = $cities.val();

		$areas.empty();
		$areas.append("<option value=\"\">Select area ...</option>");

		if (cityId == "") {
			return;
		}

		$.get(baseURL + "/ajax/areas/" + cityId, function (response) {
			$.each(response, function (k, v) {
				$areas.append("<option value=\"" + v.id + "\">" + v.name + "</option>");
			});
		});
	}

	$("body").on("change", "#city[data-trigger='area-update']", function (e) {
		updateArasByCity();
	});

	/*
	 * Salon details, map and working hours
	 */

	function renderSalonMap() {
		if ($("#gmap").length > 0) {
			var opts = {
	    		zoom: locationZoom,
	    		center: new google.maps.LatLng(locationLatitude, locationLongitude),
	    		mapTypeId: google.maps.MapTypeId.ROADMAP,
	    		streetViewControl: false,
				rotateControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
				scrollwheel: false,
				zoomControl: false,
				disableDoubleClickZoom: true
	    	};

	    	map = new google.maps.Map(document.getElementById("gmap"), opts);

	    	var ll = new google.maps.LatLng(locationLatitude, locationLongitude);
	    	var marker = new google.maps.Marker({
	    	      position: ll,
	    	      map: map
	    	});

			var center = map.getCenter();

			google.maps.event.trigger(map, "resize");

			map.setCenter(center);
		}
	}

	renderSalonMap();

	if ($(".salon-hours").length > 0) {
		var now = new Date();
		var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
		var day = days[now.getDay()];

		var dt = $(".salon-hours dt:contains(" + day + ")");
		var dd = dt.next();

		dt.text("Today").addClass("today");
		dd.addClass("today");

		// Reorder
		var $dts = dt.prevAll("dt");
		var $dds = dt.prevAll("dd");

		var $dtsClone = $dts.clone();
		var $ddsClone = $dds.clone();

		$dts.remove();
		$dds.remove();

		for (var i = $dts.length; i >= 0; i--) {
			$(".salon-hours dl").append($dts[i]);
			$(".salon-hours dl").append($dds[i]);
		}
	}

	/*
	 * Front page search
	 */

	$("body").on("click", "#search form div.option label", function (e) {
		e.stopImmediatePropagation();

		$("#search form div.option i").removeClass("bounceIn fa-dot-circle-o").addClass("fa-circle-o");
		$(this).find("i").removeClass("fa-circle-o").addClass("fa-dot-circle-o animated bounceIn");
	});

	$("body").on("click", "[data-event='search-geo']", function (e) {
		e.preventDefault();

		// loadFrontPageResults(true);

		/* New search by URL redirect for near me search */

		//window.location = baseURL + "/salons/search/nearme-yes/sort-distance"
	});

	$("body").on("submit", "#search form", function (e) {
		e.preventDefault();

		// loadFrontPageResults();

		/* New search by URL redirect */

		var searchURL = "/salons/search?";

		if ($("#search input[name='type']:checked").val() == "near") {
			//searchURL += "/nearme-yes";
		}

		var serviceName = $("#search #service").attr("data-url");

		if (serviceName != null && serviceName != "") {
			//searchURL += "/service-" + serviceName;
		}

        var salonName = $("#search #name").val();
        if (salonName != null && salonName != "") {
            searchURL += "name=" + salonName;
        }

		var locationName = $("#search #where").val();
		if (locationName != null && locationName != "") {
			searchURL += "&where=" + locationName;
		}


		// if (searchURL != "/salons/search") {
			window.location = baseURL + searchURL;
		// }
	});

	// Not used
	function loadFrontPageResults(onlyGeo) {
		var data = new Object();

		if (typeof onlyGeo == "undefined" || onlyGeo == null) {
			onlyGeo = false;
		}

		if (!onlyGeo) {
			data.name = $("#name").val();
			data.service = $("#service").val();
			data.where = $("#where").val();
		}

		if ($("input[name='type']:checked").val() == "near" || onlyGeo) {
			data.lat = lat;
			data.lon = long;
			data.locationName = locationName;
		}

		$.post(baseURL + "/salons", data, function (response) {
			$("#content > div.inner div.section").remove();
			$("#content > div.inner").html($("#content > div.inner", response).html());
			$("#content > div.inner div.section").velocity("transition.slideUpBigIn");

			updateDistances();
		});
	}

	/*
	 * Booking
	 */

	if ($(".staff-selection").length > 0) {
		var $selected = $(".staff-selection").find(".selected");
		var $firstStaff = $(".staff-selection ul li div.staff:first");

		$selected.prepend($firstStaff.clone().removeAttr("data-event"));
	}

	$("body").on("click", "[data-event='open-staff-selection']", function (e) {
		var $list = $(this).closest(".staff-selection").find("ul");

		if ($list.is(":visible")) {
			$list.slideUp(500, "easeInOutExpo");
		} else {
			$list.slideDown(500, "easeInOutExpo");
		}
	});

	$("body").on("click", "[data-event='select-staff']", function (e) {
		var $this = $(this);
		var $selected = $this.closest(".staff-selection").find(".selected");

		$selected.find(".staff").remove();
		$selected.prepend($this.clone().removeAttr("data-event"));

		$("[data-event='open-staff-selection']").trigger("click");

		var staffId = $(".staff-selection .staff").attr("data-id");

		if (staffId == 0) {
			bookingLogicInitialLoad();
		} else {
			bookingLogicStaffLoad(staffId);
		}
	});

	var calendar = null;
	var preventClickEvent = false;

	if ($(".date-selection").length > 0) {
		calendar = $(".date-selection").clndr({
			template: $("#clndr-template").html(),
			trackSelectedDate: true,
			daysOfTheWeek: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			adjacentDaysChangeMonth: true,
			constraints: {
				startDate: moment().subtract(1, "d"),
				endDate: moment().add(46, "d")
			},
			forceSixRows: true,
			ignoreInactiveDaysInSelection: true,
			clickEvents: {
				click: function(target) {
					if (!preventClickEvent && $(target.element).hasClass("day") && !$(target.element).hasClass("inactive")) {
						var date = "";

						var classes = $(target.element).attr('class').split(' ');
						for (e in classes) {
							if (classes[e].indexOf('calendar-day') == 0) {
								date =  classes[e].substr(13, classes[e].length);

								break;
							}
						}

						lastValidSelectedDate = date;

						bookingLogicDateChanged();
					}
				},
				onMonthChange: function(month) {
					bookingLogicClndrSetDateAlone(lastValidSelectedDate);
					bookingLogicClndrSetTakenDates();
				},
			}
		});
	}

	if ($(".time-selection").length > 0) {
		$(".time-selection").css("height", $(".date-selection").outerHeight());
	}

	$("body").on("click", "[data-event='select-time']", function (e) {
		var $this = $(this);
		var $list = $(this).closest("ol");

		$list.find("li").removeClass("selected");

		$this.addClass("selected");
	});

//	if ($(".time-selection").length > 0) {
//		$(".time-selection [data-event]:first").trigger("click");
//	}

	function get24hourTime(str) {
		var p = str.split(' ');
		if (p.length > 0) {
			var time = parseInt(p[0].split(':'));
			if (p[1] == 'PM' && time != 12)
				time+=12;

			return time;
		}
		return "";
	}

	function getSelectedDate() {
//		var classes = jQuery('.date-selection').find('.selected').attr('class').split(' ');
//		for (e in classes) {
//			if (classes[e].indexOf('calendar-day') == 0) {
//				return new Date(classes[e]);
//			}
//		}

		return new Date(lastValidSelectedDate);
	}

	function getSelectedDateAsString() {
//		var classes = jQuery('.date-selection').find('.selected').attr('class').split(' ');
//		for (e in classes) {
//			if (classes[e].indexOf('calendar-day') == 0) {
//				return classes[e].substr(13, classes[e].length);
//			}
//		}

		return lastValidSelectedDate;
	}

	// TODO: Mockup
//	$("body").on("click", "[data-event='placeholder-add-to-cart']", function (e) {
//		e.preventDefault();
//		var selectedDate = getSelectedDate();
//		var time = get24hourTime(jQuery('.time-selection').find('.selected .slot').text().trim());
//		var staff = jQuery('.staff-selection').find('.selected').find('.staff').attr('data-id');
//
//		$.post(window.location + '/reserve', {'selectedDate' : selectedDate, 'time' : time, 'staff' : staff }, function (e) {
//			if (e.success == true) {
//				window.location = baseURL + "/booking/added";
//			} else {
//				// handle unsuccessful
//			}
//		});
//
//	});

	/*
	 * Service booking logic
	 */

	var lastState = null;
	var lastValidSelectedDate = null;

	function bookingLogicToggleLoading() {
		var $bl = $(".booking-loading");
		if ($bl.is(":visible")) {
			$bl.hide();
		} else {
			$bl.show();
		}
	}

	function bookingLogicClndrSetDate(date) {
		var selectedYear = date.split("-")[0];
		var selectedMonth = date.split("-")[1];

		calendar.setYear(selectedYear);
		calendar.setMonth(selectedMonth);

		preventClickEvent = true;

		$(".clndr .calendar-day-" + date).trigger("click");

		preventClickEvent = false;

		lastValidSelectedDate = date;
	}

	function bookingLogicClndrSetDateAlone(date) {
		$(".clndr .day").removeClass("selected");
		$(".clndr .calendar-day-" + date).addClass("selected");
	}

	function bookingLogicClndrSetTakenDates() {
		$.each(lastState.takenDates, function (k, v) {
			var $day = $(".clndr .calendar-day-" + v);

			if (!$day.hasClass("inactive")) {
				$day.addClass("inactive");
			}
		});
	}

	function bookingLogicSetupTimeSlots() {
		var timeSlotsTemplate = _.template($("#timeslots-template").html());
		var timeSlotsContent = timeSlotsTemplate({
			slots: lastState.availableTimeSlots
		});

		$(".time-selection").html(timeSlotsContent);

		// Select first
		$(".time-selection [data-event]:first").trigger("click");
	}

	function bookingLogicInitialLoad() {
		bookingLogicToggleLoading();
		//alert(123456);
		$.get(baseURL + "/ajax/booking/" + salonId + "/" + serviceId + "/state", function (response) {
			lastState = response;

			// We call this first as it triggers clndr update and messes up
			// inactive days we set
			lastValidSelectedDate = lastState.firstAvailableDate;

			bookingLogicClndrSetDate(lastValidSelectedDate);
			bookingLogicClndrSetTakenDates();

			// Time slots
			bookingLogicSetupTimeSlots();

			bookingLogicToggleLoading();
		});
	}

	function bookingLogicStaffLoad(staffId) {
		bookingLogicToggleLoading();

		$.get(baseURL + "/ajax/booking/" + salonId + "/" + serviceId + "/" + staffId + "/state", function (response) {
			lastState = response;

			// We call this first as it triggers clndr update and messes up
			// inactive days we set
			lastValidSelectedDate = lastState.firstAvailableDate;

			bookingLogicClndrSetDate(lastValidSelectedDate);
			bookingLogicClndrSetTakenDates();

			// Time slots
			bookingLogicSetupTimeSlots();

			bookingLogicToggleLoading();
		});
	}

	function bookingLogicDateChanged() {
		var staffId = $(".staff-selection .staff").attr("data-id");
		var date = getSelectedDateAsString();

		bookingLogicToggleLoading();

		$.get(baseURL + "/ajax/booking/" + salonId + "/" + serviceId + "/" + staffId + "/" + date + "/slots", function (response) {
			lastState.availableTimeSlots = response.availableTimeSlots;

			bookingLogicSetupTimeSlots();

			bookingLogicToggleLoading();
		});
	}

	$("body").on("click", "[data-event='add-to-cart']", function (e) {
		e.preventDefault();

		var selectedDate = getSelectedDate();
		var dateString = getSelectedDateAsString();
		var time = get24hourTime(jQuery('.time-selection').find('.selected .slot').text().trim());
		var staff = jQuery('.staff-selection').find('.selected').find('.staff').attr('data-id');

		if (selectedDate == null || time == null || staff == null) {
			return;
		}

		function doReservation() {
			bookingLogicToggleLoading();

			var data = {
				selectedDate: getSelectedDateAsString(),
				time: time,
				staff: staff
			};

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$.post(baseURL + "/booking/" + salonId + "/" + serviceId + "/reserve", data, function (response) {
			    console.log('>>>>'+response);
				if (typeof response.success != "undefined" && response.success) {
					window.location = baseURL + "/account/summary";
				}

				if (typeof response.error != "undefined" && response.error) {
					if (typeof response.differentSalon != "undefined" && response.differentSalon) {
						$(".booking-main").find("p.form-error").remove();
						$(".booking-title").after("<p class=\"form-error\">" + Strings.bookingOtherSalonError + "</p>")
					} else if (typeof response.maxBookingExceeded != "undefined" && response.maxBookingExceeded) {
						$(".booking-main").find("p.form-error").remove();
						$(".booking-title").after("<p class=\"form-error\">" + Strings.maxBookingError + "</p>");
					} else {
						$(".booking-main").find("p.form-error").remove();
						$(".booking-title").after("<p class=\"form-error\">" + Strings.bookingSlotTakenError + "</p>");
					}

					$("html, body").animate({scrollTop: "0px" });
				}

				bookingLogicToggleLoading();
			});
		}

		if (staff == 0 && false) {
			bookingLogicToggleLoading();

			$.get(baseURL + "/ajax/booking/" + salonId + "/" + serviceId + "/" + dateString + "/" + time +  "/staff", function (response) {
				$("#dim").show();

				$("body").append(response);

				$(".popup").css({
					"margin-left": (-($(".popup").outerWidth() / 2)) + "px",
					"margin-top": (-($(".popup").outerHeight() / 2)) + "px"
				})

				$(".popup .staff").first().addClass("selected");

				$(".popup").on("click", "div.staff", function (e) {
					$(".popup .staff").removeClass("selected");

					$(this).addClass("selected");
				});

				$(".popup").on("click", "i.fa-times", function (e) {
					$(".popup").remove();
					$("#dim").hide();
				});

				$(".popup").on("click", "button", function (e) {
					staff = $(".popup .staff.selected").attr("data-id");

					$(".popup").remove();
					$("#dim").hide();

					doReservation();
				});

				bookingLogicToggleLoading();
			});
		} else {
			doReservation();
		}
	});

	if ($("[data-event='add-to-cart']").length > 0) {
		bookingLogicInitialLoad();
	}


	/*
	 * Remove from cart
	 */

	$("body").on("click", "[data-event='cart-remove']", function (e) {
		var $this = $(this);
		var id = $this.attr("data-id");

		window.location.href = baseURL + "/cart/remove/" + id;
	});

	// Dropdown version
	$("body").on("click", "[data-event='cart-remove-dropdown']", function (e) {
		var $this = $(this);
		var $cartButton = $("#account-social div.cart button");
		var id = $this.attr("data-id");

		$.get(baseURL + "/cart/remove/" + id, function (response) {
			$(document).trigger("booking:removed", {
				id: id
			});

			if (!isMobile()) {
				var $menu = $("#menu-cart");

				$.get(baseURL + "/ajax/cart/dropdown", function(response) {
					$menu.find(".menu-content").html(response);

					var offset = $cartButton.offset();

					if ($("html").hasClass("rtl")) {
						$menu.css({
							left: offset.left + "px",
							top: (offset.top + $cartButton.height() + 10) + "px"
						});
					} else {
						$menu.css({
							right: ($(window).width() - (offset.left + $cartButton.width())) + "px",
							top: (offset.top + $cartButton.height() + 10) + "px"
						});
					}

					// Update count
					var count = $menu.find("li.item").length;

					$cartButton.find(".count").text(count);

					$menu.fadeIn(500, "easeInOutExpo");
				});
			} else {
				var $mobileMenu = $("#mobile-menu-cart");

				$.get(baseURL + "/ajax/cart/dropdown", function(response) {
					$mobileMenu.find(".content").html(response);

					var wH = $(window).height();
					var cH = wH - 50;

					if ($mobileMenu.find(".content li").length > 0) {
						$mobileMenu.find(".footer").show();

						cH -= 50;

						$mobileMenu.find(".content button[data-event='menu-checkout']").remove();
					} else {
						$mobileMenu.find(".footer").hide();
					}

					$mobileMenu.find(".content").css({
						"height": cH + "px",
						"max-height": cH + "px",
					});
				});
			}
		});
	});

	/*
	 * Checkout
	 */
	// TODO: Mockup
	$("body").on("click", "[data-event='menu-checkout']", function (e) {
		e.preventDefault();

		window.location = baseURL + "/cart/checkout";
	});

	// TODO: Mockup
	$("body").on("click", "[data-event='do-checkout']", function (e) {
		e.preventDefault();

		window.location = baseURL + "/cart/checkout";
	});

	// Do payment button
	$("body").on("click", "[data-event='do-payment']", function (e) {
		e.preventDefault();

		$(".checkout-main form").trigger("submit");
	});

	/*
	 * Filters
	 */

	$("body").on("click", ".filter-category label, .filter-options label", function (e) {
		if ($(e.target).is("input")) {
			var $this = $(this);
			var $i = $this.find("i");

			$i.toggleClass("fa-square-o fa-check-square-o");
		}
	});

	/*
	 * Window resize events
	 */

	$(window).resize(function () {
		var ww = $(window).width();

		renderSalonMap();

		renderJamalikiMap();

		if ($("div.filters div.collapse").length > 0) {
			checkFilterCollapse();
		}

		$(".time-selection").css("height", $(".date-selection").outerHeight());

		if (ww <= 600 && cww > 600) {
			setupFeaturedSalonsSwiper(1)
		}

		if (ww > 600 && ww <= 1000 && (cww <= 600 || cww > 1000)) {
			setupFeaturedSalonsSwiper(2)
		}

		if (ww > 1000 && cww <= 1000) {
			setupFeaturedSalonsSwiper(4)
		}

		cww = ww;
	});

	// Cart sliders
	function checkoutRecalcTotal() {
		var $total = $(".final");
		var $totalValue = $total.find(".value");

		var hbDiscount = $("#hbPointsUsed").length > 0 ? $("#hbPointsUsed").val() : 0;
		var salonDiscount = $("#salonPointsUsed").length > 0 ? $("#salonPointsUsed").val() : 0;

		$totalValue.text((cartTotal - hbDiscount - salonDiscount).toFixed(2));
	}

	function checkoutRecalcPreCheck(hbDiscount, salonDiscount) {
		if (cartTotal - hbDiscount - salonDiscount < 0) {
			return false;
		}

		return true;
	}

	if ($("#hbPointsUsedSlider").length > 0) {
		var hbPointsMax = $("#hbPointsUsedSlider").attr("data-max");
		var hbPointsUsed = $("#hbPointsUsed").val();

		if (hbPointsUsed == null || hbPointsUsed == "") {
			hbPointsUsed = 0;
		}

		$("#hbPointsUsedSlider").slider({
			min: 0,
			max: hbPointsMax,
			value: hbPointsUsed,
			slide: function (event, ui) {
				if (!checkoutRecalcPreCheck((ui.value * hbPointsSpendRate), $("#salonPointsUsed").val())) {
					return false;
				}

				if (ui.value > 0) {
					$(".hbPointsDiscount").find(".value").text("-" + (ui.value * hbPointsSpendRate).toFixed(2));
					$(".hbPointsDiscount").show();
				} else {
					$(".hbPointsDiscount").find(".value").text("-");
					$(".hbPointsDiscount").hide();
				}

				$("#hbPointsUsed").val(ui.value * hbPointsSpendRate);

				checkoutRecalcTotal();
			}
		});
	}

	if ($("#salonPointsUsedSlider").length > 0) {
		var salonPointsMax = $("#salonPointsUsedSlider").attr("data-max");
		var salonPointsUsed = $("#salonPointsUsed").val();

		if (salonPointsUsed == null || salonPointsUsed == "") {
			salonPointsUsed = 0;
		}

		$("#salonPointsUsedSlider").slider({
			min: 0,
			max: salonPointsMax,
			value: salonPointsUsed,
			slide: function (event, ui) {
				if (!checkoutRecalcPreCheck($("#hbPointsUsed").val(), (ui.value * salonPointsSpendRate))) {
					return false;
				}

				if (ui.value > 0) {
					$(".salonPointsDiscount").find(".value").text("-" + (ui.value * salonPointsSpendRate).toFixed(2));
					$(".salonPointsDiscount").show();
				} else {
					$(".salonPointsDiscount").find(".value").text("-");
					$(".salonPointsDiscount").hide();
				}

				$("#salonPointsUsed").val(ui.value * salonPointsSpendRate);

				checkoutRecalcTotal();
			}
		});
	}

	// Search city change
	$("body").off("change", ".filter-city select").on("change", ".filter-city select", function (e) {
		var $this = $(this);
		var $areas = $(".filter-area select");
		var id = $this.find("option:selected").val();

		if (id != "") {
			$.get(baseURL + "/ajax/areas/" + id, function (response) {
				$areas.empty();

				$areas.append("<option value=\"\">Please select ...</option>");

				$.each(response, function (k, v) {
					$areas.append("<option data-url=\"" + v.url + "\" value=\"" + v.id + "\">" + v.name + "</option>");
				});
			});
		} else {
			$areas.empty();

			$areas.append("<option value=\"\">Please select ...</option>");
		}
	});

	// Salon search
	$("body").off("click", "[data-event='do-salon-search']").on("click", "[data-event='do-salon-search']", function (e) {
		e.preventDefault();

		/*
		var data = new Object();
		var cats = [];

		data.keywords = $(".filter-keyword input").val();

		$(".filter-category input").each(function () {
			if ($(this).is(":checked")) {
				cats.push($(this).val());
			}
		});

		data.categories = cats;
		data.cityId = $(".filter-city select option:selected").val();
		data.areaId = $(".filter-area select option:selected").val();

		console.log(data);

		$.post(baseURL + "/salons", $.param(data, true), function (response) {
			$("#content > div.inner div.section").remove();
			$("#content > div.inner").html($("#content > div.inner", response).html());
			$("#content > div.inner div.section").velocity("transition.slideUpBigIn");

			updateDistances();
		});
		*/

		/* New search by URL from search results page */
		if (hasHistorySupport) {
			var data = {
				random: window.Math.random(),
				type: "search"
			};

			History.pushState(data, document.title, createSearchURL());
		} else {
			doSearch(createSearchURL());
		}
	});

	// Search autocomplete
	// if ($("#searchForm").length > 0) {
	// 	$("#searchForm #service").autocomplete({
	// 		source: baseURL + "/salons/actest/service",
	// 		select: function (event, ui) {
	// 			$("#searchForm #service").attr("data-code", ui.item.code);
	// 			$("#searchForm #service").attr("data-url", ui.item.url);
	// 		},
	// 		change: function (event, ui) {
	// 			if (ui.item != null) {
	// 				$("#searchForm #service").attr("data-code", ui.item.code);
	// 				$("#searchForm #service").attr("data-url", ui.item.url);
	// 			} else {
	// 				$("#searchForm #service").attr("data-code", "");
	// 				$("#searchForm #service").attr("data-url", "");
	// 				$("#searchForm #service").val("");
	// 			}
	// 		}
	// 	});
    //
	// 	$("#searchForm #where").autocomplete({
	// 		source: baseURL + "/salons/actest/location",
	// 		select: function (event, ui) {
	// 			$("#searchForm #where").attr("data-code", ui.item.code);
	// 			$("#searchForm #where").attr("data-url", ui.item.url);
	// 		},
	// 		change: function (event, ui) {
	// 			if (ui.item != null) {
	// 				$("#searchForm #where").attr("data-code", ui.item.code);
	// 				$("#searchForm #where").attr("data-url", ui.item.url);
	// 			} else {
	// 				$("#searchForm #where").attr("data-code", "");
	// 				$("#searchForm #where").attr("data-url", "");
	// 				$("#searchForm #where").val("");
	// 			}
	// 		}
	// 	});
    //
	// 	$("#searchForm #name").autocomplete({
	// 		source: baseURL + "/salons/actest/salon",
	// 		select: function (event, ui) {
	// 			$("#searchForm #name").attr("data-code", ui.item.code);
	// 			$("#searchForm #name").attr("data-url", ui.item.url);
	// 		},
	// 		change: function (event, ui) {
	// 			if (ui.item != null) {
	// 				$("#searchForm #name").attr("data-code", ui.item.code);
	// 				$("#searchForm #name").attr("data-url", ui.item.url);
	// 			} else {
	// 				$("#searchForm #name").attr("data-code", "");
	// 				$("#searchForm #name").attr("data-url", "");
	// 				$("#searchForm #name").val("");
	// 			}
	// 		}
	// 	});
	// }

	// Comment karma up
	$("body").on("click", "i[data-karma-up]", function(e) {
		e.preventDefault();

		var $this = $(this);
		var id = $this.attr("data-karma-up");
		var voted = $.cookie("voted-" + id);

		if (voted != "yes") {
			$.get(baseURL + "/blog/comment/" + id + "/karma/up", function(response) {
				if (typeof response.success != "undefined" && response.success) {
					$.cookie("voted-" + id, "yes");

					$this.parent().find("span").text(parseInt($this.parent().find("span").text(), 10) + 1);
				}

				if (typeof response.error != "undefined" && response.error) {
					alert("There was an error.");
				}
			});
		}
	});

	// Comment karma down
	$("body").on("click", "i[data-karma-down]", function(e) {
		e.preventDefault();

		var $this = $(this);
		var id = $this.attr("data-karma-down");
		var voted = $.cookie("voted-" + id);

		if (voted != "yes") {
			$.get(baseURL + "/blog/comment/" + id + "/karma/down", function(response) {
				if (typeof response.success != "undefined" && response.success) {
					$.cookie("voted-" + id, "yes");

					$this.parent().find("span").text(parseInt($this.parent().find("span").text(), 10) - 1);
				}

				if (typeof response.error != "undefined" && response.error) {
					alert("There was an error.");
				}
			});
		}
	});

	// Fancybox setup
	$(".fancybox").fancybox({
		padding: 0,
		helpers: {
			overlay: {
		    	locked: false
		    }
		}
	});

	// Article gallery
	if ($("div.blog-gallery-holder").length > 0) {
		var gallerySwipers = [];

		$("div.blog-gallery-holder").each(function () {
			var $this = $(this);

			gallerySwipers.push(new Swiper($this.find(".swiper-container"), {
		        grabCursor: true,
		        spaceBetween: 10,
		        slidesPerView: 3
			}));
		});
	}

	// Jamaliki map & working hours

	function renderJamalikiMap() {
		if ($("#contactMap").length > 0) {
			var opts = {
	    		zoom: contactLocationZoom,
	    		center: new google.maps.LatLng(contactLatitude, contactLongitude),
	    		mapTypeId: google.maps.MapTypeId.ROADMAP,
	    		streetViewControl: false,
				rotateControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
				scrollwheel: false,
				zoomControl: true,
				disableDoubleClickZoom: true
	    	};

	    	contactMap = new google.maps.Map(document.getElementById("contactMap"), opts);

	    	var ll = new google.maps.LatLng(contactLatitude, contactLongitude);
	    	var marker = new google.maps.Marker({
	    	      position: ll,
	    	      map: contactMap
	    	});

			var center = contactMap.getCenter();

			google.maps.event.trigger(contactMap, "resize");

			contactMap.setCenter(center);
		}
	}

	renderJamalikiMap();

	if ($(".working-hours").length > 0) {
		var now = new Date();
		var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
		var day = days[now.getDay()];

		var dt = $(".working-hours dt:contains(" + day + ")");
		var dd = dt.next();

		dt.text("Today").addClass("today");
		dd.addClass("today");

		// Reorder
		var $dts = dt.prevAll("dt");
		var $dds = dt.prevAll("dd");

		var $dtsClone = $dts.clone();
		var $ddsClone = $dds.clone();

		$dts.remove();
		$dds.remove();

		for (var i = $dts.length; i >= 0; i--) {
			$(".working-hours").append($dts[i]);
			$(".working-hours").append($dds[i]);
		}
	}

	if ($("html").hasClass("rtl")) {
		$(".fa-caret-right").removeClass("fa-caret-right").addClass("fa-caret-left");
		$(".fa-arrow-right").removeClass("fa-arrow-right").addClass("fa-arrow-left");
		$(".fa-angle-right").removeClass("fa-angle-right").addClass("fa-angle-left");
	}

	if ($("div.filters div.collapse").length > 0) {
		function checkFilterCollapse() {
			var ww = $(window).width();

			if (ww <= 600) {
				$("div.filters div.collapse .fa-chevron-up").hide();
				$("div.filters div.collapse .fa-chevron-down").show();

				$("div.filters div.filter, div.filters button").slideUp("fast");
				$("div.filters h4").css("margin", 0);

				$("div.filters").addClass("collapsed");
			} else {
				$("div.filters div.collapse .fa-chevron-up").show();
				$("div.filters div.collapse .fa-chevron-down").hide();

				$("div.filters div.filter, div.filters button").slideDown("fast");
				$("div.filters h4").css("margin", "");

				$("div.filters").removeClass("collapsed");
			}
		}

		checkFilterCollapse();

		$("div.filters div.collapse").on("click", function(e) {
			e.preventDefault();

			if ($("div.filters").hasClass("collapsed")) {
				$("div.filters div.collapse .fa-chevron-up").show();
				$("div.filters div.collapse .fa-chevron-down").hide();

				$("div.filters div.filter, div.filters button").slideDown("fast");
				$("div.filters h4").css("margin", "");

				$("div.filters").removeClass("collapsed");
			} else {
				$("div.filters div.collapse .fa-chevron-up").hide();
				$("div.filters div.collapse .fa-chevron-down").show();

				$("div.filters div.filter, div.filters button").slideUp("fast");
				$("div.filters h4").css("margin", 0);

				$("div.filters").addClass("collapsed");
			}
		});
	}

	$("body").on("click", "[data-event='change-pass']", function (e) {
		e.preventDefault();

		$(this).closest(".controls").remove();
		$(".password-fields").slideDown();
	});

	/* New search by URL */

	function doSearch(url) {
		$(".filters button").html("<i class=\"fa fa-spin fa-spinner\"></i> Searching ...");
		$(".results-main").css("opacity", "0.25");

		$.ajax({
			url: url,
			type: "get"
		}).done(function (data) {
			$("#content .inner .section").html($("#content .inner .section", data).html());

			updateDistances();

			$(".filters button").html("Filter");

			$("html, body").animate({scrollTop: "0px" });
		});
	}

	function createSearchURL(page) {
		var url = "";

		// Distance
		if ($(".filter-distance").length > 0) {
			var distance = $(".filter-distance select").val();

			if (distance != "") {
				if (url.indexOf("nearme") == -1) {
					url += "/nearme-yes";
				}

				url += "/distance-" + distance;
			}
		}

		// Keywords
		var keywords = $(".filter-keyword input").val();

		if (keywords != "") {
			url += "/keywords-" + encodeURIComponent(keywords);
		}

		// Categories
		var categories = [];

		$(".filter-category input:checked").each(function () {
			categories.push($(this).attr("data-url"));
		});

		if (categories.length > 0) {
			url += "/categories-" + categories.join(":");
		}

		// Price range
		var priceRange = $(".filter-price select").val();

		if (priceRange != "") {
			url += "/price-" + priceRange;
		}

		// City
		var city = $(".filter-city select").val();

		if (city != "") {
			url += "/city-" + $(".filter-city option:selected").attr("data-url");
		}

		// Area
		var area = $(".filter-area select").val();

		if (area != "") {
			url += "/area-" + $(".filter-area option:selected").attr("data-url");
		}

		// Options
		var featured = $(".filter-options input[name='featured']");

		if (featured.is(":checked")) {
			url += "/featured-yes";
		}

		var nearme = $(".filter-options input[name='nearme']");

		if (nearme.is(":checked") && url.indexOf("nearme") == -1) {
			url += "/nearme-yes";
		}

		// Page
		if (typeof page != "undefined" && page != null) {
			url += "/page-" + page;
		}

		// Sort
		var sort = $(".sort select").val();

		url += "/sort-" + sort;

		//return baseURL + "/salons/search" + url;
	}

	$("body").on("change", ".sort select", function (e) {
		if (hasHistorySupport) {
			var data = {
				random: window.Math.random(),
				type: "search"
			};

			History.pushState(data, document.title, createSearchURL());
		} else {
			doSearch(createSearchURL());
		}
	});

	$("body").on("click", ".salon-pagination .prev", function (e) {
		e.preventDefault();

		if (currentPage > 0) {
			if (hasHistorySupport) {
				var data = {
					random: window.Math.random(),
					type: "search"
				};

				History.pushState(data, document.title, createSearchURL(currentPage - 1));
			} else {
				doSearch(createSearchURL(currentPage - 1));
			}
		}
	});

	$("body").on("click", ".salon-pagination .next", function (e) {
		e.preventDefault();

		if (currentPage + 1 < lastPage) {
			if (hasHistorySupport) {
				var data = {
					random: window.Math.random(),
					type: "search"
				};

				History.pushState(data, document.title, createSearchURL(currentPage + 1));
			} else {
				doSearch(createSearchURL(currentPage + 1));
			}
		}
	});

	// Make sure we have a unique state to start with
	// TODO needs fix, behaves weird on initial load
	if (hasHistorySupport && typeof searchPage != "undefined" && searchPage) {
		History.replaceState({
			type: "initial",
			random: window.Math.random()
		}, document.title, window.location.href);

		// Trigger search when we push something into history
		// but only if it's search type url
		History.Adapter.bind(window, "popstate", function() {
			var state = History.getState();

			if (state.data.type == "search") {
				doSearch(state.url);
			}

			if (state.data.type == "initial") {
				doSearch(state.url);
			}
	    });
	}

	// Handle some new booking/cart events
	$(document).on("booking:expiring", function (e, data) {

	});

	$(document).on("booking:expired", function (e, data) {
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
	});

	$(document).on("booking:removed", function (e, data) {
		if (typeof internalPageId != "undefined" && internalPageId == "booking:added") {
			window.location = baseURL + "/cart";
		}

		if (typeof internalPageId != "undefined" && internalPageId == "cart:index") {
			window.location = baseURL + "/cart";
		}

		if (typeof internalPageId != "undefined" && internalPageId == "cart:checkout") {
			window.location = baseURL + "/cart";
		}
	});

	$(document).on("booking:rereserve", function (e, data) {
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
	});

	$(document).on("cart:updated", function (e, data) {

	});

	$("body").on("click", "[data-event='cart-rereserve']", function (e) {
		e.preventDefault();

		var $this = $(this);
		var id = $this.attr("data-id");

		window.location = baseURL + "/cart/rereserve/" + id;
	});

	$("body").on("click", "[data-event='cart-rereserve-dropdown']", function (e) {
		e.preventDefault();

		var $this = $(this);
		var id = $this.attr("data-id");

		$.get(baseURL + "/booking/rereserve/" + id, function (response) {
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
							text: "Dismiss",
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
							text: "Dismiss",
						  	onClick: function($noty) {
						  		$noty.close();
						  	}
						}],
						killer: true
					});

  					$.get(baseURL + "/cart/remove/" + parsed.data.bookingId, function (response) {
  						$(document).trigger("booking:removed", {
  							id: id
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
	});

	// Phone verification
	var $phoneArea = $(".phone-area");
	var checkTimeout = null;

	if ($phoneArea.hasClass(".active")) {
		$("#phoneRow").find("button").show();
	}

	$("body").on("change", "#mobileNoPart", function (e) {
		verificationNeeded();
	});

	$("body").on("click", "#mobileNoPart", function (e) {
		// User clicked option
		if (e.offsetY < 0) {
			verificationNeeded();
		}
	});

	$("body").on("keyup", "#mobileNo", function (e) {
		verificationNeeded();
	});

	function verificationNeeded() {
		clearTimeout(checkTimeout);

		var mobileNoPart = $("#mobileNoPart").val();
		var mobileNo = $("#mobileNo").val();

		if (mobileNoPart != "" && mobileNo != "") {
			checkTimeout = setTimeout(function () {
				var request = {
					phone: mobileNoPart + " " + mobileNo
				};

				$.post(baseURL + "/account/profile/phoneVerificationNeeded", request, function (response) {
					if (typeof response.needed != "undefined") {
						if (response.needed) {
							$phoneArea.addClass("active");
							$("#phoneRow").find("button").show();
							$("#notificationRow p span").text("You need to verify your phone number before you can use it.");
							$("#notificationRow").show();
						} else {
							$("#phoneRow").find("button").hide();
							$("#notificationRow p span").empty();
							$("#notificationRow").hide();
							$("#verificationRow").hide();
							$phoneArea.removeClass("active");
						}
					}
				});
			}, 500);
		}
	}

	$("body").on("click", "[data-event='verify-phone']", function (e) {
		e.preventDefault();

		var $this = $(this);

		if ($this.hasClass("working")) {
			return;
		}

		$this.addClass("working");

		$("#mobileNo\\.errors").hide();
		$("#phoneVerificationCode\\.errors").hide();

		var mobileNoPart = $("#mobileNoPart").val();
		var mobileNo = $("#mobileNo").val();

		if (mobileNoPart != "" && mobileNo != "") {
			if (mobileNoPart.charAt(0) == "0") {
				mobileNoPart = mobileNoPart.substr(1);
			}

			var request = {
				phone: mobileNoPart + mobileNo
			};

			$.post(baseURL + "/account/profile/sendPhoneVerificationCode", request, function (response) {
				if (typeof response.success != "undefined" && response.success) {
					$("#verificationRow").show();

					$("#phoneRow").find("button").text("Resend (" + response.triesLeft + " tries left)");

					if (response.triesLeft <= 0) {
						$("#phoneRow").find("button").attr("disabled", "disabled");

						$("#notificationRow p span").text("Verification code was sent to your phone, please enter it below. You cannot request any more codes, if you need assistance please contact us.");
					} else {
						$("#notificationRow p span").text("Verification code was sent to your phone, please enter it below.");
					}

					$("#phoneRow").find("i.fa-check").show();
					$("#phoneRow").find("i.fa-times").hide();
				}

				if (typeof response.error != "undefined" && response.error) {
					if (typeof response.msg != "undefined") {
						$("#notificationRow p span").text(response.msg);

						$("#phoneRow").find("button").attr("disabled", "disabled");
						$("#phoneRow").find("i.fa-check").hide();
						$("#phoneRow").find("i.fa-times").show();
					}
				}

				$this.removeClass("working");
			});
		} else {
			alert("Please enter phone number.");
		}
	});

	$("body").on("click", "[data-event='verify-code']", function (e) {
		e.preventDefault();

		var $this = $(this);

		if ($this.hasClass("working")) {
			return;
		}

		$this.addClass("working");

		$("#phoneVerificationCode\\.errors").hide();

		var code = $("#phoneVerificationCode").val();

		if (code != "") {
			var request = {
				code: code
			};

			$.post(baseURL + "/account/profile/verifyPhoneVerificationCode", request, function (response) {
				if (typeof response.success != "undefined" && response.success) {
					$("#notificationRow p span").text("Your phone number has been verified.");

					$("#verificationRow").find("i.fa-check").show();
					$("#verificationRow").find("i.fa-times").hide();
				}

				if (typeof response.error != "undefined" && response.error) {
					$("#notificationRow p span").text("Verification code you entered is not valid, please try again.");

					$("#verificationRow").find("i.fa-check").hide();
					$("#verificationRow").find("i.fa-times").show();
				}

				$this.removeClass("working");
			});
		} else {
			alert("Please enter verification code.");
		}
	});

	$(window).on('scroll', function (e) {
		if ($(window).scrollTop() > 0) {
			$('#scrollTop').fadeIn('fast');
		} else {
			$('#scrollTop').fadeOut('fast');
		}
	});

	$('#scrollTop').on('click', function (e) {
		$('html, body').stop().animate({
			scrollTop:0
		}, 500, 'swing');
	});

});
