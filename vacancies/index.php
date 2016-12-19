<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");
?><?
if (!CModule::IncludeModule('highloadblock')) {
    echo 'highloadblock module not found';
    die();
}
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;


$hlArray = holiday::getHload('b_hlbd_cityvacancy');
$cities  = holiday::getAllData($hlArray);

$hlArray = holiday::getHload('b_hlbd_shop');
$shops   = holiday::getAllData($hlArray);

$hlArray = holiday::getHload('b_hlbd_prof');
$profs   = holiday::getAllData($hlArray);

$hlArray = holiday::getHload('b_hlbd_urovenzarplaty');
$zp      = holiday::getAllData($hlArray);

$hlArray = holiday::getHload('b_hlbd_grafik');
$grafik  = holiday::getAllData($hlArray);


GLOBAL $arrFilter;
if (!is_array($arrFilter))
   $arrFilter = array("LOGIC" => "AND");
   $props=array();
   if($_GET['city_select']!=""){
    $props["PROPERTY_CITY"]=$_GET['city_select'];
   }
   if($_GET['store_select']!=""){
    $props["PROPERTY_SHOP"]=$_GET['store_select'];
   }
   if($_GET['zarplata']!=""){
   
    $props["PROPERTY_PAY_LEVEL"]=$_GET['zarplata'];
   }
   $arrFilter[]=$props;
   
   $filter_grafik = array("LOGIC" => "OR");
   foreach($grafik as $index=>$value){
       if($_GET['grafik_'.$index.'']!=""){
            array_push ($filter_grafik, array('PROPERTY_GRAFIK'=> $_GET['grafik_'.$index.''])); 
       }
   }
   
  $filter_profs = array("LOGIC" => "OR");
  foreach($profs as $index=>$value){
       if($_GET['prof_'.$index.'']!=""){
            array_push ($filter_profs, array('PROPERTY_PROF'=> $_GET['prof_'.$index.''])); 
       }
   }
  
GLOBAL $arrFilter2;

$arrFilter2 = 
        array('ACTIVE' => 'Y');

array_push ($arrFilter2, $filter_grafik);

array_push ($arrFilter2, $filter_profs);

array_push($arrFilter2 , $arrFilter);

?>

<!-- VAKANSY -->
		<section class="vakansy">
			<div class="container">
				<h2>Вакансии</h2>
				<div class="row">
					<div class="col-sm-4 col-md-3">
						<a href="#" class="visible-xs button show_filter">Фильтр</a>
						<div class="vakansy_filter">
							<a href="#" class="go_back visible-xs ">
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
								<span>Назад</span>
							</a>
							<form action="/vacancies/index.php" method="GET">
								<div class="filter_item">
									<div class="title">Город</div>
									<select data-select name="city_select">
                                        <?foreach($cities as $index=>$cityData):?>
										  <option 
                                          <?if($cityData['UF_XML_ID']==$_GET['city_select']):?>
                                           selected
                                          <?endif;?>
                                          value="<?=$cityData['UF_XML_ID'];?>"><?=$cityData['UF_NAME'];?></option>
                                        <?endforeach;?>
										
									</select>
								</div>
								<div class="filter_item">
									<div class="title">Выбрать магазин</div>
									<select data-select name="store_select">
                                    
                                    <?foreach($shops as $index=>$shopData):?>
										<option 
                                        <?if($shopData['UF_XML_ID']==$_GET['store_select']):?>
                                           selected
                                         <?endif;?>
                                        value="<?=$shopData['UF_XML_ID'];?>"><?=$shopData['UF_NAME'];?></option>
									 <?endforeach;?>	
									</select>
								</div>
								<div class="filter_item">
                                    <div class="title">Профобласть</div>
                                     <?foreach($profs as $index=>$profsData):?>
								       <input 
                                       <?if($profsData['UF_XML_ID']==$_GET['prof']):?>
                                           checked
                                       <?endif;?>
                                       type="checkbox" class="checkbox" name="prof_<?=$index?>" id="prof_<?=$index?>" value="<?=$profsData['UF_XML_ID'];?>">
									   <label for="prof_<?=$index?>"><?=$profsData['UF_NAME'];?></label>
									 <?endforeach;?>
									
									
									
								</div>
								<div class="filter_item">
									<div class="title">Зарплата</div>
                                    <?foreach($zp as $index=>$zpData):?>
								       <input
                                       <?if($zpData['UF_XML_ID']==$_GET['zarplata']):?>
                                           checked
                                       <?endif;?>
                                        type="radio" class="radio" name="zarplata" id="zp_<?=$index?>" value="<?=$zpData['UF_XML_ID'];?>">
									   <label for="zp_<?=$index?>"><?=$zpData['UF_NAME'];?></label>
								    <?endforeach;?>									
								</div>
								<div class="filter_item nopadding">
									<div class="title">График работы</div>
                                    <?foreach($grafik as $index=>$grafikData):?>
								       <input type="checkbox" class="checkbox" name="grafik_<?=$index?>" id="graf_<?=$index?>" value="<?=$grafikData['UF_XML_ID'];?>">
									   <label for="graf_<?=$index?>"><?=$grafikData['UF_NAME'];?></label>
								    <?endforeach;?>										
								</div>
								<div class="border"></div>
								<input type="submit" value="Подобрать">
							</form>
						</div>
					</div>
                    <div class="col-sm-8 col-md-9">
						<div class="vakansy_list">
                        <?$vacanciesCount = holiday::getVacanciesCount();?>
							
                            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"vacancies", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
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
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DATE_ACTIVE_FROM",
			1 => "ACTIVE_FROM",
			2 => "DATE_CREATE",
			3 => "",
		),
		"FILTER_NAME" => "arrFilter2",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "vacancies",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
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
		"PROPERTY_CODE" => array(
			0 => "city",
			1 => "shop",
			2 => "",
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
		"COMPONENT_TEMPLATE" => "vacancies"
	),
	false
);?>
                        </div>
					</div>
				</div>
			</div>
		</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>