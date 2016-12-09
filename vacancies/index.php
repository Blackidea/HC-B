<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");
?><?
GLOBAL $arrFilter;
if (!is_array($arrFilter))
   $arrFilter = array();
//$arrFilter['!PROPERTY_inrotation'] = false;

?>
<!-- VAKANSY -->
		<section class="vakansy">
			<div class="container">
				<h2>Вакансии</h2>
				<div class="row">
					<div class="col-sm-4 col-md-3">
						<a href="#" class="visible-xs button show_filter">Фильтр</a>
						<div class="vakansy_filter">
							<a href="#" class="go_back visible-xs ">
								<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 28 28" style="enable-background:new 0 0 28 28;" xml:space="preserve">
								<path id="XMLID_237_" class="st0" d="M19.4,14.5C19.5,14.4,19.5,14.4,19.4,14.5c0.1-0.1,0.1-0.2,0.1-0.2c0,0,0,0,0-0.1
									c0-0.1,0-0.1,0-0.2l0,0l0,0c0-0.1,0-0.1,0-0.2c0,0,0,0,0-0.1c0,0,0-0.1,0-0.1c0,0,0,0,0-0.1c0,0,0-0.1-0.1-0.1c0,0,0,0,0-0.1
									c0,0-0.1-0.1-0.1-0.1v0c0,0,0,0,0,0l-4.4-4.4c-0.4-0.4-1.1-0.4-1.5,0h0c-0.4,0.4-0.4,1.1,0,1.5l2.7,2.7H7.5c-0.6,0-1.1,0.5-1.1,1.1
									s0.5,1.1,1.1,1.1H16l-2.7,2.7c-0.4,0.4-0.4,1.1,0,1.5h0c0.4,0.4,1.1,0.4,1.5,0l4.4-4.4c0,0,0,0,0,0v0c0,0,0.1-0.1,0.1-0.1
									c0,0,0,0,0-0.1C19.4,14.5,19.4,14.5,19.4,14.5z"/>
								<g id="XMLID_61_">
									<path id="XMLID_13_" class="st0" d="M14,2c6.6,0,12,5.4,12,12s-5.4,12-12,12S2,20.6,2,14S7.4,2,14,2 M14,0C6.3,0,0,6.3,0,14
										s6.3,14,14,14c7.7,0,14-6.3,14-14S21.7,0,14,0L14,0z"/>
								</g>
								<g class="hover">
									<path  class="st1" d="M14,0C6.3,0,0,6.3,0,14s6.3,14,14,14c7.7,0,14-6.3,14-14S21.7,0,14,0z M19.6,14L19.6,14
										c0,0.1,0,0.1,0,0.2c0,0,0,0,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1c0,0,0,0.1-0.1,0.1c0,0,0,0,0,0.1c0,0-0.1,0.1-0.1,0.1v0
										c0,0,0,0,0,0l-4.4,4.4c-0.4,0.4-1.1,0.4-1.5,0c-0.4-0.4-0.4-1.1,0-1.5l2.7-2.7H7.5c-0.6,0-1.1-0.5-1.1-1.1s0.5-1.1,1.1-1.1H16
										l-2.7-2.7c-0.4-0.4-0.4-1.1,0-1.5c0.4-0.4,1.1-0.4,1.5,0l4.4,4.4c0,0,0,0,0,0v0c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0.1
										c0,0,0,0.1,0.1,0.1c0,0,0,0,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1C19.6,13.9,19.6,13.9,19.6,14L19.6,14z"/>
								</g>
								</svg>
								<span>Назад</span>
							</a>
							<form action="">
								<div class="filter_item">
									<div class="title">Город</div>
									<select data-select name="city_select">
										<option value="">Новосибирск</option>
										<option value="">Новосибирск</option>
										<option value="">Новосибирск</option>
									</select>
								</div>
								<div class="filter_item">
									<div class="title">Выбрать магазин</div>
									<select data-select name="store_select">
										<option value="">Холидей</option>
										<option value="">Холидей</option>
										<option value="">Холидей</option>
									</select>
								</div>
								<div class="filter_item">
									<div class="title">Профобласть</div>
									<input type="checkbox" class="checkbox" name="prof_1" id="prof_1" value="">
									<label for="prof_1">Продажи</label>
									<input type="checkbox" class="checkbox" name="prof_2" id="prof_2" value="">
									<label for="prof_2">Начало карьеры</label>
									<input type="checkbox" class="checkbox" name="prof_3" id="prof_3" value="">
									<label for="prof_3">Бухгалтерия</label>
									<input type="checkbox" class="checkbox" name="prof_4" id="prof_4" value="">
									<label for="prof_4">Консультирование</label>
									<input type="checkbox" class="checkbox" name="prof_5" id="prof_5" value="">
									<label for="prof_5">IT, телеком</label>
									<input type="checkbox" class="checkbox" name="prof_6" id="prof_6" value="">
									<label for="prof_6">Спорт, фитнес</label>
									<input type="checkbox" class="checkbox" name="prof_7" id="prof_7" value="">
									<label for="prof_7">Авто</label>
									<input type="checkbox" class="checkbox" name="prof_8" id="prof_8" value="">
									<label for="prof_8">Маркетинг</label>
									<input type="checkbox" class="checkbox" name="prof_9" id="prof_9" value="">
									<label for="prof_9">Туризм, рестораны</label>
								</div>
								<div class="filter_item">
									<div class="title">Зарплата</div>
									<input type="radio" class="radio" name="zarplata" id="zp_1" value="">
									<label for="zp_1">от 3000 руб.</label>
									<input type="radio" class="radio" name="zarplata" id="zp_2" value="">
									<label for="zp_2">от 20000 руб.</label>
									<input type="radio" class="radio" name="zarplata" id="zp_3" value="">
									<label for="zp_3">от 30000 руб.</label>
									<input type="radio" class="radio" name="zarplata" id="zp_4" value="">
									<label for="zp_4">от 40000 руб.</label>
									<input type="radio" class="radio" name="zarplata" id="zp_5" value="">
									<label for="zp_5">от 50000 руб.</label>
								</div>
								<div class="filter_item nopadding">
									<div class="title">График работы</div>
									<input type="checkbox" class="checkbox" name="graf_1" id="graf_1" value="">
									<label for="graf_1">Сменный график</label>
									<input type="checkbox" class="checkbox" name="graf_2" id="graf_2" value="">
									<label for="graf_2">Полный день</label>
									<input type="checkbox" class="checkbox" name="graf_3" id="graf_3" value="">
									<label for="graf_3">Гибкий график</label>
									<input type="checkbox" class="checkbox" name="graf_4" id="graf_4" value="">
									<label for="graf_4">Вахтовый метод</label>
									<input type="checkbox" class="checkbox" name="graf_5" id="graf_5" value="">
									<label for="graf_5">Удаленная работа</label>
								</div>
								<div class="border"></div>
								<input type="submit" value="Подобрать">
							</form>
						</div>
					</div>
                    <div class="col-sm-8 col-md-9">
						<div class="vakansy_list">
							<div class="search_reslut">Найдено 124 вакансии</div>
                            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"vacancies", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DATE_ACTIVE_FROM",
			1 => "ACTIVE_FROM",
			2 => "DATE_CREATE",
			3 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "vacancies",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "city",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "vacancies"
	),
	false
);?>
                        </div>
					</div>
				</div>
			</div>
		</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>