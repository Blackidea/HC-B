<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<?

  //$req = false; // изначально переменна€ дл€ "ответа" - false
  // ѕриведЄм полученную информацию в удобочитаемый вид
  //ob_start();
//  echo '<pre>';
//  print_r($_POST);
//  echo '</pre>';
  
  //$req = ob_get_contents();
  //ob_end_clean();
  ///echo json_encode($req); // вернем полученное в ответе
//  exit;
?>
<?
//print_r($_FILES);
//print_r($_POST);

                    $APPLICATION->IncludeComponent("bitrix:form", "form-contacts-1", array(
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHAIN_ITEM_LINK" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS" => "N",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "NOT_SHOW_FILTER" => array("", ""),
                    "NOT_SHOW_TABLE" => array("", ""),
                    "RESULT_ID" => $_REQUEST[RESULT_ID],
                    "SEF_MODE" => "N",
                    "SHOW_ADDITIONAL" => "N",
                    "SHOW_ANSWER_VALUE" => "N",
                    "SHOW_EDIT_PAGE" => "N",
                    "SHOW_LIST_PAGE" => "N",
                    "SHOW_STATUS" => "N",
                    "SHOW_VIEW_PAGE" => "N",
                    "START_PAGE" => "new",
                    "USE_EXTENDED_ERRORS" => "Y",
                    "SUCCESS_URL" => "/success.php",
                    "VARIABLE_ALIASES" => array("action" => "action"),
                    "WEB_FORM_ID" => "2")); ?>