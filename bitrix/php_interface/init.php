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
   
   function genJsonData(){
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
 /*       $portfolio = array();
        if($arProps['service_list']['VALUE']!=""){
            $arServices = array();
            foreach($arProps['service_list']['VALUE'] as $key=>$value){
            $arServices[] =$value;
            }
            
        } */
        /*if($arProps['portfolio']['VALUE']!=""){
            foreach($arProps['portfolio']['VALUE'] as $key=>$value){
            
                $portfolioArr = CFile::GetFileArray($value);
                
                $portfolioImg = $portfolioArr['SRC'];
                
                $portfolio[] = $portfolioImg;
               
            }
        }
        if($arProps['map']['VALUE']!=''){
            $coordinates = $arProps['map']['VALUE'];
            $coordinates = explode(',' ,$coordinates);
            
        }*/
    //    $details = "".$arFields['ID']."/";
        
        $result[]= array('ID'=>$arFields['ID'],
        'NAME'=>$arFields['NAME'],
        'COLOR'=>$arProps['color']['VALUE'],
        'IMAGE'=>$img['SRC'],
        'TYPE'=>$arProps['products_list_str']['VALUE']);
        }
        //echo json_encode($result);
        //$file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/Holiday/buy_listData.json';
        $file = $_SERVER['DOCUMENT_ROOT'].'/buy-list/js/buy_list.json';
       // $current = json_encode($result, JSON_NUMERIC_CHECK);
        $current = json_encode($result, JSON_UNESCAPED_UNICODE);
        
    if(file_put_contents($file, $current)){
            
    }
    else{
        die("No!");
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