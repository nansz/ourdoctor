<?php echo $header; ?>

<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Вакансии', 'Вакансії', 'Vacancy'); ?></span></li>
		</ul>
	</div>
</div>


	<?php if (isset($vacancy_data)) { ?>
	
    <!-- SITE CONTENT START -->
<main id="site-main" class="main vacancies-page">

    <!-- section -->
    <section id="vacancies" class="vacancies">
        <div class="section-wrap">
            <div class="container">
                <div class="section__title">
                    <p>
                        <?php translate('Вакансии', 'Вакансії', 'Vacancy'); ?>
                    </p>
                </div>
                <div class="section__content">
                    <div class="vacancies-list grid">



		<?php foreach ($vacancy_data as $vacancy) { ?>
                        <div class="vacancies-list__item grid-item">
                            <div class="vacancy-wrap">
                                <a href="<?php echo $vacancy['page_url']; ?>" class="name">
                                    <?php echo $vacancy['title']; ?>
                                </a>
                                <p class="date">
                                    <?php echo $vacancy['posted']; ?>
                                </p>
                                <?php echo $vacancy['description']; ?>
                                <a href="<?php echo $vacancy['page_url']; ?>" class="vacancy-link">
                                    <span><?php echo $text_more; ?></span>
                                    <span class="caret">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
		<?php } ?>




                    </div>
                </div>
            </div>
        </div>
    </section>



</main>
<!-- SITE CONTENT END -->


<?php } else { ?>
<div style="text-align: center;"><?php echo $text_error; ?></div>

<?php } ?>




	<?php if (isset($staff_data)) { ?>


<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Наш персонал', 'Наш персонал', 'Our staff'); ?></span></li>
		</ul>
	</div>
</div>
<div class="container-fluid reviews-title-box">
	<div class="row">
		<div class="container">
			<div class="row">
				<h1><?php translate('Наш персонал', 'Наш персонал', 'Our staff'); ?></h1>						
			</div>
		</div>
	</div>
</div>
<?php foreach ($staff_data as $staff) { ?>		
<div id="personal<?php echo $staff['id']; ?>" class="col-md-6 staff-box center column">
	<div class="staff-container">
		<div class="staff-image center">
			<?php if (strlen($staff['page_url']) > 1) { ?>
				<a href="<?php echo $staff['page_url']; ?>"><img src="<?php echo $staff['image']; ?>" alt=""></a>
			<?php } else { ?>
				<img src="<?php echo $staff['image']; ?>" alt="">
			<?php } ?>
			
		</div>
		<div class="staff-text">
			<?php if (strlen($staff['page_url']) > 1) { ?>
				<div class="hh2"><a href="<?php echo $staff['page_url']; ?>"><?php echo $staff['title']; ?></a></div>
			<?php } else { ?>
				<div class="hh2"><?php echo $staff['title']; ?></div>
			<?php } ?>

			<?php echo $staff['description']; ?>
			
			<div class="staff-link">
				<?php if($staff['images']) { ?>
					<a href="#" class="modal-trigger" data-modal="staff-cert<?php echo $staff['id']; ?>"><?php translate('Сертификаты', 'Сертифікати', 'Certificates'); ?></a>
				<?php } ?>
			</div>										
		</div>
	</div>
</div>
<?php } ?>




<?php foreach ($staff_data as $staff) { ?>	
<div class="modal staff-modal-box" id="staff-cert<?php echo $staff['id']; ?>">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	<div class="modal-body">
	  <div class=" main-certificates">
		<div class="row">
			<div class="hh2"><?php translate('Сертификаты', 'Сертифікати', 'Certificates'); ?></div>
			<div class="cert-slider" id="staff-certs">
				<?php foreach($staff['images'] as $image) { ?>
					<div class="cert-slide center">
						<div class="cert-image center">
							<a href="<?php echo $image; ?>" class="center"><img src="<?php echo $image; ?>" alt=""></a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	  </div>
	</div>
  </div>
</div>
<?php } ?>	
	

<?php } ?>


  
  

<?php if(isset($staff_info)) { ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><a href="/publications/"><?php translate('Публикации', 'Публікації', 'Publications'); ?></a></li>
			<li><a href="/staff/"><?php translate('Научные', 'Наукові', 'Scientific'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>
		<!-- BREADCRUMBS =================================================================================-->
			
			<div class="container page">
				<div class="row">
					<div class="col-md-3 col-sm-3 page-img center column">
						<img src="<?php echo $popup; ?>" alt="<?php echo $heading_title; ?>">
						<span><?php translate('Поделиться', 'Поділитися', 'Share this'); ?></span>
						<div class="footer-solcial around col-md-12">
							<a target="_blank" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/fb.png" alt="">
							</div></a>
							<a target="_blank" href="https://plus.google.com/share?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/google-plus.png" alt="">
							</div></a>
							<a target="_blank" href="http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap">
								<img src="/img/ok.png" alt="">
							</div></a>
							<a target="_blank" href="http://vk.com/share.php?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"><div class="img-wrap ">
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

	```


	<?php } ?>





<?php echo $footer; ?>