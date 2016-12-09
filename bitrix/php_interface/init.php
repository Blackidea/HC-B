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
}


?>