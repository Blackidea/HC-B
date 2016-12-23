<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

/*$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"3600"
	)
);*/
?>

<section class="page_404">
			<div class="container">
				<div class="image">
					<img src="<?=$APPLICATION->GetTemplatePath("")?>img/pic/404.png" alt="">
				</div>
				<a href="/" class="button">Перейти на главную</a>
			</div>
		</section>
        <section class="map">
			<div class="container">
				<h2>Наши магазины</h2>
			</div>
			<div id="map"></div>
		</section>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>