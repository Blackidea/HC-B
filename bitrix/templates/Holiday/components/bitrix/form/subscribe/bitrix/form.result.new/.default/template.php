<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<section class="subscribe">
    <div class="conteiner-fluid">
    <?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

    <div class="title">
        <?
            if ($arResult["isFormDescription"] == "Y")
            {
                echo $arResult["FORM_DESCRIPTION"];
            }
        ?>
    </div>
    <?=$arResult["FORM_HEADER"]?>
           	<?
        	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
        	{
        	?>
       		<?=$arQuestion["HTML_CODE"]?>
  		
        	<?
        	} //endwhile
            ?>
        	<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
        
    </div>
</section>