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
		lock_scroll_body:function($contain){
			var scrollTop=$(win).scrollTop();
			//App.body.height($(document).height())
			App.body.css('margin-top', '-'+scrollTop+'px')
			App.body.data('scroll', scrollTop)
			App.body.addClass('scroll_lock');
			var selScrollable = $contain;
			$(document).on('touchmove',function(e){
				e.preventDefault();
			});
			$('body').on('touchstart', selScrollable, function(e) {
				if (e.currentTarget.scrollTop === 0) {
					e.currentTarget.scrollTop = 1;
				} else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
					e.currentTarget.scrollTop -= 1;
				}
			});
			$('body').on('touchmove', selScrollable, function(e) {
				e.stopPropagation();
			});
			$($contain).focus();
		},
		unlock_scroll_body: function(){
			App.body.removeAttr('style')
			App.body.removeClass('scroll_lock')
			$(win).scrollTop(App.body.data('scroll'))
			$(document).off('touchmove');
			$('body').off('touchstart');
			$('body').off('touchmove');
		},
		initPage: function(){
			//SELECT INIT
			$('[data-select]').js_select();
			if($('.slider_range').length){
				$(".slider_range").slider({
					range: true,
					min: 0,
					step: 5,
					max: 120,
					values: [ 0, 120 ],
					slide: function( event, ui ) {
						$(this).parent().find('.slider_range_min i').html(ui.values[ 0 ])
						$(this).parent().find('.slider_range_max i').html(ui.values[ 1 ])
					}
				});
			}
			
			//MOBILE BUTTON
			$(doc).on('click', '.show_filter', function(e){
				e.preventDefault();
				var t=$(this);
				t.toggleClass('opened');
				if(t.hasClass('opened')){
					$('.vakansy_filter').slideDown();
					App.lock_scroll_body('.vakansy_filter');
				} else {
					$('.vakansy_filter').slideUp();
					App.unlock_scroll_body();
				}
			});
			$(doc).on('click', '.vakansy_filter .go_back', function(e){
				e.preventDefault();
				$('.show_filter').removeClass('opened');
				$('.vakansy_filter').slideUp();
				App.unlock_scroll_body();
			});
			$(doc).on('click', '[data-dropdown]', function(e){
				e.preventDefault();
				var t=$(this);
				var login=$('.dropdown_menu#drop_login');
				login.unbind('clickoutside');
				t.toggleClass('opened');
				$('.dropdown_menu').slideUp();
				if(t.hasClass('opened')){
					App.lock_scroll_body('.dropdown_menu');
					$(t.data('dropdown')).slideDown();
				} else {
					App.unlock_scroll_body();
					$(t.data('dropdown')).slideUp();
				}
				if(t.data('dropdown')=='#drop_login'){
					$('header .mobile_button').removeClass('opened');
					login.bind('clickoutside', function(e){
						e.preventDefault();
						console.log($(this))
						if(!login.is(':animated') & login.is(':visible')){
							$('header .opened').removeClass('opened');
							login.slideUp();
							App.unlock_scroll_body();
							login.unbind('clickoutside');
						}
					});
				}
			});
			//ADD FILE
			$('.add_file').click( function(e){
				e.stopPropagation();
				$(this).parent().find('input[type=file]').trigger('click')
			})
			//PASSWORD BUTTON
			$(doc).on('click','.show_password', function(e){
				e.preventDefault();
				input=$(this).parent().find('input');
				if(!$(this).hasClass('active')){
					$(this).addClass('active');
					input.attr('type','text')
				} else {
					$(this).removeClass('active');
					input.attr('type','password')
				}
			});
			//POPUP EVENTS
			$(doc).on('click', '[data-showpopup]', function(e){
				e.preventDefault();
				id=$(this).data('showpopup');
				$(id+', .shadow_site').show();
				App.lock_scroll_body('.popup_window');
			});
			$(doc).on('click', '.close, .shadow_site', function(e){
				e.preventDefault();
				App.unlock_scroll_body()
				$('.popup_window, .shadow_site').hide();
			});
			//BUTTON UP START
			if($(win).width()>App.mobile){
				if($('.button_up').length){
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
							if($(win).width()>App.mobile){
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
							}

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
				var arrow_left=$('.recepts .arrow_left'),
					arrow_right=$('.recepts .arrow_right');

				arrow_right.click(function() {
					dragdealerFoods.setStep(dragdealerFoods.getStep()[0]  + 5);
					if(dragdealerFoods.getStep()[0]>1){
						arrow_left.show()
					} else {
						arrow_left.hide()
					}
					return false;
				});
				arrow_left.click(function() {
					dragdealerFoods.setStep(dragdealerFoods.getStep()[0] - 5);
					if(dragdealerFoods.getStep()[0]>1){
						arrow_left.show()
					} else {
						arrow_left.hide()
					}
					return false;
				});
				$(win).resize(function(){
					//ARROWS RECEPTS
					if($(this).width()>$('.recepts_slider .handle').outerWidth()){
						$('.recepts .arrow_right, .recepts .arrow_left').hide();
					} else {
						$('.recepts .arrow_right, .recepts .arrow_left').show();
						if(dragdealerFoods.getStep()[0]>1){
							arrow_left.show()
						} else {
							arrow_left.hide()
						}
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
				statistic=$('.statistic');
				if(statistic.length){
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
				}
			});
			$(win).on('load', function(){
				$('.about .statistic, .page_date .statistic').addClass('animated');
				$('[data-count]').each(function(index, el) {
					$(this).animateNumber({ number: $(this).data('count'), duration: 2000, }, 1000);
				});
			})
		},
		initMap: function(){
			//MAP START
			if($('section.map').length){
				function init () {
					
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 12,
						scrollwheel: false,
						center: {lat: 55.0060833, lng: 82.9226662},
						styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
					});
					$.getJSON( "js/map_base.json", function( data ) {
						
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								 var icon = {
									url: "img/map.svg",
									anchor: new google.maps.Point(0,0),
									origin: new google.maps.Point(0,-3),
									scaledSize: new google.maps.Size(100,44),
								}
								
								var marker = new google.maps.Marker({
									position: {lat: parseFloat(cordx), lng: parseFloat(cordy)},
									label:{
										text: opentime+'-'+closetime,
										color: 'white',
										fontSize: '14px',
									},
									map: map,
									icon: icon,
								});

								var content='<div class="map_container"><div class="item"><div class="icon"><img src="img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="img/icon_map_rol.svg" alt=""><img class="svg" src="img/icon_map_traktor.svg" alt=""><img class="svg" src="img/icon_map_mangal.svg" alt=""><img class="svg" src="img/icon_map_cockie.svg" alt=""><img class="svg" src="img/icon_map_lapsha.svg" alt=""><img class="svg" src="img/icon_map_pizza.svg" alt=""><img class="svg" src="img/icon_map_chiken.svg" alt=""><img class="svg" src="img/icon_map_fish.svg" alt=""><img class="svg" src="img/icon_map_bear.svg" alt=""><img class="svg" src="img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});

								marker.addListener('click', function() {
									infowindow.open(map, marker);
									map.setOptions({draggable: false});
									this.set('label', 
										{
											text:' ',
											color: 'white',
											fontSize: '14px',
										}
									)
									App.initSVG();
								});

								google.maps.event.addListener(infowindow,'closeclick',function(){
									map.setOptions({draggable: true});
									marker.set('label', 
										{
											text: opentime+'-'+closetime,
											color: 'white',
											fontSize: '14px',
										}
									)
								});
								
								google.maps.event.addListener(infowindow, 'domready', function() {
									var iwOuter = $('.gm-style-iw');
									iwOuter.parent().addClass('gm-style-iw-container');
									iwOuter.first().css('max-width', 'auto')
									var prev = iwOuter.prev();
									prev.first().css('width', '100%').css('height', '100%');
									prev.first().find('div:nth-child(2)').css('border-radius', '10px').css('box-shadow','0 3px 27px rgba(65, 18, 13, 0.2)').css('background', 'none');
									prev.first().find('div:last-child').css('border-radius', '10px')
							});

						});
					});
				}
				init();
			}
			if($('#contact_map').length){
				function init () {
					var map = new google.maps.Map(document.getElementById('contact_map'), {
						zoom: 12,
						scrollwheel: false,
						disableDefaultUI: true,
						center: {lat: 55.0060833, lng: 82.9226662},
						styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
					});
					$.getJSON( "js/map_base.json", function( data ) {
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								var icon = {
									url: "img/map.svg",
									anchor: new google.maps.Point(0,0),
									origin: new google.maps.Point(0,-3),
									scaledSize: new google.maps.Size(100,44),
								}
								var marker = new google.maps.Marker({
									position: {lat: parseFloat(cordx), lng: parseFloat(cordy)},
									label:{
										text: opentime+'-'+closetime,
										color: 'white',
										fontSize: '14px',
									},
									map: map,
									icon: icon,
								});
								var content='<div class="map_container"><div class="item"><div class="icon"><img src="img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="img/icon_map_rol.svg" alt=""><img class="svg" src="img/icon_map_traktor.svg" alt=""><img class="svg" src="img/icon_map_mangal.svg" alt=""><img class="svg" src="img/icon_map_cockie.svg" alt=""><img class="svg" src="img/icon_map_lapsha.svg" alt=""><img class="svg" src="img/icon_map_pizza.svg" alt=""><img class="svg" src="img/icon_map_chiken.svg" alt=""><img class="svg" src="img/icon_map_fish.svg" alt=""><img class="svg" src="img/icon_map_bear.svg" alt=""><img class="svg" src="img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});
								marker.addListener('click', function() {
									infowindow.open(map, marker);
									map.setOptions({draggable: false});
									this.set('label', 
										{
											text:' ',
											color: 'white',
											fontSize: '14px',
										}
									)
									App.initSVG();
								});
								google.maps.event.addListener(infowindow,'closeclick',function(){
									map.setOptions({draggable: true});
									marker.set('label', 
										{
											text: opentime+'-'+closetime,
											color: 'white',
											fontSize: '14px',
										}
									)
								});
								google.maps.event.addListener(infowindow, 'domready', function() {
									var iwOuter = $('.gm-style-iw');
									iwOuter.parent().addClass('gm-style-iw-container');
									iwOuter.first().css('max-width', 'auto')
									var prev = iwOuter.prev();
									prev.first().css('width', '100%').css('height', '100%');
									prev.first().find('div:nth-child(2)').css('border-radius', '10px').css('box-shadow','0 3px 27px rgba(65, 18, 13, 0.2)').css('background', 'none');
									prev.first().find('div:last-child').css('border-radius', '10px')
							});

						});
					});
				}
				init();
			}
			if($('#map_vakansy').length){
				function init () {
					var map = new google.maps.Map(document.getElementById('map_vakansy'), {
						zoom: 12,
						scrollwheel: false,
						disableDefaultUI: true,
						center: {lat: 55.0060833, lng: 82.9226662},
						styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
					});
					$.getJSON( "js/map_base.json", function( data ) {
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								var icon = {
									url: "img/map.svg",
									anchor: new google.maps.Point(0,0),
									origin: new google.maps.Point(0,-3),
									scaledSize: new google.maps.Size(100,44),
								}
								var marker = new google.maps.Marker({
									position: {lat: parseFloat(cordx), lng: parseFloat(cordy)},
									label:{
										text: opentime+'-'+closetime,
										color: 'white',
										fontSize: '14px',
									},
									map: map,
									icon: icon,
								});
								var content='<div class="map_container"><div class="item"><div class="icon"><img src="img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="img/icon_map_rol.svg" alt=""><img class="svg" src="img/icon_map_traktor.svg" alt=""><img class="svg" src="img/icon_map_mangal.svg" alt=""><img class="svg" src="img/icon_map_cockie.svg" alt=""><img class="svg" src="img/icon_map_lapsha.svg" alt=""><img class="svg" src="img/icon_map_pizza.svg" alt=""><img class="svg" src="img/icon_map_chiken.svg" alt=""><img class="svg" src="img/icon_map_fish.svg" alt=""><img class="svg" src="img/icon_map_bear.svg" alt=""><img class="svg" src="img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});
								marker.addListener('click', function() {
									infowindow.open(map, marker);
									map.setOptions({draggable: false});
									this.set('label', 
										{
											text:' ',
											color: 'white',
											fontSize: '14px',
										}
									)
									App.initSVG();
								});
								google.maps.event.addListener(infowindow,'closeclick',function(){
									map.setOptions({draggable: true});
									marker.set('label', 
										{
											text: opentime+'-'+closetime,
											color: 'white',
											fontSize: '14px',
										}
									)
								});
								google.maps.event.addListener(infowindow, 'domready', function() {
									var iwOuter = $('.gm-style-iw');
									iwOuter.parent().addClass('gm-style-iw-container');
									iwOuter.first().css('max-width', 'auto')
									var prev = iwOuter.prev();
									prev.first().css('width', '100%').css('height', '100%');
									prev.first().find('div:nth-child(2)').css('border-radius', '10px').css('box-shadow','0 3px 27px rgba(65, 18, 13, 0.2)').css('background', 'none');
									prev.first().find('div:last-child').css('border-radius', '10px')
							});

						});
					});
				}
				init();
			}
			if($('#map_filter').length){
				$('.get_stores .stores_list').scrollbar();
				$('.filters_set').scrollbar();
				$(doc).on('click', '.dropdown_filter .title', function(e){
					e.preventDefault();
					$(this).parent().toggleClass('opened')
				})
				function init () {
					var map = new google.maps.Map(document.getElementById('map_filter'), {
						zoom: 12,
						scrollwheel: false,
						disableDefaultUI: true,
						center: {lat: 55.0060833, lng: 82.9226662},
						styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
					});
					$.getJSON( "js/map_base.json", function( data ) {
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								 var icon = {
									url: "img/map.svg",
									anchor: new google.maps.Point(0,0),
									origin: new google.maps.Point(0,-3),
									scaledSize: new google.maps.Size(100,44),
								}
								var marker = new google.maps.Marker({
									position: {lat: parseFloat(cordx), lng: parseFloat(cordy)},
									label:{
										text: opentime+'-'+closetime,
										color: 'white',
										fontSize: '14px',
									},
									map: map,
									icon: icon,
								});
								var content='<div class="map_container"><div class="item"><div class="icon"><img src="img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="img/icon_map_rol.svg" alt=""><img class="svg" src="img/icon_map_traktor.svg" alt=""><img class="svg" src="img/icon_map_mangal.svg" alt=""><img class="svg" src="img/icon_map_cockie.svg" alt=""><img class="svg" src="img/icon_map_lapsha.svg" alt=""><img class="svg" src="img/icon_map_pizza.svg" alt=""><img class="svg" src="img/icon_map_chiken.svg" alt=""><img class="svg" src="img/icon_map_fish.svg" alt=""><img class="svg" src="img/icon_map_bear.svg" alt=""><img class="svg" src="img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});
								marker.addListener('click', function() {
									infowindow.open(map, marker);
									map.setOptions({draggable: false});
									this.set('label', 
										{
											text:' ',
											color: 'white',
											fontSize: '14px',
										}
									)
									App.initSVG();
								});
								google.maps.event.addListener(infowindow,'closeclick',function(){
									map.setOptions({draggable: true});
									marker.set('label', 
										{
											text: opentime+'-'+closetime,
											color: 'white',
											fontSize: '14px',
										}
									)
								});
								google.maps.event.addListener(infowindow, 'domready', function() {
									var iwOuter = $('.gm-style-iw');
									iwOuter.parent().addClass('gm-style-iw-container');
									iwOuter.first().css('max-width', 'auto')
									var prev = iwOuter.prev();
									prev.first().css('width', '100%').css('height', '100%');
									prev.first().find('div:nth-child(2)').css('border-radius', '10px').css('box-shadow','0 3px 27px rgba(65, 18, 13, 0.2)').css('background', 'none');
									prev.first().find('div:last-child').css('border-radius', '10px')
							});

						});
					});
				}
				init();
			}
		},
		initSVG: function(){
			$('img.svg').each(function(){
				var $img = $(this);
				var imgID = $img.attr('id');
				var imgClass = $img.attr('class');
				var imgURL = $img.attr('src');
				$.get(imgURL, function(data) {
					var $svg = $(data).find('svg');
					if(typeof imgID !== 'undefined') {
						$svg = $svg.attr('id', imgID);
					}
					if(typeof imgClass !== 'undefined') {
						 $svg = $svg.attr('class', imgClass+' replaced-svg');
					}
					$svg = $svg.removeAttr('xmlns:a');
					if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
						$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
					}
					$img.replaceWith($svg);
				}, 'xml');
			
			});
		},
		initCatalog: function(){
			var catalog_container=$("#fb5-book");
			if(catalog_container.length){
				function show_catalog_full(value){
					$('.catalog .title, .catalog_list, .catalog_bar .view_as').hide();
					$('.catalog .catalog_middle, .catalog_slider').show();
					$('.catalog_bar .view_as.show_list').css('display', 'flex');

					if(!catalog_container.hasClass('inited')){
						var $page_display, step;
						if($(this).width()<992){
							$page_display='single';
							step=1;
						} else {
							$page_display='double';
							step=2;
						}
						catalog_container.turn({
							acceleration: false,
							duration: 1600,
							elevation:50,
							display: $page_display,
							gradients: true,
							when: {
								turned: function(event, page, pageObject) {
									if(page==1){
										pagenew=0;
									}
									if($page_display=='single'){
										pagenew=page;
									
									} else {
										if(page%2!=0){
											pagenew=page-1;
										} else {
											pagenew=page;
										}
									}
									if(!catalog_container.hasClass('slider_inited')){
										var total_pages=catalog_container.turn("pages");
										$( ".costume_slider_scroll" ).slider({
											max: total_pages,
											step: step,
											stop:function(event, ui ){
												current_value=parseInt(ui.value-1);
												//console.log(current_value);
												$('.catalog_slider').removeClass('hide_slider');
												$('.full_screen_image').remove();
												if(current_value>total_pages){
													catalog_container.turn('page', parseInt(ui.value) );
												} else {
													catalog_container.turn('page', parseInt(ui.value+1) );
												}
											}
										});
										$('.costume_slider_scroll .ui-slider-handle').append('<span></span><span></span><span></span>');
										catalog_container.addClass('slider_inited');
									} else {
										$(".costume_slider_scroll").slider('value',pagenew);
									}
									
								}
							}
						});
						$(win).resize(function(){
							if($(this).width()<992){
								catalog_container.width(290);
								catalog_container.height(453);
								catalog_container.turn('display', 'single');
								$( ".costume_slider_scroll" ).slider('option','step', 1);
								//$( ".costume_slider_scroll" ).slider('option','value', 0);
								//catalog_container.turn('page', 1);
							} else {
								catalog_container.width(786);
								catalog_container.height(612);
								catalog_container.turn('display', 'double');
								$( ".costume_slider_scroll" ).slider('option','step', 2);
								//$( ".costume_slider_scroll" ).slider('option','value', 0);
								//catalog_container.turn('page', 1);
							}
						});
					}
					if(value){
						catalog_container.turn('page', value);
					}
					catalog_container.addClass('inited');
					//$(win).resize();
				}
				function show_catalog_list(){
					$('.catalog .catalog_middle, .catalog_slider, .catalog_bar .show_list').hide();
					$('.catalog .title, .catalog_list, .catalog_bar .show_full').show();
				}
				$('.catalog_list > div').each(function(){
					if($(this).find('img').length==1){
						$(this).addClass('not_hide_image')
					}
				})
				//CATALOG NAVIGATION
				$(doc).on('click','.catalog_bar .show_full', function(e){
					e.preventDefault();
					show_catalog_full();
				})
				$(doc).on('click','.catalog_bar .show_list', function(e){
					e.preventDefault();
					$('.catalog_slider').removeClass('hide_slider');
					$('.full_screen_image').remove();
					show_catalog_list();
				})
				$(doc).on('click', '[data-showpage]',function(e){
					e.preventDefault();
					var value=$(this).data('showpage');
					show_catalog_full(value);
					
				});
				$('.catalog_slider .arrow_left').click(function() {
					catalog_container.turn('previous');
				});
				$('.catalog_slider .arrow_right').click(function() {
					catalog_container.turn('next');
				});
				$(doc).on('click', '.catalog_slider .shadow_right', function(e){
					e.preventDefault();
					catalog_container.turn('previous');
				});
				$(doc).on('click', '.catalog_slider .shadow_left', function(e){
					e.preventDefault();
					catalog_container.turn('next');
				});
				$(doc).on('click', '.share_button', function(e){
					e.preventDefault();
					var t=$(this),
					dropdown=t.parent().find('.dropdown_share');
					dropdown.toggle();
					t.toggleClass('active')
					if(t.hasClass('active')){
						console.log('binded')
						dropdown.bind('clickoutside', function(){
							dropdown.hide()
							t.removeClass('active')
							dropdown.unbind('clickoutside');
						});
					} else {
						console.log('unbinded')
						dropdown.unbind('clickoutside');
					}
				})

				//MOBILE SWIPE
				catalog_container.swipe({
					swipe:function(event, direction, distance, duration, fingerCount) {
						console.log('swiped')
						if(direction=='left'){
							catalog_container.turn('next');
						}
						if(direction=='right'){
							catalog_container.turn('previous');
						}
					}
				});
			}
			
		},
		initPlayer: function(){
			if($('.player').length){
				$('.player').each(function(){
					var t=$(this);
					t.find('.play_button').on('click', function(){
						$(this).hide();
						t.find('.player_shadow').hide();
						t.find('.player_preview').hide();
						t.find('video').get(0).play();
						t.find('video').attr('controls', 'true')
					})
				});
			}
		},
		initApp: function() {
			App.initPage();
			App.InitHeadSlider();
			App.initReceptsSlider();
			App.initNumber();
			App.initMap();
			App.initSVG();
			App.initCatalog();
			App.initPlayer();
		}
	});
	App.initApp();
})(jQuery,document,window);




//App._q.push(function(){
// App.init();
//});