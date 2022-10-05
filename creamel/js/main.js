/*
function validateEmail(email) {
    var re = /^(([a-zA-Z0-9]+)|([a-zA-Z0-9]+((?:\_[a-zA-Z0-9]+)|(?:\.[a-zA-Z0-9]+))*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-zA-Z]{2,6}(?:\.[a-zA-Z]{2})?)$)/;
    return re.test(email);
  }
*/

jQuery(document).ready(function ($) {

	new WOW({ mobile:false }).init();
	$(window).on('scroll load', function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 61) {//>=, not <=
			$(".site-header").addClass("fix");
//			$(".top_head").css("display","none");
		}else{
			$(".site-header").removeClass("fix");
//			$(".top_head").css("display","block");
		}
	});
	
	$('.scroll_search').click(function(){
		$('.bottom_head').toggleClass('active');
	});
	$('.show_btn .d_btn').click(function(){
		$('.show_content').toggleClass('show');
	});
	var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
	
//document.addEventListener( 'wpcf7invalid', function( event ) { //для повления попапа без заполнения и отправки формы
		
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  var id = event.detail.contactFormId;
	  if ( id == 672 || id == 158 || id == 176 || id == 218 || id == 671 ) {
		  jQuery.fancybox('<div class="response_ok text-center"><div class="f-zag">Спасибо!</div><div class="popup-subtitle">Ваша заявка принята.</div><div class="text-center"><img src="/wp-content/uploads/2021/11/icon_phenix_popup.svg"></div></div>');
			$('#fancybox-close').addClass('close_icon_moove');
	  }
	});
	
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  var id = event.detail.contactFormId;
	  if ( id == 675 || id == 674 ) {
		  jQuery.fancybox('<div class="response_ok text-center"><div class="f-zag">Thanks!</div><div class="popup-subtitle">Your application is accepted.</div><div class="text-center"><img src="/wp-content/uploads/2021/11/icon_phenix_popup.svg"></div></div>');
			$('#fancybox-close').addClass('close_icon_moove');
	  }
	});
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  var id = event.detail.contactFormId;
	  if ( id == 676 || id == 673 ) {
		  jQuery.fancybox('<div class="response_ok text-center"><div class="f-zag">谢谢！</div><div class="popup-subtitle">您的申请已被接受。</div><div class="text-center"><img src="/wp-content/uploads/2021/11/icon_phenix_popup.svg"></div></div>');
			$('#fancybox-close').addClass('close_icon_moove');
	  }
	});
/**
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  var id = event.detail.contactFormId;
	  if ( id == 5 ) {
		  jQuery.fancybox('<div class="response_ok text-center"><div class="f-zag">Спасибо!</div><div class="popup-subtitle">Ваше сообщение отправлено</div></div>');
	  }
	});
*/
	$('.fancybox').click(function(){
		$('#fancybox-close').removeClass('close_icon_moove');
	});

		
	if ( $(".lang-item-7 ").hasClass("current-lang") ) {
		$('.current-lang').addClass('color_leng_ru');
		$('.lang-item-9').addClass('gray_color_leng_chn');
	}
	else if ( $(".lang-item-5 ").hasClass("current-lang") ){
		$('.current-lang').addClass('color_leng_en');
	}
	else if ( $(".lang-item-9").hasClass("current-lang") ) {
		$('.lang-item-9').addClass('color_leng_chn');
		$('.lang-item-7').addClass('gray_color_leng_ru');
	}


	window.addEventListener("resize", function() {
		if ($("body").width() < 1200) {
			window.setTimeout(function() {
		        $(".rmp_menu_trigger").addClass('toshow_rmp_menu');
			}, 1000);
		}
		else { $(".rmp_menu_trigger").removeClass('toshow_rmp_menu'); }
	}, false);

		if ($("body").width() < 1200) {
		window.setTimeout(function() {
		        $(".rmp_menu_trigger").addClass('toshow_rmp_menu');
		    }, 1000);
		}
		else{ $(".rmp_menu_trigger").removeClass('toshow_rmp_menu'); }

	

	$('#fieldname3_1_cb0').addClass('checkbox_true');

	$('.name-tab').click(function(){
		if ($(this).parent().hasClass('activate-tab') ) {
			$('.activate-tab .accordeon-info').fadeOut();
			$('.accordeon-block').removeClass('activate-tab');
		}else{
			$('.activate-tab .accordeon-info').fadeOut();
			$('.accordeon-block').removeClass('activate-tab');
			$(this).parent().addClass('activate-tab');
			$('.activate-tab .accordeon-info').fadeIn();
		}
	});
		
	});




	window.onload = function () {

		var options = {
			animationEnabled: true,
			title:{
				text: ""
			},
			axisX:{
				valueFormatString: "MMM YYYY",
				crosshair: {
					enabled: true,
					snapToDataPoint: true
				}
			},
			axisY: {
				title: "",
				valueFormatString: "##0.00%",
				crosshair: {
					enabled: true,
					snapToDataPoint: true,
					labelFormatter: function(e) {
						return CanvasJS.formatNumber(e.value, "##0.00") + "%";
					}
				}
			},
			data: [{
				type: "area",
				xValueFormatString: "MMM YYYY",
				yValueFormatString: "##0.00%",
				dataPoints: [
					{ x: new Date(2018, 00, 01), y: 0.0482 },
          			{ x: new Date(2018, 01, 01), y: 0.0513 },
					{ x: new Date(2018, 02, 01), y: 0.0598 },
					{ x: new Date(2018, 03, 01), y: 0.0556 },
					{ x: new Date(2018, 04, 01), y: 0.0617 },
					{ x: new Date(2018, 05, 01), y: 0.0419 },
					{ x: new Date(2018, 06, 01), y: 0.0434 },
					{ x: new Date(2018, 07, 01), y: 0.0472 },
					{ x: new Date(2018, 08, 01), y: 0.0596 },
					{ x: new Date(2018, 09, 01), y: 0.0545 },
					{ x: new Date(2018, 10, 01), y: 0.0479 },
					{ x: new Date(2018, 11, 01), y: 0.0519 },
					
					{ x: new Date(2019, 00, 01), y: 0.0419 },
					{ x: new Date(2019, 01, 01), y: 0.0456 },
					{ x: new Date(2019, 02, 01), y: 0.0533 },
					{ x: new Date(2019, 03, 01), y: 0.0581 },
					{ x: new Date(2019, 04, 01), y: 0.0442 },
					{ x: new Date(2019, 05, 01), y: 0.0491 },
					{ x: new Date(2019, 06, 01), y: 0.0588 },
					{ x: new Date(2019, 07, 01), y: 0.0474 },
					{ x: new Date(2019, 08, 01), y: 0.0527 },
					{ x: new Date(2019, 09, 01), y: 0.0615 },
					{ x: new Date(2019, 10, 01), y: 0.0469 },
					{ x: new Date(2019, 11, 01), y: 0.0422 },

					{ x: new Date(2020, 00, 01), y: 0.0476 },
					{ x: new Date(2020, 01, 01), y: 0.0422 },
					{ x: new Date(2020, 02, 01), y: 0.0549 },
					{ x: new Date(2020, 03, 01), y: 0.0588 },
					{ x: new Date(2020, 04, 01), y: 0.0441 },
					{ x: new Date(2020, 05, 01), y: 0.0511 },
					{ x: new Date(2020, 06, 01), y: 0.0597 },
					{ x: new Date(2020, 07, 01), y: 0.0412 },
					{ x: new Date(2020, 08, 01), y: 0.0485 },
					{ x: new Date(2020, 09, 01), y: 0.0439 },
					{ x: new Date(2020, 10, 01), y: 0.0624 },
					{ x: new Date(2020, 11, 01), y: 0.0528 },

					{ x: new Date(2021, 00, 01), y: 0.0447 },
					{ x: new Date(2021, 01, 01), y: 0.0415 },
					{ x: new Date(2021, 02, 01), y: 0.0576 },
					{ x: new Date(2021, 03, 01), y: 0.0493 },
					{ x: new Date(2021, 04, 01), y: 0.0436 },
					{ x: new Date(2021, 05, 01), y: 0.0571 },
					{ x: new Date(2021, 06, 01), y: 0.0452 },
					{ x: new Date(2021, 07, 01), y: 0.0567 },
					{ x: new Date(2021, 08, 01), y: 0.0616 },
					{ x: new Date(2021, 09, 01), y: 0.0418 },
					{ x: new Date(2021, 10, 01), y: 0.0535 },
					{ x: new Date(2021, 11, 01), y: 0.0478 }
				]
			}]
		};
		
		$("#chartContainer").CanvasJSChart(options);
		
		}




	if (jQuery('.h_slider__wrapper').length){
		jQuery('.h_slider__wrapper').not('.slick-initialized').slick({
			dots: true,
			autoplay:false,
			autoplaySpeed:4500,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
	//		appendArrows: jQuery('.for_fs_nav'),
	//		prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M136.97 380.485l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273H436c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12H60.113l83.928-83.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-116.485 116c-4.686 4.686-4.686 12.284 0 16.971l116.485 116c4.686 4.686 12.284 4.686 16.97-.001z" fill="#fff"/></svg></i>',
	//		nextArrow: '<i class="next-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z" fill="#fff"/></svg></i>',
		});
	}

	if (jQuery('.service_slider').length){
		jQuery('.service_slider').not('.slick-initialized').slick({
			dots: true,
			autoplay:true,
			autoplaySpeed:4500,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
	//		appendArrows: jQuery('.for_fs_nav'),
			prevArrow: '<i class="prev-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M136.97 380.485l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273H436c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12H60.113l83.928-83.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-116.485 116c-4.686 4.686-4.686 12.284 0 16.971l116.485 116c4.686 4.686 12.284 4.686 16.97-.001z" fill="#fff"/></svg></i>',
			nextArrow: '<i class="next-slick"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34"><path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z" fill="#fff"/></svg></i>',
		});
	}

	if (jQuery('.slider_greenhouse').length){
		jQuery('.slider_greenhouse').not('.slick-initialized').slick({
			dots: false,
			arrows: false,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: false,
	//		appendDots: jQuery('.slider_greenhouse + .for_dots'),
	//		prevArrow: '<i class="prev-slick"></i>',
	//		nextArrow: '<i class="next-slick"></i>',
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
			
		});
		  jQuery('.slider_dots').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider_greenhouse',
			arrows: true,
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			centerPadding: '20%',
			prevArrow: '<i class="prev-slick"></i>',
			nextArrow: '<i class="next-slick"></i>',
		  });
}
	


	if (jQuery('.slider_woodenhouse').length){
		jQuery('.slider_woodenhouse').not('.slick-initialized').slick({
			dots: false,
			arrows: false,
			infinite: true,
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 1,
			adaptiveHeight: false,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
			
		});
		  jQuery('.slider_dots_woodenhouse').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider_woodenhouse',
			arrows: true,
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			centerPadding: '20%',
			prevArrow: '<i class="prev-slick"></i>',
			nextArrow: '<i class="next-slick"></i>',
		  });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})