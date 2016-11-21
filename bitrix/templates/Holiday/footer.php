<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?><!-- FOOTER -->
		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col_footer">
						<div class="logo_contain">
							<a href="#" class="hidden-xs hidden-sm"><img src="<?=$APPLICATION->GetTemplatePath("")?>img/logo.svg" alt=""></a>
							<div class="phone">
								телефон горячей линии
								<span>8-800-765-44-96</span>
							</div>
						</div>
						<div class="social_buttons">
							<div class="app_buttons">
								<a href="#" class="app_btn">
									<div class="icon apple"></div>
									<div class="text">
										Скачайте в 
										<span>App Store</span>
									</div>
								</a>
								<a href="#" class="app_btn">
									<div class="icon google"></div>
									<div class="text">
										Скачайте в 
										<span>App Store</span>
									</div>
								</a>
								<div class="hidden_phone">8-800-765-44-96</div>
							</div>
							<div class="social_list">
								<a class="odnoklassniki" href="#"></a>
								<a class="vk" href="#"></a>
								<a class="fb" href="#"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col_footer col_hover hidden-xs">
						<div class="title_bg">
							Соискателям
							<div class="icon_manager"></div>
						</div>
						<ul class="footer_menu">
							<li><a href="#">Истории успеха</a></li>
							<li><a href="#">Отзывы сотрудников</a></li>
							<li><a href="#">Отзывы кадровых агенств</a></li>
							<li><a href="#">Вакансии</a></li>
						</ul>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col_footer col_hover hidden-xs">
						<div class="title_bg">
							Компания
							<div class="icon_build"></div>
						</div>
						<ul class="footer_menu">
							<li><a href="#">О компании</a></li>
							<li><a href="#">Собственное производство</a></li>
							<li><a href="#">Адреса магазинов</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<div class="created_box">
			<div class="copyright">© ГК Холидей, 2016</div>
			<div class="created_by">Разработка и продвижение сайта — <a href="#" class="logo_blackedia"></a></div>
		</div>
		<a href="#" class="button_up"></a>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/dragdealer.js")?>"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/animateNumber.js")?>"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/bootstrap.js")?>"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/scrollTo.js")?>"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/slider.js")?>"></script>
		<script src="<?=$APPLICATION->GetTemplatePath("js/main.js")?>"></script>
	</body>
</html>