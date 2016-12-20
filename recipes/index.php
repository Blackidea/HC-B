<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рецепты");
if (!CModule::IncludeModule('highloadblock')) {
    echo 'highloadblock module not found';
    die();
}
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

$hlArray = holiday::getHload('b_hlbd_kategoriiretseptov');
$categories  = holiday::getAllData($hlArray);

$hlArray = holiday::getHload('b_hlbd_type');
$type_kitchen  = holiday::getAllData($hlArray);

$durations = holiday::getDurations();


GLOBAL $arrFilter;
if (!is_array($arrFilter))
   $arrFilter = array("LOGIC" => "AND");
   $props=array();
   if($_GET['kyhnia']!=""&&$_GET['kyhnia']!="none"){
    $props["PROPERTY_TYPE"]=$_GET['kyhnia'];
   }
   if($_GET['time_max']!="" && $_GET['time_min']!=""){
    $props[">=PROPERTY_DURATION"]=$_GET['time_min'];
    $props["<=PROPERTY_DURATION"]=$_GET['time_max'];
   }
   if($_GET['uroven']!=""){
    $props["PROPERTY_HARDSHIP"]=$_GET['uroven'];
   }
   $arrFilter[]=$props;
   
   $filter_category = array("LOGIC" => "OR");
   foreach($categories as $index=>$value){
       if($_GET['cat_'.$index.'']!=""){
            array_push ($filter_category, array('PROPERTY_CATEGORY'=> $_GET['cat_'.$index.''])); 
       }
   }
   
  
GLOBAL $arrFilter2;

$arrFilter2 = 
        array('ACTIVE' => 'Y');

array_push ($arrFilter2, $filter_category);


array_push($arrFilter2 , $arrFilter);




//echo "<pre>";
//print_r($categories);
//echo "</pre>";
?>
<!-- close container -->
</div>
<!-- close container -->
<section class="recepts recepts_list">
			<h2>Рецепты</h2>
			<div class="filter_recepts">
				<div class="container">
					<div class="row">
                        <form action="/recipes/index.php" method="GET">
    						<div class="col-md-6 border_right">
    							<div class="title">Категория</div>
    							<div class="chekbox_list">
                                    <?foreach($categories as $index=>$categoryData):?>
                                            <?//if($categoryData['UF_XML_ID']==$_GET['city_select']):?>
                                            <div class="field">
                                                <input type="checkbox" class="checkbox" name="cat_<?=$index?>" id="cat_<?=$index?>" value="<?=$categoryData['UF_XML_ID'];?>">
                                                <label for="cat_<?=$index?>"><?=$categoryData['UF_NAME'];?></label>
                                            </div>
                                            <?//endif;?>
                                    <?endforeach;?>
    								
    							</div>
    						</div>
    						<div class="col-md-3">
    							<div class="title">Сложность</div>
                                <input type="hidden" name="uroven" value="3"/>
    							<div class="check_ratio">
    								<a class="active" href="#">
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    								</a>
    								<a href="#">
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    								</a>
    								<a href="#">
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    									<span>
    										<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    											 viewBox="360.9 161 236.2 208.6" xml:space="preserve">
    											<g>
    												<path d="M597.1,247.6c0-30.4-24.7-55.1-55.1-55.1c-1.3,0-2.7,0.1-4,0.1C524.9,173,502.8,161,479,161s-45.9,12-59,31.6
    													c-1.3-0.1-2.7-0.1-4-0.1c-30.4,0-55.1,24.7-55.1,55.1c0,27.7,20.6,50.7,47.2,54.5v47.1c0,11.2,9.1,20.4,20.4,20.4h100.8
    													c11.2,0,20.4-9.1,20.4-20.4v-47.1C576.5,298.3,597.1,275.3,597.1,247.6L597.1,247.6z M529.4,353.9H428.6c-2.5,0-4.7-2.2-4.7-4.7
    													v-47.1c7.7-1.1,15-3.8,21.6-8c10.1,5.5,21.6,8.5,33.6,8.5s23.5-3.1,33.6-8.5c6.6,4.2,13.9,6.9,21.6,8v47.1
    													C534.1,351.8,532,353.9,529.4,353.9L529.4,353.9z M542,287c-5.3,0-10.4-1-15.1-3c9.5-8.7,16.8-20.1,20.4-33.2
    													c1.2-4.2-1.3-8.5-5.5-9.7s-8.5,1.3-9.6,5.5c-6.6,23.8-28.4,40.4-53.1,40.4s-46.5-16.6-53.1-40.4c-1.2-4.2-5.5-6.6-9.7-5.5
    													c-4.2,1.2-6.6,5.5-5.5,9.7c3.6,13.1,10.8,24.4,20.4,33.2c-4.7,2-9.8,3-15.1,3c-21.7,0-39.4-17.7-39.4-39.4s17.7-39.4,39.4-39.4
    													c2.2,0,4.5,0.2,6.7,0.6c3.3,0.6,6.5-1,8.2-3.9c9.8-17.4,28.2-28.2,48.1-28.2s38.3,10.8,48.1,28.2c1.6,2.9,4.9,4.4,8.2,3.9
    													c2.3-0.4,4.5-0.6,6.7-0.6c21.7,0,39.4,17.7,39.4,39.4C581.4,269.3,563.7,287,542,287L542,287z"/>
    											</g>
    										</svg>
    									</span>
    								</a>
    							</div>
    							<div class="title">Кухня</div>
    							<select name="kyhnia" data-select>
                                            <option value="none">Выбрать</option>
                                            <?foreach($type_kitchen as $index=>$type_kitchenData):?>
    										  <option 
                                              <?//if($type_kitchenData['UF_XML_ID']==$_GET['city_select']):?>
                                               default
                                              <?//endif;?>
                                              value="<?=$type_kitchenData['UF_XML_ID'];?>"><?=$type_kitchenData['UF_NAME'];?></option>
                                            <?endforeach;?>
    							
    							</select>
    						</div>
    						<div class="col-md-3">
    							<div class="title">Время приготовления</div>
    							<div class="slider_time">
    								<div class="slider_range"></div>
    								<span class="slider_range_min pull-left"> <i><?echo min($durations);?></i> мин.</span>
    								<span class="slider_range_max pull-right"><i><?echo max($durations);?></i> мин.</span>
    								<div class="clear"></div>
    							</div>
                                <input type="hidden" name="time_max" value="<?=max($durations);?>"/>
                                <input type="hidden" name="time_min" value="<?=min($durations);?>"/>
                                
    							<input type="submit" value="Подобрать">
    						</div>
                        </form>
					</div>
				</div>
			</div>
			<div class="container">
				<!-- RECEPT ITEMS-->
				<div class="recepts_slider row">
					<!-- RECEPT ITEM-->
                    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"recipes", 
	array(
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
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => array(
			0 => "CODE",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "",
		),
		"FILTER_NAME" => "arrFilter2",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "recipes",
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
		"PAGER_TITLE" => "Рецепты",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "duration",
			1 => "ingredients",
			2 => "category",
			3 => "type",
			4 => "hardship",
			5 => "",
		),
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
		"COMPONENT_TEMPLATE" => "recipes"
	),
	false
);?>
					
					
				</div>
                <div class="loading-gif">
                    <img src="<?=$APPLICATION->GetTemplatePath("img")?>/loading.gif"/>
                </div>
                <?if($_POST['my_count']>0):?>
				<div class="text-center">
					<a href="#" class="button js-more-news">Показать еще</a>
				</div>
                <?endif;?>
			</div>
		</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>