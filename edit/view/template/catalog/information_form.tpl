<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general"><?php echo $tab_general; ?></a><a href="#tab-data"><?php echo $tab_data; ?></a><a href="#tab-design"><?php echo $tab_design; ?></a></div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <div id="languages" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>
          <?php foreach ($languages as $language) { ?>
          <div id="language<?php echo $language['language_id']; ?>">
            <table class="form">
              <tr>
                <td><span class="required">*</span> <?php echo $entry_title; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][title]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['title'] : ''; ?>" />
                  <?php if (isset($error_title[$language['language_id']])) { ?>
                  <span class="error"><?php echo $error_title[$language['language_id']]; ?></span>
                  <?php } ?></td>
              </tr>
			  <?php if(isset($_GET['information_id']) && $_GET['information_id']=='4') { ?>
			   <tr>
                <td><?php echo "Ссылка на видео с YouTube:"; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][video]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['video'] : ''; ?>" /></td>
              </tr> 
			  <tr>
                <td><?php echo "Заголовок видео YouTube:"; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][videotitle]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['videotitle'] : ''; ?>" /></td>
              </tr>
			  <tr>
                <td><?php echo "Изображение заглушка YouTube:"; ?></td>
				<td><div class="image"><img style="height:100px;" src="/image/<?php echo $information_description[$language['language_id']]['videoimage']; ?>" alt="" id="thumb<?php echo $language['language_id']; ?>" /><br />
					<input type="hidden" name="information_description[<?php echo $language['language_id']; ?>][videoimage]" value="<?php echo $information_description[$language['language_id']]['videoimage']; ?>" id="image<?php echo $language['language_id']; ?>" />
					<a onclick="image_upload('image<?php echo $language['language_id']; ?>', 'thumb<?php echo $language['language_id']; ?>');"><?php echo "Загрузка изображения"; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo '/image/cache/no_image-100x100.jpg'; ?>'); $('#information_description[<?php echo $language['language_id']; ?>][videoimage]').attr('value', '');"><?php echo "Очистить"; ?></a></div>
				</td>
                <!--<td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][videoimage]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['videoimage'] : ''; ?>" /></td>
				-->
			  </tr>
			  <tr>
                <td><?php echo "Изображение 1:"; ?></td>
				<td><div class="image"><img style="height:100px;" src="/image/<?php echo $information_description[$language['language_id']]['imageone']; ?>" alt="" id="thumbone<?php echo $language['language_id']; ?>" /><br />
					<input type="hidden" name="information_description[<?php echo $language['language_id']; ?>][imageone]" value="<?php echo $information_description[$language['language_id']]['imageone']; ?>" id="imageone<?php echo $language['language_id']; ?>" />
					<a onclick="image_upload('imageone<?php echo $language['language_id']; ?>', 'thumbone<?php echo $language['language_id']; ?>');"><?php echo "Загрузка изображения"; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumbone').attr('src', '<?php echo '/image/cache/no_image-100x100.jpg'; ?>'); $('#information_description[<?php echo $language['language_id']; ?>][imageone]').attr('value', '');"><?php echo "Очистить"; ?></a></div>
				</td>
                <!--<td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][videoimage]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['videoimage'] : ''; ?>" /></td>
				-->
			  </tr>
			  <tr>
                <td><?php echo "Изображение 2:"; ?></td>
				<td><div class="image"><img style="height:100px;" src="/image/<?php echo $information_description[$language['language_id']]['imagetwo']; ?>" alt="" id="thumbtwo<?php echo $language['language_id']; ?>" /><br />
					<input type="hidden" name="information_description[<?php echo $language['language_id']; ?>][imagetwo]" value="<?php echo $information_description[$language['language_id']]['imagetwo']; ?>" id="imagetwo<?php echo $language['language_id']; ?>" />
					<a onclick="image_upload('imagetwo<?php echo $language['language_id']; ?>', 'thumbtwo<?php echo $language['language_id']; ?>');"><?php echo "Загрузка изображения"; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumbtwo').attr('src', '<?php echo '/image/cache/no_image-100x100.jpg'; ?>'); $('#information_description[<?php echo $language['language_id']; ?>][imagetwo]').attr('value', '');"><?php echo "Очистить"; ?></a></div>
				</td>
                <!--<td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][videoimage]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['videoimage'] : ''; ?>" /></td>
				-->
			  </tr>
			  <tr>
                <td><?php echo "Короткое описание:"; ?></td>
                <td><textarea style="width:95%; height:100px;" name="information_description[<?php echo $language['language_id']; ?>][smalltext]" id="description1<?php echo $language['language_id']; ?>"><?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['smalltext'] : ''; ?></textarea>
                </td>
              </tr>
			  <?php } ?>
              <tr>
                <td><?php echo $entry_seo_h1; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][seo_h1]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['seo_h1'] : ''; ?>" /></td>
              </tr>
              <tr>
                <td><?php echo $entry_seo_title; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][seo_title]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['seo_title'] : ''; ?>" /></td>
              </tr>
              <tr>
                <td><?php echo $entry_meta_keyword; ?></td>
                <td><input type="text" name="information_description[<?php echo $language['language_id']; ?>][meta_keyword]" maxlength="255" size="100" value="<?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['meta_keyword'] : ''; ?>" /></td>
              </tr>
              <tr>
                <td><?php echo $entry_meta_description; ?></td>
                <td><textarea name="information_description[<?php echo $language['language_id']; ?>][meta_description]" cols="100" rows="2"><?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['meta_description'] : ''; ?></textarea></td>
              </tr>
              <tr>
                <td><span class="required">*</span> <?php echo $entry_description; ?></td>
                <td><textarea name="information_description[<?php echo $language['language_id']; ?>][description]" id="description<?php echo $language['language_id']; ?>"><?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['description'] : ''; ?></textarea>
                  <?php if (isset($error_description[$language['language_id']])) { ?>
                  <span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
                  <?php } ?></td>
              </tr>
			  <tr>
                <td><?php echo $entry_description; ?> 2</td>
                <td><textarea name="information_description[<?php echo $language['language_id']; ?>][description2]" id="descriptiontwo<?php echo $language['language_id']; ?>"><?php echo isset($information_description[$language['language_id']]) ? $information_description[$language['language_id']]['description2'] : ''; ?></textarea>
                  </td>
              </tr>
            </table>
          </div>
          <?php } ?>
        </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td><?php echo $entry_store; ?></td>
              <td><div class="scrollbox">
                  <?php $class = 'even'; ?>
                  <div class="<?php echo $class; ?>">
                    <?php if (in_array(0, $information_store)) { ?>
                    <input type="checkbox" name="information_store[]" value="0" checked="checked" />
                    <?php echo $text_default; ?>
                    <?php } else { ?>
                    <input type="checkbox" name="information_store[]" value="0" />
                    <?php echo $text_default; ?>
                    <?php } ?>
                  </div>
                  <?php foreach ($stores as $store) { ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <div class="<?php echo $class; ?>">
                    <?php if (in_array($store['store_id'], $information_store)) { ?>
                    <input type="checkbox" name="information_store[]" value="<?php echo $store['store_id']; ?>" checked="checked" />
                    <?php echo $store['name']; ?>
                    <?php } else { ?>
                    <input type="checkbox" name="information_store[]" value="<?php echo $store['store_id']; ?>" />
                    <?php echo $store['name']; ?>
                    <?php } ?>
                  </div>
                  <?php } ?>
                </div></td>
            </tr>
            <tr>
              <td><?php echo $entry_keyword; ?></td>
              <td><input type="text" name="keyword" value="<?php echo $keyword; ?>" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_bottom; ?></td>
              <td><?php if ($bottom) { ?>
                <input type="checkbox" name="bottom" value="1" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="bottom" value="1" />
                <?php } ?></td>
            </tr>            
            <tr>
              <td><?php echo $entry_status; ?></td>
              <td><select name="status">
                  <?php if ($status) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_sort_order; ?></td>
              <td><input type="text" name="sort_order" value="<?php echo $sort_order; ?>" size="1" /></td>
            </tr>
          </table>
        </div>
        <div id="tab-design">
          <table class="list">
            <thead>
              <tr>
                <td class="left"><?php echo $entry_store; ?></td>
                <td class="left"><?php echo $entry_layout; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left"><?php echo $text_default; ?></td>
                <td class="left"><select name="information_layout[0][layout_id]">
                    <option value=""></option>
                    <?php foreach ($layouts as $layout) { ?>
                    <?php if (isset($information_layout[0]) && $information_layout[0] == $layout['layout_id']) { ?>
                    <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
              </tr>
            </tbody>
            <?php foreach ($stores as $store) { ?>
            <tbody>
              <tr>
                <td class="left"><?php echo $store['name']; ?></td>
                <td class="left"><select name="information_layout[<?php echo $store['store_id']; ?>][layout_id]">
                    <option value=""></option>
                    <?php foreach ($layouts as $layout) { ?>
                    <?php if (isset($information_layout[$store['store_id']]) && $information_layout[$store['store_id']] == $layout['layout_id']) { ?>
                    <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
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
CKEDITOR.replace('descriptiontwo<?php echo $language['language_id']; ?>', {
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
					success: function(text) {
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
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
//--></script> 
<?php echo $footer; ?>