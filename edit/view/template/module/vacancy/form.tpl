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
		<h1><img src="view/image/articles.png" alt="" /> <?php echo $heading_title; ?></h1>
		<div class="buttons">
			<a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a>
			<a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a>
		</div>
    </div>
    <div class="content">
		<div id="tabs" class="htabs">
			<a href="#tab_language"><?php echo $tab_language; ?></a>
			<a href="#tab_setting"><?php echo $tab_setting; ?></a>
		</div>
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab_language">
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
					<td><input name="vacancy_description[<?php echo $language['language_id']; ?>][title]" size="80" value="<?php echo isset($vacancy_description[$language['language_id']]) ? $vacancy_description[$language['language_id']]['title'] : ''; ?>" />
						<?php if (isset($error_title[$language['language_id']])) { ?>
							<span class="error"><?php echo $error_title[$language['language_id']]; ?></span>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_meta_description; ?></td>
					<td><textarea name="vacancy_description[<?php echo $language['language_id']; ?>][meta_description]" cols="70" rows="2"><?php echo isset($vacancy_description[$language['language_id']]) ? $vacancy_description[$language['language_id']]['meta_description'] : ''; ?></textarea></td>
				</tr>
				<tr>
					<td><?php echo $entry_meta_keyword; ?></td>
					<td><textarea name="vacancy_description[<?php echo $language['language_id']; ?>][meta_keyword]" cols="70" rows="2"><?php echo isset($vacancy_description[$language['language_id']]) ? $vacancy_description[$language['language_id']]['meta_keyword'] : ''; ?></textarea></td>
				</tr>
            <tr>
              <td><?php echo $column_date_added; ?></td>
              <td><input type="text" name="date_added" value="<?php echo $date_added; ?>" size="12" /></td>
            </tr>


				<tr>
					<td><span class="required">*</span> <?php echo $entry_description; ?></td>
					<td><textarea name="vacancy_description[<?php echo $language['language_id']; ?>][description]" id="description<?php echo $language['language_id']; ?>"><?php echo isset($vacancy_description[$language['language_id']]) ? $vacancy_description[$language['language_id']]['description'] : ''; ?></textarea>
						<?php if (isset($error_description[$language['language_id']])) { ?>
							<span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
						<?php } ?>
					</td>
				</tr>

				<tr>
					<td><span class="required">*</span> <?php echo "Текст 2"; ?></td>
					<td><textarea name="vacancy_description[<?php echo $language['language_id']; ?>][description2]" id="description2<?php echo $language['language_id']; ?>" style="height:300px; width:99%;"><?php echo isset($vacancy_description[$language['language_id']]) ? $vacancy_description[$language['language_id']]['description2'] : ''; ?></textarea>
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
            <tr>
				<td><?php echo $entry_store; ?></td>
				<td>
					<div id="store_ids" class="scrollbox" style="width:225px;height:60px;">
						<?php $class = 'even'; ?>
						<div class="<?php echo $class; ?>">
							<?php if (in_array(0, $vacancy_store)) { ?>
								<input type="checkbox" name="vacancy_store[]" value="0" checked="checked" />
								<?php echo $text_default; ?>
							<?php } else { ?>
								<input type="checkbox" name="vacancy_store[]" value="0" />
								<?php echo $text_default; ?>
							<?php } ?>
						</div>
						<?php foreach ($stores as $store) { ?>
							<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
							<div class="<?php echo $class; ?>">
								<?php if (in_array($store['store_id'], $vacancy_store)) { ?>
									<input type="checkbox" name="vacancy_store[]" value="<?php echo $store['store_id']; ?>" checked="checked" />
									<?php echo $store['name']; ?>
								<?php } else { ?>
									<input type="checkbox" name="vacancy_store[]" value="<?php echo $store['store_id']; ?>" />
									<?php echo $store['name']; ?>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<a onclick="select_all('vacancy_store', '1');"><?php echo $text_select_all; ?></a> | <a onclick="select_all('vacancy_store', '0');"><?php echo $text_unselect_all; ?></a>
				</td>
            </tr>
            <tr>
				<td><?php echo $entry_keyword; ?></td>
				<td><input type="text" name="keyword" value="<?php echo $keyword; ?>" size="40" /></td>
            </tr>
				<tr>
					<td><?php echo $entry_page_url; ?></td>
					<td><input type="text" name="page_url" size="80" value="<?php echo $page_url; ?>"</td>					
				</tr>
            <tr>
				<td><?php echo $entry_image; ?></td>
				<td><div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb" /><br />
					<input type="hidden" name="image" value="<?php echo $image; ?>" id="image" />
					<a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			


<!--
			<tr>
				<td><?php echo "Сертификат 1"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb1; ?>" alt="" id="thumb1" /><br />
					<input type="hidden" name="image1" value="<?php echo $image1; ?>" id="image1" />
					<a onclick="image_upload('image1', 'thumb1');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb1').attr('src', '<?php echo $no_image; ?>'); $('#image1').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 2"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb2; ?>" alt="" id="thumb2" /><br />
					<input type="hidden" name="image2" value="<?php echo $image2; ?>" id="image2" />
					<a onclick="image_upload('image2', 'thumb2');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb2').attr('src', '<?php echo $no_image; ?>'); $('#image2').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 3"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb3; ?>" alt="" id="thumb3" /><br />
					<input type="hidden" name="image3" value="<?php echo $image3; ?>" id="image3" />
					<a onclick="image_upload('image3', 'thumb3');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb3').attr('src', '<?php echo $no_image; ?>'); $('#image3').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 4"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb4; ?>" alt="" id="thumb4" /><br />
					<input type="hidden" name="image4" value="<?php echo $image4; ?>" id="image4" />
					<a onclick="image_upload('image4', 'thumb4');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb4').attr('src', '<?php echo $no_image; ?>'); $('#image4').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 5"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb5; ?>" alt="" id="thumb5" /><br />
					<input type="hidden" name="image5" value="<?php echo $image5; ?>" id="image5" />
					<a onclick="image_upload('image5', 'thumb5');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb5').attr('src', '<?php echo $no_image; ?>'); $('#image5').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 6"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb6; ?>" alt="" id="thumb6" /><br />
					<input type="hidden" name="image6" value="<?php echo $image6; ?>" id="image6" />
					<a onclick="image_upload('image6', 'thumb6');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb6').attr('src', '<?php echo $no_image; ?>'); $('#image6').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 7"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb7; ?>" alt="" id="thumb7" /><br />
					<input type="hidden" name="image7" value="<?php echo $image7; ?>" id="image7" />
					<a onclick="image_upload('image7', 'thumb7');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb7').attr('src', '<?php echo $no_image; ?>'); $('#image7').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 8"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb8; ?>" alt="" id="thumb8" /><br />
					<input type="hidden" name="image8" value="<?php echo $image8; ?>" id="image8" />
					<a onclick="image_upload('image8', 'thumb8');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb8').attr('src', '<?php echo $no_image; ?>'); $('#image8').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 9"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb9; ?>" alt="" id="thumb9" /><br />
					<input type="hidden" name="image9" value="<?php echo $image9; ?>" id="image9" />
					<a onclick="image_upload('image9', 'thumb9');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb9').attr('src', '<?php echo $no_image; ?>'); $('#image9').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 10"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb10; ?>" alt="" id="thumb10" /><br />
					<input type="hidden" name="image10" value="<?php echo $image10; ?>" id="image10" />
					<a onclick="image_upload('image10', 'thumb10');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb10').attr('src', '<?php echo $no_image; ?>'); $('#image10').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 11"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb11; ?>" alt="" id="thumb11" /><br />
					<input type="hidden" name="image11" value="<?php echo $image11; ?>" id="image11" />
					<a onclick="image_upload('image11', 'thumb11');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb11').attr('src', '<?php echo $no_image; ?>'); $('#image11').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 12"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb12; ?>" alt="" id="thumb12" /><br />
					<input type="hidden" name="image12" value="<?php echo $image12; ?>" id="image12" />
					<a onclick="image_upload('image12', 'thumb12');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb12').attr('src', '<?php echo $no_image; ?>'); $('#image12').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 13"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb13; ?>" alt="" id="thumb13" /><br />
					<input type="hidden" name="image13" value="<?php echo $image13; ?>" id="image13" />
					<a onclick="image_upload('image13', 'thumb13');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb13').attr('src', '<?php echo $no_image; ?>'); $('#image13').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 14"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb14; ?>" alt="" id="thumb14" /><br />
					<input type="hidden" name="image14" value="<?php echo $image14; ?>" id="image14" />
					<a onclick="image_upload('image14', 'thumb14');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb14').attr('src', '<?php echo $no_image; ?>'); $('#image14').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>
			<tr>
				<td><?php echo "Сертификат 15"; ?></td>
				<td><div class="image"><img src="<?php echo $thumb15; ?>" alt="" id="thumb15" /><br />
					<input type="hidden" name="image15" value="<?php echo $image15; ?>" id="image15" />
					<a onclick="image_upload('image15', 'thumb15');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb15').attr('src', '<?php echo $no_image; ?>'); $('#image15').attr('value', '');"><?php echo $text_clear; ?></a></div>
				</td>
            </tr>

-->
			
			
			
			
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
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 

<?php echo $footer; ?>