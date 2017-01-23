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
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?
//echo "<pre>";
//print_r($arResult["ITEMS"]);
//echo "</pre>";

?>
<div class="catalog_list row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <?if($arItem['PROPERTIES']['first_page']['VALUE'][0]=="Да"):?>
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
    	<div class="item">
        	<a data-showpage="1" href="#">
        	   <img src="<?= CFile::GetPath($arItem['PROPERTIES']["preview_images"]["VALUE"][0]);?>" alt="">
        	</a>
    	</div>
    </div>
    <?else:?>
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
    	<div class="item">
    	<a data-showpage="2" href="#">
        	<?foreach($arItem['PROPERTIES']["preview_images"]["VALUE"] as $index=>$imageID):?>
                 <img src="<?= CFile::GetPath($imageID);?>" alt="">
            <?endforeach;?>
    	</a>
    	</div>
	</div>
    <?endif;?>
<?endforeach;?>
</div>

<div class="catalog_slider">
    <div class="arrow_left"></div>
    <div class="arrow_right"></div>
    <div class="items_container">
        <div class="items" id="fb5-book">
            <?foreach($arResult["ITEMS"] as $index => $arItem):?>
            	<?
            	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            	?>
                
               	    <?foreach($arItem['PROPERTIES']["detail_images"]["VALUE"] as $index=>$imageID):?>
                    <?//=$index?>
                    <div class="item <?if ($index==0){echo "shadow_left";}else{echo "shadow_right";}?>">
				        <div class="item_shadow"></div>
    				    <span>
                            <img class="panzoom" src="<?= CFile::GetPath($imageID);?>" alt="">
                        </span>
    				</div>
                    <?endforeach;?>
                
            <?endforeach;?>
                
        </div>
    </div>
</div>
