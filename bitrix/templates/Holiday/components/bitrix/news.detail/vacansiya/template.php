<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>
<section class="vakancy_full">
			<div class="container">
				<a href="/vacancies" class="all_news">
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
					<span>Все вакансии</span>
				</a>
				<h1><?=$arResult["NAME"]?></h1>
				<div class="vakansy_params row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<span>
							<div class="title">Уровень зарплаты:</div>
							<div class="text"><?=$arResult['PROPERTIES']['pay_level_text']['VALUE']?></div>
						</span>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<span> 
							<div class="title">Город:</div>
							<div class="text"><?=$arResult['DISPLAY_PROPERTIES']['city']['DISPLAY_VALUE']?></div>
						</span>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<span>
							<div class="title">Дата размещения:</div>
							<div class="text"><?= FormatDate('j m Y', MakeTimeStamp($arResult['DATE_CREATE']));?></div>
						</span>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="logo"><img src="img/logo.svg" width="98" height="49" alt=""></div>
					</div>
				</div>
				<div class="vakansy_container row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <?=$arResult['PREVIEW_TEXT'];?>
						
						<h3>Требования:</h3>
                        <?=$arResult['DISPLAY_PROPERTIES']['trebovania']['~VALUE']['TEXT']?>
                        
						
						<h3>Обязанности:</h3>
					    <?=$arResult['DISPLAY_PROPERTIES']['obyazanosti']['~VALUE']['TEXT']?>
						<h3>График работы:</h3>
						<?=$arResult['PROPERTIES']['grafik_text']['VALUE']['TEXT']?>
						<h3>Адрес магазина:</h3>
						<?=$arResult['PROPERTIES']['shop_adress']['VALUE']?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="map_vakansy" id="map_vakansy"></div>
					</div>
				</div>
			</div>
		</section>
        <!-- FEEDBACK -->
		<section class="feedback feedback_contact">
			<div class="feedback_container">
				<h2>Откликнуться на вакансию</h2>
                <?
                $APPLICATION->GetTemplatePath("").
                require($_SERVER["DOCUMENT_ROOT"]."/".$APPLICATION->GetTemplatePath("")."/components/bitrix/form/vacancy/bitrix/form.result.new/.default/ajax.js");?>
                <div class="feedback-form-wrapper">
                    <? $APPLICATION->IncludeComponent("bitrix:form", "", Array(
                    	"AJAX_MODE" => "N",	// Включить режим AJAX
                    		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                    		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                    		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                    		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                    		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    		"CACHE_TYPE" => "N",	// Тип кеширования
                    		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
                    		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
                    		"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
                    		"EDIT_STATUS" => "N",	// Выводить форму смены статуса
                    		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
                    		"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
                    			0 => "",
                    			1 => "",
                    		),
                    		"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
                    			0 => "",
                    			1 => "",
                    		),
                    		"RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
                    		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
                    		"SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
                    		"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
                    		"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
                    		"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
                    		"SHOW_STATUS" => "N",	// Показать текущий статус результата
                    		"SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
                    		"START_PAGE" => "new",	// Начальная страница
                    		"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
                    		"SUCCESS_URL" => "/success.php",	// Страница с сообщением об успешной отправке
                    		"WEB_FORM_ID" => "4",	// ID веб-формы
                    		"COMPONENT_TEMPLATE" => "form-contacts",
                    		"VARIABLE_ALIASES" => array(
                    			"action" => "action",
                    		)
                    	),
                    	false
                    ); ?>
                </div>
            </div>
  		</section>