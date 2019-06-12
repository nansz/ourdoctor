<?php echo $header; ?>

<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><a href="/vacancy"><?php translate('Вакансии', 'Вакансії', 'Vacancy'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>

	
    <!-- SITE CONTENT START -->
<main id="site-main" class="main vacancy-page">
    <!-- modal bg -->
    <div class="modal-bg"></div>
    <!-- thanks modal -->
    <div class="modal modal--fixed modal--thanks">
        <div class="inner-container">
            <div class="btn-close">
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="thanks-wrap">

            </div>
        </div>
    </div>

    <!-- vacancy -->
    <section id="vacancy" class="vacancy section section--colored info-block right">
        <div class="section-wrap">
            <div class="container">
		
                <div class="section__content">
                    <div class="image">
                        <div class="image__wrap">
                            <img src="<?php echo $thumb; ?>" alt="">
                        </div>
                    </div>
                    <div class="text text-light">
                        <div class="vacancy-wrap">
                            <h1 class="name">
                                <?php echo $heading_title; ?>
                            </h1>
                            <p class="date">
                                <?php echo $date_added; ?>
                            </p>
                            
                            <?php echo $description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- equipment -->
    <section id="details" class="details">
        <div class="section-wrap">
            <div class="container">
                <div class="section__content">
                    <?php echo $description2; ?>

                    <div class="image gallery">
                        <div class="image-large">
                            <img src="/image/data/personl/vacancy/about_4.png" alt="">
                        </div>
                        <div class="image-small">
                            <div class="image-small__item">
                                    <img src="/image/data/personl/vacancy/about_xs_1.png" alt="">
                            </div>
                            <div class="image-small__item">
                                    <img src="/image/data/personl/vacancy/about_xs_2.png" alt="">
                            </div>
                            <div class="image-small__item">
                                    <img src="/image/data/personl/vacancy/about_xs_3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--form-->
    <section id="form" class="form">
        <div class="section-wrap">
            <div class="container">
                <div class="section__title">
                    <p>
                        <?php translate('Отправить резюме', 'Відправити резюме', 'Send us your CV'); ?>
                    </p>
                </div>
                <div class="section__content">
                    <form action="/index.php?route=common/footer/sendresume" class="vacancy-form" enctype="multipart/form-data" method="post">
                        <div class="vacancy-form__item">
                            <div class="inputs">
                                <div class="inputs__item">
                                    <div class="input-wrap">
                                        <input id="name" class="input input--theme"
                                               type="text" name="name" value="" placeholder="<?php translate('Имя', 'Ім`я', 'Name'); ?>"
                                               required data-validate="name">
                                    </div>
                                    <div class="input-wrap">
                                        <input id="telephone"
                                               class="input input--theme input-tel"
                                               type="tel" name="telephone" value=""
                                               placeholder="<?php translate('Телефон', 'Телефон', 'Telephone'); ?>" required
                                               data-validate="telephone" data-mask="+38 (000) 000-00-00">
                                    </div>
                                </div>
                                <div class="inputs__item">
                                    <div class="input-wrap">
                                        <input id="email" class="input input--theme"
                                               type="email" name="email" value="" placeholder="E-Mail"
                                               required data-validate="email">
                                    </div>
                                    <div class="input-wrap input-wrap--file">
                                        <span class="label-text"><?php translate('Добавить файл резюме', 'Додати файл резюме', 'Add resume file'); ?> (doc, docx, rtf, txt, odt, pdf):</span>
                                        <label for="file" class="label label--file"><?php translate('Выбрать файл', 'Виберіть файл', 'Select a file'); ?></label>
                                        <input id="file" class="input input--file" type="file" name="mail_file" maxlength="64" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vacancy-form__item">
                            <div class="button-wrap">
                                <button type=submit class="btn btn--theme"><?php translate('Отправить', 'Надіслати', 'Send'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</main>
<!-- SITE CONTENT END -->









  
  

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



	<?php } ?>





<?php echo $footer; ?>