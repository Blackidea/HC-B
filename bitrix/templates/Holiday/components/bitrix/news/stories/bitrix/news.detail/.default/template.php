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
	<section class="history_full">
			<div class="container">
				<a href="/stories" class="all_news">
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
					<span>Все истории успеха</span>
				</a>
				<div class="row">
					<div class="col-sm-12 col-md-8 col-lg-8">
						<div class="history_content">
							<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        				        <img 
                                 src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
                                 class="img-full" 
                                 alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
        			             title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                                 />
                            <?endif;?>
                            <h1><?=$arResult["NAME"]?></h1>
                            <div class="rang"><?=$arResult['PROPERTIES']['dolzhnist_full']['VALUE']?></div>
                            <?echo $arResult["DETAIL_TEXT"];?>
						</div>
						<div class="share_links">
							<div class="title">Поделится с друзьями:</div>
							<div class="share_list">
								<a href="#" class="vk">
									<span class="icon"></span>
									<span>47</span>
								</a>
								<a href="#" class="odnoklassniki">
									<span class="icon"></span>
									<span>27</span>
								</a>
								<a href="#" class="facebook">
									<span class="icon"></span>
									<span>54</span>
								</a>
								<a href="#" class="twitter">
									<span class="icon"></span>
									<span>50</span>
								</a>
								<a href="#" class="google">
									<span class="icon"></span>
									<span>58</span>
								</a>
							</div>
						</div>
					</div>
					 <!-- Другие истории -->
                    <div class="hidden-sm hidden-xs  col-sm-3 col-md-3 col-lg-3 pull-right">
						<div class="history_list">
							<div class="row">
                            <?$APPLICATION->IncludeComponent(
                            	"bitrix:news.list",
                            	"other-stories",
                            	Array(
                            		"ACTIVE_DATE_FORMAT" => "d.m.Y",
                            		"ADD_SECTIONS_CHAIN" => "Y",
                            		"AJAX_MODE" => "N",
                            		"AJAX_OPTION_ADDITIONAL" => "",
                            		"AJAX_OPTION_HISTORY" => "N",
                            		"AJAX_OPTION_JUMP" => "N",
                            		"AJAX_OPTION_STYLE" => "Y",
                            		"CACHE_FILTER" => "N",
                            		"CACHE_GROUPS" => "Y",
                            		"CACHE_TIME" => "36000000",
                            		"CACHE_TYPE" => "A",
                            		"CHECK_DATES" => "Y",
                            		"DETAIL_URL" => "/stories/#ELEMENT_ID#/",
                            		"DISPLAY_BOTTOM_PAGER" => "Y",
                            		"DISPLAY_DATE" => "Y",
                            		"DISPLAY_NAME" => "Y",
                            		"DISPLAY_PICTURE" => "Y",
                            		"DISPLAY_PREVIEW_TEXT" => "Y",
                            		"DISPLAY_TOP_PAGER" => "N",
                            		"FIELD_CODE" => array("",""),
                            		"FILTER_NAME" => "",
                            		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            		"IBLOCK_ID" => 20,
                            		"IBLOCK_TYPE" => "stories",
                            		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                            		"INCLUDE_SUBSECTIONS" => "Y",
                            		"MESSAGE_404" => "",
                            		"NEWS_COUNT" => "5",
                            		"PAGER_BASE_LINK_ENABLE" => "N",
                            		"PAGER_DESC_NUMBERING" => "N",
                            		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            		"PAGER_SHOW_ALL" => "N",
                            		"PAGER_SHOW_ALWAYS" => "N",
                            		"PAGER_TEMPLATE" => ".default",
                            		"PAGER_TITLE" => "Новости",
                            		"PARENT_SECTION" => "",
                            		"PARENT_SECTION_CODE" => "",
                            		"PREVIEW_TRUNCATE_LEN" => "",
                            		"PROPERTY_CODE" => array("dolznost_full",""),
                            		"SET_BROWSER_TITLE" => "Y",
                            		"SET_LAST_MODIFIED" => "N",
                            		"SET_META_DESCRIPTION" => "Y",
                            		"SET_META_KEYWORDS" => "Y",
                            		"SET_STATUS_404" => "N",
                            		"SET_TITLE" => "Y",
                            		"SHOW_404" => "N",
                            		"SORT_BY1" => "ACTIVE_FROM",
                            		"SORT_BY2" => "SORT",
                            		"SORT_ORDER1" => "DESC",
                            		"SORT_ORDER2" => "ASC",
                                    "CURENT_NEW"  => $arResult["ID"]
                            	)
                            );?>
								
  						    </div>
        				</div>
                    </div>
                    <!-- Другие истории -->
				</div>
			</div>
		</section>