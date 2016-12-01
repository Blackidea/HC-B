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
<!-- DISCOUNTS FULL -->
		<section class="discounts_full">
			<div class="container">
				<a href="/discount" class="all_news">
					<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 28 28" style="enable-background:new 0 0 28 28;" xml:space="preserve">
					<path id="XMLID_237_" class="st0" d="M19.4,14.5C19.5,14.4,19.5,14.4,19.4,14.5c0.1-0.1,0.1-0.2,0.1-0.2c0,0,0,0,0-0.1
						c0-0.1,0-0.1,0-0.2l0,0l0,0c0-0.1,0-0.1,0-0.2c0,0,0,0,0-0.1c0,0,0-0.1,0-0.1c0,0,0,0,0-0.1c0,0,0-0.1-0.1-0.1c0,0,0,0,0-0.1
						c0,0-0.1-0.1-0.1-0.1v0c0,0,0,0,0,0l-4.4-4.4c-0.4-0.4-1.1-0.4-1.5,0h0c-0.4,0.4-0.4,1.1,0,1.5l2.7,2.7H7.5c-0.6,0-1.1,0.5-1.1,1.1
						s0.5,1.1,1.1,1.1H16l-2.7,2.7c-0.4,0.4-0.4,1.1,0,1.5h0c0.4,0.4,1.1,0.4,1.5,0l4.4-4.4c0,0,0,0,0,0v0c0,0,0.1-0.1,0.1-0.1
						c0,0,0,0,0-0.1C19.4,14.5,19.4,14.5,19.4,14.5z"/>
					<g id="XMLID_61_">
						<path id="XMLID_13_" class="st0" d="M14,2c6.6,0,12,5.4,12,12s-5.4,12-12,12S2,20.6,2,14S7.4,2,14,2 M14,0C6.3,0,0,6.3,0,14
							s6.3,14,14,14c7.7,0,14-6.3,14-14S21.7,0,14,0L14,0z"/>
					</g>
					<g class="hover">
						<path  class="st1" d="M14,0C6.3,0,0,6.3,0,14s6.3,14,14,14c7.7,0,14-6.3,14-14S21.7,0,14,0z M19.6,14L19.6,14
							c0,0.1,0,0.1,0,0.2c0,0,0,0,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1c0,0,0,0.1-0.1,0.1c0,0,0,0,0,0.1c0,0-0.1,0.1-0.1,0.1v0
							c0,0,0,0,0,0l-4.4,4.4c-0.4,0.4-1.1,0.4-1.5,0c-0.4-0.4-0.4-1.1,0-1.5l2.7-2.7H7.5c-0.6,0-1.1-0.5-1.1-1.1s0.5-1.1,1.1-1.1H16
							l-2.7-2.7c-0.4-0.4-0.4-1.1,0-1.5c0.4-0.4,1.1-0.4,1.5,0l4.4,4.4c0,0,0,0,0,0v0c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0.1
							c0,0,0,0.1,0.1,0.1c0,0,0,0,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1C19.6,13.9,19.6,13.9,19.6,14L19.6,14z"/>
					</g>
					</svg>
					<span>Все акциии</span>
				</a>
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
				        <div class="image">
                        <img 
                         src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
                         class="img-full" 
                         alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			             title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                         />
                         </div>
                    <?endif;?>
				<h2><?=$arResult["NAME"]?></h2>
				<div class="discounts_content">
					<div class="date"> <?echo $arResult["PREVIEW_TEXT"];?></div>
					<div class="description">
                         <?echo $arResult["DETAIL_TEXT"];?>
                    </div>
					<div class="share_links">
						<div class="title">Поделится с друзьями:</div>
						<div class="uSocial-Share" data-pid="f2d468e4c9f2d2dd464e3c801b5d6761" data-type="share" data-options="round-rect,style2,absolute,horizontal,size24,eachCounter1,counter0" data-social="vk,ok,fb,twi,gPlus" data-mobile="vi,wa,telegram,sms"></div>
					</div>
				</div>
			</div>
		</section>

        
