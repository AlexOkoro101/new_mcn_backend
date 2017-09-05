/*
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 980px)',
		narrower: '(max-width: 840px)',
		mobile: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$header = $('#header'),
			$banner = $('#banner');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on narrower.
			skel.on('+narrower -narrower', function() {
				$.prioritize(
					'.important\\28 narrower\\29',
					skel.breakpoint('narrower').active
				);
			});

		// Scrolly links.
			$('.scrolly').scrolly({
				speed: 1000,
				offset: -10
			});

		// Dropdowns.
			$('#nav > ul').dropotron({
				mode: 'fade',
				noOpenerFade: true,
				expandMode: (skel.vars.mobile ? 'click' : 'hover')
			});

		// Off-Canvas Navigation.

			// Navigation Button.
				$(
					'<div id="navButton">' +
						'<a href="#navPanel" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						'<nav>' +
							$('#nav').navList() +
						'</nav>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'right',
						target: $body,
						visibleClass: 'navPanel-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navButton, #navPanel, #page-wrapper')
						.css('transition', 'none');

		// Header.
		// If the header is using "alt" styling and #banner is present, use scrollwatch
		// to revert it back to normal styling once the user scrolls past the banner.
		// Note: This is disabled on mobile devices.
			/*if (!skel.vars.mobile
			&&	$header.hasClass('alt')
			&&	$banner.length > 0) {

				$window.on('load', function() {

					$banner.scrollwatch({
						delay:		0,
						range:		1,
						anchor:		'top',
						on:			function() { $header.addClass('alt reveal'); },
						off:		function() { $header.removeClass('alt'); }
					});

				});

			}*/

	});

})(jQuery);


/****************Ekundayo Changes****************/
$('.phone-form').each(function(index, value){

	$('.phone-form')[index].reset();
	var ind = $(this).find($('input[name=dataId]')).val()

	$('.spb'+ind).click(function(){
		$('.load-phone'+ind).slideToggle();
		$('.spb'+ind).hide();
		$('.adp'+ind).show();
	});


	$(".phone-form"+ind).submit(function(e){
		e.preventDefault();
		var id = $(this).find($('input[name=dataId]')).val();

		if ($(".load-phone"+ind).val() == "") {
			$('.load-phone'+ind).slideToggle();
		} 

		$.ajax({
	        type:"POST",
	        url:'/data/buy/'+id,
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	          	console.log(data.details);
	          	$('.phone-form')[index].reset();
	          	$('.adp'+ind).hide();
	          	$('.spb'+ind).show();
	          	$('.load-phone'+ind).hide();
	          	$('.cart-success .last-span').html("");
	          	$('.cart-success .last-span').html('<br><span>'+data.details+'</span><br><span>to '+data.load_phone+'</span>');
	          	$('.cart-success').show();
	          	$('#cart-place').html("");
	          	$('#cart-place').html("<span class='cart-badge'>" + data.totalQty + "</span>");
	          	$('.carta').remove();
	          	$("html, body").animate({ scrollTop: 0 }, "slow");
	          	$('#cart-place').show();
	          	setTimeout(function() { $('.cart-success').hide(); }, 30000);
	        },
	        error: function(data){
	        	
	        }
	    });

	});
});

$('.cart-dismiss').click(function(){
	$('.cart-success').remove();
});

$('.dd-in-btn').click(function(e){
	e.preventDefault();
	$("#dropdown-login").slideToggle();
});

$(document).click(function(e){
	if(!$(e.target).closest('.dd-in-btn, #dropdown-login').length){
	    $("#dropdown-login").slideUp();
	}
});

$('.toggle').click(function() {

	$('.user-account-menu').slideToggle()
})
$('#s_inner a').mouseenter(function() {
  	$(this).children('p:nth-child(2)').slideUp(300).slideDown(300)
	
  	$(this).parent().css({border:  '1px solid rgba(200,200,200,.5)'})
})
$('#s_inner a').mouseleave(function() {
	$(this).parent().css({border:  'none'})
})