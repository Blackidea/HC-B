<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?
//echo $arParams["CURENT_NEW"];
$counter = 0;
?>
<div class="col-xs-12">									
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
//echo $arResult["ID"];
    if( $arParams["CURENT_NEW"]!=$arItem["ID"] ):?>
    <?$counter++;?>
        <?if (counter<=$arParams['NEWS_COUNT']){?>
        <div class="item">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) center no-repeat; background-size:cover;" class="image"></a>
    	    <div class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
    	    <div class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
    	</div>
        <?}?>
    <?endif?>
<?endforeach;?>
</div>
