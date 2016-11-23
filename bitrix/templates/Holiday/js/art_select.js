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
				$li_list += '<li><span data-selected="' + $(this).val() + '">' + $(this).text() + '</span></li>';
			});
			$box.before('<div data-select-name="' + $box.attr('name') + '" class="js_select select_' + $box.attr('name') + '" ><div class="js_selected"><span>' + $li.html() + '</span><div class="js_select_arrow"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 14.8 7.9" style="enable-background:new 0 0 14.8 7.9;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#D1050C;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line id="XMLID_5_" class="st0" x1="0.5" y1="0.5" x2="7.4" y2="7.4"/><line id="XMLID_8_" class="st0" x1="14.3" y1="0.5" x2="7.4" y2="7.4"/></svg></div></div><ul>' + $li_list + '</ul></div>');
		});
		var $box_selected = $('.js_selected'),
			$box_select_js = $('.js_select'),
			$box_select_ul = $box_select_js.find('ul'),
			$box_select_li = $box_select_js.find('li span');
		$(doc).on('click', '.js_select li span', function () {
			var $t = $(this),
				$parent_selected = $t.parents('li').parents('ul').parents('.js_select');
			$parent_selected.find('.js_selected span').html($t.html());
			$('select[name="' + $t.parents('.js_select').data('select-name') + '"] option').removeAttr('selected');
			$('select[name="' + $t.parents('.js_select').data('select-name') + '"] option[value="' + $t.data('selected') + '"]').attr('selected', 'selected');
		});
		$(doc).on('click', '.js_selected', function () {
			$(this).parents('.js_select').addClass('opened');
		});
		$(doc).on('click', '.js_selected .js_select_arrow', function () {
			$(this).parents('.js_select').removeClass('opened');
		});
		$box_selected.on('clickoutside', function () {
			$(this).parents('.js_select').removeClass('opened');
		});
	}
}(jQuery));