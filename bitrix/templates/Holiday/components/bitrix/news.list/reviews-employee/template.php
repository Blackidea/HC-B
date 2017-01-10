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
require_once($_SERVER["DOCUMENT_ROOT"]."/reviews-employee/ajax.js"); 

?>
<?
$innerIndex = 0;
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
<style>
.vertical .item_image a{
    max-height: 217px;
    display: block;
}
.vertical .item_image a img{
    width: 100%;
}
</style>
		<section class="reviews_agenstva">
			<div class="container">
				<h2>Отзывы кадровых агентств</h2>
				<div class="reviews_list row">
                    <div class="js-pager-wrepper" style="display: none;">
                    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
                    	<?=$arResult["NAV_STRING"]?><br />
                    <?endif;?>
                    </div>
 <?foreach($arResult["ITEMS"] as $index=>$arItem):?>
	<?
    //print_r($arItem);
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>               
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="item_review">
							<a href="#" class="image">
                                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>">
                            </a>
							<div class="copany"><?=$arItem["NAME"]?></div>
							<div class="item_bar"> 
								<div class="rating rating_ratio_<?=$arItem['PROPERTIES']['ratio']['VALUE']?>"></div>
								<div class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
							</div>
							<div class="desc">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>
							<a href="#review_<?=$index?>" data-showpopup="#popup_review" class="more_link">Подробнее</a>
						</div>
					</div>
<?endforeach;?>					
					
				</div>
                <div class="loading-gif">
                    <img src="<?=$APPLICATION->GetTemplatePath("img")?>/loading.gif"/>
                </div>
				<div class="text-center">
					<a href="#" class="button js-reviews-more">Показать еще</a>
				</div>
			</div>
		</section>
