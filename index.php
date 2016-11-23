<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная");
?> <!-- SLIDER -->
	  <?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/slider-main.php"),
			Array(),
			Array("MODE"=>"php")
		);?>
		<!-- RECEPTS -->
        <?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/recipts.php"),
			Array(),
			Array("MODE"=>"php")
		);?>
		
		<!-- STATISTIC -->
         <?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/statistic-main.php"),
			Array(),
			Array("MODE"=>"php")
		);?>
		
		<!-- MAP --> 
		<section class="map">
			<div class="container">
				<h2>Наши магазины</h2>
			</div>
			<div id="map"></div>
		</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>