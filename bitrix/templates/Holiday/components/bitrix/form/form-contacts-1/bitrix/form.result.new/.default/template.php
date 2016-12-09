<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$cur_page = $APPLICATION->GetCurPage(); 
$FORM_ID = $arParams["WEB_FORM_ID"];
$rsForm = CForm::GetByID($FORM_ID);
$arForm = $rsForm->Fetch();?>
<form novalidate name="<?=$arForm["SID"]?>" action="<?=$cur_page?>" method="POST" enctype="multipart/form-data">
<input type="hidden" name="WEB_FORM_ID" value="<?=$arParams["WEB_FORM_ID"]?>"/>

<?=bitrix_sessid_post()?>

<?  if ($arResult["isFormErrors"] == "Y"){
    echo $arResult["FORM_ERRORS_TEXT"];} ?>
<?/*echo "<pre>";
print_r($arResult);
echo "</pre>";*/
?>

<? /*endif;;*/?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>

<div class="row">
    <div class="col-xs-12 col-sm-6">
        <?$APPLICATION->ShowViewContent('left');?>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?$APPLICATION->ShowViewContent('right');?>
    </div>
    <svg class="positioned hidden-xs hidden-sm" version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 182.4 137" style="enable-background:new 0 0 182.4 137;" xml:space="preserve"  width="181" height="137">
    <style type="text/css">
    .st0{fill:#FFFFFF;}
    .st1{fill:#68170F;}
    </style>
    <rect x="4.4" y="5" class="st0" width="171.2" height="125.2"/>
    <path class="st1" d="M173.6,0H8.9C4,0,0,4,0,8.9v119.3c0,4.9,4,8.9,8.9,8.9h164.6c4.9,0,8.9-4,8.9-8.9V8.9c0-2.3-0.9-4.6-2.6-6.2
    C178.1,0.9,175.9,0,173.6,0z M171.1,124.6c0,0.7-0.5,1.2-1.2,1.2H12.4c-0.7,0-1.2-0.5-1.2-1.2V12.4c0-0.7,0.5-1.2,1.2-1.2h149.1
    c0.5,0,0.9,0.3,1.1,0.8c0.2,0.5,0,1-0.3,1.3L92.9,72.6c-0.4,0.4-1.1,0.4-1.5,0L40.9,29.5c-2.4-2-5.9-1.7-7.9,0.6
    c-1,1.1-1.5,2.6-1.3,4.1c0.1,1.5,0.8,2.9,2,3.8L88.5,85c0,0,0,0,0,0c0.1,0.1,0.1,0.1,0.2,0.2c0.1,0,0.1,0.1,0.2,0.1l0,0
    c0.1,0,0.1,0.1,0.2,0.1c0.1,0,0.1,0.1,0.2,0.1c0,0,0,0,0.1,0c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0,0.1,0,0.2,0.1c0.1,0,0.1,0,0.2,0.1
    c0,0,0.1,0,0.1,0c0.1,0,0.2,0.1,0.3,0.1c0,0,0,0,0.1,0c0,0,0,0,0.1,0l0.3,0.1c0.1,0,0.2,0,0.2,0c0,0,0,0,0.1,0c0.1,0,0.2,0,0.2,0
    c0.1,0,0.3,0,0.5,0.1c0.3,0,0.6,0,0.9,0c0,0,0,0,0,0c0,0,0,0,0.1,0c0.1,0,0.3,0,0.4-0.1c0,0,0.1,0,0.1,0c0,0,0.1,0,0.1,0
    c0,0,0.1,0,0.1,0l0.3-0.1c0,0,0,0,0.1,0c0.1,0,0.1-0.1,0.2-0.1c0,0,0.1,0,0.2-0.1c0.1,0,0.1-0.1,0.2-0.1c0,0,0.1,0,0.1,0
    c0.1,0,0.3-0.1,0.4-0.2c0,0,0,0,0.1,0c0.1-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0.1,0c0.1,0,0.2-0.1,0.3-0.2l0,0c0.1-0.1,0.1-0.1,0.2-0.2
    c0,0,0,0,0,0c0,0,0,0,0,0l73.4-62.8c0.4-0.3,0.8-0.4,1.3-0.2c0.4,0.2,0.7,0.6,0.7,1.1V124.6z"/>
    </svg>
</div>

<?
########## GET FORM DATA ##########
?>
<?//print_r($arResult["QUESTIONS"])?>


<?$this->SetViewTarget("left");?>

<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
    if($arQuestion["STRUCTURE"][0]["FIELD_ID"]!=15){?>
                    <div class="field">
                        <?=$arQuestion["HTML_CODE"]?>
                        <?if ($arQuestion["REQUIRED"] == "Y"):?><span><?=$arResult["REQUIRED_SIGN"];?></span><?endif;?>
                    </div>
    <?}?>                
<?}?>
<div class="field">
    <div class="add_file">
    <span>Прикрепить файл</span>
    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 345 370.6" style="enable-background:new 0 0 345 370.6;" xml:space="preserve">
    <g>
    <path d="M202.8,319.4c-7.7,0-14,6.3-14,14c0,7.7,6.3,14,14,14H331c7.7,0,14-6.3,14-14V110.7c0-4-1.6-7.7-4.4-10.3L235.7,3.7
    c-2.6-2.3-6.1-3.7-9.6-3.7H69.9c-7.7,0-14,6.3-14,14v151.5c0,7.7,6.3,14,14,14c7.7,0,14-6.3,14-14V28h111.9v121.2
    c0,7.7,6.3,14,14,14h104.9c0.7,0,1.6,0,2.3-0.2v156.4L202.8,319.4L202.8,319.4z M314.7,135.2h-90.9V30.8l93.2,86v18.6
    C316.3,135.2,315.4,135.2,314.7,135.2L314.7,135.2z M0,298.4c0-7.7,6.3-14,14-14h42v-44.3c0-7.7,6.3-14,14-14c7.7,0,14,6.3,14,14
    v44.3h46.6c7.7,0,14,6.3,14,14c0,7.7-6.3,14-14,14H83.9v44.3c0,7.7-6.3,14-14,14c-7.7,0-14-6.3-14-14v-44.3H14
    C6.3,312.4,0,306.1,0,298.4L0,298.4z M0,298.4"/>
    </g>
    </svg>
    <div class="clear"></div>
    </div>
    <input type="file" name="form_file_30">
</div>
                            
<?$this->EndViewTarget();?>
   
<?$this->SetViewTarget("right");?>
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
           
            if($arQuestion["STRUCTURE"][0]["FIELD_ID"]==15){?>
                <div class="field">
                     <?=$arQuestion["HTML_CODE"]?>
                </div>
            <?}?>
            
<?}?>
    <input class="pull-left margin_top" name="web_form_submit" type="submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">
    <input type="hidden" name="web_form_apply" value="Y" />

<?$this->EndViewTarget();?>
<?
} //endif (isFormNote)
?>
</form>

<div class="popup_window" id="popup_feedback_sendOK" style="display: none;">
			<div class="popup_container">
				<div class="close">
					<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve">
					<style type="text/css">
						.st0{fill:none;stroke:#000000;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
					</style>
					<line id="XMLID_233_" class="st0" x1="20.5" y1="1.5" x2="1.5" y2="20.5"></line>
					<line id="XMLID_313_" class="st0" x1="1.5" y1="1.5" x2="20.5" y2="20.5"></line>
					</svg>
				</div>
				<div class="container-fluid">
					Спасибо, Ваше сообщение отправлено!
				</div>
			</div>
</div>
