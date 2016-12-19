<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
 
 
class holiday{
   
    
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