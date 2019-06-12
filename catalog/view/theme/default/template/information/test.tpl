<?php echo $header; ?>

<?php //echo $content_top; ?>


<?php if (isset($articles_data)) { ?>


    <div class="breadcrumbs-box container">
        <div class="row">
            <ul class="breadcrumbs start">
                <li><a href="/"><?php translate('Ourdoctor', 'Ourdoctor', 'Ourdoctor'); ?></a></li>
                <li><span><?php translate('Медицинские тесты', 'Медицинские тесты', 'Медицинские тесты'); ?></span></li>
            </ul>
        </div>
    </div>
<div class="container diseasesandsymptoms-page">
    <div class="row center column">
        <h1 class="title"><?php translate('Медицинские тесты', 'Медицинские тесты', 'Медицинские тесты'); ?></h1>
        <div class="container-fluid blog-layout blog-page">
            <!-- blog -->
            <section class="section-blog">
                <div class="section-wrap">
                    <div class="section-container">
                        <div class="section__content">
                                <?php foreach ($articles_data as $articles) { ?>
                                <div class="blog__item">
                                    <div class="content">
                                        <a href="<?php echo $articles['href']; ?>" class="blog-title">
                                            <?php echo $articles['title']; ?>
                                        </a>
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
<?php } ?>


<?php if (isset($articles_info)) { ?>

<div class="breadcrumbs-box container">
    <div class="row">
        <ul class="breadcrumbs start">
            <li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
            <li><a href="/announcement/"><?php translate('Анонс', 'Анонс', 'Announcement'); ?></a></li>
            <li><span><?php echo $heading_title; ?></span></li>
        </ul>
    </div>
</div>
<!-- BREADCRUMBS =================================================================================-->

<div class="container page">
    <div class="row">
        <!------------------------------------------ new layout start ------------------------------------------>
        <div class="container-fluid article-layout article-page">
            <!-- article -->
            <section class="section-article">
                <div class="section-wrap">
                    <div class="section-container">
                        <div class="section__content">
                                <h1><?php echo $heading_title; ?> </h1>
                                <!---------------- description ----------------------------->

<form id="tests_form">

                                <?php foreach ($tests as $value) { ?>
                                    <div class="content">
                                        <span>
                                           <?php echo $value['name']; ?>
                                            <input type="checkbox" class="messageCheckbox" value="<?php echo $value['value']; ?>">
                                        </span>

                                    </div>

                                <?php } ?>
        <input type="button" id="send_test_res"      value="Получить результат">
</form>
                           <div>
                               <h2><span id="title_test"></span> <span id="prosent"></span> </h2>

                           </div>

                            <div id="description_test">

                            </div>

                            <div id="description_test2">

                            </div>



                        </div>
                    </div>
                </div>
            </section>
            <div class="article-end"></div>



        </div>

    </div>
</div>


<?php } ?>




<?php echo $footer; ?>


<script>
    $('#send_test_res').bind('click', function () {
        $('#title_test').html('');
        $('#description_test').html('');
        $('#description_test2').html('');
        $('#prosent').html('');

        var value_1 = 0;
        var value_2 = 0;
        var value_3 = 0;
        var value_4 = 0;
        var value_5 = 0;
        var value_6 = 0;
        var value_7 = 0;


        var checkboxes = document.getElementsByClassName('messageCheckbox');
        var checkboxesChecked = []; // можно в массиве их хранить, если нужно использовать
        for (var index = 0; index < checkboxes.length; index++) {
            if (checkboxes[index].checked) {

                // checkboxesChecked.push(checkboxes[index].value); // положим в массив выбранный

                switch (parseInt(checkboxes[index].value)){
                    case 1:
                        value_1 += 1;
                        break;
                    case 2:
                        value_2 += 1;

                        break;
                    case 3:
                        value_3 += 1;

                        break;
                    case 4:
                        value_4 += 1;

                        break;
                    case 5:
                        value_5 += 1;

                        break;
                    case 6:
                        value_6 += 1;

                        break;case 7:
                        value_7 += 1;

                        break;
                }
                }
            }



        $.ajax({
            url: 'index.php?route=information/tests/checktest',
            type: 'post',
            dataType: 'json',
            data: {'value_1':value_1,
                    'value_2':value_2,
                    'value_3':value_3,
                     'value_4':value_4,
                     'value_5':value_5,
                      'value_6':value_6,
                      'value_7':value_7,
            },
            success: function (json) {

                if(json['title']){
                    $('#title_test').html(json['title']);
                }

                if(json['prosent']){
                    $('#prosent').html(json['prosent']);
                }


                if(json['description']){
                    $('#description_test').html(json['description']);

                }

                if(json['description2']){
                    $('#description_test2').html(json['description2']);

                }
            }
        });




    })
</script>

