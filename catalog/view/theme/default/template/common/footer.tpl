		<!-- FOOTER ======================================================================================-->
			<div class="container footer-large hidden-sm hidden-xs">
				<div class="arrow-top">
					<img src="/img/arrow-top.svg?ver=1.0" alt="" class="icon">
				</div>
				<div class="row">
					<div class="col-md-4 footer-large-info">
						<div class="hh2">«<?php translate('МДЦ-LUX', 'МДЦ-LUX', 'MDC-LUX'); ?>»</div>
						<p><?=$text_first;?></p>
					</div>
					<div class="col-md-3 footer-large-services">

					</div>
					<div class="col-md-2 footer-large-contacts">
					</div>
					<div class="col-md-3 footer-large-workplace end">
					</div>
				</div>
			</div>
			<div class="container main-footer">
				<div class="row">
					<div class="first-footer-box hidden-md hidden-lg">
						<div class="hh2"><?php translate('Наш адрес', 'Наша адреса', 'Our address'); ?>:</div>
						<ul class="footer-contacts">
							<li><a href="#"><?php echo html_entity_decode($this->config->get('config_address'), ENT_QUOTES, 'UTF-8'); ?></a></li>
							<li><a href="#"><?php translate('Режим работы', 'Режим роботи', 'Operating mode'); ?>: <?php translate('Пн - Пт', 'Пн - Пт', 'Mon - Fri'); ?>: <?php echo $this->config->get('config_budni'); ?></a></li>
							<li><a href="#"><?php translate('Сб', 'Сб', 'Sat'); ?> <?php echo $this->config->get('config_subbota'); ?></a></li>
							<li><a href="#"><?php translate('Вс', 'Нд', 'Su'); ?> <?php echo $this->config->get('config_voskresenje'); ?></a></li>
							<li><a href="#"><?php translate('Наш e-mail:', 'Наш e-mail:', 'Our e-mail:'); ?> <?php echo $this->config->get('config_email'); ?></a></li>
							<li class="start"><a href="#"><?php translate('Телефоны', 'Телефони', 'Phones'); ?>:</a>
								<ul>
									<li><a href="tel:<?php echo $this->config->get('config_telephone'); ?>"><?php echo $this->config->get('config_telephone'); ?></a></li>
									<li><a href="tel:<?php echo $this->config->get('config_fax'); ?>"><?php echo $this->config->get('config_fax'); ?></a></li>
									<li><a href="tel:<?php echo $this->config->get('config_telephone3'); ?>"><?php echo $this->config->get('config_telephone3'); ?></a></li>
								</ul>
							</li>
						</ul>
						<div class="center">
							<a href="#" class="modal-trigger button" data-modal="appointment"><?=$text_zapis;?></a>
						</div>
					</div>
					<div class="second-footer-box">
							<div class="footer-text col-md-3">
								<p>© 2004-2018. <br> <?php translate('Медицинский центр «МДЦ-LUX». <br> Все права защищены', 'Медичний центр «МДЦ-LUX» <br> Всі права захищені', 'MDC-LUX Medical center". <br> All rights reserved.'); ?></p>
								<p><?php translate('Лицензия - АГ597682 от 01.03.2012 года', 'Ліцензія - АГ597682  вiд 01.03.2012 року', 'License - АГ597682  from 01.03.2012'); ?> </p>
							</div>
							<div class="footer-solcial around col-md-3">
								<a rel="nofollow" href="<?php echo $this->config->get('config_fb'); ?>" target="_blank"><div class="img-wrap facebook">
									<img src="/img/fb.svg?ver=1.0" alt="">
								</div></a>
								<a rel="nofollow" href="<?php echo $this->config->get('config_google'); ?>" target="_blank"><div class="img-wrap instagram">
									<img src="/img/instagram.svg?ver=1.0" alt="">
								</div></a>
								<a rel="nofollow" href="<?php echo $this->config->get('config_youtube'); ?>" target="_blank"><div class="img-wrap youtube">
									<img src="/img/youtube.svg?ver=1.0" alt="">
								</div></a>
							</div>
							<div class="footer-button end col-md-4">
								<a href="#" class="modal-trigger button" data-modal="appointment"><img src="/img/list.svg?ver=1.0" alt="" class="icon"><?php echo $text_zapis; ?></a>
							</div>
							<div class="footer-mobile-menu hidden-md hidden-lg">
								<nav class="menu">
							    <ul class="menu-hight">
									<?php if($categories) { ?>
										<?php foreach($categories as $category) { ?>
											<li><a <?php if($category['category_id'] != $catid) { ?>href="<?php echo $category['href']; ?>"<?php } ?>><?php echo $category['name']; ?></a></li>
										<?php } ?>
									<?php } ?>
							    </ul>
							    <ul class="menu-low">
							    	<li><a <?php if($_SERVER['REQUEST_URI']!='/about-us/') { ?>href="/about-us/"<?php } ?>><?php echo $text_okompanii; ?></a></li>
							    	<li><a <?php if($_SERVER['REQUEST_URI']!='/video/') { ?>href="/video/"<?php } ?>><?php echo $text_video; ?></a></li>
							    	<li><a <?php if($_SERVER['REQUEST_URI']!='/reviews/') { ?>href="/reviews/"<?php } ?>><?php echo $text_reviews; ?></a></li>
							    	<li><a <?php if($_SERVER['REQUEST_URI']!='/faq/') { ?>href="/faq/"<?php } ?>>FAQ</a></li>
							    </ul>

							  </nav>
							</div>
					</div>
				</div>
			</div>
			<div class="container-fluid fill">
				<div class="container main-menu-bottom footer-bot-nav hidden-sm hidden-xs">
					<div class="row">
						<div class="col-md-9 main-menu-bottom-lists">
							<div class="row">
								<ul>
									<li <?php if($_SERVER['REQUEST_URI']=='/about-us/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/about-us/') { ?>href="/about-us/"<?php } ?>><?php echo $text_okompanii; ?></a></li>
									<li <?php if($_SERVER['REQUEST_URI']=='/video/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/video/') { ?>href="/video/"<?php } ?>><?php echo $text_video; ?></a></li>
									<li <?php if($_SERVER['REQUEST_URI']=='/reviews/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/reviews/') { ?>href="/reviews/"<?php } ?>><?php echo $text_reviews; ?></a></li>
									<li <?php if($_SERVER['REQUEST_URI']=='/faq/') { echo "class='active'"; } ?>><a <?php if($_SERVER['REQUEST_URI']!='/faq/') { ?>href="/faq/"<?php } ?>>FAQ</a></li>
							    </ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODALS ============================================================================================-->
<div class="modal" id="callback">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	  <div class="close-btn"></div>

    <div class="modal-body">

		<div class="aside b-aside">
			<div class="b-content-wrap">
                    <p class="b-title">
                        <?php translate('Оставьте ваш телефон <br> и наш консультант <br> свяжется с вами', 'Залиште Ваш телефон <br> і наш консультант <br> зв`яжеться з вами', 'Leave your phone <br> and our consultant <br> will contact you'); ?>


                </p>

				<div class="b-form-wrap">
					<form action="/index.php?route=common/footer/sendcall" class=" b-form" data-autosubmit="true">
						<div class="b-input-wrap">
							<p class="b-subtitle"> <?php echo translate('Ваше имя', 'Ваше имя', 'Your name'); ?></p>
							<input class="b-form__input" name="name" placeholder="<?php echo translate('Введите имя', 'Введіть ім`я', 'Enter your name'); ?>"
								   type="text" value="">
                            <label class="b-error">
                                <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                            </label>
						</div>
						<div class="b-input-wrap">
									<div class="b-subtitle"><?php echo translate('Телефон', 'Телефон', 'Phone'); ?></div>
									<input class="b-form__input b-input--tel" data-mask="+38 (000) 000-00-00"  name="phone" placeholder="+38 (___) ___-__-__"  type="text" value="">

						</div>



				<div class="b-input-wrap">
					<div class="b-checkbox">
						<input type="checkbox" name="accept" id="b-checkbox1"   value="1" class="b-checkbox-item">
						<div class="b-label"><?php echo translate('Даю согласие на обработку ', 'Даю згоду на обробку', 'I agree to the processing'); ?> <a href="#"><?php echo translate('Персональных данных', 'Персональних даних', 'Personal data'); ?></a></div>
                        <label class="b-error">
                            <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                        </label>
					</div>
				</div>
						<div class="b-btn-wrap">
							<input type="submit" class="b-btn b-save-form" value="<?php translate('Отправить', 'Надіслати', 'To send'); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>

    </div>
  </div>
</div>

<div class="modal" id="vopros">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	  <div class="close-btn"></div>

	  <div class="modal-header">
       <div class="hh1"><?php translate('Задать вопрос', 'Поставити запитання', 'Ask a Question'); ?></div>
    </div>
    <div class="modal-body">
		<form action="/index.php?route=common/footer/contacts" class="feedback center column" data-autosubmit="true">
			<label for="feedback-name"><?php translate('ФИО', 'ПІБ', 'Full name'); ?>*</label>
			<input type="text" name="feedback-name">
			<label for="feedback-email">E-mail*</label>
			<input type="text" name="feedback-email">
			<label for="feedback-text"><?php translate('Сообщение', 'Повідомлення', 'Message'); ?>*</label>
			<textarea name="feedback-text" id="" cols="30" rows="3"></textarea>
			<input type="submit" value="<?php translate('Отправить', 'Відправити', 'Send'); ?>">
		</form>
    </div>
  </div>
</div>

<div class="modal" id="subscribe">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	  <div class="close-btn"></div>

	  <div class="modal-header">
       <div class="hh1"><?php translate('Для подписки <br> на рассылку оставьте <br> Ваш электронный адрес', 'Для підписки <br> на розсилку залиште <br> Вашу електронну адресу', 'To subscribe <br> to the newsletter, leave <br> Your e-mail address'); ?></div>
    </div>
    <div class="modal-body subscribe-custom-position" data-module="0">

    </div>
  </div>
</div>
<div class="modal" id="appointment">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	  <div class="close-btn"></div>

    <div class="modal-body">
		<div class="aside b-aside">
			<div class="b-content-wrap">
				<p class="b-title">
                    <?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?>

				</p>
				<div class="b-form-wrap">
					<form action="/index.php?route=common/footer/appointments" class=" b-form" data-autosubmit="true">
						<div class="b-input-wrap">
							<p class="b-subtitle"> <?php echo translate('Ваше имя', 'Ваше имя', 'Your name'); ?></p>
							<input class="b-form__input" name="name" placeholder="<?php echo translate('Введите имя', 'Введіть ім`я', 'Enter your name'); ?>"
								   type="text" value="">
							<label class="b-error">
                               <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
							</label>
						</div>
						<div class="b-input-wrap">
							<p class="b-subtitle"><?php echo translate('Выберите удобный способ связи', 'Виберіть зручний спосіб зв\'язку', 'Choose a convenient way to communicate'); ?> </p>
							<div class="b-radio">
								<div class="b-radio__item">
									<input type="radio" class="b-radio-tab" name="radioTab" value="" id="b-tab1">
									<div class="b-label"><?php echo translate('Телефон', 'Телефон', 'Phone'); ?></div>
								</div>

								<div class="b-radio__item">
									<input type="radio" class="b-radio-tab" name="radioTab" value="" id="b-tab2">
									<div class="b-label"><?php echo translate('Эл. адрес', 'Електронна пошта', 'Email'); ?></div>
								</div>
							</div>
							<div class="b-tabs">
								<div class="b-tabs__item">
									<div class="b-subtitle"><?php echo translate('Телефон', 'Телефон', 'Phone'); ?></div>
									<input class="b-form__input b-input--tel" data-mask="+38 (000) 000-00-00"
										   name="phone" placeholder="+38 (___) ___-__-__"
										   type="text" value="">
                                    <label class="b-error">
                                        <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                                    </label>
								</div>
								<div class="b-tabs__item">
									<div class="b-subtitle"><?php echo translate('Эл. адрес', 'Електронна пошта', 'Email'); ?></div>
									<input class="b-form__input b-input--email"
										   name="email"
										   placeholder="<?php echo translate('Введите адрес электронной почты', 'Введіть адресу електронної пошти', 'Enter your email'); ?> "  type="text" value="">
                                    <label class="b-error">
                                        <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                                    </label>
								</div>
							</div>

						</div>
						<div class="b-input-wrap">
							<div class="b-subtitle"><?php echo translate('Укажите удобную для Вас дату', 'Вкажіть зручну для Вас дату', 'Specify the date convenient for you'); ?></div>
							<input class="b-form__input b-input--tel" data-mask="00/00/0000"
								   name="date" placeholder="__/__/____"
								   type="text" value="">
                            <label class="b-error">
                                <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                            </label>
						</div>
						<div class="b-input-wrap">
							<div class="b-checkbox">
								<input type="checkbox" name="accept" id="b-checkbox1"   value="1" class="b-checkbox-item">
								<div class="b-label"><?php echo translate('Даю согласие на обработку ', 'Даю згоду на обробку', 'I agree to the processing'); ?> <a href="#"><?php echo translate('Персональных данных', 'Персональних даних', 'Personal data'); ?></a></div>
                                <label class="b-error">
                                    <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                                </label>
							</div>
						</div>
						<div class="b-btn-wrap">
							<input type="submit" class="b-btn b-save-form" value="<?php translate('Записаться', 'Записатися', 'Sign up'); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
<div class="modal" id="appointments">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	  <div class="close-btn"></div>
	  <div class="close"></div>

    <div class="modal-body">
		<div class="aside b-aside">
			<div class="b-content-wrap">
				<p class="b-title">
					<?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?>
				</p>
				<div class="b-form-wrap">
					<form action="/index.php?route=common/footer/appointments" class=" b-form" data-autosubmit="true">
						<div class="b-input-wrap">
							<p class="b-subtitle"> <?php echo translate('Ваше имя', 'Ваше имя', 'Your name'); ?></p>
							<input class="b-form__input" name="name" placeholder="<?php echo translate('Введите имя', 'Введіть ім`я', 'Enter your name'); ?>"
								   type="text" value="">
                            <label class="b-error">
                                <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                            </label>
						</div>
						<div class="b-input-wrap">
							<p class="b-subtitle"><?php echo translate('Выберите удобный способ связи', 'Виберіть зручний спосіб зв\'язку', 'Choose a convenient way to communicate'); ?> </p>
							<div class="b-radio">

								<div class="b-radio__item">
									<input type="radio" class="b-radio-tab" name="radioTab" value="" id="b-tab1">
									<div class="b-label"><?php echo translate('Телефон', 'Телефон', 'Phone'); ?></div>
								</div>

								<div class="b-radio__item">
									<input type="radio" class="b-radio-tab" name="radioTab" value="" id="b-tab2">
									<div class="b-label"><?php echo translate('Эл. адрес', 'Електронна пошта', 'Email'); ?></div>
								</div>
							</div>
							<input type="hidden" name="services" type="text" value="" id="toservices">
							<div class="b-tabs">
								<div class="b-tabs__item">
									<div class="b-subtitle"><?php echo translate('Телефон', 'Телефон', 'Phone'); ?></div>
									<input class="b-form__input b-input--tel" data-mask="+38 (000) 000-00-00"
										   name="phone" placeholder="+38 (___) ___-__-__"
										   type="text" value="">
                                    <label class="b-error">
                                        <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                                    </label>
								</div>
								<div class="b-tabs__item">
									<div class="b-subtitle"><?php echo translate('Эл. адрес', 'Електронна пошта', 'Email'); ?></div>
									<input class="b-form__input b-input--email"
										   name="email"
										   placeholder="<?php echo translate('Введите адрес электронной почты', 'Введіть адресу електронної пошти', 'Enter your email'); ?> "  type="text" value="">
									<label class="b-error">
                               <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
							</label>
								</div>
							</div>

						</div>
						<div class="b-input-wrap">
							<div class="b-subtitle"><?php echo translate('Укажите удобную для Вас дату', 'Вкажіть зручну для Вас дату', 'Specify the date convenient for you'); ?></div>
							<input class="b-form__input b-input--tel" data-mask="00/00/0000"
								   name="date" placeholder="__/__/____"
								   type="text" value="">
                            <label class="b-error">
                                <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
                            </label>
						</div>
						<div class="b-input-wrap">
							<div class="b-checkbox">
								<input type="checkbox" name="accept" id="b-checkbox1"   value="1" class="b-checkbox-item">
								<div class="b-label"><?php echo translate('Даю согласие на обработку ', 'Даю згоду на обробку', 'I agree to the processing'); ?> <a href="#"><?php echo translate('Персональных данных', 'Персональних даних', 'Personal data'); ?></a></div>
								<label class="b-error">
                               <span> <span>*</span><?php echo translate('Это поле обязательное для заполнения!', 'Це поле обов\'язкове для заповнення!', 'This field is required!'); ?> </span>
							</label>
							</div>
						</div>
						<div class="b-btn-wrap">
							<input type="submit" class="b-btn b-save-form" value="<?php translate('Записаться', 'Записатися', 'Sign up'); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>

    </div>
  </div>
</div>
<script src="/js/libs.min.js?ver=1.0"></script>
<script src="/js/jquery.viewportchecker.min.js?ver=1.0"></script>
<script src="/js/new-main-app.js"></script>
<script src="/js/main.js?ver=1.0"></script>
<script src="/js/main-app.js?ver=1.0"></script>
<script src="/js/mains-app.js"></script>
<script src="/js/simplebar.js"></script>



<script type="text/javascript"><!--
 function captchaz(){
        $.ajax({
            url: 'index.php?route=common/footer/captchaz',
            type: 'post',
            data: {
            },
            dataType: 'json',
            success: function (json) {
                // console.log(json);
                if (json['success'] == true) {
                }

            }

        });
    };
    //--></script>

<script type="text/javascript" src="/catalog/view/javascript/subscribe.js?ver=1.0"></script>
		<script type="text/javascript" src="/catalog/view/javascript/showe-more.js"></script>


		<script>
	$(document).ready(function(){
		$('input[name="phone"]').mask("+38(099)999-99-99");
   		$('#list > li').click(function (event) {
	           $(this).children("ul").slideToggle();
        	   event.stopPropagation();
		});
	});


</script>

		<script type="text/javascript" src="catalog/view/javascript/new-js.js"></script>
		<script src="/js/searchajax.js"></script>

</body></html>