<?php echo $header; ?>

	
	<?php if (isset($sdtomography_data)) { ?>	
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><a href="/tomography/"><?php translate('Томография', 'Томографія', 'Tomography'); ?></a></li>
			<li><span><?php translate('Описание исследований компьютерной томографии', 'Опис досліджень комп`ютерної томографії', 'Description of computer tomography'); ?></span></li>
		</ul>
	</div>
</div>
<div class="container science-page">
				<div class="row center column">
					<h1 class="title"><?php translate('Описание исследований компьютерной томографии', 'Опис досліджень комп`ютерної томографії', 'Description of computer tomography'); ?></h1>

					<div class="science-wrapper">
					<?php foreach ($sdtomography_data as $sdtomography) { ?>
						<div class="science-box col-md-12">
							<div class="col-md-3 science-img">
								<div class="row">
									<a href="<?php echo $sdtomography['href']; ?>"><img src="<?php echo $sdtomography['image']; ?>" alt="<?php echo $sdtomography['title']; ?>"></a>
								</div>
							</div>
							<div class="col-md-9 science-text">
								<div class="row">
									<div class="science-title hh2"><a href="<?php echo $sdtomography['href']; ?>"><?php echo $sdtomography['title']; ?></a></div>
									<p class="science-desc"><?php echo $sdtomography['description']; ?></p>
									<div class="btw date-link">
										<span><?php echo $sdtomography['posted']; ?></span>
										<a href="<?php echo $sdtomography['href']; ?>"><?php translate('Подробнее', 'Детальніше', 'Learn More'); ?><img src="/img/next.svg" alt=""></a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>

<div class="box-pagination">
	<?php echo $pagination; ?>
</div>



	<?php echo $content_bottom; ?>

<?php } ?>


  
  

<?php if(isset($sdtomography_info)) { ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><a href="/tomography/"><?php translate('Томография', 'Томографія', 'Tomography'); ?></a></li>
			<li><a href="/description-tomography/"><?php translate('Описание исследований компьютерной томографии', 'Опис досліджень комп`ютерної томографії', 'Description of computer tomography'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>
		<!-- BREADCRUMBS =================================================================================-->
			
			<div class="container page">
				<div class="row">
					<div class="col-md-3 col-sm-3 page-img center column">
						<img src="<?php echo $popup; ?>" alt="<?php echo $heading_title; ?>">
						<span><?php translate('Поделиться', 'Поділитись', 'Share this'); ?></span>
						<div class="footer-solcial around col-md-12">
							<a target="_blank" onClick="var links = $(this).attr('data-href'); window.open(links,'_blank');" data-href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/fb.png" alt="">
							</div></a>
							<a target="_blank" onClick="var links = $(this).attr('data-href'); window.open(links,'_blank');" data-href="https://plus.google.com/share?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/google-plus.png" alt="">
							</div></a>
							<a target="_blank" onClick="var links = $(this).attr('data-href'); window.open(links,'_blank');" data-href="http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/ok.png" alt="">
							</div></a>
							<a target="_blank" onClick="var links = $(this).attr('data-href'); window.open(links,'_blank');" data-href="http://vk.com/share.php?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap ">
								<img src="/img/vk.png" alt="">
							</div></a>
						</div>
					</div>
					<div class="col-md-9 col-sm-9 page-desc">
						<h1><?php echo $heading_title; ?></h1>
						<?php echo $description; ?>
					</div>
				</div>
			</div>



	<?php } ?>





<?php echo $footer; ?>