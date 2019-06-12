<?php echo $header; ?>

<?php //echo $content_top; ?>


<?php if (isset($articles_data)) { ?>


<div class="breadcrumbs-box container">
    <div class="row">
        <ul class="breadcrumbs start">
            <li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
            <li><span><?php translate('Заболевания и симптомы', 'Захворювання і симптоми', 'Diseases and symptoms'); ?></span></li>
        </ul>
    </div>
</div>
<div class="container diseasesandsymptoms-page">
    <div class="row center column">
        <h1 class="title"><?php translate('Заболевания и симптомы', 'Захворювання і симптоми', 'Diseases and symptoms'); ?></h1>
        <div class="container-fluid blog-layout blog-page">
            <!-- search -->

            <?php echo $search; ?>




            <!-- classification -->
            <?php echo $minileftcolumn; ?>





            <!-- blog -->
            <section class="section-blog">
                <div class="section-wrap">
                    <div class="section-container">
                        <div class="section__content">
                            <div class="blog">
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
                                <div id="ajax_loader" ></div>
                            </div>
                            <!-- navigation -->
                            <div class="blog-nav">
                                <!-- generation button show more -->
                                <input  type="hidden" id="swovs" value="<?php translate('Показать больше', 'Показати більше', 'Show more'); ?>">

                                <div class="buttonshowmore">

                                </div>


                                <div class="box-pagination">
                                    <?php echo $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- more articles -->
            <?php echo $lastaddarticles; ?>

        </div>
    </div>
</div>
<?php } ?>


<?php if(isset($articles_info)) { ?>
<div class="breadcrumbs-box container">
    <div class="row">
        <ul class="breadcrumbs start">
            <li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
            <li><a href="/diseasesandsymptoms/"><?php translate('Заболевания и симптомы', 'Захворювання і симптоми', 'Diseases and symptoms'); ?></a></li>
            <li><span><?php echo $heading_title; ?></span></li>
        </ul>
    </div>
</div>
<!-- BREADCRUMBS =================================================================================-->

<div class="container page">
    <div class="row">
          <!------------------------------------------ new layout start ------------------------------------------>
        <div class="container-fluid article-layout article-page">
            <!-- classification -->

            <?php echo $minileftcolumn; ?>

            <!-- article -->
            <section class="section-article">
                <div class="section-wrap">
                    <div class="section-container">
                        <div class="section__content">
                            <div class="article">
                                <h1><?php echo $heading_title; ?> </h1>
                               <!---------------- description ----------------------------->

                                <?php if($description) echo $description; ?>
                                <div class="article-img img-wraps">
                                    <img src="<?php echo $popup; ?>" alt="">
                                </div>

                                <div class="article-author">
                                    <div class="img-wraps">
                                        <img src="<?php echo $staf_image; ?>" alt="">
                                    </div>
                                    <div class="content">
                                        <p class="title">
                                            <?php echo translate('Автор статьи:', 'Автор статті:', 'Article author:'); ?>
                                        </p>
                                        <p class="author">
                                            <?php echo $staf_name; ?>
                                        </p>
                                        <p class="specialization">
                                            <?php echo $staf_description; ?>
                                        </p>
                                        <a href="<?php echo $author_href; ?>" class="author-link">
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
                                </div>
                                <div class="text-wrap">

                                    <!---------------- description2 ----------------------------->
                                    <?php if($description2) echo $description2; ?>
                                    <!----------------Slider----------------------------->
                                    <?php if ($images) { ?>
                                    <div class="media slider-wrap">
                                        <div class="slider">
                                            <?php foreach ($images as $image) { ?>
                                            <div class="slider__item">
                                                <div class="img-wraps">
                                                    <img src="<?php echo $image['thumb']; ?>">
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>
                                        <!-- navigation -->
                                        <nav class="nav-arrows">
                                            <div class="prev">
                                                <div class="arrow">
                                                    <span class="icon icon-arrow-left">
                                                        <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
<path d="M5.24377 8.42517L1.31445 4.49585L5.24377 0.566528" stroke="#C4C4C4"/>
</svg>

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="next">
                                                <div class="arrow">
                                                    <span class="icon icon-arrow-right">
                                                        <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
</svg>

                                                    </span>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                    <?php } ?>
                                    <!---------------- description3 ----------------------------->
                                    <?php if($description3) echo $description3; ?>
                                    <?php if($hrefwebsite) { echo $hrefwebsite; } ?>

                                </div>
                                <div class="share">
                                    <p class="share-title">
                                        <?php echo translate('Поделиться', 'Поділитися', 'Share'); ?>
                                    </p>
                                    <ul class="share-list">
                                        <li class="share-list__item">
                                            <a href="http://vkontakte.ru/share.php?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"
                                            target="_blank">
                                            <span class="icon icon-vk">
                                                    <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
<path d="M14.9394 7.36215C14.9223 7.32524 14.9063 7.29463 14.8915 7.27011C14.6461 6.82822 14.1773 6.28584 13.4852 5.6428L13.4706 5.62808L13.4632 5.62086L13.4558 5.61346H13.4484C13.1343 5.31403 12.9354 5.1127 12.8521 5.00962C12.6997 4.81327 12.6656 4.61451 12.7488 4.41313C12.8077 4.26098 13.0288 3.93966 13.4115 3.44872C13.6128 3.18854 13.7723 2.98001 13.89 2.82291C14.7393 1.69389 15.1075 0.972433 14.9945 0.658252L14.9506 0.584832C14.9212 0.540631 14.8451 0.500194 14.7225 0.463317C14.5997 0.426517 14.4426 0.420431 14.2512 0.444956L12.1307 0.459603C12.0964 0.447431 12.0473 0.448566 11.9834 0.463317C11.9196 0.478068 11.8877 0.485469 11.8877 0.485469L11.8508 0.503908L11.8215 0.52606C11.7969 0.540708 11.7699 0.566471 11.7404 0.603297C11.7111 0.639994 11.6866 0.68306 11.667 0.732136C11.4361 1.32607 11.1737 1.87828 10.8791 2.38874C10.6975 2.69312 10.5307 2.95691 10.3783 3.18026C10.2262 3.40354 10.0986 3.56804 9.99557 3.67349C9.89241 3.77904 9.79932 3.86361 9.71571 3.92748C9.63223 3.99139 9.56851 4.01839 9.52439 4.00851C9.48016 3.99863 9.43851 3.98883 9.39908 3.97903C9.33041 3.93483 9.27517 3.87472 9.23352 3.79864C9.19169 3.72257 9.16353 3.62682 9.1488 3.51146C9.13415 3.39603 9.12549 3.29675 9.12301 3.21327C9.12072 3.1299 9.12178 3.01197 9.12675 2.85981C9.13186 2.70758 9.13415 2.60459 9.13415 2.55058C9.13415 2.36403 9.13779 2.16157 9.14509 1.94314C9.15252 1.72471 9.15852 1.55164 9.16355 1.42414C9.16856 1.29652 9.17088 1.16149 9.17088 1.01914C9.17088 0.876784 9.16221 0.765145 9.14509 0.684118C9.12817 0.603193 9.1022 0.524642 9.06798 0.448488C9.03355 0.372412 8.98316 0.313563 8.91704 0.271786C8.85079 0.23006 8.76842 0.196948 8.6704 0.172345C8.41022 0.11347 8.07892 0.0816216 7.67633 0.0766702C6.76339 0.0668706 6.17678 0.125823 5.91663 0.25345C5.81355 0.307374 5.72028 0.381051 5.63688 0.474251C5.5485 0.582279 5.53617 0.641232 5.59997 0.650928C5.89453 0.695052 6.10305 0.800604 6.22578 0.967482L6.27001 1.05591C6.30441 1.11971 6.33876 1.23266 6.37314 1.39462C6.40746 1.55657 6.42961 1.73572 6.43936 1.93197C6.46386 2.29035 6.46386 2.59713 6.43936 2.85234C6.41478 3.10764 6.39158 3.30639 6.36942 3.44875C6.34727 3.5911 6.31416 3.70645 6.27001 3.79478C6.22578 3.88313 6.19636 3.93713 6.18161 3.95673C6.16688 3.97633 6.1546 3.98868 6.14486 3.99353C6.08106 4.01797 6.0147 4.03043 5.94603 4.03043C5.87725 4.03043 5.79385 3.99603 5.6957 3.92728C5.59757 3.85852 5.49574 3.76409 5.39018 3.64381C5.28463 3.52351 5.16559 3.35539 5.03301 3.13944C4.90054 2.92349 4.76308 2.66826 4.62073 2.37375L4.50296 2.16017C4.42933 2.02277 4.32875 1.8227 4.20113 1.56015C4.07342 1.2975 3.96055 1.04343 3.86242 0.798C3.8232 0.694923 3.76427 0.616449 3.68574 0.562448L3.64889 0.540295C3.62439 0.520696 3.58507 0.499885 3.53112 0.477707C3.47709 0.455554 3.42072 0.439669 3.36176 0.429895L1.34436 0.444543C1.1382 0.444543 0.998327 0.491246 0.924675 0.584523L0.895199 0.628647C0.880474 0.653223 0.873047 0.692473 0.873047 0.7465C0.873047 0.800501 0.887772 0.866778 0.917248 0.945252C1.21175 1.63741 1.53202 2.30495 1.87805 2.94796C2.22408 3.59097 2.52477 4.10893 2.77995 4.50138C3.03518 4.89411 3.29533 5.26477 3.56041 5.61317C3.82549 5.9617 4.00096 6.18506 4.08681 6.28318C4.17276 6.38149 4.24027 6.45499 4.28935 6.50406L4.47345 6.68074C4.59126 6.79857 4.76425 6.93968 4.9925 7.10408C5.2208 7.26859 5.47356 7.43054 5.75089 7.59019C6.02827 7.74959 6.35096 7.87967 6.71914 7.98027C7.08727 8.08098 7.44558 8.12139 7.79411 8.10189H8.64085C8.81257 8.08706 8.94267 8.03306 9.0311 7.93986L9.0604 7.90296C9.0801 7.87366 9.09854 7.82815 9.11556 7.7669C9.13279 7.70555 9.14135 7.63796 9.14135 7.56443C9.13632 7.3534 9.15239 7.16322 9.18911 6.99389C9.22581 6.82461 9.26764 6.69698 9.31442 6.61103C9.36117 6.52516 9.41393 6.45269 9.47265 6.39394C9.5315 6.33507 9.57344 6.2994 9.59804 6.28713C9.62249 6.27478 9.64201 6.2664 9.65673 6.26137C9.77453 6.22212 9.91317 6.26013 10.0729 6.37558C10.2324 6.49093 10.3821 6.63336 10.522 6.80264C10.6619 6.97207 10.83 7.16216 11.0263 7.37319C11.2228 7.58429 11.3945 7.74121 11.5417 7.84444L11.6889 7.93279C11.7872 7.99175 11.9148 8.04575 12.072 8.09482C12.2288 8.14387 12.3662 8.15615 12.4842 8.13162L14.369 8.10223C14.5554 8.10223 14.7004 8.07136 14.8033 8.01011C14.9064 7.94876 14.9677 7.88117 14.9874 7.80764C15.0071 7.73404 15.0082 7.65054 14.9912 7.55719C14.9737 7.46406 14.9565 7.39895 14.9394 7.36215Z"
      fill="#006A86"/>
</svg>

                                                </span>
                                            </a>
                                        </li>
                                        <li class="share-list__item">
                                            <a href="http://www.facebook.com/sharer.php?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"
                                            target="_blank">
                                            <span class="icon icon-fb">
                                                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
<path d="M7.81081 0.500371L6.09576 0.49762C4.16895 0.49762 2.92377 1.77514 2.92377 3.75243V5.25312H1.19936C1.05035 5.25312 0.929688 5.37392 0.929688 5.52293V7.69726C0.929688 7.84627 1.05049 7.96693 1.19936 7.96693H2.92377V13.4534C2.92377 13.6025 3.04444 13.7231 3.19345 13.7231H5.44331C5.59232 13.7231 5.71298 13.6023 5.71298 13.4534V7.96693H7.72922C7.87823 7.96693 7.99889 7.84627 7.99889 7.69726L7.99972 5.52293C7.99972 5.45139 7.97124 5.38287 7.92074 5.33224C7.87025 5.2816 7.80145 5.25312 7.72991 5.25312H5.71298V3.98097C5.71298 3.36952 5.85869 3.05912 6.65519 3.05912L7.81053 3.05871C7.9594 3.05871 8.08007 2.9379 8.08007 2.78903V0.770047C8.08007 0.621312 7.95954 0.500647 7.81081 0.500371Z"
      fill="#006A86"/>
</svg>

                                                </span>
                                            </a>
                                        </li>
                                        <li class="share-list__item">
                                            <a href="https://twitter.com/share?url=<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>+&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons"
                                            target="_blank">
                                            <span class="icon icon-twi">
                                                    <svg width="19" height="15" viewBox="0 0 19 15" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
<path d="M18.5156 1.88796C17.8531 2.16521 17.1422 2.35323 16.3954 2.43718C17.158 2.00587 17.7417 1.32176 18.0184 0.509095C17.3031 0.908512 16.5134 1.19854 15.6721 1.35576C14.9984 0.676956 14.04 0.25415 12.9771 0.25415C10.9379 0.25415 9.28442 1.81573 9.28442 3.74062C9.28442 4.01362 9.31704 4.28026 9.38004 4.53523C6.31162 4.38968 3.59077 3.00126 1.76974 0.891512C1.45142 1.40568 1.27033 2.00479 1.27033 2.64432C1.27033 3.85429 1.92271 4.9219 2.91254 5.54651C2.30739 5.5274 1.73824 5.37018 1.23998 5.10885V5.1524C1.23998 6.84146 2.51324 8.25112 4.20154 8.57196C3.89221 8.65057 3.56604 8.69412 3.2286 8.69412C2.99015 8.69412 2.75957 8.67182 2.53348 8.62932C3.00363 10.0156 4.36689 11.0237 5.9821 11.0514C4.71895 11.9862 3.12624 12.5418 1.39633 12.5418C1.09827 12.5418 0.804684 12.5248 0.515625 12.494C2.14995 13.4851 4.09021 14.063 6.17557 14.063C12.9682 14.063 16.6811 8.74937 16.6811 4.14112L16.6687 3.68965C17.3942 3.20096 18.0218 2.58696 18.5156 1.88796Z"
      fill="#006A86"/>
</svg>

                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="article-end"></div>

            <!-- blog -->
            <?php if($article_related) { ?>
            <section class="section-blog">
                <div class="section-wrap">
                    <div class="section-container">
                        <div class="section__title">
                            <p>
                                <?php echo $text_red ?>
                            </p>
                        </div>

                        <div class="section__content">
                            <div class="blog">
                                <?php foreach ($article_related as $article_relate) { ?>
                                <div class="blog__item">
                                    <a href="<?php echo $article_relate['href']; ?>" class="blog-link has-img">
                                        <img src="<?php echo $article_relate['thumb']; ?>" alt="">
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
                                                <?php echo $article_relate['author']; ?>
                                            </span>
                                        </div>
                                        <a href="<?php echo $article_relate['href']; ?>" class="blog-title"><?php echo $article_relate['name']; ?></a>
                                        <p class="blog-preview">
                                            <?php echo $article_relate['description']; ?>
                                        </p>
                                        <a href="<?php echo $article_relate['href']; ?>" class="blog-link has-link">
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
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>

            <!-- more articles -->
            <?php echo $lastaddarticles; ?>
        </div>
        <!------------------------------------------ new layout end ------------------------------------------>

    </div>
</div>



<?php } ?>



<?php echo $footer; ?>