<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<? $APPLICATION->IncludeComponent("bitrix:form", "vacancy", Array(
                	"AJAX_MODE" => "N",	// �������� ����� AJAX
                		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
                		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
                		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
                		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
                		"CACHE_TIME" => "3600",	// ����� ����������� (���.)
                		"CACHE_TYPE" => "N",	// ��� �����������
                		"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
                		"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
                		"EDIT_ADDITIONAL" => "N",	// �������� �� �������������� �������������� ����
                		"EDIT_STATUS" => "N",	// �������� ����� ����� �������
                		"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
                		"NOT_SHOW_FILTER" => array(	// ���� �����, ������� ������ ���������� � �������
                			0 => "",
                			1 => "",
                		),
                		"NOT_SHOW_TABLE" => array(	// ���� �����, ������� ������ ���������� � �������
                			0 => "",
                			1 => "",
                		),
                		"RESULT_ID" => $_REQUEST[RESULT_ID],	// ID ����������
                		"SEF_MODE" => "N",	// �������� ��������� ���
                		"SHOW_ADDITIONAL" => "N",	// �������� �������������� ���� ���-�����
                		"SHOW_ANSWER_VALUE" => "N",	// �������� �������� ��������� ANSWER_VALUE
                		"SHOW_EDIT_PAGE" => "N",	// ���������� �������� �������������� ����������
                		"SHOW_LIST_PAGE" => "N",	// ���������� �������� �� ������� �����������
                		"SHOW_STATUS" => "N",	// �������� ������� ������ ����������
                		"SHOW_VIEW_PAGE" => "N",	// ���������� �������� ��������� ����������
                		"START_PAGE" => "new",	// ��������� ��������
                		"USE_EXTENDED_ERRORS" => "Y",	// ������������ ����������� ����� ��������� �� �������
                		"SUCCESS_URL" => "/success.php",	// �������� � ���������� �� �������� ��������
                		"WEB_FORM_ID" => "4",	// ID ���-�����
                		"COMPONENT_TEMPLATE" => "form-contacts",
                		"VARIABLE_ALIASES" => array(
                			"action" => "action",
                		)
                	),
                	false
                ); ?>