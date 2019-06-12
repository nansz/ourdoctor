<?php echo $header; ?>


    <div class="personals-page">
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
            <div class="container-fluid staff-block-main a-personal">
                <div class="row">
                    <div class="container">
                        <div class="a-personal-list">
                            <?php foreach ($staff_data as $staff) { ?>
                            <div class="a-personal-list__item full-info">
                                <div class="a-img-wrap">
                                    <img src="<?php echo $staff['image']; ?>" alt="">
                                    <?php if($staff['page_url']) { ?>
                                    <a href="<?php echo $staff['href']; ?>" class="a-personal-link a-btn a-btn--colored">
                                        <?php echo translate('Подробнее', 'Детальніше', 'Read more'); ?>
                                    </a>
                                    <?php } ?>
                                </div>
                                <div class="a-content">
                                    <p class="a-title">
                                        <?php echo $staff['title']; ?>
                                    </p>
                                    <?php if($staff['position']) { ?>
                                    <p class="a-specialization">
                                        <?php echo $staff['position']; ?>
                                    </p>
                                    <?php } ?>

                                    <?php if($staff['experience']) { ?>
                                    <div class="a-info">
                                        <p class="a-left"><?php echo $staff['experience']; ?></p>
                                        <p class="a-right"><?php echo translate('Стаж работы по специальности', 'Стаж роботи за фахом', 'Work experience in the specialty'); ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if($staff['images']) { ?>
                                    <a href="#" class="a-certificate-link a-btn a-btn--transparent"
                                       data-a-gallery="<?php echo $staff['id']; ?>">
                                        <?php echo translate('Сертификаты', 'Сертифікати', 'Сertificates'); ?>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--certificates for 1 & 2 examples-->
            <div class="a-gallery-bg"></div>
            <?php foreach ($staff_data as $staff) { ?>
            <div class="a-certificate-gallery sl--fillgap" id="<?php echo $staff['id']; ?>">
                <div class="a-btn--close"></div>
                <div class="a-slider-wrap">
                    <div class="a-slider">
                        <?php foreach($staff['images'] as $image) { ?>
                        <div class="a-slider__item">
                            <div class="a-img-wrap">
                                <img alt="" src="<?php echo $image; ?>">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- nav -->
                    <nav class="a-nav-arrows">
                        <div class="prev">
                            <div class="arrow">
                                <span class="icon icon-arrow-left">
                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="next">
                            <div class="arrow">
                                <span class="icon icon-arrow-right">
                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>



<?php if(isset($staff_info)) { ?>
<div class="breadcrumbs-box container">
    <div class="row">
        <ul class="breadcrumbs start">
            <li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
            <li><a href="/staff/"><?php translate('Наш персонал', 'Наш персонал', 'Our staff'); ?></a></li>
            <li><span><?php echo $heading_title; ?></span></li>
        </ul>
    </div>
</div>
<!-- BREADCRUMBS =================================================================================-->

<div class="container page">
    <div class="row">
        <div class="wrapper_inside b-personal">
            <div class="doc_inside">
                <div class="aside b-aside">
                    <div class="b-img-wrap">
                        <img src="<?php echo $popup; ?>" alt="">
                    </div>
                    <div class="b-content-wrap">
                        <p class="b-title">
                                <?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?>
                        </p>


                        <div class="b-form-wrap">
                                <form action="/index.php?route=common/footer/appointment" class=" b-form" data-autosubmit="true">
                                <div class="b-input-wrap">
                                    <p class="b-subtitle"> <?php echo translate('Ваше имя', 'Ваше имя', 'Your name'); ?></p>
                                    <input class="b-form__input" name="name" placeholder="<?php echo translate('Введите имя', 'Введіть ім`я', 'Enter your name'); ?>"
                                            type="text" value="">
                                    <label class="b-error">
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
                                            </label>
                                        </div>
                                        <div class="b-tabs__item">
                                            <div class="b-subtitle"><?php echo translate('Эл. адрес', 'Електронна пошта', 'Email'); ?></div>
                                            <input class="b-form__input b-input--email"
                                                   name="email"
                                                   placeholder="<?php echo translate('Введите адрес электронной почты', 'Введіть адресу електронної пошти', 'Enter your email'); ?> "  type="text" value="">
                                            <label class="b-error">
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
                                    </label>
                                </div>
                                <div class="b-input-wrap">
                                    <div class="b-checkbox">
                                        <input type="checkbox" name="accept" id="b-checkbox1"   value="1" class="b-checkbox-item">
                                        <div class="b-label"><?php echo translate('Даю согласие на обработку ', 'Даю згоду на обробку', 'I agree to the processing'); ?> <a href="#"><?php echo translate('Персональных данных', 'Персональних даних', 'Personal data'); ?></a></div>
                                        <label class="b-error">
                                        </label>
                                    </div>
                                </div>
                                <div class="b-btn-wrap">
                                    <input type="submit" class="b-btn b-save-form" value="<?php translate('Записаться', 'Записатися', 'Sign up'); ?>">
                                </div>
                            </form>



                          <!--  <form action="/index.php?route=common/footer/appointment" class="center column" data-autosubmit="true">
                                <label><?php translate('Имя', 'Ім`я', 'Name'); ?>*</label>
                                <input type="text" name="name" placeholder="<?php translate('Введите имя', 'Введіть ім`я', 'Enter your name'); ?>">

                                 <label>E-mail*</label>
                                  <input type="text" name="email" id="email" placeholder="E-mail">

                                <label>Телефон*</label>
                                <input type="text" name="phone" id="phone" placeholder="+38(___) ___-__-__">
                                <p><?php translate('Пример', 'Приклад', 'Example'); ?>: +38 (095) 449 76 28</p>
                                <input type="hidden" name="services" type="text" value="" id="toservices">


                                <input type="hidden" name="value2" value=" <?php echo $random_value2; ?>">
                                <input type="hidden" name="value1" value=" <?php echo $random_value1; ?>">
                                <label style="display: flex;justify-content: space-between;"><?php translate('Проверка', 'Перевірка', 'Checking'); ?>  <?php echo $random_value2." + "; echo $random_value1; ?> </label>
                                <input type="text" name="captcha" id="captcha" placeholder="<?php translate('Введите проверочный код', 'Введіть код перевірки', 'Enter the verification code'); ?>">
                                <input type="submit" value="<?php translate('Отправить', 'Відправити', 'Send'); ?>">
                            </form>-->


                        </div>
                    </div>
                </div>
                <div class="content_ins">
                    <div class="b-img-wrap">
                        <img src="<?php echo $popup; ?>" alt="">
                    </div>
                    <div class="b-personal-info">
                        <div class="text-wrap">
                            <div class="b-top">
                                <h2 class="b-title">
                                    <?php echo $heading_title; ?>
                                </h2>
                                <?php if($position) { ?>
                                <p class="b-specialization">
                                    <?php echo $position; ?>
                                </p>
                                <?php } ?>
                                <?php if($experience) { ?>
                                <div class="b-info">
                                    <p class="b-left">  <?php echo $experience; ?></p>
                                    <p class="b-right"><?php echo translate('Стаж работы по специальности', 'Стаж роботи за фахом', 'Work experience in the specialty'); ?></p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="b-article">
                                <?php echo $description; ?>

                                <?php if ($images) { ?>

                                <div class="b-media b-slider-wrap has-one" data-a-gallery="b-gallery-1">
                                    <div class="b-slider">
                                        <?php foreach ($images as $image) { ?>
                                        <div class="b-slider__item">
                                            <div class="img-wrap">
                                                <img src="<?php echo $image['popup']; ?>" alt="">
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- navigation -->
                                    <nav class="b-nav-arrows">
                                        <div class="prev">
                                            <div class="arrow">
                                        <span class="icon icon-arrow-left">
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg>

                                        </span>
                                            </div>
                                        </div>
                                        <div class="next">
                                            <div class="arrow">
                                        <span class="icon icon-arrow-right">
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                                        </span>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                                <?php } ?>
                                <?php if($certification) { ?>
                                <div class="b-media b-slider-wrap has-many has-certificates" data-a-gallery="b-gallery-2">
                                    <div class="b-slider">
                                        <?php for ($i=1; $i<$count; $i++) { ?>
                                        <div class="b-slider__item">
                                            <div class="img-wrap">
                                                <img src="<?php echo $certification[$i]; ?>" alt="">
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                    <!-- navigation -->
                                    <nav class="b-nav-arrows">
                                        <div class="prev">
                                            <div class="arrow">
                                        <span class="icon icon-arrow-left">
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg>

                                        </span>
                                            </div>
                                        </div>
                                        <div class="next">
                                            <div class="arrow">
                                        <span class="icon icon-arrow-right">
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                                        </span>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="b-bottom">
                                <?php if($description2) { ?>
                                <div class="pablic">
                                    <div class="h_section">
                                        <?php echo translate('Предоставляемые врачом услуги', 'Надані лікарем послуги', 'Medical Services'); ?>
                                    </div>
                                    <div class="scroll_box serv_section">
                                        <?php echo $description2; ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($description3) { ?>
                                <div class="pablic">
                                    <div class="h_section">
                                        <?php echo translate('Научные публикации врача', 'Наукові публікації лікаря', 'Scientific publications doctor'); ?>
                                    </div>
                                    <div class="scroll_box">
                                        <?php echo $description3; ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="b-btn-wrap">
                                    <a href="#" class="modal-trigger button b-btn"   data-modal="appointment">
                                        <?php echo translate('Записаться на прием', 'Записатися на прийом', 'To make an appointment'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--large galleries-->

        <div class="b-gallery-bg"></div>
        <?php if ($images) { ?>

        <div class="b-large-gallery sl--fillgap" id="b-gallery-1">
            <div class="b-btn--close"></div>
            <div class="b-slider-wrap">
                <div class="b-slider">
                    <?php foreach ($images as $image) { ?>
                    <div class="b-slider__item">
                        <div class="b-img-wrap">
                            <img alt="" src="<?php echo $image['popup']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- nav -->
                <nav class="b-nav-arrows">
                    <div class="prev">
                        <div class="arrow">
                        <span class="icon icon-arrow-left">
                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg>

                        </span>
                        </div>
                    </div>
                    <div class="next">
                        <div class="arrow">
                        <span class="icon icon-arrow-right">
                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                        </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <?php } ?>
        <?php if($certification) { ?>
        <div class="b-large-gallery sl--fillgap" id="b-gallery-2">
            <div class="b-btn--close"></div>
            <div class="b-slider-wrap">
                <div class="b-slider">
                    <?php for ($i=1; $i<$count; $i++) { ?>
                    <div class="b-slider__item">
                        <div class="b-img-wrap">
                            <img alt="" src="<?php echo $certification[$i]; ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- nav -->
                <nav class="b-nav-arrows">
                    <div class="prev">
                        <div class="arrow">
                        <span class="icon icon-arrow-left">
                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg>

                        </span>
                        </div>
                    </div>
                    <div class="next">
                        <div class="arrow">
                        <span class="icon icon-arrow-right">
                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                        </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<?php } ?>


<script>
    function Complete()
      {

           var name = document.sell.name.value;
          var phone  = document.sell.phone.value;
          var email  = document.sell.email.value;
          console.log(name);
          console.log(phone);
          console.log(email);
      }


</script>




<script>
    function test(data) {

       var zew= data.getElementsByTagName('input');
        // var aa= zew.item()

        for (var i = 0; i < zew.length; i++) {
            var input = zew[i];
            console.log( input.value);
        }
        // console.log(aa)

    }
</script>
<?php echo $footer; ?>