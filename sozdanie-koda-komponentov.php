<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Создание кода компонентов");
?>Text here....<?$APPLICATION->IncludeComponent(
	"bitrix:main.pagenavigation",
	"",
Array()
);?><?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"",
Array()
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>