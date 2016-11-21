<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="top_menu col-xs-11 col-sm-11 col-md-11 nopadding">
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>
    <li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
<?endforeach?>
</ul>
<?endif?>