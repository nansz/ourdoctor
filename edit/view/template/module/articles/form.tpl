<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
     <a
                href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
    <div class="box">
        <div class="heading">
            <h1><img src="view/image/articles.png" alt=""/> <?php echo $heading_title; ?></h1>
            <div class="buttons">
                <a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a>
                <a onclick="location = '<?php echo $cancel; ?>';"
                   class="button"><span><?php echo $button_cancel; ?></span></a>
            </div>
        </div>
        <div class="content">
            <div id="tabs" class="htabs">
                <a href="#tab_language"><?php echo $tab_language; ?></a>
                <a href="#tab_setting"><?php echo $tab_setting; ?></a>
                <a href="#tab-image"><?php echo $text_tab_image; ?></a>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <div id="tab_language">
                    <div id="languages" class="htabs">
                        <?php foreach ($languages as $language) { ?>
                        <a href="#language<?php echo $language['language_id']; ?>"><img
                                    src="view/image/flags/<?php echo $language['image']; ?>"
                                    title="<?php echo $language['name']; ?>"/> <?php echo $language['name']; ?></a>
                        <?php } ?>
                    </div>
                    <?php foreach ($languages as $language) { ?>
                    <div id="language<?php echo $language['language_id']; ?>">
                        <table class="form">
                            <tr>
                                <td><span class="required">*</span> <?php echo $entry_title; ?></td>
                                <td><input name="articles_description[<?php echo $language['language_id']; ?>][title]"
                                           size="80"
                                           value="<?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['title'] : ''; ?>"/>
                                    <?php if (isset($error_title[$language['language_id']])) { ?>
                                    <span class="error"><?php echo $error_title[$language['language_id']]; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo "Тег TITLE:"; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][meta_title]"
                                            style="width:90%;"
                                            rows="2"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['meta_title'] : ''; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $entry_meta_description; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][meta_description]"
                                            cols="70"
                                            rows="2"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['meta_description'] : ''; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $entry_meta_keyword; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][meta_keyword]"
                                            cols="70"
                                            rows="2"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['meta_keyword'] : ''; ?></textarea>
                                </td>
                            <tr>
                                <td><?php echo $column_date_added; ?></td>
                                <td><input type="text" name="date_added" value="<?php echo $date_added; ?>" size="12"/>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="required">*</span> <?php echo $entry_description; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][description]"
                                            id="description<?php echo $language['language_id']; ?>"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['description'] : ''; ?></textarea>
                                    <?php if (isset($error_description[$language['language_id']])) { ?>
                                    <span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="required">*</span> <?php echo $entry_description; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][description2]"
                                            id="description2<?php echo $language['language_id']; ?>"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['description2'] : ''; ?></textarea>
                                    <?php if (isset($error_description[$language['language_id']])) { ?>
                                    <span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>

                            <tr>
                                <td><span class="required">*</span> <?php echo $entry_description; ?></td>
                                <td><textarea
                                            name="articles_description[<?php echo $language['language_id']; ?>][description3]"
                                            id="description3<?php echo $language['language_id']; ?>"><?php echo isset($articles_description[$language['language_id']]) ? $articles_description[$language['language_id']]['description3'] : ''; ?></textarea>
                                    <?php if (isset($error_description[$language['language_id']])) { ?>
                                    <span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php } ?>
                </div>
                <div id="tab_setting">
                    <table class="form">
                        <tr style="display: none;">

                        <td><?php echo $entry_store; ?></td>
                            <td>
                                <div id="store_ids" class="scrollbox" style="width:225px;height:60px;">
                                    <?php $class = 'even'; ?>
                                    <div class="<?php echo $class; ?>">
                                        <?php if (in_array(0, $articles_store)) { ?>
                                        <input type="checkbox" name="articles_store[]" value="0" checked="checked"/>
                                        <?php echo $text_default; ?>
                                        <?php } else { ?>
                                        <input type="checkbox" name="articles_store[]" value="0"/>
                                        <?php echo $text_default; ?>
                                        <?php } ?>
                                    </div>
                                    <?php foreach ($stores as $store) { ?>
                                    <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                                    <div class="<?php echo $class; ?>">
                                        <?php if (in_array($store['store_id'], $articles_store)) { ?>
                                        <input type="checkbox" name="articles_store[]"
                                               value="<?php echo $store['store_id']; ?>" checked="checked"/>
                                        <?php echo $store['name']; ?>
                                        <?php } else { ?>
                                        <input type="checkbox" name="articles_store[]"
                                               value="<?php echo $store['store_id']; ?>"/>
                                        <?php echo $store['name']; ?>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <a onclick="select_all('articles_store', '1');"><?php echo $text_select_all; ?></a> | <a
                                        onclick="select_all('articles_store', '0');"><?php echo $text_unselect_all; ?></a>
                            </td>
                        </tr>

                        <tr>
                            <td><?php echo $entry_keyword; ?></td>
                            <td><input type="text" name="keyword" value="<?php echo $keyword; ?>" size="40"/></td>
                        </tr>

                        <tr>
                            <td><?php echo "Ссылка на источник" ?></td>
                            <td><input type="text" name="hrefwebsite" value="<?php echo $hrefwebsite; ?>" size="40"/></td>
                        </tr>

                        <tr>
                            <td><?php echo $entry_author; ?></td>
                            <td>
                                <select  onchange="author()" id="authors" name="authors">
                                    <?php if ($author_id==0) { ?>
                                    <option  value="<?php echo 1;?>" selected="selected"><?php echo $entry_author; ?> </option>
                                    <?php } else { ?>
                                    <option  value="<?php echo $author_id;?>" selected="selected"><?php echo $author; ?> </option>
                                    <?php } ?>

                                    <?php foreach ($staffs_info as $staffs_inf) { ?>
                                    <option value="<?php echo $staffs_inf['staff_id'];?>"><?php echo $staffs_inf['name'];?> </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td hidden><input type="text" id="author_id" name="author_id" value="<?php echo $author_id; ?>" size="40"/></td>
                            <td hidden><input type="text" id="author_name" name="author_name" value="<?php echo $author; ?>" size="40"/></td>
                        </tr>

                      


                        <tr>
                            <td>Показывать на Русском языке</td>
                            <td>
                                <?php if ($rus) { ?>
                                <input type="checkbox"  id="rus"  value="<?php echo $rus;?>" checked="checked"/>
                                <?php } else { ?>
                                <input type="checkbox"  id="rus"  value="<?php echo $rus;?>" />
                                <?php } ?>
                                <input  type="hidden"  id="russ" name="rus"  value="<?php echo $rus;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Показывать на Украинском языке</td>
                            <td><?php if ($ukr==1) { ?>
                                <input type="checkbox" id="ukr"  value="<?php echo $ukr;?>" checked="checked"/>
                                <?php } else { ?>
                                <input type="checkbox" id="ukr" value="<?php echo $ukr;?>"/>
                                <?php } ?>
                                <input  type="hidden" id="ukrs"  name="ukr"  value="<?php echo $ukr;?>"/>

                            </td>
                        </tr>
                        <tr>
                            <td>Показывать на Английском языке</td>
                            <td><?php if ($eng==1) { ?>
                                <input type="checkbox"  id="eng"  value="<?php echo $eng;?>" checked="checked"/>
                                <?php } else { ?>
                                <input type="checkbox" id="eng"  value="<?php echo $eng;?>"/>
                                <?php } ?>
                                <input   type="hidden" id="engs" name="eng"  value="<?php echo $eng;?>"/>

                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_image; ?></td>
                            <td>
                                <div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb"/><br/>
                                    <input type="hidden" name="image" value="<?php echo $image; ?>" id="image"/>
                                    <a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                            onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a>
                                </div>
                            </td>
                        </tr>
                        <tr style="background:#F8F8F8;">
                            <td><?php echo $entry_status; ?></td>
                            <td><select name="status">
                                    <?php if ($status) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_related; ?></td>
                            <td><input type="text" name="related" value=""/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div id="product-related" class="scrollbox">
                                    <?php $class = 'odd'; ?>
                                    <?php foreach ($product_related as $product_related) { ?>
                                    <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                                    <div id="product-related<?php echo $product_related['product_id']; ?>"
                                         class="<?php echo $class; ?>"> <?php echo $product_related['name']; ?><img
                                                src="view/image/delete.png" alt=""/>
                                        <input type="hidden" name="product_related[]"
                                               value="<?php echo $product_related['product_id']; ?>"/>
                                    </div>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
                <div id="tab-image">
                    <table id="images" class="list">
                        <thead>
                        <tr>
                            <td class="left"><?php echo $entry_image; ?></td>
                            <td class="right"><?php echo $entry_sort_order; ?></td>
                            <td></td>
                        </tr>
                        </thead>
                        <?php $image_row = 0; ?>
                        <?php foreach ($product_images as $product_image) { ?>
                        <tbody id="image-row<?php echo $image_row; ?>">
                        <tr>
                            <td class="left">
                                <div class="image"><img src="<?php echo $product_image['thumb']; ?>" alt=""
                                                        id="thumb<?php echo $image_row; ?>"/>
                                    <input type="hidden" name="product_image[<?php echo $image_row; ?>][image]"
                                           value="<?php echo $product_image['image']; ?>"
                                           id="image<?php echo $image_row; ?>"/>
                                    <br/>
                                    <a onclick="image_upload('image<?php echo $image_row; ?>', 'thumb<?php echo $image_row; ?>');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                            onclick="$('#thumb<?php echo $image_row; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image<?php echo $image_row; ?>').attr('value', '');"><?php echo $text_clear; ?></a>
                                </div>
                            </td>
                            <td class="right"><input type="text"
                                                     name="product_image[<?php echo $image_row; ?>][sort_order]"
                                                     value="<?php echo $product_image['sort_order']; ?>" size="2"/></td>
                            <td class="left"><a onclick="$('#image-row<?php echo $image_row; ?>').remove();"
                                                class="button"><?php echo $button_remove; ?></a></td>
                        </tr>
                        </tbody>
                        <?php $image_row++; ?>
                        <?php } ?>
                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="left"><a onclick="addImage()"
                                                class="button"><?php echo $button_add_image; ?></a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </form>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>


<script type="text/javascript"><!--

    function  author() {
        var name = $("#authors option:selected").text();
        var id = $("#authors option:selected").val();
        console.log(name);
        console.log(id);
        document.getElementById("author_id").value = id;
        document.getElementById("author_name").value = name;


    }

    //--></script>


<script type="text/javascript"><!--
    <?php foreach ($languages as $language) { ?>
        CKEDITOR.replace('description<?php echo $language['language_id']; ?>', {
            filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
        });
    <?php } ?>
    //--></script>
<script type="text/javascript"><!--
    <?php foreach ($languages as $language) { ?>
        CKEDITOR.replace('description2<?php echo $language['language_id']; ?>', {
            filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
        });
    <?php } ?>
    //--></script>
<script type="text/javascript"><!--
    <?php foreach ($languages as $language) { ?>
        CKEDITOR.replace('description3<?php echo $language['language_id']; ?>', {
            filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
        });
    <?php } ?>
    //--></script>
<script type="text/javascript"><!--
        $('#rus').change(function() {
           var chek= document.getElementById("rus").checked;
            if (chek==true){
                chek=1;
            } else {
                chek=0;
            }
            document.getElementById("russ").value = chek;
            console.log(chek);
        });
</script>
<script type="text/javascript"><!--
        $('#ukr').change(function() {
            var chek= document.getElementById("ukr").checked;
            if (chek==true){
                chek=1;
            } else {
                chek=0;
            }
            document.getElementById("ukrs").value = chek;
            console.log(chek);
        });
</script>

<script type="text/javascript"><!--
        $('#eng').change(function() {
            var chek= document.getElementById("eng").checked;
            if (chek==true){
                chek=1;
            } else {
                chek=0;
            }
            document.getElementById("engs").value = chek;
            console.log(chek);
        });
</script>

<script type="text/javascript"><!--
    function image_upload(field, thumb) {
        $('#dialog').remove();

        $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

        $('#dialog').dialog({
            title: '<?php echo $text_image_manager; ?>',
            close: function (event, ui) {
                if ($('#' + field).attr('value')) {
                    $.ajax({
                        url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
                        dataType: 'text',
                        success: function (text) {
                            $('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
                        }
                    });
                }
            },
            bgiframe: false,
            width: 800,
            height: 400,
            resizable: false,
            modal: false
        });
    };
    //--></script>

<script type="text/javascript"><!--
    var formblock;
    var forminputs;

    formblock = document.getElementById('store_ids');
    forminputs = formblock.getElementsByTagName('input');

    function select_all(name, value) {
        for (i = 0; i < forminputs.length; i++) {
            var regex = new RegExp(name, "i");
            if (regex.test(forminputs[i].getAttribute('name'))) {
                if (value == '1') {
                    forminputs[i].checked = true;
                } else {
                    forminputs[i].checked = false;
                }
            }
        }
    }

    //--></script>

<script type="text/javascript"><!--
    var image_row =
    <?php echo
    $image_row; ?>;

    function addImage() {
        html = '<tbody id="image-row' + image_row + '">';
        html += '  <tr>';
        html += '    <td class="left"><div class="image"><img src="<?php echo $no_image; ?>" alt="" id="thumb' + image_row + '" /><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="image' + image_row + '" /><br /><a onclick="image_upload(\'image' + image_row + '\', \'thumb' + image_row + '\');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumb' + image_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#image' + image_row + '\').attr(\'value\', \'\');"><?php echo $text_clear; ?></a></div></td>';
        html += '    <td class="right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" size="2" /></td>';
        html += '    <td class="left"><a onclick="$(\'#image-row' + image_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
        html += '  </tr>';
        html += '</tbody>';

        $('#images tfoot').before(html);

        image_row++;
    }

    //--></script>

<script type="text/javascript"><!--
    $.widget('custom.catcomplete', $.ui.autocomplete, {
        _renderMenu: function (ul, items) {
            var self = this, currentCategory = '';

            $.each(items, function (index, item) {
                if (item.category != currentCategory) {
                    ul.append('<li class="ui-autocomplete-category">' + item.category + '</li>');

                    currentCategory = item.category;
                }

                self._renderItem(ul, item);
            });
        }
    });

    $('#product-category div img').on('click', function () {
        $(this).parent().remove();

        $('#product-category div:odd').attr('class', 'odd');
        $('#product-category div:even').attr('class', 'even');
    });

    // Filter
    $('input[name=\'filter\']').autocomplete({
        delay: 500,
        source: function (request, response) {
            $.ajax({
                url: 'index.php?route=catalog/filter/autocomplete&token=<?php echo $token; ?>&filter_name=' + encodeURIComponent(request.term),
                dataType: 'json',
                success: function (json) {
                    response($.map(json, function (item) {
                        return {
                            label: item.name,
                            value: item.filter_id
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('#product-filter' + ui.item.value).remove();

            $('#product-filter').append('<div id="product-filter' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_filter[]" value="' + ui.item.value + '" /></div>');

            $('#product-filter div:odd').attr('class', 'odd');
            $('#product-filter div:even').attr('class', 'even');

            return false;
        },
        focus: function (event, ui) {
            return false;
        }
    });

    $('#product-filter div img').on('click', function () {
        $(this).parent().remove();

        $('#product-filter div:odd').attr('class', 'odd');
        $('#product-filter div:even').attr('class', 'even');
    });

    // Downloads
    $('input[name=\'download\']').autocomplete({
        delay: 500,
        source: function (request, response) {
            $.ajax({
                url: 'index.php?route=catalog/download/autocomplete&token=<?php echo $token; ?>&filter_name=' + encodeURIComponent(request.term),
                dataType: 'json',
                success: function (json) {
                    response($.map(json, function (item) {
                        return {
                            label: item.name,
                            value: item.download_id
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('#product-download' + ui.item.value).remove();

            $('#product-download').append('<div id="product-download' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_download[]" value="' + ui.item.value + '" /></div>');

            $('#product-download div:odd').attr('class', 'odd');
            $('#product-download div:even').attr('class', 'even');

            return false;
        },
        focus: function (event, ui) {
            return false;
        }
    });

    $('#product-download div img').on('click', function () {
        $(this).parent().remove();

        $('#product-download div:odd').attr('class', 'odd');
        $('#product-download div:even').attr('class', 'even');
    });

    // Related
    $('input[name=\'related\']').autocomplete({
        delay: 500,
        source: function (request, response) {
            $.ajax({
                url: 'index.php?route=module/articles/autocomplete&token=<?php echo $token; ?>&filter_name=' + encodeURIComponent(request.term),
                dataType: 'json',
                success: function (json) {
                    response($.map(json, function (item) {
                        return {
                            label: item.name,
                            value: item.product_id
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('#product-related' + ui.item.value).remove();

            $('#product-related').append('<div id="product-related' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_related[]" value="' + ui.item.value + '" /></div>');

            $('#product-related div:odd').attr('class', 'odd');
            $('#product-related div:even').attr('class', 'even');

            return false;
        },
        focus: function (event, ui) {
            return false;
        }
    });

    $('#product-related div img').on('click', function () {
        $(this).parent().remove();

        $('#product-related div:odd').attr('class', 'odd');
        $('#product-related div:even').attr('class', 'even');
    });





    //--></script>


<script type="text/javascript"><!--
    $('#tabs a').tabs();
    $('#languages a').tabs();
    //--></script>

<?php echo $footer; ?>