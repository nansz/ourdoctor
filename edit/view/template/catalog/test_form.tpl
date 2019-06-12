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
                <h1><img src="view/image/announcement.png" alt=""/> <?php echo $heading_title; ?></h1>
            <div class="buttons">
                <a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a>
                <a onclick="location = '<?php echo $cancel; ?>';"
                   class="button"><span><?php echo $button_cancel; ?></span></a>
            </div>
        </div>
        <div class="content">
            <div id="tabs" class="htabs">
                <a href="#tab_language">Название</a>
                <a href="#tab-image">Симптомы</a>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <div id="tab_language">
                    <div id="languages" class="htabs">
                        <?php foreach ($languages as $language) { ?>
                        <a href="#language<?php echo $language['language_id']; ?>">
                            <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>"/> <?php echo $language['name']; ?></a>
                        <?php } ?>
                    </div>
                    <?php foreach ($languages as $language) { ?>
                    <div id="language<?php echo $language['language_id']; ?>">
                        <table class="form">
                            <tr>
                                <td><span class="required">*</span>Название болезни</td>
                                <td><input name="test_description[<?php echo $language['language_id']; ?>][title]" size="80" value="<?php echo isset($test_description[$language['language_id']]) ? $test_description[$language['language_id']]['title'] : ''; ?>"/>
                                    <?php if (isset($error_title[$language['language_id']])) { ?>
                                    <span class="error"><?php echo $error_title[$language['language_id']]; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>


                        </table>

                    </div>
                    <?php } ?>
                    <tr style="background:#F8F8F8;">
                        <td>Статус</td>
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

                </div>
                <div id="tab-image">
                    <table id="simptomy" class="list">
                        <thead>
                        <tr>
                            <td class="left">Симптом болезни</td>
                            <td class="right">Учитывать его или нет </td>
                            <td></td>
                        </tr>
                        </thead>
                        <?php $simptomy_row = 0; ?>
                        <?php foreach ($product_simptomys as $product_simptomy) { ?>
                        <tbody id="simptomy-row<?php echo $simptomy_row; ?>">
                        <tr>
                            <td class="left">
                                <div class="image">
                                    <input name="product_simptomy[<?php echo $simptomy_row; ?>][simptomy]" value="<?php echo $product_simptomy['title']; ?>" id="simptomy<?php echo $simptomy_row; ?>"/>
                                </div>
                            </td>
                            <td class="right">
                                <input type="text" name="product_simptomy[<?php echo $simptomy_row; ?>][value]" value="<?php echo $product_simptomy['value']; ?>" size="2"/>
                            </td>
                            <td class="left">
                                <a onclick="$('#simptomy-row<?php echo $simptomy_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a>
                            </td>
                        </tr>
                        </tbody>
                        <?php $simptomy_row++; ?>
                        <?php } ?>
                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="left"><a onclick="addsimptomy()" class="button">Добавить симптом</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </form>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript"><!--
    var simptomy_row =
    <?php echo $simptomy_row; ?>;
    function addsimptomy() {
        html = '<tbody id="simptomy-row' + simptomy_row + '">';
        html += '<tr>';
        html += '<td><input name="product_simptomy[' + simptomy_row + '][simptomy]" value="" id="simptomy' + simptomy_row + '" /><br /></td>';
        html += '<td class="right"><input type="text" name="product_simptomy[' + simptomy_row + '][value]" value="" size="2" /></td>';
        html += '<td class="left"><a onclick="$(\'#simptomy-row' + simptomy_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
        html += '</tr>';
        html += '</tbody>';

        $('#simptomy tfoot').before(html);

        simptomy_row++;
    }

    //--></script>



<script type="text/javascript"><!--
    $('#tabs a').tabs();
    $('#languages a').tabs();
    //--></script>

<?php echo $footer; ?>