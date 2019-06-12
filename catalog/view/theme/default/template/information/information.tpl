<?php echo $header; ?>

<?php if($_SERVER['REQUEST_URI']=='/about-us/' or $_SERVER['REQUEST_URI']=='/ua/about-us/' or $_SERVER['REQUEST_URI']=='/en/about-us/') { ?>


<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>

<!--этот блок убрать вместо него поставитьб about-company все
//-->
<main id="site-main" class="main c-about-page">
	<!-- modal bg -->
	<div class="modal-bg"></div>
	<!-- video modal -->
	<div class="modal modal--fixed modal--video">
		<div class="inner-container">
			<div class="btn-close">
				<div class="line"></div>
				<div class="line"></div>
			</div>
			<div class="video-wrap">
				<iframe class="y-video" src="https://www.youtube.com/embed/kKsdvxSy8qQ?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<!--
   and then we will delete all of sections with content

   and will add new content section
   -->

	<div class="c-about">
		<div class="container">
			<div class="c-about-list">
				<div class="c-about-list__item right">
					<div class="c-text-wrap">
						<h1 class="c-title"><?php echo $heading_title; ?></h1>
						<!--			<h2 class="c-title">
				О компании
						</h2>-->
						<p class="c-text">
							<?php echo $smalltext; ?>
						</p>
					</div>
					<div class="c-media c-img-wrap has-video">
						<img src="/image/<?php echo $videoimage; ?>" alt="">
						<!-- tint -->
						<div class="bg-tint"></div>
						<!-- play -->
						<div class="bg-title">
							<div class="container">
								<div class="bg-title__content">
									<div class="c-play-btn">
										<a href="<?php echo $video; ?>">
                                            <span class="icon"><svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M83.0762 48.2531L56.1865 63.7778L56.1865 32.7283L83.0762 48.2531Z" fill="white"/>
<path d="M24.2812 94.7783C22.9186 94.7783 21.8385 94.318 21.041 93.3975C20.2389 92.4814 19.8379 91.2419 19.8379 89.6787C19.8379 88.1292 20.2412 86.8942 21.0479 85.9736C21.8545 85.0485 22.9323 84.5859 24.2812 84.5859C25.3294 84.5859 26.2249 84.873 26.9678 85.4473C27.7061 86.0169 28.1663 86.7757 28.3486 87.7236H27.0908C26.9131 87.113 26.569 86.6276 26.0586 86.2676C25.5482 85.903 24.9557 85.7207 24.2812 85.7207C23.3197 85.7207 22.5495 86.0807 21.9707 86.8008C21.3919 87.5208 21.1025 88.4801 21.1025 89.6787C21.1025 90.891 21.3896 91.8548 21.9639 92.5703C22.5381 93.2858 23.3128 93.6436 24.2881 93.6436C24.9854 93.6436 25.5801 93.4886 26.0723 93.1787C26.5553 92.8688 26.8949 92.4313 27.0908 91.8662H28.3486C28.1071 92.805 27.6354 93.5251 26.9336 94.0264C26.2318 94.5277 25.3477 94.7783 24.2812 94.7783ZM29.791 94.6143V87.2451H31.2197L33.8857 93.0352H33.9404L36.6133 87.2451H37.9873V94.6143H36.8047V89.3711H36.75L34.3438 94.4092H33.4277L31.0215 89.3711H30.9668V94.6143H29.791ZM42.7793 94.6826C41.7448 94.6826 40.9199 94.3431 40.3047 93.6641C39.6895 92.985 39.3818 92.0736 39.3818 90.9297C39.3818 89.7858 39.6895 88.8743 40.3047 88.1953C40.9199 87.5163 41.7448 87.1768 42.7793 87.1768C43.8138 87.1768 44.6387 87.5163 45.2539 88.1953C45.8691 88.8743 46.1768 89.7858 46.1768 90.9297C46.1768 92.0736 45.8691 92.985 45.2539 93.6641C44.6387 94.3431 43.8138 94.6826 42.7793 94.6826ZM42.7793 93.623C43.4674 93.623 44.0029 93.3861 44.3857 92.9121C44.7731 92.4336 44.9668 91.7728 44.9668 90.9297C44.9668 90.082 44.7731 89.4212 44.3857 88.9473C44.0029 88.4733 43.4674 88.2363 42.7793 88.2363C42.0911 88.2363 41.5557 88.4733 41.1729 88.9473C40.7855 89.4258 40.5918 90.0866 40.5918 90.9297C40.5918 91.7728 40.7855 92.4336 41.1729 92.9121C41.5602 93.3861 42.0957 93.623 42.7793 93.623ZM52.7871 88.2295H50.3945V94.6143H49.2188V88.2295H46.8262V87.2451H52.7871V88.2295ZM57.4766 87.1768C58.4199 87.1768 59.181 87.5208 59.7598 88.209C60.3431 88.9017 60.6348 89.8086 60.6348 90.9297C60.6348 92.0508 60.3454 92.9577 59.7666 93.6504C59.1878 94.3385 58.4336 94.6826 57.5039 94.6826C56.4238 94.6826 55.64 94.2611 55.1523 93.418H55.125V97.0752H53.9355V87.2451H55.0635V88.4414H55.0908C55.305 88.0586 55.6286 87.751 56.0615 87.5186C56.4945 87.2907 56.9661 87.1768 57.4766 87.1768ZM57.2578 93.623C57.9095 93.623 58.4313 93.3792 58.8232 92.8916C59.2197 92.3994 59.418 91.7454 59.418 90.9297C59.418 90.1185 59.2197 89.4668 58.8232 88.9746C58.4313 88.4824 57.9095 88.2363 57.2578 88.2363C56.6243 88.2363 56.1094 88.4847 55.7129 88.9814C55.3164 89.4782 55.1182 90.1276 55.1182 90.9297C55.1182 91.7318 55.3164 92.3812 55.7129 92.8779C56.1048 93.3747 56.6198 93.623 57.2578 93.623ZM64.9688 88.2227C64.39 88.2227 63.9115 88.4141 63.5332 88.7969C63.1504 89.1797 62.9385 89.6833 62.8975 90.3076H66.9512C66.9375 89.6833 66.7484 89.1797 66.3838 88.7969C66.0238 88.4141 65.5521 88.2227 64.9688 88.2227ZM68.0996 92.5088C67.9993 93.1423 67.6621 93.6618 67.0879 94.0674C66.5137 94.4775 65.8324 94.6826 65.0439 94.6826C64.0094 94.6826 63.1868 94.3477 62.5762 93.6777C61.9701 93.0078 61.667 92.1009 61.667 90.957C61.667 89.8132 61.9701 88.8971 62.5762 88.209C63.1823 87.5208 63.9867 87.1768 64.9893 87.1768C65.9736 87.1768 66.7529 87.5003 67.3271 88.1475C67.9014 88.7992 68.1885 89.681 68.1885 90.793V91.2578H62.8975V91.3262C62.8975 92.028 63.0957 92.5885 63.4922 93.0078C63.8887 93.4271 64.415 93.6367 65.0713 93.6367C65.5316 93.6367 65.9303 93.5342 66.2676 93.3291C66.6003 93.1286 66.819 92.8551 66.9238 92.5088H68.0996ZM74.7988 88.2295H72.4062V94.6143H71.2305V88.2295H68.8379V87.2451H74.7988V88.2295ZM77.123 90.5947V93.6299H78.5107C78.9938 93.6299 79.3812 93.4909 79.6729 93.2129C79.96 92.9395 80.1035 92.5726 80.1035 92.1123C80.1035 91.652 79.9577 91.2829 79.666 91.0049C79.3789 90.7314 78.9938 90.5947 78.5107 90.5947H77.123ZM75.9473 87.2451H77.123V89.6104H78.5107C79.3538 89.6104 80.026 89.8359 80.5273 90.2871C81.0286 90.7383 81.2793 91.3467 81.2793 92.1123C81.2793 92.8779 81.0286 93.4863 80.5273 93.9375C80.026 94.3887 79.3538 94.6143 78.5107 94.6143H75.9473V87.2451ZM21.2461 108.229V110.308H22.8867C23.8118 110.308 24.2744 109.957 24.2744 109.255C24.2744 108.571 23.8757 108.229 23.0781 108.229H21.2461ZM21.2461 111.292V113.63H23.2148C24.1354 113.63 24.5957 113.245 24.5957 112.475C24.5957 111.686 24.0602 111.292 22.9893 111.292H21.2461ZM20.0703 107.245H23.2285C23.9121 107.245 24.4521 107.414 24.8486 107.751C25.2406 108.088 25.4365 108.549 25.4365 109.132C25.4365 109.506 25.3203 109.845 25.0879 110.15C24.8555 110.456 24.5706 110.645 24.2334 110.718V110.772C24.6937 110.836 25.0651 111.025 25.3477 111.34C25.6257 111.654 25.7646 112.039 25.7646 112.495C25.7646 113.147 25.5391 113.664 25.0879 114.047C24.6367 114.425 24.0215 114.614 23.2422 114.614H20.0703V107.245ZM27.1934 114.614V107.245H28.3691V112.775H28.4238L32.2178 107.245H33.3936V114.614H32.2178V109.084H32.1631L28.3691 114.614H27.1934ZM40.0381 108.229H37.2422L37.0098 111.381C36.9323 112.415 36.7295 113.147 36.4014 113.575V113.63H40.0381V108.229ZM34.4121 116.562V113.63H35.0273C35.5286 113.302 35.8203 112.543 35.9023 111.354L36.1895 107.245H41.2139V113.63H42.3896V116.562H41.2822V114.614H35.5195V116.562H34.4121ZM46.4434 108.223C45.8646 108.223 45.3861 108.414 45.0078 108.797C44.625 109.18 44.4131 109.683 44.3721 110.308H48.4258C48.4121 109.683 48.223 109.18 47.8584 108.797C47.4984 108.414 47.0267 108.223 46.4434 108.223ZM49.5742 112.509C49.474 113.142 49.1367 113.662 48.5625 114.067C47.9883 114.478 47.307 114.683 46.5186 114.683C45.484 114.683 44.6615 114.348 44.0508 113.678C43.4447 113.008 43.1416 112.101 43.1416 110.957C43.1416 109.813 43.4447 108.897 44.0508 108.209C44.6569 107.521 45.4613 107.177 46.4639 107.177C47.4482 107.177 48.2275 107.5 48.8018 108.147C49.376 108.799 49.6631 109.681 49.6631 110.793V111.258H44.3721V111.326C44.3721 112.028 44.5703 112.589 44.9668 113.008C45.3633 113.427 45.8896 113.637 46.5459 113.637C47.0062 113.637 47.4049 113.534 47.7422 113.329C48.0749 113.129 48.2936 112.855 48.3984 112.509H49.5742ZM54.0859 114.683C53.0514 114.683 52.2266 114.343 51.6113 113.664C50.9961 112.985 50.6885 112.074 50.6885 110.93C50.6885 109.786 50.9961 108.874 51.6113 108.195C52.2266 107.516 53.0514 107.177 54.0859 107.177C55.1204 107.177 55.9453 107.516 56.5605 108.195C57.1758 108.874 57.4834 109.786 57.4834 110.93C57.4834 112.074 57.1758 112.985 56.5605 113.664C55.9453 114.343 55.1204 114.683 54.0859 114.683ZM54.0859 113.623C54.7741 113.623 55.3096 113.386 55.6924 112.912C56.0798 112.434 56.2734 111.773 56.2734 110.93C56.2734 110.082 56.0798 109.421 55.6924 108.947C55.3096 108.473 54.7741 108.236 54.0859 108.236C53.3978 108.236 52.8623 108.473 52.4795 108.947C52.0921 109.426 51.8984 110.087 51.8984 110.93C51.8984 111.773 52.0921 112.434 52.4795 112.912C52.8669 113.386 53.4023 113.623 54.0859 113.623Z" fill="white"/>
<rect x="0.649902" y="1.2251" width="129" height="129" stroke="white"/>
</svg>
</span>
										</a>
									</div>
									<h2 class="play-title">
										<p><?php echo $videotitle; ?></p>
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="c-about-list__item left">
					<div class="c-text-wrap">
						<p class="c-text">
							<?php echo $description; ?>
						</p>
					</div>
					<div class="c-media c-img-wrap">
						<img src="/image/<?php echo $imageone; ?>" alt="">
					</div>
				</div>
				<div class="c-about-list__item right">
					<div class="c-text-wrap">
						<p class="c-text">
							<?php echo $description2; ?>
						</p>
					</div>
					<div class="c-media c-img-wrap">
						<img src="/image/<?php echo $imagetwo; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
<!--<div class="container-fluid about-layout about-page">

	<div class="container main-about">
		<div class="row">

		<h1 ><?php echo $heading_title; ?></h1>


		<div class="col-md-12 about-wrap">
			<div class="about-video-box col-xs-12 col-sm-6 pull-right">
				<div class="row">
					<div class="video-text">
						<p><?php echo $videotitle; ?></p>
					</div>
					<div class="video-button center">
							<a href="<?php echo $video; ?>"><img src="/img/play-button.svg" alt=""></a>
						</div>
						<div class="video-container">
							<img src="/image/<?php echo $videoimage; ?>">
						</div>
				</div>
			</div>

			<div class="about-text-box col-xs-12 col-sm-6">
				<p><?php echo $smalltext; ?></p>

			</div>
		</div>

		<div class="col-md-12 about-wrap ">
			<div class="about-video-box about-page col-xs-12 col-sm-6 ">
				<div class="row">
					<div class="about-image">
						<img src="/image/<?php echo $imageone; ?>" alt="">
					</div>
				</div>
			</div>

			<div class="about-text-box col-xs-12 col-sm-6">
				<?php echo $description; ?>
			</div>
		</div>


		<div class="col-md-12 about-wrap">
			<div class="about-video-box about-page col-xs-12 col-sm-6 pull-right ">
				<div class="row">
					<div class="about-image center">
						<img src="/image/<?php echo $imagetwo; ?>" alt="">
					</div>
				</div>
			</div>

			<div class="about-text-box last col-xs-12 col-sm-6">
				<?php echo $description2; ?>
			</div>
		</div>


</div>
	</div>




</div>-->


<?php } elseif($_SERVER['REQUEST_URI']=='/about-clinic/' or $_SERVER['REQUEST_URI']=='/ua/about-clinic/' or $_SERVER['REQUEST_URI']=='/en/about-clinic/') { ?>


<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>

			<div class="wrapper_inside">
			<?php echo $description; ?>

		<div class="center">
			<a href="#" class="modal-trigger button" data-modal="appointment"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></a>
		</div>


			<script type="text/javascript" src="catalog/view/javascript/new-main-app.js?ver=1.0"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


		

		

<style>
#contsctformdoc > div > form > input[type="text"]{
    min-width: 380px;
    max-width: 400px; 
}
#contsctformdoc > div > form > label {
    width: 380px;
}

</style>

<script>

$( document ).ready(function() {

	$html = '';
	$html = $html + '<div class="product-form">';
	$html = $html + '<p class="title"><?php translate("Записаться на прием", "Записатися на прийом", "Make an appointment"); ?></p>';
	$html = $html + '<form action="/index.php?route=common/footer/appointment" class="center column" data-autosubmit="true">';
	$html = $html + '<label><?php translate("Имя", "Ім`я", "Name"); ?>*</label>';
	$html = $html + '<input type="text" name="name" placeholder="<?php translate("Введите имя", "Введіть ім`я", "Enter your name"); ?>">';
	$html = $html + '<label>Телефон*</label>';
	$html = $html + '<input type="text" name="phone" id="phone" placeholder="+38(___) ___-__-__">';
	$html = $html + '<p><?php translate("Пример", "Приклад", "Example"); ?>: +38 (095) 449 76 28</p>';
	$html = $html + '<label style="display:none;"><?php translate("Услуга", "Послуга", "Service"); ?>*</label>';
	$html = $html + '<input name="services" type="hidden" value="<?php echo $heading_title; ?>" id="toservices">';
	$html = $html + '<label style="display:none;"><?php translate("Область исследования", "Область дослідження", "Field of study"); ?></label>';
	$html = $html + '<input type="hidden" name="science">';
	$html = $html + '<label><?php translate("Укажите удобное для Вас время", "Укажіть зручний для Вас час", "Specify the time convenient for you"); ?>*</label>';
	$html = $html + '<input type="text" name="time">';




    $html = $html + '<label style="display: flex;justify-content: space-between;"><?php translate("Проверка", "Перевірка", "Checking"); ?> - <img style="width:auto;" src="index.php?route=common/footer/captcha" /></label>';
	$html = $html + '<input type="text" name="captcha" id="captcha" placeholder="<?php translate("Введите проверочный код", "Введіть код перевірки", "Enter the verification code"); ?>">';
	$html = $html + '<input type="submit" value="<?php translate("Отправить", "Відправити", "Send"); ?>">';
	$html = $html + '</form>';
	$html = $html + '</div>';



	$('#contsctformdoc').html($html);

	$html1 = '<option value="<?php echo $heading_title; ?>"><?php echo $heading_title; ?></option>';
	$('#select-services').html($html1);

	$html2 = 'Доктор';
	$('#appointment > div.modal-box > div.modal-body > form > label:nth-child(6)').html($html2);

});
</script>


<?php } elseif($_SERVER['REQUEST_URI']=='/faq/' or $_SERVER['REQUEST_URI']=='/ua/faq/' or $_SERVER['REQUEST_URI']=='/en/faq/') { ?>


<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>

			<div class="wrapper_inside">
			<?php echo $description; ?>

		<div class="center">
			<a href="#" class="modal-trigger button" data-modal="appointment"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></a>
		</div>


			<script type="text/javascript" src="catalog/view/javascript/new-main-app.js?ver=1.0"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


		

		

<style>
#contsctformdoc > div > form > input[type="text"]{
    min-width: 380px;
    max-width: 400px; 
}
#contsctformdoc > div > form > label {
    width: 380px;
}

</style>

<script>

$( document ).ready(function() {

	$html = '';
	$html = $html + '<div class="product-form">';
	$html = $html + '<p class="title"><?php translate("Записаться на прием", "Записатися на прийом", "Make an appointment"); ?></p>';
	$html = $html + '<form action="/index.php?route=common/footer/appointment" class="center column" data-autosubmit="true">';
	$html = $html + '<label><?php translate("Имя", "Ім`я", "Name"); ?>*</label>';
	$html = $html + '<input type="text" name="name" placeholder="<?php translate("Введите имя", "Введіть ім`я", "Enter your name"); ?>">';
	$html = $html + '<label>Телефон*</label>';
	$html = $html + '<input type="text" name="phone" id="phone" placeholder="+38(___) ___-__-__">';
	$html = $html + '<p><?php translate("Пример", "Приклад", "Example"); ?>: +38 (095) 449 76 28</p>';
	$html = $html + '<label style="display:none;"><?php translate("Услуга", "Послуга", "Service"); ?>*</label>';
	$html = $html + '<input name="services" type="hidden" value="<?php echo $heading_title; ?>" id="toservices">';
	$html = $html + '<label style="display:none;"><?php translate("Область исследования", "Область дослідження", "Field of study"); ?></label>';
	$html = $html + '<input type="hidden" name="science">';
	$html = $html + '<label><?php translate("Укажите удобное для Вас время", "Укажіть зручний для Вас час", "Specify the time convenient for you"); ?>*</label>';
	$html = $html + '<input type="text" name="time">';


	$html = $html + '<label style="display: flex;justify-content: space-between;"><?php translate("Проверка", "Перевірка", "Checking"); ?> - <img style="width:auto;" src="index.php?route=common/footer/captcha" /></label>';
	$html = $html + '<input type="text" name="captcha" id="captcha" placeholder="<?php translate("Введите проверочный код", "Введіть код перевірки", "Enter the verification code"); ?>">';
	$html = $html + '<input type="submit" value="<?php translate("Отправить", "Відправити", "Send"); ?>">';
	$html = $html + '</form>';
	$html = $html + '</div>';



	$('#contsctformdoc').html($html);

	$html1 = '<option value="<?php echo $heading_title; ?>"><?php echo $heading_title; ?></option>';
	$('#select-services').html($html1);

	$html2 = 'Доктор';
	$('#appointment > div.modal-box > div.modal-body > form > label:nth-child(6)').html($html2);

});
</script>






<?php } else { ?>

<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><a href="/staff/"><?php translate('Наш персонал', 'Наш персонал', 'Our staff'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>

			<div class="wrapper_inside">
			<?php echo $description; ?>

		<div class="center">
			<a href="#" class="modal-trigger button" data-modal="appointment"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></a>
		</div>


			<script type="text/javascript" src="catalog/view/javascript/new-main-app.js?ver=1.0"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


		

		

<style>
#contsctformdoc > div > form > input[type="text"]{
    min-width: 380px;
    max-width: 400px; 
}
#contsctformdoc > div > form > label {
    width: 380px;
}

</style>

<script>

$( document ).ready(function() {

	$html = '';
	$html = $html + '<div class="product-form">';
	$html = $html + '<p class="title"><?php translate("Записаться на прием", "Записатися на прийом", "Make an appointment"); ?></p>';
	$html = $html + '<form action="/index.php?route=common/footer/appointment" class="center column" data-autosubmit="true">';
	$html = $html + '<label><?php translate("Имя", "Ім`я", "Name"); ?>*</label>';
	$html = $html + '<input type="text" name="name" placeholder="<?php translate("Введите имя", "Введіть ім`я", "Enter your name"); ?>">';
	$html = $html + '<label>Телефон*</label>';
	$html = $html + '<input type="text" name="phone" id="phone" placeholder="+38(___) ___-__-__">';
	$html = $html + '<p><?php translate("Пример", "Приклад", "Example"); ?>: +38 (095) 449 76 28</p>';
	$html = $html + '<label style="display:none;"><?php translate("Услуга", "Послуга", "Service"); ?>*</label>';
	$html = $html + '<input name="services" type="hidden" value="<?php echo $heading_title; ?>" id="toservices">';
	$html = $html + '<label style="display:none;"><?php translate("Область исследования", "Область дослідження", "Field of study"); ?></label>';
	$html = $html + '<input type="hidden" name="science">';
	$html = $html + '<label><?php translate("Укажите удобное для Вас время", "Укажіть зручний для Вас час", "Specify the time convenient for you"); ?>*</label>';
	$html = $html + '<input type="text" name="time">';


    $html = $html + '<label style="display: flex;justify-content: space-between;"><?php translate("Проверка", "Перевірка", "Checking"); ?> - <img style="width:auto;" src="index.php?route=common/footer/captcha" /></label>';
	$html = $html + '<input type="text" name="captcha" id="captcha" placeholder="<?php translate("Введите проверочный код", "Введіть код перевірки", "Enter the verification code"); ?>">';
	$html = $html + '<input type="submit" value="<?php translate("Отправить", "Відправити", "Send"); ?>">';
	$html = $html + '</form>';


	$('#contsctformdoc').html($html);

	$html1 = '<option value="<?php echo $heading_title; ?>"><?php echo $heading_title; ?></option>';
	$('#select-services').html($html1);

	$html2 = 'Доктор';
	$('#appointment > div.modal-box > div.modal-body > form > label:nth-child(6)').html($html2);

});
</script>


<?php } ?>

 
		



	</div>
</div>


<?php echo $footer; ?>