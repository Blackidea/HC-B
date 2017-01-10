<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список покупок");


$categories = array();
CModule::IncludeModule('iblock');
        $yvalue = '23';
        $arSelect = Array();
        $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement())
        {
         $arFields = $ob->GetFields();
         $arProps = $ob->GetProperties(); 
         $categories[$arFields['ID']]=  $arFields['NAME'];
        
        
        //$arProps['products_list_str'];
        }
?>


<section class="buy_list">
			<h2>Список покупок</h2>
			<div class="container">
				<div class="row">
					<div class="nopadding col-xs-12 col-sm-12 col-md-6">
						<div class="product_items_list">
								<!--<div class="product_item" id="product_id_13" data-product_id="13">
								<div class="category_title" style="box-shadow: 0 2px 13px rgba(98, 141, 190, 0.35);">
									<div class="icon">
										<img src="<?php echo SITE_TEMPLATE_PATH ?>img/category_1.jpg" alt="">
										<div class="title" style="color:#628dbe;">Рыба и морепродукты</div>
									</div>
									<a href="#" class="remove">
										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve" width="">
										<style type="text/css">
											.st0{fill:none;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
										</style>
										<line id="XMLID_233_" class="st0" x1="20.5" y1="1.5" x2="1.5" y2="20.5"/>
										<line id="XMLID_313_" class="st0" x1="1.5" y1="1.5" x2="20.5" y2="20.5"/>
										</svg>
									</a>
								</div>
								<div class="product_options">
								<div class="option">
										<div class="field select_field">
											<select name="more" data-select>
												<option data-default="true" value="Тип продукта">Тип продукта</option>
												<option value="Окунь">Окунь</option>
												<option value="Лещ">Лещ</option>
												<option value="Кальмары">Кальмары</option>
											</select>
										</div>
										<div class="field desc_field">
											<input type="text" placeholder="Описание">
										</div>
										<div class="field num_field">
											<input type="text" placeholder="Кол-во">
										</div>
										<div class="field remove_field">
											<a href="#" class="remove">
												<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve">
												<style type="text/css">
													.st0{fill:none;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
												</style>
												<line id="XMLID_233_" class="st0" x1="20.5" y1="1.5" x2="1.5" y2="20.5"/>
												<line id="XMLID_313_" class="st0" x1="1.5" y1="1.5" x2="20.5" y2="20.5"/>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>-->
						</div>
						<div class="add_category">
							<div class="title">
								<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 297.4 297.4" style="enable-background:new 0 0 297.4 297.4;" xml:space="preserve">
								<style type="text/css">
									.st0{fill:none;stroke:#000000;stroke-width:19;stroke-linecap:round;stroke-miterlimit:10;}
								</style>
								<path class="st0" d="M206.2,275.5c-17.5,8-37,12.4-57.5,12.4c-76.9,0-139.2-62.3-139.2-139.2S71.8,9.5,148.7,9.5
									s139.2,62.3,139.2,139.2c0,10.6-1.2,20.9-3.4,30.8"/>
								<g>
									<line class="st0" x1="148.7" y1="75.1" x2="148.7" y2="222.3"/>
									<line class="st0" x1="222.3" y1="148.7" x2="75.1" y2="148.7"/>
								</g>
								</svg>
								<span>Добавить категорию продуктов</span>
							</div>
							<ul class="list scrollbar-inner">
                                <li class="hide"><a data-id="13" href="#">Рыба и морепродукты</a></li>
                                <?
                                    foreach($categories as $id=>$name){
                                ?>
                                <li><a data-id="<?=$id?>" href="#"><?=$name?></a></li>
                                <?}?>
							
							</ul>
						</div>
					</div>
					<div class="nopadding col-xs-12 col-sm-12 col-md-5 pull-right">
						<div class="list_items">
							<div class="title">
								Список покупок
							</div>
							<div class="scroll_wrapper scrollbar-inner" id="result_list">
							<!--	<div class="item color_blue">
									<div class="item_title">Рыба и морепродукты</div>
								</div> -->
							</div> 
							<div class="share_tabs">
								<a href="#" class="save_all" alt="Сохранить" title="Сохранить">
									<svg version="1.1" id="Режим_изоляции"
										 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 160.2 153.9"
										 style="enable-background:new 0 0 160.2 153.9;" xml:space="preserve" width="32" heihgt="34">
									<style type="text/css">
										.st0{stroke:#000000;stroke-width:3;stroke-miterlimit:10;}
									</style>
									<path class="st0" d="M121.9,99.4c-0.5-1.6,0.1-3.3,1.4-4.3l29.9-22c4.8-3.5,6.7-9.4,4.8-15c-1.8-5.6-6.8-9.3-12.7-9.3l-37.1-0.2
										c-1.7,0-3.1-1.1-3.6-2.6L92.9,10.7C91.1,5.1,86,1.5,80.1,1.5c-5.9,0-10.9,3.6-12.8,9.2l-5.2,15.9c-0.8,2.5,0.5,5.2,3.1,6.1
										c2.5,0.8,5.2-0.5,6.1-3.1l5.2-15.9c0.8-2.5,3-2.7,3.7-2.7c0.7,0,2.9,0.2,3.7,2.7L95.4,49c1.8,5.5,6.9,9.2,12.7,9.2l37.1,0.2
										c2.6,0,3.4,2,3.7,2.7c0.2,0.6,0.7,2.8-1.4,4.3l-29.9,22c-4.7,3.4-6.6,9.4-4.9,14.9l11.3,35.4c0.8,2.5-0.9,3.9-1.4,4.3
										c-0.5,0.4-2.4,1.5-4.5,0L88,120.3c-4.7-3.4-11-3.4-15.7,0L42.1,142c-2.1,1.5-4,0.4-4.5,0c-0.5-0.4-2.2-1.8-1.4-4.3l11.3-35.4
										c1.8-5.5-0.2-11.5-4.9-14.9l-29.9-22c-2.1-1.5-1.6-3.7-1.4-4.3c0.2-0.6,1.1-2.7,3.7-2.7l37.1-0.2c2.6,0,4.8-2.2,4.8-4.8
										c0-2.6-2.2-4.8-4.8-4.8h0l-37.1,0.2C9,48.9,4,52.5,2.2,58.1c-1.8,5.6,0.1,11.5,4.8,15l29.9,22c1.3,1,1.9,2.7,1.4,4.3L27,134.8
										c-1.8,5.6,0.1,11.5,4.9,15c2.4,1.7,5.2,2.6,7.9,2.6c2.7,0,5.5-0.9,7.9-2.6l30.1-21.7c1.3-1,3.2-1,4.5,0l30.1,21.7
										c4.8,3.5,11,3.4,15.8,0c4.8-3.5,6.7-9.4,4.9-15L121.9,99.4z M121.9,99.4"/>
									</svg>
								</a>
								<a href="#"  title="Отправить на email">
									<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 392.6 376" style="enable-background:new 0 0 392.6 376;" xml:space="preserve" width="32" heihgt="30">
									<path d="M389,148.5c-1.8-3.3-4.1-6.2-7-8.6L230,12.3c-19.6-16.4-48-16.4-67.6,0L48.5,108c-6.1,5.1-6.9,14.2-1.8,20.3
										c5.1,6.1,14.2,6.9,20.3,1.8L181,34.4c8.9-7.4,21.7-7.4,30.6,0l143.6,120.6l-61,41.6c-6.6,4.5-8.2,13.4-3.8,20
										c2.8,4.1,7.3,6.2,11.9,6.2c2.8,0,5.6-0.8,8.1-2.5l53.4-36.4v143l-122-122c-12.2-12.2-28.3-18.9-45.6-18.9s-33.4,6.7-45.6,18.9
										l-15.9,15.9L23.3,145.5c-3.7-2.5-8.3-3.1-12.6-1.8c-4.2,1.4-7.6,4.7-9,8.9C0.6,155.7,0,159,0,162.3v184.4c0,7.8,3,15.1,8.6,20.6
										c2.8,2.8,6.5,4.2,10.2,4.2c3.7,0,7.4-1.4,10.2-4.2c0.1-0.1,0.2-0.2,0.2-0.3L171,225.2c6.7-6.7,15.7-10.4,25.2-10.4
										c9.5,0,18.5,3.7,25.2,10.4l122,122H86.6c-7.9,0-14.4,6.5-14.4,14.4c0,7.9,6.5,14.4,14.4,14.4h276.7c7.8,0,15-3.1,20.3-8.2
										c0.2-0.1,0.2-0.2,0.4-0.3l0.3-0.3c5.1-5.3,8.2-12.5,8.2-20.3V162.4C392.6,157.5,391.4,152.8,389,148.5L389,148.5z M28.7,326.8V184
										l85.2,57.6L28.7,326.8z M28.7,326.8"/>
									</svg>
								</a>
								<a href="#" class="remove_all" title="Очистить список">
									<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 367.5 391.7" style="enable-background:new 0 0 367.5 391.7;" xml:space="preserve" width="28" heihgt="30">
									<g>
										<path d="M353.1,60.5h-82.4V41.2c0-22.7-18.5-41.2-41.2-41.2H138c-22.7,0-41.2,18.5-41.2,41.2v19.3H14.4C6.5,60.5,0,67,0,74.9
											c0,7.9,6.5,14.4,14.4,14.4h21.9v252.2c0,27.7,22.5,50.2,50.2,50.2H281c27.7,0,50.2-22.5,50.2-50.2V135.4c0-7.9-6.5-14.4-14.4-14.4
											c-7.9,0-14.4,6.5-14.4,14.4v206.1c0,11.8-9.6,21.4-21.4,21.4H86.5c-11.8,0-21.4-9.6-21.4-21.4V89.3h288c8,0,14.5-6.5,14.5-14.4
											C367.5,67,361,60.5,353.1,60.5L353.1,60.5z M242,60.5H125.6V41.2c0-6.8,5.5-12.4,12.4-12.4h91.6c6.8,0,12.4,5.5,12.4,12.4V60.5z
											 M242,60.5"/>
										<path d="M183.8,121c-7.9,0-14.4,6.5-14.4,14.4v181.4c0,7.9,6.5,14.4,14.4,14.4c7.9,0,14.4-6.5,14.4-14.4V135.4
											C198.2,127.4,191.7,121,183.8,121L183.8,121z M183.8,121"/>
										<path d="M123.3,121c-7.9,0-14.4,6.5-14.4,14.4v181.4c0,7.9,6.5,14.4,14.4,14.4c7.9,0,14.4-6.5,14.4-14.4V135.4
											C137.7,127.4,131.2,121,123.3,121L123.3,121z M123.3,121"/>
										<path d="M244.2,121c-7.9,0-14.4,6.5-14.4,14.4v181.4c0,7.9,6.5,14.4,14.4,14.4c7.9,0,14.4-6.5,14.4-14.4V135.4
											C258.6,127.4,252.2,121,244.2,121L244.2,121z M244.2,121"/>
									</g>
									</svg>
								</a>
								<a href="#"  title="Печать">
									<svg version="1.1" id="Режим_изоляции"
										 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.5 517"
										 style="enable-background:new 0 0 473.5 517;" xml:space="preserve" width="32" heihgt="31">
									<style type="text/css">
										.st0{stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
									</style>
									<g id="X1OBjU_1_">
										<g>
											<path class="st0" d="M362.8,2.5c7.1,3.9,9.6,9.8,9.4,17.8c-0.3,21.7,0,43.3-0.2,65c0,4.6,1.3,6,5.9,6c16.2-0.3,32.3,0.3,48.5-0.2
												c23.8-0.7,43.5,19.8,43.9,39.3c0.1,4,0.6,7.9,0.6,11.9c0,64.8,0,129.7,0,194.5c0,8.4-0.9,16.7-4.9,24.2
												c-8.7,16.6-22.9,24-41.1,24.4c-7.8,0.2-15.7,0.8-23.4-0.6c-7.5-1.4-12-6.5-12.2-13.6c-0.3-7.6,4.2-13.5,11.7-15.2
												c7.4-1.7,14.9-0.6,22.4-0.7c13-0.1,17.4-4.4,17.4-17.3c0-67.2-0.1-134.3-0.1-201.5c0-10.4-5.1-15.7-15.5-15.8c-21.7,0-43.3,0-65,0
												c-12.1,0-17.7-5.6-17.7-17.7c0-21.7-0.1-43.3,0.1-65c0-4.6-1-6.4-6-6.4c-66.5,0.2-133,0.1-199.5,0c-4.5,0-6.1,1.1-6,5.9
												c0.3,16,0.3,32,0.1,48c-0.1,4.5,1.5,5.6,5.8,5.6c33.3-0.1,66.7-0.1,100,0c8.2,0,13.8,5.3,14.8,13.4c0.8,6.9-4,13.5-11.4,15.5
												c-2.3,0.7-4.6,0.7-6.9,0.7c-17.3,0-34.7,0-52,0c-43.8,0-87.7,0-131.5,0c-12.3,0-17,4.6-17.1,16.7c0,67,0,134,0,201
												c0,12.3,4.5,16.7,17,16.7c7.8,0,15.7-0.1,23.5,0.2c8,0.4,13.8,5.8,14.7,13.1c0.8,6.6-3.1,13.2-9.3,15.5c-3,1.1-6.2,1.2-9.4,1.3
												c-9.5,0.2-19,0.2-28.5-0.6c-18.6-1.6-35.7-18.9-37.5-37.3c-1.5-16.3-0.8-32.6-0.8-48.9c-0.1-53.3-0.1-106.7-0.1-160
												c0-23.7,13.1-41.3,34.6-46.5c3-0.7,5.9-0.8,8.9-0.8c16.5,0,33-0.1,49.5,0.1c4.5,0.1,6.1-1.2,6-5.9c-0.2-21.5,0.1-43-0.2-64.5
												c-0.1-8.1,2.3-14.3,9.4-18.4C194.8,2.5,278.8,2.5,362.8,2.5z"/>
											<path class="st0" d="M131.8,514.5c-7.5-3.3-10.4-9.1-10.4-17.1c0.1-68.3,0-136.6,0-204.9c0-6.6-0.1-6.6-6.6-6.6
												c-6.3,0-12.7,0-19-0.1c-9.5-0.2-15.6-6.3-15.5-15.2c0.1-8.7,6.2-14.3,15.7-14.3c93.9,0,187.9,0,281.8,0c9.2,0,15.5,6,15.6,14.6
												c0.2,8.6-6.1,14.8-15.3,15c-6.8,0.1-13.7,0.3-20.5,0c-4.3-0.2-5.8,1.1-5.8,5.6c0.2,37.5,0.1,75,0.1,112.4
												c0,31.6-0.1,63.3,0.1,94.9c0,7.4-3.4,12.3-9.4,15.8C272.5,514.5,202.2,514.5,131.8,514.5z M322.5,385.8c0-31.2-0.1-62.3,0.1-93.5
												c0-4.9-1-6.6-6.3-6.6c-53,0.2-106,0.2-158.9,0c-4.7,0-6.3,1.2-6.3,6.1c0.2,62.5,0.2,125,0,187.4c0,5,1.6,6.1,6.3,6.1
												c53-0.1,106-0.1,158.9,0c4.7,0,6.3-1.2,6.3-6.1C322.4,448.1,322.5,416.9,322.5,385.8z"/>
											<path class="st0" d="M104.1,182.7c0,10-8.2,18.1-18.2,18c-9.8-0.1-17.8-8.4-17.7-18.5c0.1-9.7,8.2-17.8,17.9-17.9
												C96,164.3,104.2,172.7,104.1,182.7z"/>
										</g>
									</g>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>