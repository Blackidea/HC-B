<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Импорт");
?>
<?


$str = file_get_contents('map_base_rus.json'); 
//echo $str;
//echo mb_detect_encoding($str);

//$html_utf8 = iconv('ASCII', 'UTF-8//IGNORE', $str);
//echo mb_detect_encoding($html_utf8); 
$json = json_decode($str, true); // decode the JSON into an associative array
//print_r($json);
//echo $json;
//print_r($json);
echo '<pre>' . print_r($json, true) . '</pre>';

/*
foreach ($json as $index=>$data){
        holiday::addItem(
        $data['LABEL_NAME'],
        $data['GEO'] = $data['GEO_LATITUDE'].','.$data['GEO_LONGITUDE'],
        $data['OPEN_TIME'],
        $data['CLOSE_TIME'],
        $data['STORE_NAME'],
        $data['STORE'],
        $data['TAGS'],
        $data['ADDRESS']);
}

*/

/*CModule::IncludeModule('iblock');
        $yvalue = '26';
        $arSelect = Array();
        $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement())
        {
         $arFields = $ob->GetFields();
         $arProps = $ob->GetProperties(); 
         
         echo '<pre>' . print_r($arFields, true) . '</pre>';         
         echo '<pre>' . print_r($arProps, true) . '</pre>';

        } */
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>