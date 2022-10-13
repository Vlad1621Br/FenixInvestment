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


	$(".list-control_panel_bar li:last-child").addClass("active-tab-year");

	let chart_percentage = document.querySelectorAll(".list-control_panel_bar li .investment_income");
	let chart_date = document.querySelectorAll(".list-control_panel_bar li");
	let chart_date_month_arrey = ['01.01', '01.02', '01.03', '01.04', '01.05', '01.06', '01.07', '01.08', '01.09', '01.10', '01.11', '01.12'];
	let chart_percentage_arrey = [];
	
	let chart_year = [];
	for (let i = 0; i < chart_date.length; i++) {
		chart_year[i] = chart_date[i].outerText; 
	}
	let chart_date_arrey = [];

	if(chart_percentage.length > 0 && chart_date.length > 0){
		for (let i = 0; i < chart_percentage.length; i++) {
			chart_percentage_arrey[i] = chart_percentage[i].textContent;
		}
		for (let i = 0; i < chart_date.length; i++) {
			for (let j = 0; j < chart_date_month_arrey.length; j++){	
				if((i+j+i*11) < chart_percentage.length){
					chart_date_arrey[i+j+i*11] = chart_date_month_arrey[j];
				}				
			}	
		}
		for (let i = 0; i < chart_year.length; i++) { 
			for (let j = i*12; (i*12 - 1) < j  && j < (i+1)*12 && j < chart_date_arrey.length; j++) { 
				chart_date_arrey[j] += '.' + chart_year[i];
			}	
		}
	} 
	
	let bar_year_percentage = [];
	let bar_year_date = [];
	let residue = chart_date_arrey.length % 12;
	if (residue === 0 ){ residue = 12; }
	let count = 0;
	for ( let i = chart_date_arrey.length - residue; i < chart_date_arrey.length; i++) {
		bar_year_percentage[count] = chart_percentage_arrey[i];
		bar_year_date[count] = chart_date_arrey[i];
		count++;
	}
	

	let chart_area = {
		chart: {
		  height: 400,
		  type: "area"
		},
		dataLabels: {
		  enabled: false
		},
		series: [
		  {
			name: "",
			data: chart_percentage_arrey
		  }
		],
		fill: {
		  type: "gradient",
		  gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.5,
			opacityTo: 0.7,
			stops: [0, 90, 100]
		  }
		},
		xaxis: {
		  categories: chart_date_arrey
		}
	};


	let chart_bar = {
		series: [{
		name: "",
		data: bar_year_percentage 
	  }],
		chart: {
		type: 'bar',
		height: 400
	  },
	  plotOptions: {
		bar: {
		  borderRadius: 2,
		  horizontal: false,
		}
	  },
	  dataLabels: {
		enabled: false
	  },
	  xaxis: {
		categories: bar_year_date
	  }
	};

	let chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
	let chart_bar_Container = new ApexCharts(document.querySelector("#chart_bar_Container"), chart_bar);

	chart_bar_Container.render();

	$('.list-group-area_chart').click(function(){
        if($('.graph_area_chart').hasClass('hidden')){
            $('.graph_area_chart').removeClass('hidden');
            $('.graph_bar_chart').addClass('hidden');
			$('.list-group-area_chart').addClass('active-tab-graph');
			$('.list-group-bar_chart').removeClass('active-tab-graph');
			chart_bar_Container.destroy();
			chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
			chart_area_Container.render();
        }        
    });  
	$('.list-group-bar_chart').click(function(){
		if($('.graph_bar_chart').hasClass('hidden')){
			$('.graph_bar_chart').removeClass('hidden');
			$('.graph_area_chart').addClass('hidden');
			$('.list-group-area_chart').removeClass('active-tab-graph');
			$('.list-group-bar_chart').addClass('active-tab-graph');
			chart_area_Container.destroy();
			chart_bar_Container = new ApexCharts(document.querySelector("#chart_bar_Container"), chart_bar);
			chart_bar_Container.render();
			
		}
	});

	//bar chart 
	chart_date.forEach(function(item){
		item.addEventListener('click', function(){
			$('.graph_bar_chart .list-control_panel_bar li').removeClass('active-tab-year');
			let name = "active-tab-year";
			this.className += " " + name;
			bar_year_percentage = [];
			bar_year_date = [];
			chart_bar_Container.destroy();
			let bur_count = 0;
			let index  = Number(this.innerText) - 2018;
			for(let i = index * 12; (index * 12 - 1) < i && i < ((index+1) * 12) && i < chart_percentage.length; i++){
				bar_year_percentage[bur_count] = chart_percentage_arrey[i];
				bar_year_date[bur_count] = chart_date_arrey[i];
				bur_count++;
			}
			chart_bar.series[0].data = bar_year_percentage;
			chart_bar.xaxis.categories = bar_year_date;
			chart_bar_Container = new ApexCharts(document.querySelector("#chart_bar_Container"), chart_bar);
			chart_bar_Container.render();
		})
	})

console.log(chart_percentage_arrey);
console.log(chart_date_arrey);
	//area chart
	$('.area_year_all').click(function(){
		$('.graph_area_chart .list-control_panel_area li').removeClass('active-tab-year'); 
		$('.area_year_all').addClass('active-tab-year');
		chart_area_Container.destroy();
		chart_area.series[0].data = chart_percentage_arrey;
		chart_area.xaxis.categories = chart_date_arrey;
		chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
		chart_area_Container.render();
		
	});
	$('.area_year_last_year').click(function(){
		$('.graph_area_chart .list-control_panel_area li').removeClass('active-tab-year');
		$('.area_year_last_year').addClass('active-tab-year');
		let area_last_year= [];
		let data_last_year= [];
		chart_area_Container.destroy();
		let count = 0;
		for (let i = chart_percentage_arrey.length - 12; i < chart_percentage_arrey.length; i++) {
			area_last_year[count] =  chart_percentage_arrey[i];
			chart_date_arrey[count] = chart_date_arrey[i];
			count++;
		}
		chart_area.series[0].data = area_last_year;
		chart_area.xaxis.categories = chart_date_arrey;
		chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
		chart_area_Container.render();

	});
	$('.area_year_last_six').click(function(){
		$('.graph_area_chart .list-control_panel_area li').removeClass('active-tab-year');
		$('.area_year_last_six').addClass('active-tab-year');
		let area_last_year= [];
		let data_last_year= [];
		chart_area_Container.destroy();
		let count = 0;
		for (let i = chart_percentage_arrey.length - 6; i < chart_percentage_arrey.length; i++) {
			area_last_year[count] =  chart_percentage_arrey[i];
			chart_date_arrey[count] =chart_date_arrey[i];
			count++;
		}
		chart_area.series[0].data = area_last_year;
		chart_area.xaxis.categories = chart_date_arrey;
		chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
		chart_area_Container.render();
	});
	$('.area_year_last_three').click(function(){
		$('.graph_area_chart .list-control_panel_area li').removeClass('active-tab-year');
		$('.area_year_last_three').addClass('active-tab-year');
		let area_last_year= [];
		let data_last_year= [];
		chart_area_Container.destroy();
		let count = 0;
		for (let i = chart_percentage_arrey.length - 3; i < chart_percentage_arrey.length; i++) {
			area_last_year[count] = chart_percentage_arrey[i];
			chart_date_arrey[count] = chart_date_arrey[i];
			count++;
		}
		chart_area.series[0].data = area_last_year;
		chart_area.xaxis.categories = chart_date_arrey;
		chart_area_Container = new ApexCharts(document.querySelector("#chart_area_Container"), chart_area);
		chart_area_Container.render();
	});
	$('.list-control_panel_bar li .investment_income').remove();






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
	});
	

});

