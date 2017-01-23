<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<script src="<?=$APPLICATION->GetTemplatePath("js/flip.js")?>"></script>
        <script src="<?=$APPLICATION->GetTemplatePath("js/dragdealer.js")?>"></script>
        <script src="<?=$APPLICATION->GetTemplatePath("js/touch.js")?>"></script>
        <script src="<?=$APPLICATION->GetTemplatePath("js/touchswipe.js")?>"></script>
</div>
<section class="catalog">
			<h2><?echo $APPLICATION->GetTitle();?></h2>
			<div class="container-fluid">
				<div class="row">
					<div class="catalog_bar">
						<div class="catalog_bar_left">
							<a href="#" class="view_as show_full">
								<span>&nbsp;</span>
								<span>&nbsp;</span>
							</a>
							<a href="#" class="view_as show_list">
								<span>&nbsp;</span>
								<span>&nbsp;</span>
								<span>&nbsp;</span>
								<span>&nbsp;</span>
							</a>
							<div class="title hidden-xs">Обзор страниц</div>
						</div>
						<div class="catalog_middle">
							<div class="costume_slider_scroll">
								<div class="drag_line"></div>
								<div class="drag_handle">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
						<div class="catalog_bar_right">
							<a href="#" class="download">
								<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 344.2 393.6" style="enable-background:new 0 0 344.2 393.6;" xml:space="preserve" width="17" height="20">
								<g>
									<path d="M281.2,81.7c-4.2-21-15-40.3-31.1-55C231.3,9.4,206.9,0,181.4,0c-19.7,0-38.8,5.6-55.3,16.2c-12.6,8.2-23.3,19-31.2,31.8
										c-2.5-0.3-5-0.5-7.6-0.5c-32,0-58.1,26.1-58.1,58.1c0,3,0.2,5.9,0.6,8.8C11.2,129.2,0,151.9,0,176c0,20.2,7.6,40,21.3,55.5
										c14.2,16,33,25.4,53,26.6h37.4c7.9,0,14.4-6.5,14.4-14.4c0-7.9-6.5-14.4-14.4-14.4H75.5c-25.4-1.7-46.7-26-46.7-53.4
										c0-17.6,9.4-34.1,24.7-43c6.1-3.5,8.6-10.9,6.2-17.4c-1.1-3.1-1.8-6.5-1.8-10c0-16.2,13.1-29.3,29.3-29.3c3.4,0,6.8,0.6,9.9,1.8
										c7,2.6,14.9-0.6,18-7.4c12.1-25.4,38-41.8,66.2-41.8c37.8,0,69.1,28.3,72.7,65.9c0.6,6.5,5.5,11.8,11.9,12.8
										c28.2,4.8,49.4,30.9,49.4,60.6c0,31.4-24.6,58.8-55,61.2h-88.2c-7.9,0-14.4,6.5-14.4,14.4v100.7l-22.1-22.1
										c-5.6-5.6-14.7-5.6-20.4,0c-5.6,5.6-5.6,14.7,0,20.4l46.6,46.6c2.7,2.7,6.4,4.2,10.2,4.2c3.8,0,7.5-1.5,10.2-4.2l46.6-46.6
										c5.6-5.6,5.6-14.7,0-20.4c-5.6-5.6-14.7-5.6-20.4,0l-21.9,22.1v-86.3h75.4c22.2-1.6,43-11.8,58.5-28.9
										c15.3-16.9,23.8-38.6,23.8-61.1C344.2,128.2,317.8,92.9,281.2,81.7L281.2,81.7z M281.2,81.7"/>
								</g>
								</svg>
							</a>
							<div class="share">
								<a href="#" class="share_button">
									<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 375.4 392.3" style="enable-background:new 0 0 375.4 392.3;" xml:space="preserve" width="19" height="20">
									<g>
										<path d="M348,277.5c-7.1,3.6-10,12.2-6.4,19.4c3.2,6.4,4.9,13.4,4.9,20.6c0,25.4-20.6,46.1-46.1,46.1c-25.4,0-46.1-20.6-46.1-46.1
											c0-25.4,20.7-46.1,46.2-46.1c7.9,0,14.4-6.5,14.4-14.4c0-7.9-6.5-14.4-14.4-14.4c-23.6,0-44.7,11-58.5,28.2l-95.1-54.2
											c1.9-6.6,2.9-13.5,2.9-20.6c0-7.1-1-14-2.9-20.6l94.7-54c13.8,17.3,35,28.5,58.9,28.5c41.3,0,74.9-33.6,74.9-74.9
											c0-11.8-2.6-23-7.9-33.5c-3.6-7.1-12.2-10-19.4-6.4c-7.1,3.6-10,12.2-6.4,19.4c3.2,6.4,4.9,13.4,4.9,20.6
											c0,25.4-20.6,46.1-46.1,46.1c-25.4,0-46.1-20.6-46.1-46.1c0-25.4,20.6-46.1,46.1-46.1c7.9,0,14.4-6.5,14.4-14.4
											c0-7.9-6.5-14.4-14.4-14.4c-41.3,0-74.9,33.6-74.9,74.9c0,7.2,1,14.1,2.9,20.6l-106.6,60.7c-5.9,3.4-8.6,10.4-6.6,16.9
											c0.3,0.9,0.6,1.8,1,2.6c3,6.3,4.6,13,4.6,20.2c0,25.4-20.6,46.1-46.1,46.1c-25.4,0-46.1-20.6-46.1-46.1c0-25.4,20.6-46.1,46-46.1
											c7.9,0,14.4-6.5,14.4-14.4c0-7.9-6.5-14.4-14.4-14.4C33.6,121,0,154.6,0,195.8s33.6,74.9,74.9,74.9c23.8,0,45.1-11.2,58.8-28.6
											l94.9,54.1c-2,6.7-3,13.8-3,21.2c0,41.3,33.6,74.9,74.9,74.9c41.3,0,74.9-33.6,74.9-74.9c0-11.8-2.6-23-7.9-33.5
											C363.8,276.8,355.1,273.9,348,277.5L348,277.5z M348,277.5"/>
									</g>
									</svg>
								</a>
								<div class="dropdown_share">
									<div class="title">Поделиться каталогом:</div>
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
										<a href="#" class="mail">
											<span class="icon">
												<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 viewBox="0 0 386.1 290" style="enable-background:new 0 0 386.1 290;" xml:space="preserve">
												<path d="M367.4,0H18.8C8.4,0,0,8.4,0,18.8v252.5C0,281.6,8.4,290,18.8,290h348.6c10.4,0,18.8-8.4,18.8-18.8V18.8
													c0-5-1.9-9.7-5.4-13.2C377.1,2,372.4,0,367.4,0z M362.3,263.7c0,1.4-1.1,2.5-2.5,2.5H26.3c-1.4,0-2.5-1.1-2.5-2.5V26.3
													c0-1.4,1.1-2.5,2.5-2.5H342c1,0,2,0.7,2.3,1.6s0.1,2.1-0.7,2.8L196.7,153.8c-0.9,0.8-2.3,0.8-3.2,0L86.7,62.4
													c-5-4.3-12.5-3.7-16.8,1.3c-2.1,2.4-3.1,5.5-2.8,8.7c0.2,3.2,1.7,6,4.2,8.1l116.2,99.4c0,0,0,0,0.1,0.1c0.2,0.1,0.3,0.2,0.4,0.3
													c0.1,0.1,0.2,0.2,0.3,0.3l0.1,0c0.1,0.1,0.3,0.2,0.4,0.3c0.2,0.1,0.3,0.2,0.5,0.3c0.1,0,0.1,0.1,0.1,0.1c0.3,0.2,0.5,0.3,0.7,0.3
													c0.1,0,0.2,0.1,0.4,0.2c0.1,0,0.2,0.1,0.4,0.2c0.1,0,0.1,0,0.2,0.1c0.2,0.1,0.4,0.1,0.5,0.2c0,0,0.1,0,0.1,0c0.1,0,0.1,0,0.2,0.1
													l0.6,0.2c0.2,0,0.3,0.1,0.5,0.1c0,0,0.1,0,0.1,0c0.3,0.1,0.4,0.1,0.5,0.1c0.2,0,0.5,0,1,0.1c0.5,0,1.4,0.1,1.9,0c0,0,0.1,0,0.1,0
													c0,0,0.1,0,0.1,0c0.3-0.1,0.5-0.1,0.8-0.1c0.1,0,0.1,0,0.2,0c0.1,0,0.2,0,0.3-0.1c0.1,0,0.1,0,0.2-0.1l0.7-0.2c0.1,0,0.1,0,0.1-0.1
													c0.1-0.1,0.3-0.1,0.5-0.2c0.1,0,0.2-0.1,0.4-0.1c0.2-0.1,0.3-0.2,0.4-0.2c0.1,0,0.1-0.1,0.2-0.1c0.2-0.1,0.5-0.2,0.8-0.4
													c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0.3-0.2,0.5-0.3c0,0,0.1,0,0.1-0.1c0.1-0.1,0.3-0.2,0.6-0.4l0,0c0.1-0.1,0.3-0.2,0.4-0.3c0,0,0,0,0,0
													c0,0,0.1-0.1,0.1-0.1L358.2,47c0.7-0.6,1.8-0.8,2.7-0.4c0.9,0.4,1.5,1.3,1.5,2.3V263.7z"/>
												</svg>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="visible-xs">
						<div class="catalog_bar_mobile">
							<div class="title">Обзор страниц</div>
						</div>
					</div>
				</div>
			     <?$APPLICATION->IncludeComponent(
                	"bitrix:news.list",
                	"catalog-gallery",
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
                		"CACHE_TYPE" => "N",
                		"CHECK_DATES" => "Y",
                		"DETAIL_URL" => "",
                		"DISPLAY_BOTTOM_PAGER" => "Y",
                		"DISPLAY_DATE" => "Y",
                		"DISPLAY_NAME" => "Y",
                		"DISPLAY_PICTURE" => "Y",
                		"DISPLAY_PREVIEW_TEXT" => "Y",
                		"DISPLAY_TOP_PAGER" => "N",
                		"FIELD_CODE" => array("CODE", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", ""),
                		"FILTER_NAME" => "",
                		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
                		"IBLOCK_ID" => "25",
                		"IBLOCK_TYPE" => "gallery",
                		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                		"INCLUDE_SUBSECTIONS" => "Y",
                		"MESSAGE_404" => "",
                		"NEWS_COUNT" => "20",
                		"PAGER_BASE_LINK_ENABLE" => "N",
                		"PAGER_DESC_NUMBERING" => "N",
                		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                		"PAGER_SHOW_ALL" => "N",
                		"PAGER_SHOW_ALWAYS" => "N",
                		"PAGER_TEMPLATE" => ".default",
                		"PAGER_TITLE" => "Рецепты",
                		"PARENT_SECTION" => "",
                		"PARENT_SECTION_CODE" => "",
                		"PREVIEW_TRUNCATE_LEN" => "",
                		"PROPERTY_CODE" => array("first_page"),
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
                		"SORT_ORDER2" => "ASC"
                	)
                );?>
			     
                
                
			</div>
		</section>
  <div class="container">
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>