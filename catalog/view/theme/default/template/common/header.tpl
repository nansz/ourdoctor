<DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
<title><?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<?php if ($og_image) { ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo $logo; ?>" />
<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />
<?php if($icon) { ?>
<link rel="icon" href="<?php echo $icon; ?>" type="image/x-icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>

<!-- ************* CANONICAL **************** -->


<?php $link = $_SERVER['REQUEST_URI']; ?>

<?php if($link=='/tomography/kt-shop-pop-3/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/tomography/kt-shop-pop-2/"/>
<?php } else if($link=='/tomography/kt-shop-pop-4/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/tomography/kt-shop-pop-2/"/>
<?php } else if($link=='/tomography/kt-shop-pop-22/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/tomography/kt-shop-pop-2/"/>
<?php } else if($link=='/tomography/kt-angiografiya-3/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/tomography/kt-angiografiya-1/"/>
<?php } else if($link=='/tomography/kt-angiografiya-2/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/tomography/kt-angiografiya-1/"/>
<?php } else if($link=='/index.php?route=information/science&science_id=10') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/general/kt-obsledovanii-deformacii-stopy/"/>
<?php } else if($link=='/general/kt_grudnoy_kletki/') { ?>
	<link rel="canonical" href="http://www.mdclux.com.ua/description-tomography/kt-grudnoy-kletki/"/>
<?php } ?>

    <link rel="stylesheet" href="/css/animate.min.css?ver=1.0">
    <link rel="stylesheet" href="/css/libs.min.css?ver=1.0">
    <link rel="stylesheet" href="/css/fonts.css?ver=1.0">
	<link rel="stylesheet" href="/css/_simplebar.css">
	<link rel="stylesheet" href="/css/_simplebar.css">




	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/mains-app.css">
	<link rel="stylesheet" href="/css/new-main-app.css">
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>?ver=1.0" media="<?php echo $style['media']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/tmp.css?ver=1.0" />


<?php foreach ($scripts as $script) { ?>
    <script type="text/javascript" src="<?php echo $script; ?>?ver=1.0"></script>
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/tmp.js?ver=1.0"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie7.css?ver=1.0" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie6.css?ver=1.0" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js?ver=1.0"></script>


<script src='https://www.google.com/recaptcha/api.js'></script>		<link rel="stylesheet" href="/css/_simplebar.css">


</head>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4T888C"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="wrapper main">



		<!-- MOBILE_MENU =============================================================================-->
		<div class="new-header">
	<div class="new-header-wrap">
		<a href = "/" class="header-logo  header-item">
			<img src="image/data/img/logo[1].svg?ver=1.0" alt="МДЦ-LUX">
		</a>
		<div class="header-burger  header-item">
			<div class="new-hamburger">
				<div class="new-burger">
					<div class="hat-wrap">
						<svg width="18" height="6" viewBox="0 0 18 6" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.93164 3.25535H12.756C13.8605 3.25535 14.756 3.97137 14.756 4.85463V5.25093H17.756V4.85463C17.756 2.64649 15.5174 0.856445 12.756 0.856445H5.93164C3.17022 0.856445 0.931641 2.64649 0.931641 4.85463V5.25093H3.93164V4.85463C3.93164 3.97137 4.82707 3.25535 5.93164 3.25535Z" fill="#006A86"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M5.93164 3.25535H12.756C13.8605 3.25535 14.756 3.97137 14.756 4.85463V5.25093H17.756V4.85463C17.756 2.64649 15.5174 0.856445 12.756 0.856445H5.93164C3.17022 0.856445 0.931641 2.64649 0.931641 4.85463V5.25093H3.93164V4.85463C3.93164 3.97137 4.82707 3.25535 5.93164 3.25535Z" fill="#006A86"/>
						</svg>
					</div>
					<div class="new-line new-line1"></div>
					<div class="new-line new-line2"></div>
					<div class="new-line new-line3"></div>
				</div>

			</div>
		</div>
	</div>

	<div class="new-mobile-menu">
		<div class="new-menu-header">
			<div class="new-item">
				<div class="new-title"><?php translate('Услуги', 'ПОСЛУГИ', 'SERVICES'); ?><div class="plus-wrap"><div class="new-plus"></div></div></div>
				<ul class="new-drop">
					<?php if($categories) { ?>
							<?php foreach($categories as $category) { ?>
								<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
							<?php } ?>
						<?php } ?>
				</ul>
			</div>
			<div class="new-item">
				<div class="new-title"><a href="tel:<?php echo $this->config->get('config_telephone'); ?>"><?php echo $this->config->get('config_telephone'); ?></a><div class="plus-wrap"><div class="new-plus"></div></div></div>
				<ul class="new-drop">
				    	<li><a href="tel:<?php echo $this->config->get('config_fax'); ?>"><?php echo $this->config->get('config_fax'); ?></a></li>
				    	<li><a href="tel:<?php echo $this->config->get('config_telephone3'); ?>"><?php echo $this->config->get('config_telephone3'); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="new-menu-section">
			<ul class="new-section">
				<li>
					<span class="new-title"><?php echo $text_okompanii; ?> <span class="new-plus"></span></span>
					<ul class="new-drop">
						<li <?php if($_SERVER['REQUEST_URI']=='/about-us/') { echo "class='active'"; } ?>><a class="new-title" <?php if($_SERVER['REQUEST_URI']!='/about-us/') { ?>href="/about-us/"<?php } ?>><?php echo $text_okompanii; ?></a></li>
						<li  <?php if($_SERVER['REQUEST_URI']=='/about-clinic/') { echo "class='active'"; } ?>><a class="new-title" <?php if($_SERVER['REQUEST_URI']!='/about-clinic/') { ?>href="/about-clinic/"<?php } ?>><?php translate('О клинике', 'Про клініку', 'About the clinic'); ?></a></li>
					</ul>
				</li>
				<li><a  class="new-title" <?php if($_SERVER['REQUEST_URI']!='/medicaltest/') { ?>href="/medicaltest/"<?php } ?>><?php echo "Тесты"; ?></a></li>

				<li>
					<span class="new-title"><?php echo $text_publications; ?> <span class="new-plus"></span></span>

					<ul class="new-drop">
							<p class="sub-title"><?php echo   $text_clasufication;?></p>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/diseasesandsymptoms/') { ?>href="/diseasesandsymptoms/"<?php } ?>><?php  echo  $text_diseasesandsymptoms;?></a></li>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/medicalcases/') { ?>href="/medicalcases/"<?php } ?>><?php echo   $text_medicalcases; ?></a></li>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/terminology/') { ?>href="/terminology/"<?php } ?>><?php echo   $text_terminology;?></a></li>


						<p class="sub-title"><?php echo $text_publicationsz;?></p>

								<li><a <?php if($_SERVER['REQUEST_URI']!='/science/') { ?>href="/science/"<?php } ?>><?php echo $text_science; ?></a></li>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/general/') { ?>href="/general/"<?php } ?>><?php echo $text_general; ?></a></li>



							<p class="sub-title"><?php echo   $text_newz;?></p>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/announcement/') { ?>href="/announcement/"<?php } ?>><?php echo $text_announcement; ?></a></li>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/medicinenews/') { ?>href="/medicinenews/"<?php } ?>><?php echo  $text_medicinenews; ?></a></li>
								<li><a <?php if($_SERVER['REQUEST_URI']!='/news/') { ?>href="/news/"<?php } ?>><?php echo $text_news; ?></a> </li>


					</ul>
				</li>

				<li><a class="new-title" <?php if($_SERVER['REQUEST_URI']!='/contacts/') { ?>href="/contacts/"<?php } ?>><?php echo $text_contacts; ?></a></li>
                <li><div class = "button new-call-modal"><?php translate('Записаться на прием', 'Запис на прийом', 'Make an appointment'); ?></div></li>

			</ul>
		</div>
		<div class="new-menu-footer">
			<?php echo $language; ?>
		</div>
	</div>
</div>


		<!-- MAIN_MENU_TOP ===============================================================================-->
			<div class="container-fluid main-menu-top hidden-sm hidden-xs">
				<div class="row">
					<div class="container">
						<div class="col-md-6 main-menu-top-lists">
							<div class="row start">
								<ul class="menu-lang start">
									<?php echo $language; ?>
								</ul>
							</div>
						</div>
						<div class="col-md-4 main-menu-top-btn">
							<div class="row around">
								<a href="#" class="modal-trigger button" data-modal="appointment" onClick="_gaq.push(['_trackEvent', 'Knopka', 'ZapisNaPriem']);" ><?php echo $text_zapis; ?></a>
<!--								<a href="#" class="modal-trigger button" data-modal="callback">--><?php //echo $text_zvonok; ?><!--</a>-->
							</div>
						</div>
						<div class="col-md-2 main-menu-top-phones">
						<?php if ($login) { ?>
							<div class="row">
                                <a href="/login"><?php translate("Авторизация", 'Авторизація', 'Account Login'); ?></a>
							</div>
							<?php } else { ?>
							<div class="row">
								<a href="/my-account"><?php translate("Личный Кабинет", 'Особистий кабінет', 'Personal Area'); ?></a>
								<a href=" <?php echo $logout ?> "><?php translate("Выйти", 'Вийти', 'Go out'); ?></a>
							</div>
								<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<!-- MAIN_MENU_BOTTOM ===============================================================================-->
			<div class="container main-menu-bottom head-menu  hidden-sm hidden-xs">
				<div class="row">
					<div class="col-md-10 main-menu-bottom-lists">
						<div class="row">
							<ul>
								<li class="drop"><a href="javascript:void(0);" class="before"><?php echo $text_okompanii; ?></a>
									<ul class="sub">
										<li <?php if($_SERVER['REQUEST_URI']=='/about-us/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/about-us/') { ?>href="/about-us/"<?php } ?>><?php echo $text_okompanii; ?></a></li>
										<li  <?php if($_SERVER['REQUEST_URI']=='/about-clinic/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/about-clinic/') { ?>href="/about-clinic/"<?php } ?>><?php translate('О клинике', 'Про клініку', 'About the clinic'); ?></a></li>
									</ul>
								</li>



								<li ><a  href="<?php echo $medicaltest_href; ?> " ><?php echo "Тесты"; ?></a></li>

								<li class="<?php if($_SESSION['language']=='ua') { echo "vipadashka "; } ?>drop first"> <a class="before" href="javascript:void(0);"><?php echo $text_services; ?> </a>
								<ul class="sub">
									<?php foreach($categories as $category) { ?>
									<li><a  <?php $asd = explode('/', $category['href']); $asd = $asd[3];?><?php if($_SERVER['REQUEST_URI'] != "/".$asd."/") { ?>href="<?php echo $category['href']; ?>"<?php } ?>><?php echo $category['name']; ?></a></li>
									<?php } ?>
								</ul>
								</li>

								<li class="drop">
									<a href="javascript:void(0);" class="before">
										<?php echo $text_publications; ?>
									</a>
									<ul class="sub has-inner">
										<li class="sub-item">
											<p class="sub-title"><?php echo   $text_clasufication;?></p>
											<ul class="inner-sub">
												<li><a <?php if($_SERVER['REQUEST_URI']!='/diseasesandsymptoms/') { ?>href="/diseasesandsymptoms/"<?php } ?>><?php  echo  $text_diseasesandsymptoms;?></a></li>
												<li><a <?php if($_SERVER['REQUEST_URI']!='/medicalcases/') { ?>href="/medica	lcases/"<?php } ?>><?php echo   $text_medicalcases; ?></a></li>
												<li><a <?php if($_SERVER['REQUEST_URI']!='/terminology/') { ?>href="/terminology/"<?php } ?>><?php echo   $text_terminology;?></a></li>
											</ul>
										</li>
										<li class="sub-item">
											<p class="sub-title"><?php echo $text_publicationsz;?></p>
											<ul class="inner-sub">
												<li><a <?php if($_SERVER['REQUEST_URI']!='/science/') { ?>href="/science/"<?php } ?>><?php echo $text_science; ?></a></li>
												<li><a <?php if($_SERVER['REQUEST_URI']!='/general/') { ?>href="/general/"<?php } ?>><?php echo $text_general; ?></a></li>
											</ul>
										</li>
										<li class="sub-item">
											<p class="sub-title"><?php echo   $text_newz;?></p>
											<ul class="inner-sub">
												<li><a <?php if($_SERVER['REQUEST_URI']!='/announcement/') { ?>href="/announcement/"<?php } ?>><?php echo $text_announcement; ?></a></li>
												<li><a <?php if($_SERVER['REQUEST_URI']!='/medicinenews/') { ?>href="/medicinenews/"<?php } ?>><?php echo  $text_medicinenews; ?></a></li>
												<li><a <?php if($_SERVER['REQUEST_URI']!='/news/') { ?>href="/news/"<?php } ?>><?php echo $text_news; ?></a> </li>
											</ul>
										</li>
									</ul>
								</li>



								<li <?php if($_SERVER['REQUEST_URI']=='/contacts/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/contacts/') { ?>href="/contacts/"<?php } ?>><?php echo $text_contacts; ?></a></li>

								<!--<li <?php if($_SERVER['REQUEST_URI']=='/video/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/video/') { ?>href="/video/"<?php } ?>><?php echo $text_video; ?></a></li>
								<?php if($_SESSION['language']!='ua') { ?>
								<li <?php if($_SERVER['REQUEST_URI']=='/reviews/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/reviews/') { ?>href="/reviews/"<?php } ?>><?php echo $text_reviews; ?></a></li>-->
								<?php } ?>
							<!--
-->

							</ul>
						</div>
					</div>
				</div>
			</div>
		<!-- MAIN_BLOCK ==================================================================================-->
		<div class="main-content-wrapper">
			<div class="block-for-hide">

		<!-- HEADER ======================================================================================-->