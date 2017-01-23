<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("holiday", "genJsonData"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("holiday", "genJsonData"));
 
class holiday{
    
   
   static function addItem($param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8){
        //echo $param7."<br>";
        $IBLOCK_ID = 26;
        $tags = $param7;
        $geo  = $param2;
        $name = $param8;
        
        
    $el = new CIBlockElement;
        // echo $param1."<br>";
       // echo $param2."<br>";
       // echo $param3."<br>";                        
        global $APPLICATION, $USER;
        $PROP = array();
        $PROP[111] = $param1; ## Брэнд
        $PROP[112] = $geo;    ## Расположение
        $PROP[113] = $param3; ## Время открытия
        $PROP[114] = $param4; ## Время закрытия
        $PROP[115] = $param5; ## Название магазина
        $PROP[116] = $param6; ## ID в файле импорта
        $PROP[117] = $tags;   ## Тэги
        
        
       
        $arLoadProductArray = Array(
          "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
          "PROPERTY_VALUES"=> $PROP,
          //"IBLOCK_SECTION_ID" => $param3,          // элемент лежит в корне раздела
          "IBLOCK_ID"      => $IBLOCK_ID,
          
          "NAME"           => $name,
          "ACTIVE"         => "Y",            // активен
          "PREVIEW_TEXT"   => '',
          "PREVIEW_TEXT_TYPE" => 'html',
          "DETAIL_TEXT"    => '',
          "DETAIL_TEXT_TYPE" => 'html',
          //"DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/images/products/no-image.jpg"),
          "DETAIL_PICTURE" => '',
          //"PREVIEW_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/images/products/no-image.jpg")
          "PREVIEW_PICTURE" => ''
          );
        
          if($last_el_id = $el->Add($arLoadProductArray))
            {
            //  echo 'New ID: ' . $last_el_id . '<br>';
//        
//              $arFields = array(
//                 "ID" => $last_el_id, 
//                 "VAT_INCLUDED" => "Y",
//                 "QUANTITY" => $param7
//              );
//        
//              if(CCatalogProduct::Add($arFields))              {
//                echo "Добавили параметры товара к элементу каталога " . $last_el_id . '<br>';
//             
//                $arFields = Array(
//                "PRODUCT_ID" => $last_el_id,
//                "CATALOG_GROUP_ID" => 1,
//                "PRICE" => $param5,
//                "CURRENCY" => "RUB",
//                
//                );
//                CPrice::Add($arFields);
//             }
//             else
//                echo 'Ошибка добавления параметров товара<br>';
          }
       else{
          echo 'Error: ' . $el_ob->LAST_ERROR  . '<br>';
       }
        
    }
   
   function genJsonData($arFields){
       if($arFields["IBLOCK_ID"]==23){  // продукты, категории
            $result = array();
            CModule::IncludeModule('iblock');
            $yvalue = '23';
            $arSelect = Array();
            $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNextElement())
            {
             $arFields = $ob->GetFields();
             $arProps = $ob->GetProperties(); 
             $img = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);            
             $result[]= array('ID'=>$arFields['ID'],
             'NAME'=>$arFields['NAME'],
             'COLOR'=>$arProps['color']['VALUE'],
             'IMAGE'=>$img['SRC'],
             'TYPE'=>$arProps['products_list_str']['VALUE']);
             }
            
             $file = $_SERVER['DOCUMENT_ROOT'].'/buy-list/js/buy_list.json';
            
             $current = json_encode($result, JSON_UNESCAPED_UNICODE);
            
             if(file_put_contents($file, $current)){
                    
             }
             else{
                die("No!");
             }
        }
        elseif($arFields["IBLOCK_ID"]==26){
            $result = array();
            CModule::IncludeModule('iblock');
            $yvalue = '26';
            $arSelect = Array();
            $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNextElement())
            {
             $arFields = $ob->GetFields();
             $arProps = $ob->GetProperties(); 
             $data = explode(',',$arProps['GEO']['VALUE']);
             $data['GEO_LATITUDE']  = $data[0];
             $data['GEO_LONGITUDE'] = $data[1];
             //$img = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);            
             $result[]= array(
             'STORE'=>$arProps['IMPORT_ID']['VALUE'],
             'STORE_NAME'=>$arProps['STORE_NAME']['VALUE'],
             'LABEL_NAME'=>$arProps['LABEL_NAME']['VALUE'],
             'ADDRESS'=>$arFields['NAME'],
             'GEO_LATITUDE'=>$data['GEO_LATITUDE'],
             'GEO_LONGITUDE'=>$data['GEO_LONGITUDE'],
             'OPEN_TIME'=>$arProps['OPEN_TIME']['VALUE'],
             'CLOSE_TIME'=>$arProps['CLOSE_TIME']['VALUE'],
             'TAGS'=>$arProps['TAGS']['VALUE'],
             'PHONE'=>'8-800-250-25-22');
             }
            /*  echo "<pre>";
             PRINT_R($result);
             echo "</pre>";
            echo "<pre>";
             PRINT_R($arProps);
             echo "</pre>";
             
             die();*/
            
            
            
            
             $file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/Holiday/js/map_base.json';
            
             $current = json_encode($result, JSON_UNESCAPED_UNICODE);
            
             if(file_put_contents($file, $current)){
                    
             }
             else{
                die("No!");
             }
        
        //die();
        }
}

    static function addUserList($userList){
        
        CModule::IncludeModule('iblock');
        
        $IBLOCK_ID = 24;
        global $USER;
        $userID     = $USER->GetID();
        $userLogin  = $USER->GetLogin();
        
        $el = new CIBlockElement;

        $PROP = array();
        $PROP[106] = $userID;  
        $PROP[107] = $userList ; 
        
        $arLoadProductArray = Array(
          "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
          "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
          "IBLOCK_ID"      => $IBLOCK_ID,
          "PROPERTY_VALUES"=> $PROP,
          "NAME"           => "Список покупок пользователя ".$userLogin."",
          "ACTIVE"         => "Y",            // активен
          "PREVIEW_TEXT"   => "",
          "DETAIL_TEXT"    => "",
          "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
          );
        
        if($PRODUCT_ID = $el->Add($arLoadProductArray))
          echo "New ID: ".$PRODUCT_ID;
        else
          echo "Error: ".$el->LAST_ERROR;
                
    }
    static function getAllData($hlblock){
    
        if (isset($hlblock['ID'])){
        $arValues = array();
        $entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();       
        
        $rsPropEnums = $entity_data_class::getList();
            while ($arEnum = $rsPropEnums->fetch()) {
            
               $arValues[] = $arEnum;
                
            }  
        }
        else{
            echo "HL data is not defined!";
        }
        return $arValues;
    }
    static function getDurations(){
        CModule::IncludeModule('iblock');
        $result = array();
        $count = 0;
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_DURATION");
        $arFilter = Array("IBLOCK_ID"=>IntVal("19"), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement())
        {
          array_push($result, $ob->fields['PROPERTY_DURATION_VALUE']);
        }
    return $result;
    }
    static function  getHload($table_name){
        //$arOneSKU = $arResult['DISPLAY_PROPERTIES']['COLOR'];
        $hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getList(
        array("filter" => array(
            'TABLE_NAME' => $table_name
        ))
        )->fetch();
       return $hlblock; 
    }      
    static function getHloadDataByXmlId($hlblock, $UF_XML_ID){
        if (isset($hlblock['ID'])){
        $arValues = array();
        $entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        
        $rsPropEnums = $entity_data_class::getList(array('filter'=>array('UF_XML_ID'=>$UF_XML_ID)));
            while ($arEnum = $rsPropEnums->fetch()) {
            
               $arValues[] = $arEnum;
                
            }  
        }
        
    return $arValues;
    }
    static function getVacanciesCount(){
        CModule::IncludeModule('iblock');
        $count = 0;
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
        $arFilter = Array("IBLOCK_ID"=>IntVal("18"), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement())
        {
            $count++;
        }
    return $count;
    }
    

}


?>