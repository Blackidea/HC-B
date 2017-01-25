(function($,doc,win) {
	win.App = win.App || {};
	$.extend(true, App, {
		_q: [],
		window: $(win),
		document: $(doc),
		page: $('html, body'),
		mobile: 768,
		table: 992,
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
						$(this).parent().find('#min_val').val(ui.values[ 0 ])
						$(this).parent().find('#max_val').val(ui.values[ 1 ])
						$(this).parent().find('.slider_range_min i').html(ui.values[ 0 ])
						$(this).parent().find('.slider_range_max i').html(ui.values[ 1 ])
						if(ui.values[ 0 ]==0 && ui.values[ 1 ]==0){
							$('.popup_banner').fadeIn();
						} else {
							$('.popup_banner').fadeOut();
						}
					}
				});
			}
			if($('.check_ratio').length){
				$('.check_ratio a').on('click', function(e){
					e.preventDefault();
					var t=$(this);
					$('.check_ratio a').removeClass('active');
					t.addClass('active');
					t.parent().find('#ratio_val').val(t.data('ratio'));
				});

			}
			//MOBILE BUTTON
			$(doc).on('click', '.show_filter', function(e){
				e.preventDefault();
				alert('1')
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
			$(doc).on('click','.show_repect_filter', function(e){
				e.preventDefault();
				var t=$(this);
				t.toggleClass('opened');
				$(win).scrollTop(0)
				if(t.hasClass('opened')){
					$('.dropdown_filter').slideDown();
					App.lock_scroll_body('.dropdown_filter');
				} else {
					$('.dropdown_filter').slideUp();
					App.unlock_scroll_body();
				}
			});
			$(doc).on('click', '.dropdown_filter .go_back', function(e){
				e.preventDefault();
				$('.show_repect_filter').removeClass('opened');
				$('.dropdown_filter').slideUp();
				App.unlock_scroll_body();
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
				$(this).parent().find('input[type=file]').trigger('click');
			})
			$('.add_file').parent().find('input[type=file]').change(function() {
				var filename = $(this).val();
				if(filename){
					$(this).parent().find('.add_file span').html(filename.replace(/C:\\fakepath\\/i, ''));
				} else {
					$(this).parent().find('.add_file span').html($(this).parent().find('.add_file').data('mask'));
				}
			});
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
			//if($(win).width()>App.mobile){
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
			//}
		},
		InitHeadSlider: function(){
			//SLIDER START
			if($('.slider ul').length){
				$(win).on('resize', function(){
					if($(win).width()>App.table){
						var win_height=$(this).height(),
							header_height=$('header').outerHeight(),
							slider_height=win_height-header_height-80;
							$('.slider li, .slider ul').height(slider_height);
					} else {
							$('.slider li, .slider ul').height(270);
					}
				});
				$(win).on('load', function(){
					$('.slider ul').bxSlider({
						slideMargin:50,
						controls: false,
						adaptiveHeight: true,
						onSliderLoad: function(){
							$('.slider ul').css('overflow', 'visible');
							if($(win).width()>App.table){
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
				});
				if(App.table<$(win).width()){
					$(win).on('scroll', function(){
						var scrolltop=$(this).scrollTop(),
						recepts=$('.recepts_slider .handle'),
						recepts_top=recepts.offset().top-$(win).height()+140,
						recepts_height=recepts.outerHeight();
						console.log(recepts_top+' '+scrolltop);
						//RECEPTS ANIMATION
						if(scrolltop>(recepts_top)){
							if(!recepts.hasClass('animated')){
								recepts.addClass('animated');
							}
						}
					})
				} else {
					$('.recepts_slider .handle').addClass('animated');
				}
			}
		},
		initNumber: function(){
			if($('.statistic').length){
				$(win).on('scroll', function(){
					var scrolltop=$(this).scrollTop(),
					statistic=$('.statistic');
					if(statistic.length){
						statistic_top=statistic.offset().top-$(win).height()+140,
						statistic_height=statistic.outerHeight();
						//RECEPTS ANIMATION
						if(scrolltop>(statistic_top)){
							
							if(!statistic.hasClass('animated')){
								$('[data-count]').each(function(index, el) {
									$(this).animateNumber({ number: $(this).data('count'), duration: 2000, }, 1000);
								});
								statistic.addClass('animated')
							}
						}
					}
				});
				if(App.table>$(win).width()){
					$('.statistic').addClass('animated');
					$('[data-count]').each(function(index, el) {
						$(this).animateNumber({ number: $(this).data('count'), duration: 2000, }, 1000);
					});
				}
				$(win).on('load', function(){
					$('.about .statistic, .page_date .statistic').addClass('animated');
					$('[data-count]').each(function(index, el) {
						$(this).animateNumber({ number: $(this).data('count'), duration: 2000, }, 1000);
					});
				})
			}
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
					$.getJSON( "/bitrix/templates/Holiday/js/map_base.json", function( data ) {
						
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								 var icon = {
									url: "/bitrix/templates/Holiday/img/map.svg",
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

								var content='<div class="map_container"><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_rol.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_traktor.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_mangal.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_cockie.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_lapsha.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_pizza.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_chiken.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_fish.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_bear.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});

								marker.addListener('click', function() {
									marker.setVisible(false);
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
									marker.setVisible(true);
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
					$.getJSON( "/bitrix/templates/Holiday/js/map_base.json", function( data ) {
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								var icon = {
									url: "/bitrix/templates/Holiday/img/map.svg",
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
								var content='<div class="map_container"><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_rol.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_traktor.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_mangal.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_cockie.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_lapsha.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_pizza.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_chiken.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_fish.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_bear.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});
								marker.addListener('click', function() {
									infowindow.open(map, marker);
									marker.setVisible(false);
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
									marker.setVisible(true);
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
					$.getJSON( "/bitrix/templates/Holiday/js/map_base.json", function( data ) {
						$.each( data, function( key, val ) {
							var cordx=val['GEO_LATITUDE'],
								cordy=val['GEO_LONGITUDE'],
								opentime=val['OPEN_TIME'],
								closetime=val['CLOSE_TIME'],
								adress=val['ADDRESS'];
								var icon = {
									url: "/bitrix/templates/Holiday/img/map.svg",
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
								var content='<div class="map_container"><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_phone.svg" alt="" class="svg"></div><div class="text">8 (908) 545-49-76</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set"><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_rol.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_traktor.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_mangal.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_cockie.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_lapsha.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_pizza.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_chiken.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_fish.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_bear.svg" alt=""><img class="svg" src="/bitrix/templates/Holiday/img/icon_map_tort.svg" alt=""></div><a class="more_link" href="#">Подробнее</a></div>';
								var infowindow = new google.maps.InfoWindow({
									content: content,
									maxWidth:241,
									pixelOffset: new google.maps.Size(-240,198)
								});
								marker.addListener('click', function() {
									marker.setVisible(false);
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
									marker.setVisible(true);
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
				
				$('.filters_set').scrollbar();
				$(doc).on('click', '.dropdown_filter .title', function(e){
					e.preventDefault();
					$(this).parent().toggleClass('opened')
				})
				function init (filters) {
						$('#map_filter *, ul.stores_list li.marker').remove();
						$('.stores_container .loading').show();
						var input = document.getElementById('search_city');
						var map_lat=55.0060833,
						map_lng=82.9226662;
						
						var map = new google.maps.Map(document.getElementById('map_filter'), {
							zoom: 12,
							scrollwheel: false,
							disableDefaultUI: true,
							center: {lat: map_lat, lng: map_lng},
							styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
						});
						if($('#search_city').val()){
							$.ajax({
								url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+$('#search_city').val()+'&key=AIzaSyC6vGWo8E_DBTS4D8CXkZCdyk068s8nUDU',
								type: 'GET',
								dataType: 'json',
								success: function(data){
									map.setCenter({lat: data['results'][0]['geometry']['location']['lat'], lng: data['results'][0]['geometry']['location']['lng']});
									//console.log(data['geometry'])
								}
							})
						}
						var markers = [];

						var autocomplete = new google.maps.places.Autocomplete((input), {
							componentRestrictions: {'country': 'ru'}
						});
						autocomplete.addListener('place_changed', function() {
							var place = autocomplete.getPlace();
							if (!place.geometry) {
								return;
							}
							if (place.geometry.viewport) {
								map.fitBounds(place.geometry.viewport);
								map.setZoom(12);
							 
							} else {
								map.setCenter(place.geometry.location);

								map.setZoom(12);
							}
						});
						$('.more_link').off('click');
						/*
						$(doc).on('click','.more_link', function(e){
							e.preventDefault();
							var t=$(this);
							id=t.data('markerid')
							map.setOptions({draggable: true});
							map.setCenter({lat:t.data('merkerx'), lng:t.data('merkery'), });
							google.maps.event.trigger(markers[id], 'click');
						}) */
						function showVisibleMarkers() {
						 
							var bounds = map.getBounds(),
								count = 0;
							$('.stores_list li').removeAttr('style');
							$('.stores_list li').addClass('hide');
							for (var i = 0; i < markers.length; i++) {
								var marker = markers[i];
								 
								if(bounds.contains(marker.getPosition())===true) {
									$('.stores_list li.marker_id_'+marker.get("id")).removeClass('hide');
									$('.stores_list li:not(.hide):odd').css('background', '#198c11')
								}
								if(markers.length-1==i){
									$('.stores_container .loading').hide();
								}
							}
							if($('.stores_list li:not(.hide)').length==0){
								$('.stores_list li.message').removeClass('hide')
							} else {
								$('.stores_list li.message').addClass('hide')
							}
					 
							
						}
						google.maps.event.addListener(map, 'idle', function() {
							showVisibleMarkers();
						});
						//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
						$.getJSON( "/bitrix/templates/Holiday/js/map_base.json", function( data ) {
							var $stotes_list_html='';
							$i=-1;
							$.each( data, function( key, val ) {
								tags='';
								filtered=true;
								if($.isArray(filters)){
									if(filters.length){
										filtered=false;
										$.each(filters, function( key, value){
											//console.log(val['TAGS'])
											if($.inArray(value, val['TAGS']) > -1){
												filtered=true;
											}
										})
									} else {
										filtered=true;
									}
								}
								//console.log(data.length);
								//console.log($.inArray('icon_map_cockie', val['TAGS']))
								if(filtered){
									$i++;
									$.each(val['TAGS'], function(index, val) {
										tags+='<img src="/bitrix/templates/Holiday/img/'+val+'.svg" alt="" class="svg" />';
									});
									
									var cordx=val['GEO_LATITUDE'],
										cordy=val['GEO_LONGITUDE'],
										opentime=val['OPEN_TIME'],
										closetime=val['CLOSE_TIME'],
										adress=val['ADDRESS'];
										 var icon = {
											url: "/bitrix/templates/Holiday/img/map.svg",
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
										marker.setValues({id: $i});
										markers.push(marker);
										var content='<div class="map_container"><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_point.svg" alt="" class="svg"></div><div class="text">'+adress+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_phone.svg" alt="" class="svg"></div><div class="text">'+val['PHONE']+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+opentime+'-'+closetime+'</div></div><div class="icon_set">'+tags+'</div><a class="more_link" href="href="/stores/'+val['STORE']+'">Подробнее</a></div>';
										var infowindow = new google.maps.InfoWindow({
											content: content,
											maxWidth:241,
											pixelOffset: new google.maps.Size(-240,198)
										});
										$stotes_list_html+='<li class="marker marker_id_'+$i+'"><div class="items_set"><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_point.svg" alt="" class="svg"></div><div class="text">'+val['ADDRESS']+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_phone.svg" alt="" class="svg"></div><div class="text">'+val['PHONE']+'</div></div><div class="item"><div class="icon"><img src="/bitrix/templates/Holiday/img/icon_map_clock.svg" alt="" class="svg"></div><div class="text">'+val['OPEN_TIME']+' - '+val['CLOSE_TIME']+'</div></div></div><a class="more_link" data-markerid="'+$i+'" data-merkerx="'+parseFloat(cordx)+'" data-merkery="'+parseFloat(cordy)+'" href="/stores/'+val['STORE']+'">Подробнее</a><div class="icon_set">'+tags+'</div></li>';
										marker.addListener('click', function() {
											infowindow.open(map, marker);
											map.setCenter(marker.position);
											map.setZoom(12);
											marker.setVisible(false);
											map.setOptions({draggable: false});
											$('.stores_list li').removeClass('active');
											$('.stores_list li.marker_id_'+marker.get("id")).addClass('active');
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
											$('.stores_list li').removeClass('active');
											map.setOptions({draggable: true});
										 	map.setZoom(12);
											map.setCenter(marker.position);
											marker.setVisible(true);
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
								 
								}
							});
							$('.stores_list').html('<li class="message">Не найдено.</li>'+$stotes_list_html);
							$('.get_stores .stores_list').scrollbar();
							
							App.initSVG();
						});

				}

				$('.desctop_filter .item_filter').on('click', function(e){
					e.preventDefault();
					var t=$(this);
					if(!$(this).hasClass('select_field')){
						
						t.toggleClass('active');
						if(t.hasClass('active')){
							t.find('input[type=checkbox]').attr('checked', 'checked');
						} else {
							t.find('input[type=checkbox]').removeAttr('checked');
						}
						rebuildMapDesctop();
					} else {
						t.toggleClass('active');
						if($(this).hasClass('active')){
							t.find('input[type=checkbox]').attr('checked', 'checked');
							$('.desctop_filter .item_filter').each(function(index, el) {
								if(!$(this).hasClass('select_field')){
									$(this).addClass('active');
									$(this).find('input[type=checkbox]').attr('checked', 'checked');
								}
							});
						} else {
							t.find('input[type=checkbox]').removeAttr('checked');
							$('.desctop_filter .item_filter').each(function(index, el) {
								if(!$(this).hasClass('select_field')){
									$(this).removeClass('active');
									$(this).find('input[type=checkbox]').removeAttr('checked');
								}
							});
						}
						rebuildMapDesctop();
					}
				});
				function rebuildMapDesctop(){
					filter_checked=[];
					
					$('.desctop_filter .item_filter').each(function(index, el) {
						if(!$(this).hasClass('select_field')){
							if($(this).find('input[type=checkbox]').is(':checked')){
								filter_checked.push($(this).find('input[type=checkbox]').val());
							}
						}
					});
					 
					init(filter_checked);
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
		initBuyList: function(){
			if($('.buy_list').length){
				$('.buy_list .list_items .scroll_wrapper').scrollbar();
				$('.buy_list .add_category .list').scrollbar();
				//PANEL EDIT

				function hexToRgb(hex) {
					var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
					hex = hex.replace(shorthandRegex, function(m, r, g, b) {
						return r + r + g + g + b + b;
					});

					var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
					return result ? {
						r: parseInt(result[1], 16),
						g: parseInt(result[2], 16),
						b: parseInt(result[3], 16)
					} : null;
				}
				
			 
				if($(win).width()>991){
					$(win).on('load', function(){
						container=$('.buy_list .list_items'),
						container_width=container.outerWidth(),
						container_pos=container.offset().top;
						
						$(win).scroll(function(){
							var category_box=$('.add_category'),
							category_box_pos=$('.add_category').offset().top-100;
							var scroll_pos=$(this).scrollTop();
							console.log(scroll_pos+' '+category_box_pos)
							if(scroll_pos>=container_pos && scroll_pos<=category_box_pos){
								container.addClass('fixed');
								container.css('top',scroll_pos-container_pos).css('width', container_width)
							}
							if(container.hasClass('fixed')){
								if(scroll_pos<container_pos){
									container.removeClass('fixed')
								}
							}
						})
					})
				}
				
				
				var removebtn='<a href="#" class="remove"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve" width=""><style type="text/css">.st0{fill:none;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line id="XMLID_233_" class="st0" x1="20.5" y1="1.5" x2="1.5" y2="20.5"/><line id="XMLID_313_" class="st0" x1="1.5" y1="1.5" x2="20.5" y2="20.5"/></svg></a>';
				//IF HAS COOKIE
				if(Cookies.get('items_seved') && Cookies.get('items_seved')!='[]'){
					var saved_array=Cookies.get('items_seved');
					$('.product_item').remove();
					$('.list_items .item').remove();
					
	 

					$.each($.parseJSON(saved_array), function(index, val) {
						 
						var category_id=val['category_id'],
							t=$(this),
							chek_has_element=false, i=0;
						$.getJSON( "js/buy_list.json", function( data ) {
							var type='';
							$.each(data, function( key, val, index ) {
								i++;
								//  console.log(val['TYPE']);
								if(val['ID']==category_id){
									add_category(category_id, val['COLOR'], val['NAME'], val['IMAGE'], val['TYPE']);
									chek_has_element=true;
									type=val['TYPE'];
								}
								if(data.length==i){
									if(!chek_has_element){
										alert('К сожелению категории не найдено.')
									}
								}
							});
							
							//console.log(type)
							var products=val['products'];
				 
							$.each(products, function(index, val) {
								option_list='';
								
								$.each(type,function(key, value ) {
									//console.log(val['name']+' '+value)
									if(val['name']==value){
										option_list+='<option data-selected="true" value="'+value+'">'+value+'</option>';
									} else {
										option_list+='<option value="'+value+'">'+value+'</option>';
									}
								});
								if(val['name']!='Тип продукта'){
									//console.log(option_list)
									if($('#product_id_'+category_id+' .product_options .option').length>=2){
										$('#product_id_'+category_id+' .product_options .option:last').before('<div class="option"><div class="field select_field"><select name="option_id_'+category_id+'_'+(parseInt(index)+1)+'" data-select=""> <option data-default="true" value="Тип продукта">Тип продукта</option>'+option_list+'</select></div><div class="field desc_field"><input type="text" placeholder="Описание" value="'+val['desc']+'"></div><div class="field num_field"><input type="text" placeholder="Кол-во" value="'+val['num_field']+'"></div><div class="field remove_field">'+removebtn+'</div></div>');
										$('#product_id_'+category_id+' .product_options .option select[name="option_id_'+category_id+'_'+(parseInt(index)+1)+'"]').val(val['name'])
										$('#product_id_'+category_id+' .product_options .option select[name="option_id_'+category_id+'_'+(parseInt(index)+1)+'"]').js_select();
									} else {
										$('#product_id_'+category_id+' .product_options .option:first').before('<div class="option"><div class="field select_field"><select name="option_id_'+category_id+'_'+(parseInt(index)+1)+'" data-select=""> <option data-default="true" value="Тип продукта">Тип продукта</option>'+option_list+'</select></div><div class="field desc_field"><input type="text" placeholder="Описание" value="'+val['desc']+'"></div><div class="field num_field"><input type="text" placeholder="Кол-во" value="'+val['num_field']+'"></div><div class="field remove_field">'+removebtn+'</div></div>');
										$('#product_id_'+category_id+' .product_options .option:first select').val(val['name'])
										$('#product_id_'+category_id+' .product_options .option:first select').js_select();
									}
									
									 
								}
							});
							result_list()
						});

						
					});
				}
				//ADD CATEGORY
				function add_category(category_id, color, name, image, type){
					var  title=name,
						get_color_rgb=hexToRgb(color),
						color_rgb=get_color_rgb['r']+','+get_color_rgb['g']+','+get_color_rgb['b'];
					var option_array=type,
						option_list='';
					$.each(option_array,function(key, val ) {
						option_list+='<option value="'+val+'">'+val+'</option>'
					});
					var option='<div class="option"><div class="field select_field"><select name="option_id_'+category_id+'_0" data-select><option data-default="true" value="Тип продукта">Тип продукта</option>'+option_list+'</select></div><div class="field desc_field"><input type="text" placeholder="Описание"></div><div class="field num_field"><input type="text" placeholder="Кол-во"></div><div class="field remove_field">'+removebtn+'</div></div>';
					var template='<div class="product_item" id="product_id_'+category_id+'" data-product_id="'+category_id+'"><div class="category_title" style="box-shadow: 0 2px 13px rgba('+color_rgb+', 0.35);"><div class="icon"><img src="'+image+'" alt=""><div class="title" style="color:'+color+';">'+title+'</div></div>'+removebtn+'</div><div class="product_options">'+option+'</div></div>';
					 
					$('.product_items_list').append(template);
					$('.product_item select:visible').js_select();
				}
				//ADD OPTION
				function add_option ($this,num, category_id){
					var type='';
					$.getJSON( "js/buy_list.json", function( data ) {
						$.each(data, function( key, val, index ) {
							if(val['ID']==category_id){
								type=val['TYPE'];
							}
						});
						//console.log(type)
						var option_array=type,
						option_list='';
						$.each(option_array,function(key, val ) {
							option_list+='<option value="'+val+'">'+val+'</option>'
						});
						option='<div class="option"><div class="field select_field"><select name="option_id_'+category_id+'_'+num+'" data-select><option data-default="true" value="Тип продукта">Тип продукта</option>'+option_list+'</select></div><div class="field desc_field"><input type="text" placeholder="Описание"></div><div class="field num_field"><input type="text" placeholder="Кол-во"></div><div class="field remove_field">'+removebtn+'</div></div>';
						 
						$this.parents('.product_options').append(option);
						$this.parents('.product_options').find('.option:last').find('select').js_select();
					});
				}
				$(doc).on('click', '.product_item .category_title .remove', function(e){
					e.preventDefault();
					if (confirm('Вы уверены что хотите удалить это поле?')) {
						var id=$(this).parents('.product_item').data('product_id');
						$('.add_category .list li a[data-id='+id+']').parent().removeClass('hide');
						$(this).parents('.product_item').remove();
						result_list();
					}
				});
				$(doc).on('click', '.js_select li', function () {
					var t=$(this),
						option_lenght=t.parents('.product_options').find('.option').length,
						options=t.parents('.option');
					t.parents('.option').find('select option[value="'+t.find('span').text()+'"]').attr('selected', 'selected');
					if(!options.next().length){
						if(t.find('span').text()!='Тип продукта'){
							add_option(t, option_lenght, t.parents('.product_item').data('product_id'));
						}
					}
					console.log(t.parents('.product_options').find('.option select').val())
					result_list();
				});
				$(doc).on('keyup', '.product_item .desc_field input,.product_item .num_field input', function(e){
					e.preventDefault();
					if($(this).val()){
						var t=$(this),
							option_lenght=t.parents('.product_options').find('.option').length,
							options=t.parents('.option');
						if(!options.next().length){
							add_option(t, option_lenght, t.parents('.product_item').data('product_id'));
						}
					}
					result_list();
				});
				$(doc).on('click', '.product_item .product_options .option .remove', function(e){
					e.preventDefault();
					var id=$(this).parents('.product_item').data('product_id'),
					parent=$(this).parents('.product_item'),
					option_select=$(this).parents('.option').find('select'),
					option_desc=$(this).parents('.option').find('.desc_field input'),
					option_num=$(this).parents('.option').find('.num_field input'),
					option_lenght=$(this).parents('.product_options').find('.option').length;
					//console.log($(this).parents('.product_options').find('.option').length)
					//if (confirm('Are you sure ?')) { }

					if(option_select.val()!='Тип продукта' || option_num.val().length || option_desc.val().length){
						if (confirm('Вы уверены что хотите удалить это поле?')) {
							if(option_lenght<=2){
								$('.add_category .list li a[data-id='+id+']').parent().removeClass('hide');
								parent.remove();
								result_list();
							} else {
									$(this).parents('.option').remove();
									result_list();
							}
						}
					}
					if(!(option_select.val()!='Тип продукта' || option_num.val().length || option_desc.val().length) && $(this).parents('.option').next().length){
						$(this).parents('.option').remove();
						result_list();
					}
				});
				$(doc).on('click', '.add_category .list li a', function(e){
					e.preventDefault();
					var category_id=$(this).data('id'),
						t=$(this),
						chek_has_element=false, i=0;
					$.getJSON( "js/buy_list.json", function( data ) {
						$.each(data, function( key, val, index ) {
							i++;
							//  console.log(val['TYPE']);
							if(val['ID']==category_id){
								add_category(category_id, val['COLOR'], val['NAME'], val['IMAGE'], val['TYPE']);
								result_list();
								t.parent().addClass('hide');
								chek_has_element=true;
							}
							if(data.length==i){
								if(!chek_has_element){
									alert('К сожелению категории не найдено.')
								}
							}
						});
					});
					
				});
				//RESULT LIST
				$(doc).on('click', '#result_list .item .remove', function(e){
					e.preventDefault();
					var t=$(this),
					productid=t.parents('.item').data('product_id'),
					index=t.parents('.option').data('itemindex');
					t.parents('.option').remove();
					$('.product_item#product_id_'+productid+' .option:eq('+index+')').remove();
				});
				$(doc).on('click', '#result_list .item .edit', function(e){
					e.preventDefault();
					var t=$(this),
					productid=t.parents('.item').data('product_id'),
					index=t.parents('.option').data('itemindex');
					 
					$('.product_item#product_id_'+productid+' .option:eq('+index+') .desc_field input').focus();
				});
				$(doc).on('click', '.remove_all', function(e){
					e.preventDefault();
					if (confirm('Вы уверены что хотите удалить все поля?')) {
						length=$('.product_items_list .product_item').length;
						$('.product_items_list .product_item').remove();
						result_list();
					 
					}
				});
				$(doc).on('click', '.save_all', function(e){
					e.preventDefault();
					json_object={};
					json_array=[];
					length=$('.product_items_list .product_item').length;
					$('.product_items_list .product_item').each(function(index, el) {
						json_option_object={};
						$(this).find('.option:not(:last)').each(function(index, el) {
							//console.log($(this).find('select').val())
							json_option_object[index]={
								name: $(this).find('select').val(),
								desc: $(this).find('.desc_field input').val(),
								num_field: $(this).find('.num_field input').val()
							}
						});
						json_object={
							category_id:$(this).data('product_id'),
							products:json_option_object
							
						}
						json_array.push(json_object);
						if(length==(parseInt(index+1))){
						  //console.log(json_array);
							//ВОТ ТУТ ПОПРАВИТЬ КУДА ТЕБЕ ОТПРАВЛЯТЬ И КАК ПОЛУЧАТЬ ОТВЕТ
							$.ajax({
								type: "POST",
								url: 'js/addNewUserList.php',
								data: {products:JSON.stringify(json_array)},
								success: function(msg){
									alert('Готово');
									$('.share_tabs .save_all').addClass('active')
									console.log(msg);
								}
							});
						}
					});
					
				});
				function result_list(){
					$html='';
					editbtn='<a class="edit" href="#"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 38.9 38.7" style="enable-background:new 0 0 38.9 38.7;" xml:space="preserve"><path d="M24.2,6.5l7.9,7.9l-20,20l-7.9-7.9L24.2,6.5z M38.1,4.5L34.6,1c-1.4-1.4-3.6-1.4-4.9,0l-3.4,3.4l7.9,7.9l3.9-3.9 C39.1,7.3,39.1,5.6,38.1,4.5L38.1,4.5z M0,37.6c-0.1,0.6,0.4,1.2,1.1,1.1l8.8-2.1L2,28.6L0,37.6z M0,37.6"/></svg></a>'
					json_object={};
					json_array=[];
					
					$('.product_items_list .product_item').each(function(index, el) {
						var t=$(this),
							$option_list='',
							title=t.find('.category_title').find('.title').html(),
							color=t.find('.category_title').find('.title').css('color');
							json_option_object={};
							select_val='';
							t.find('.option').each(function(index, el) {
								
								
								select_val=$(this).find('select').val();
								json_option_object[index]={
									name: select_val,
									desc: $(this).find('.desc_field input').val(),
									num_field: $(this).find('.num_field input').val()
								}
								if(select_val!='Тип продукта'){
									 
									$option_list+='<div class="option" data-itemindex="'+index+'"><div class="name"><div class="before"  style="background:'+color+'"></div><span>'+select_val+'</span><span>'+$(this).find('.desc_field input').val()+' '+$(this).find('.num_field input').val()+'</span></div><div class="controls">'+editbtn+removebtn+'</div></div>';
								}
								
							});
							json_object={
								category_id: t.data('product_id'),
								products:json_option_object
							}
							json_array.push(json_object);
							
							$html+='<div class="item" data-product_id="'+t.data('product_id')+'"><div class="item_title" style="color:'+color+'">'+title+'</div>'+$option_list+'</div>';
					});
					Cookies.set('items_seved', json_array);
				 
					$('#result_list').html($html);
				}
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
			App.initBuyList();
			App.initCatalog();
			App.initPlayer();
		}
	});
	App.initApp();
})(jQuery,document,window);




//App._q.push(function(){
// App.init();
//});