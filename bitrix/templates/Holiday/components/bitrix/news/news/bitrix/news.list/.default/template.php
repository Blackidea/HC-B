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

require_once($_SERVER["DOCUMENT_ROOT"]."/news/ajax.js"); 
$this->setFrameMode(true);
?>
<style>
.loading-gif{
    display: none;
}
.loading-gif img{
    width: 10%;
    position: fixed;
    margin-left: -5%;
    left: 50%;
    top: 50%;
    margin-top: -5%;
}
   
</style>
<div class="js-pager-wrepper" style="display: none;">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
</div>
<section class="news">
    <div class="container">
        <h2><?$APPLICATION->ShowTitle()?></h2>
        <div class="news_list row">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
            	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            	?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				    <div class="item">
       	                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) center no-repeat; background-size:cover;" class="image"></a>
				        <?endif;?>
                        <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                			<div class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div> 
                		<?endif?>
                 	    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                            <div class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
				        <?endif;?>
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                            <div class="desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
                        <?endif;?>
                        <div class="share_list">
                            <div class="uSocial-Share" data-pid="f2d468e4c9f2d2dd464e3c801b5d6761" data-type="share" data-options="round-rect,style2,absolute,horizontal,size24,eachCounter1,counter0" data-social="vk,ok,fb,twi,gPlus" data-mobile="vi,wa,telegram,sms"></div>
				        </div>
				    </div>
				</div>
            <?endforeach;?>
        </div>
        <div class="loading-gif">
            <img src="<?=$APPLICATION->GetTemplatePath("img")?>/loading.gif"/>
        </div>
        <div class="text-center">
            <a href="#" data-counter="<?=$GLOBALS['pagesCount']?>" class="js-more-news button">Показать еще</a>
            
        </div>
        
    </div>
</section>
<!-- SUBSCRIBE -->
<section class="subscribe">
    <div class="conteiner-fluid">
        <div class="title">Подпишитесь на нашу новостную рассылку, <br>и будьте в курсе последних событий!</div>
        <form action="">
            <input type="text" placeholder="Email">
            <input type="submit" value="Подписаться">
        </form>
    </div>
</section>