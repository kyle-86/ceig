(function ($) {
	// Selectric
	function selectricGforms() {
		$('.gform_wrapper select').selectric({
			disableOnMobile: false,
			nativeOnMobile: false,
			responsive: true,
			maxHeight: 264
		});
	}
	selectricGforms();
	// Slick - Global settings
	var slick_previous = '<button class="slick-arrow--previous"><i class="fa fa-angle-left" aria-hidden="true"></i><span class="screen-reader-text">Previous</span></button>';
	var slick_next = '<button class="slick-arrow--next"><i class="fa fa-angle-right" aria-hidden="true"></i><span class="screen-reader-text">Next</span></button>';
	// Slick - Single Slide
	$('.js-slick-single').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		dots: true,
		speed: 600,
		cssEase: 'ease-in-out',
		lazyLoad: 'ondemand'
	});
	$('.sliderLogos').slick({
		slidesToShow: 5,
		autoplay: true,
  		autoplaySpeed: 2000,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		dots: true,
		speed: 600,
		cssEase: 'ease-in-out',
		lazyLoad: 'ondemand',
		responsive: [{
			breakpoint: 600,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			}
		}, {
			breakpoint: 500,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		}]
	});
	$('.js-slick-single img').load(function () {
		$(this).addClass('slick-loaded');
		$(this).prev('.spinner').fadeOut().remove();
	});
	// Toggle offscreen menu
	$('.js-nav-toggle').click(function (e) {
		e.preventDefault();
		$(this).toggleClass('is-active');
		$('.offscreen').toggleClass('offscreen--active');
		$('body').toggleClass('body--offscreen-active');
	});
	// Superfish dropdown
	$('.nav--primary').superfish();
	// Close nav on anchor click
	$('.offscreen a[href^="#"]').click(function (event) {
		$('.js-nav-toggle').trigger("click");
	});
	// Smooth scroll for anchor links
	$('.js-link-anchor, .js-link-anchor a').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
	// Magnific Popup - Standard
	$('.js-magnific-popup').magnificPopup({
		type: 'inline',
		closeBtnInside: true,
		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
		midClick: true
	});
	// Magnific Popup - Video
	$('.js-magnific-video').magnificPopup({
		type: 'inline',
		midClick: true,
		callbacks: {
			open: function () {
				// Play video on open
				$(this.content).find('video')[0].play();
				var p = $(this.content).find('video')[0].player;
				p.setPlayerSize();
				p.setControlsSize();
			},
			close: function () {
				// Reset video on close
				$(this.content).find('video')[0].load();
			}
		}
	});
	// Magnific Popup - Ajax
	$('.js-magnific-ajax').magnificPopup({
		type: 'ajax',
		closeBtnInside: true,
		closeOnContentClick: false,
		closeOnBgClick: false,
		// removalDelay: 800, // Delay removal for animation
		tLoading: '<div class="spinner"></div>',
	});
	// Infinite Scroll
	// Infinite Scroll - Settings
	$container = $('.js-infinite-parent');
	$container.infiniteScroll({
		path: '.nav--pagination a',
		append: '.js-infinite-item',
		history: false,
		checkLastPage: true,
		scrollThreshold: 200
	});
	// Infinite Scroll - Loaded
	$container.on('append.infiniteScroll', function (event, response, path, items) {
		$('.js-match-height').matchHeight();
	});
	// Infinite Scroll - Last Page
	$container.on('last.infiniteScroll', function (event, response, path) {
		$('.nav-pagination').fadeOut().remove();
	});
	// Equal Heights
	$('.js-match-height').matchHeight();

	$('.gfield').matchHeight({
		property: 'min-height'
	});
	// Sticky header
	var headerHeight = $('.header').outerHeight();
	if ($(window).scrollTop() >= headerHeight) {
		$('.header').addClass('header--sticky');
	}
	$(window).scroll(function () {
		var sticky = $('.header'),
			scroll = $(window).scrollTop();
		if (scroll >= headerHeight) sticky.addClass('header--sticky');
		else sticky.removeClass('header--sticky');
	});
	// Accordion
	//$('.accordion__item__content').hide(); // Close all accordions
	$('.js-accordion-toggle').click(function (e) {
		e.preventDefault();
		var accordion_id = $(this).data('target');
		if ($(this).parent().hasClass('accordion__item--active')) { // If the accordion is already open
			$('.accordion__item').removeClass('accordion__item--active');
			$('.accordion__item__content').slideUp();
			$(this).parent().removeClass('accordion__item--active');
			$('#' + accordion_id).slideUp();
		} else { // Else if the accordion is not open
			$('.accordion__item').removeClass('accordion__item--active');
			$('.accordion__item__content').slideUp();
			$(this).parent().addClass('accordion__item--active');
			$('#' + accordion_id).slideDown();
		}
	});
	$(".nav--mobile .menu-item-has-children > a").append("<span class='showHideMenu'><i class='fal fa-chevron-down'></i></span>");
	$('.showHideMenu i').click(function (e) {
		e.preventDefault();
		$(this).toggleClass('fa-chevron-down');
		$(this).toggleClass('fa-chevron-up');
		$(this).parent().parent().parent().find('.sub-menu').slideToggle();
	});
	// Responsive videos
	$('.js-fitvids').fitVids();
	// Lazy Loading images
	var bLazy = new Blazy({
		selector: '.b-lazy',
		loadInvisible: true,
		offset: 150,
		success: function (element) {
			$(element).prev('.spinner').fadeOut().remove();
		}
	});
	// Gravity Forms
	$(document).bind('gform_post_render', function () {
		selectricGforms();
	});

	$(".megaMenuContent").hide();

	$(".crossMenu").click(function () {
		$(".megaMenuContent").slideToggle("slow", function () {});
		$(this).parent().toggleClass('openMenu');
	});

	$("[data-menuid]").on("click", function (event) {

		var dataMenuId = $(this).attr("data-menuid");

		$("[data-menu=" + dataMenuId + "]").toggleClass('openMenu');
		$("[data-menu=" + dataMenuId + "]").slideToggle("slow", function () {});

		if ($("[data-menu=" + dataMenuId + "]").hasClass('openMenu')) {
			event.preventDefault();
		} else {

		}
	});

	(function($) {
		document.addEventListener('facetwp-loaded', function() {
			bLazy.revalidate();
			if (FWP.loaded) {
				$('html, body').animate({
					scrollTop: $('#facet-top').offset().top
				}, 500);
			}
			$('.js-match-height').matchHeight();
		 });
	})(jQuery);

	var A = $(".logo--b #logo-circle");
	var B = $(".logo--b #logo-dot");
	var C = $(".logo--b #logo-text path");

	gsap.set(A, { opacity: 0 });
	gsap.set(B, { opacity: 0, rotation: -90, transformOrigin: "center" });
	gsap.set(C, { opacity: 0 });

	var tl = new TimelineMax({ repeat: 0, repeatDelay: 1 });
	tl.add("start");
	tl.to(A, 2, { opacity: 1, rotation: 360, transformOrigin: "center" });
	tl.to(B, 1, { opacity: 1, rotation: 0, transformOrigin: "center" }, 1);
	tl.to(C, 2, { opacity: 1, stagger: 0.05 }, "start");

})(jQuery);

