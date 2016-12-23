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
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/stories/ajax.js"); 
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
    <section class="history">
        <div class="container">
            <h2><?$APPLICATION->ShowTitle()?></h2>
            <div class="history_list row">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    //print_r($arItem);
                	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                	?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    						<div class="item">
                             <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
    				            <a class="image" style="background:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) top center no-repeat; background-size:cover;" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                             <?endif;?>
                             <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                                <div class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
    				        <?endif;?>
    							<div class="rang"><?echo $arItem["PROPERTIES"]["dolzhnist"]['VALUE'];?></div>
    							<div class="desc">
    								<?echo $arItem["PREVIEW_TEXT"];?> 
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
    	<section class="map">
			<div class="container">
				<h2>Наши магазины</h2>
			</div>
			<div id="map"></div>
		</section>