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
//use Bitrix\Highloadblock as HL; 
//use Bitrix\Main\Entity; 
$this->setFrameMode(true);

if(count($arResult["ITEMS"])>0)
{
$vacanciesCount = count($arResult["ITEMS"]);    
    ?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>


<div class="search_reslut">Найдено вакансий: <?=$vacanciesCount?> </div>
<?foreach($arResult["ITEMS"] as $arItem):?>
<? 
//echo "<pre>";
//print_r($arItem);
//echo "</pre>";


    $hlArray = holiday::getHload($arItem['PROPERTIES']['city']['USER_TYPE_SETTINGS']['TABLE_NAME']);
    //print_r($hlArray);
    $data = holiday::getHloadDataByXmlId($hlArray, $arItem['PROPERTIES']['city']['VALUE']);
    //print_r($data);
    

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

<div class="item">
    <div class="container-fluid">
        <div class="row">
            <div class="text col-md-9">
                <div class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?> "><?echo $arItem["NAME"]?></a></div>
                <div class="price"><?=$arItem['PROPERTIES']['pay_level_text']['VALUE'];?></div>
                <div class="desc"><?echo $arItem["PREVIEW_TEXT"]?></div>
                <div class="city"><?= $data[0]['UF_NAME'];?> |<?= FormatDate('j F Y', MakeTimeStamp($arItem['DATE_CREATE']));?>  </div>
            </div>
            <div class="logo col-md-3">
                <a href="#"><img src="img/logo.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<?endforeach;?>							
<div class="text-center">
    <a href="#" class="button">Показать еще</a>
</div>
<?}
else{
    echo "Вакансий по Вашему запросу не найдено";
    
}
?>
					
                    