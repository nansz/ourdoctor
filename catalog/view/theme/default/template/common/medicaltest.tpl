<?php echo $header; ?>



    <div class="breadcrumbs-box container">
        <div class="row">
            <ul class="breadcrumbs start">
                <li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
                <li><span><?php translate('Медицинские тесты', 'Медицинские тесты', 'Медицинские тесты'); ?></span></li>
            </ul>
        </div>
    </div>
    <div class="container news-page">
        <div class="row center column">
            <h1 class="title"><?php translate('Медицинские тесты', 'Медицинские тесты', 'Медицинские тесты'); ?></h1>
            <label>Внимание данный тест не являеться 100% и если у вас что то болит то лучше сгодите в больницу и провертись </label>

            <div class="container-fluid blog-layout blog-page">



                <!-- blog -->

                <section class="section-blog">

                    <div class="section-wrap">
                        <div class="section-container">

                            <div class="section__content">

                                <span>Выберите свой пол </span>
                                    <div>
                                        <label for="men">Вы мужчин</label>
                                        <input id="men" name="gender" type="radio" value="">
                                    </div>
                                    <div>
                                        <label for="men">Вы женщина</label>
                                        <input id="men" name="gender" type="radio" value="">
                                    </div>
                                    <div>
                                        <label for="men">Вы ребенок</label>
                                        <input id="men" name="gender" type="radio" value="">
                                    </div>

                                <div id="first_section">
                                    <span>Выберите часть тела что у вас болит </span>

                                    <div>
                                        <label for="headers">У вас болит голова?</label>
                                        <input id="headers" type="checkbox" value="">
                                    </div>
                                    <div>
                                        <label for="bodys">У вас болит тело? </label>
                                        <input id="bodys" type="checkbox" value="">
                                    </div>
                                    <div>
                                        <label for="hands">У вас болит конечности (руки ноги ) ? </label>
                                        <input id="hands" type="checkbox" value="">
                                    </div>

                                </div>

                                    <?php foreach ($articles_data as $articles) { ?>
                                        <div class="blog__item">
                                            <a href="<?php echo $articles['href']; ?>" class="blog-link has-img">
                                                <img src="<?php echo $articles['image']; ?>"
                                                     alt="<?php echo $articles['name']; ?>">
                                            </a>
                                            <div class="content">
                                                <div class="blog-author">
                                            <span class="icon icon-user">
                                                <svg width="6" height="8" viewBox="0 0 6 8" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
<circle cx="2.74088" cy="2.24014" r="1.82193" fill="#C4C4C4"/>
<path d="M0.0253906 6.77755C0.0253906 5.2778 1.24118 4.06201 2.74093 4.06201C4.24068 4.06201 5.45647 5.2778 5.45647 6.77755V7.08678H0.0253906V6.77755Z"
      fill="#C4C4C4"/>
</svg>

                                            </span>
                                                    <span class="name">
                                             <?php echo $articles['author']; ?>
                                            </span>
                                                </div>
                                                <a href="<?php echo $articles['href']; ?>"
                                                   class="blog-title"><?php echo $articles['title']; ?></a>
                                                <p class="blog-preview">
                                                    <?php echo $articles['description']; ?>
                                                </p>

                                                <a href="<?php echo $articles['href']; ?>" class="blog-link has-link">
                                            <span class="name">
                                                <?php echo translate('Подробнее', 'Детальніше', 'Read more'); ?>

                                            </span>

                                                    <span class="icon icon-caret">
                                                <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
                                            </span>
                                                </a>
                                                <div class="blog-date">
                                                    <?php echo $articles['date']; ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>






<?php echo $footer; ?>
