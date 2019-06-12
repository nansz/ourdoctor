<!--Последние публикации-->
<!-- more articles -->
<section class="more-articles">
    <div class="section-wrap">
        <div class="section-container">
            <div class="section__title">
                <p>
                    <?php translate('Последние публикации', 'Останні публікації', 'Latest posts'); ?>
                </p>
            </div>
            <!--Последние публикации-->
            <div class="section__content">
                <div class="more-articles">

                    <?php $i=0;  ?>
                    <?php  foreach($products as $articles) {  ?>
                    <?php if($i<6) {  ?>
                    <?php   $i++; ?>
                    <div class="more__item">
                        <a href="<?php echo $articles['href']; ?>" class="more-link has-img">
                            <img src="<?php echo $articles['thumb']; ?>"
                                 alt="<?php echo $articles['name']; ?>">
                        </a>
                        <div class="content">
                            <a href="<?php echo $articles['href']; ?>" class="more-title"><?php echo $articles['name']; ?></a>
                            <p class="more-preview">
                                <?php echo $articles['description']; ?>
                            </p>
                            <a href="<?php echo $articles['href']; ?>" class="more-link has-link">
                                                <span class="name">
                                                     <?php echo translate('Подробнее', 'Детальніше', 'Read more'); ?>
                                                </span>
                                <span class="icon icon-caret">
                                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                                                </span>
                            </a>
                        </div>
                    </div>  <?php } ?>
                    <?php } ?>

                </div>
            </div>
            <!--Последние публикации-->
        </div>
    </div>
</section>
<!--Последние публикации-->