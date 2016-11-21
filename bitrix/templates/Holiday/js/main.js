(function($,doc,win) {
	win.App = win.App || {};
	$.extend(true, App, {
		_q: [],
		window: $(win),
		document: $(doc),
		page: $('html, body'),
		mobile: 768,
		body: $('body'),
		params: {
			lazyload: {
				threshold: 200
			}
		},
		_currentNiche: App._currentNiche || 0,
		
		initPage: function(){

			//BUTTON UP START
			if($(win).width()>App.mobile){
				$(doc).on('click', '.button_up', function(e){
					e.preventDefault();
					$('html, body').scrollTo(0,800);
				});
				$(win).scroll(function(){
					var scrolltop=$(this).scrollTop(),
					footer_position=$('footer').position().top-$(win).height(),
					button=$('.button_up');
					if(scrolltop>300){
						button.fadeIn();
					} else {
						button.fadeOut();
					}
					if(footer_position<=scrolltop){
						button.css('bottom', scrolltop-footer_position);
					} else {
						button.css('bottom', 0);
					}
				});
				$(win).on('load',function(){
					$(win).scroll();
					setTimeout(function(){
						$(win).scroll();
					}, 300)
				});
			}

		},
		InitHeadSlider: function(){
			//SLIDER START
			if($('.slider ul').length){
				$(win).on('resize', function(){
					var win_height=$(this).height(),
						header_height=$('header').outerHeight(),
						slider_height=win_height-header_height-80;
						$('.slider li, .slider ul').height(slider_height);
				});
				$(win).on('load', function(){
					$('.slider ul').bxSlider({
						slideMargin:50,
						controls: false,
						adaptiveHeight: true,
						onSliderLoad: function(){
							$('.slider ul').css('overflow', 'visible');
							var $poster = $('.slider .container'),
								$layer = $('[class*="layer-"]'),
								w = $(win).width(),
								h = $(win).height();
							$(win).on('mousemove', function(e) {
								var offsetX = 0.5 - e.pageX / w,
									offsetY = 0.5 - e.pageY / h,
									dy = e.pageY - h / 2,
									dx = e.pageX - w / 2,
									theta = Math.atan2(dy, dx),
									angle = theta * 180 / Math.PI - 90,
									offsetPoster = $poster.data('offset'),
									transformPoster = 'translateY(' + -offsetX * offsetPoster + 'px) rotateX(' + (-offsetY * offsetPoster) + 'deg) rotateY(' + (offsetX * (offsetPoster * 2)) + 'deg)'; //poster transform
								if (angle < 0) {
									angle = angle + 360;
								}
								$poster.css('transform', transformPoster);
								$layer.each(function() {
									var $this = $(this),
									offsetLayer = $this.data('offset') || 0,
									transformLayer = 'translateX(' + offsetX * offsetLayer + 'px) translateY(' + offsetY * offsetLayer + 'px)';
									$this.css('transform', transformLayer);
								});
							});
							$(win).resize();
						}
					});
				})
				$(win).resize();
			}
		},
		initReceptsSlider: function(){
			//RECEPTS SLIDER START
			if($('#recepts_slider').length){
				dragdealerFoods = new Dragdealer('recepts_slider', {
					speed: 0.3,
					x:0,
					loose: true,
					steps: 7,
					requestAnimationFrame: true
				});
				dragdealerFoods.reflow();
				$('.recepts .arrow_right').click(function() {
					dragdealerFoods.setStep(dragdealerFoods.getStep()[0]  + 1);
					return false;
				});
				$('.recepts .arrow_left').click(function() {
					dragdealerFoods.setStep(dragdealerFoods.getStep()[0]  - 1);
					return false;
				});
				$(win).resize(function(){
					//ARROWS RECEPTS
					if($(this).width()>$('.recepts_slider .handle').outerWidth()){
						$('.recepts .arrow_right, .recepts .arrow_left').hide();
					} else {
						$('.recepts .arrow_right, .recepts .arrow_left').show();
					}
				})
				$(win).on('scroll', function(){
					var scrolltop=$(this).scrollTop(),
					recepts=$('.recepts_slider .handle'),
					recepts_top=recepts.offset().top,
					recepts_height=recepts.outerHeight();
					//RECEPTS ANIMATION
					if(scrolltop>(recepts_top-(recepts_height-100))){
						if(!recepts.hasClass('animated')){
							recepts.addClass('animated');
						}
					}
				})
			}
		},
		initNumber: function(){
			$(win).on('scroll', function(){
				var scrolltop=$(this).scrollTop(),
				statistic=$('.statistic'),
				statistic_top=statistic.offset().top,
				statistic_height=statistic.outerHeight();
				//RECEPTS ANIMATION
				if(scrolltop>(statistic_top-(statistic_height-50))){
					
					if(!statistic.hasClass('animated')){
						$('[data-count]').each(function(index, el) {
							$(this).animateNumber({ number: $(this).data('count'), duration: 2000, }, 1000);
						});
						statistic.addClass('animated')
					}
				}
			})
		},
		initMap: function(){
			//MAP START
			if($('section.map').length){
				ymaps.ready(init);
				function init () {
					var myMap = new ymaps.Map('map',{
						center: [55.008711,83.171884],
						zoom: 10
					});
					var Placemarks = [];
					$.getJSON( "/bitrix/templates/Holiday/js/map_base.json", function( data ) {
						
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
							var myPlacemark = new ymaps.Placemark([cordx, cordy] , {
								iconContent: '<div style="color:#fff; text-align:center; width:90px;margin-top:27px;margin-left:-5px;">'+opentime+'-'+closetime+'</div>',
								balloonContent: adress,
							},{
								iconImageHref: '/bitrix/templates/Holiday/img/map.svg',
								iconImageSize: [90, 90],
								iconImageOffset: [-45,-60]
							});

							myMap.geoObjects.add(myPlacemark);
						});
					});
					myMap.controls.add('zoomControl');
					//console.log(Placemarks);
						/*
					var myPlacemark = new ymaps.Placemark([56.326944, 44.0075] , {
						iconContent: '<div style="color:#fff; text-align:center; width:90px;margin-top:27px;margin-left:-5px;">8:00-11:00</div>',
						balloonContent: 'TEST CONTENT',
					},{
						iconImageHref: '../img/map.svg',
						iconImageSize: [90, 90],
						iconImageOffset: [-45,-60]
					});
					myMap.geoObjects.add(myPlacemark);*/
				}
			}
		},
		initApp: function() {
			App.initPage();
			App.InitHeadSlider();
			App.initReceptsSlider();
			App.initNumber();
			App.initMap();
		}
	});
	App.initApp();
})(jQuery,document,window);




//App._q.push(function(){
// App.init();
//});