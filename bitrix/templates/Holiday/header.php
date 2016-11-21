<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=$APPLICATION->GetTemplatePath("")?>css/app.min.css">
<link rel="stylesheet" type="text/css" href="<?=$APPLICATION->GetTemplatePath("")?>css/fonts.css">
<link rel="stylesheet" type="text/css" href="<?=$APPLICATION->GetTemplatePath("")?>css/reset.css">
<link rel="stylesheet" type="text/css" href="<?=$APPLICATION->GetTemplatePath("")?>css/bootstrap.css">
<?$APPLICATION->ShowHead()?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<body class="preload">
		<!-- HEADER -->
		<header>
			<div class="container-fluid">
				<div class="row user_menu">
					<div class="col-sm-7 col-md-7 col-lg-8 nopadding hidden-xs">
                    <?$APPLICATION->IncludeFile(
            			$APPLICATION->GetTemplatePath("include_areas/header_icons.php"),
            			Array(),
            			Array("MODE"=>"html")
            		);?>
					</div>
					<div class="col-sm-5 col-md-5 col-lg-4 user_block hidden-xs">
						<a href="#" class="city">Новосибирск</a>
						<div class="user_autorization">
							<a href="#" class="user_profile">Личный кабинет</a>
							<a href="#">Выход</a>
						</div>
					</div>
					<!-- START MOBILE -->
					<div class="col-xs-2 visible-xs">
						<a href="#" class="mobile_button">
							<span></span>
							<span></span>
							<span></span>
						</a>
					</div>
					<div class="col-xs-4 visible-xs">
						<div class="mobile_logo"><a href="#"><img src="<?=$APPLICATION->GetTemplatePath("")?>img/logo_mobile.svg" alt=""></a></div>
					</div>
					<div class="col-xs-6 visible-xs">
						<a href="#" class="change_store">Сменить магазин</a>
					</div>
				</div>
			</div>
			<!-- MENU -->
			<div class="container hidden-xs">
				<div class="row">
                <?$APPLICATION->IncludeComponent(
                	"bitrix:menu",
                	"main_top",
                	Array(
                		"ROOT_MENU_TYPE" => "top", 
                		"MAX_LEVEL" => "1", 
                		"CHILD_MENU_TYPE" => "left", 
                		"USE_EXT" => "Y", 
                		"MENU_CACHE_TYPE" => "A",
                		"MENU_CACHE_TIME" => "3600",
                		"MENU_CACHE_USE_GROUPS" => "Y",
                		"MENU_CACHE_GET_VARS" => Array()
                	)
                );?>
					<div class="col-sm-1 col-md-1 col-xs-1 nopadding">
						<a class="search_button" href="#"></a>
					</div>
				</div>
			</div>
		</header>
        
        
<!--<div id="header_menu"> </div> -->





<?/*$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	".default",
	Array(
		"PAGE" => "/search/" 
	)
);*/?>

<?/*$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	".default",
	Array(
		"REGISTER_URL" => "/auth/", 
		"PROFILE_URL" => "/personal/profile/" 
	)
);*/?>
      
		

      
      