<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<? $APPLICATION->IncludeComponent("bitrix:form", "vacancy", Array(
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