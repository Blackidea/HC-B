(function ($) {
	$.fn.js_select= function() {
	 
			var box = this,
			doc = document;
			$(box).each(function (index) {
			var $box = $(this),
				$li = $box.find('option'),
				$li_list = '';
			$box.hide();

			$li.each(function (index) {
				//console.log($(this).attr('default'))
				if($(this).data('default')!=true){
					$li_list += '<li><span data-selected="' + $(this).val() + '">' + $(this).text() + '</span></li>';
				} else {
					$li_list += '<li class="default"><span data-selected="' + $(this).val() + '">' + $(this).text() + '</span></li>';
				}
			});
			if($box.find('option:first').data('default')==true){
				$default=" class='default'";
			} else {
				$default="";
			}
		 
			if($box.find('option[data-selected]').length){
				$li = $box.find('option[data-selected]');
				$default="";
			}
			$box.before('<div data-select-name="' + $box.attr('name') + '" class="js_select select_' + $box.attr('name') + '" ><div class="js_selected"><span '+$default+'>' + $li.html() + '</span><div class="js_select_arrow"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 14.8 7.9" style="enable-background:new 0 0 14.8 7.9;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#D1050C;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line id="XMLID_5_" class="st0" x1="0.5" y1="0.5" x2="7.4" y2="7.4"/><line id="XMLID_8_" class="st0" x1="14.3" y1="0.5" x2="7.4" y2="7.4"/></svg></div></div><ul>' + $li_list + '</ul></div>');
			});
		 

			if($('body').data('inited_select')!=true){
				 
				$(doc).on('click', '.js_select li', function () {
					var $t = $(this).find('span'),
						$parent_selected = $t.parents('li').parents('ul').parents('.js_select');
					
					if($(this).hasClass('default')){
						$parent_selected.find('.js_selected span').addClass('default')
					} else {
						$parent_selected.find('.js_selected span').removeClass('default')
					}
					$parent_selected.find('.js_selected span').html($t.html());
					$('select[name="' + $t.parents('.js_select').data('select-name') + '"] option').removeAttr('selected');
					$('select[name="' + $t.parents('.js_select').data('select-name') + '"] option').val($t.text())
					$('select[name="' + $t.parents('.js_select').data('select-name') + '"] option[value="' + $t.data('selected') + '"]').attr('selected', 'selected');
				});
				$(doc).on('click', '.js_selected', function () {
					var parrent=$(this).parents('.js_select');
					//console.log(parrent)
					if(parrent.hasClass('opened')){
						$(this).parents('.js_select').removeClass('opened');
					} else {
						$(this).parents('.js_select').addClass('opened');
					}
				});
				$('body').data('inited_select', true)
			}
			$(box).parent().find('.js_selected').on('clickoutside', function () {
				$(this).parents('.js_select').removeClass('opened');
			});
	 
 
	}
}(jQuery));