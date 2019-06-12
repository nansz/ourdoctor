<?php if (count($languages) > 1) { ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" style="margin:0; display:inherit;">
    <?php foreach ($languages as $language) { ?>

		<?php //Скрыл временно английский язык ?>
		<?php if($language['code'] == "en") { ?>
			<li <?php if($language['code'] == $this->session->data['language']) { echo "class='active'"; } ?>><a onclick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>'); $(this).parent().parent().submit();" style="cursor:pointer;"><?php echo $language['name']; ?></a></li>
		<?php } else { ?>
		<li <?php if($language['code'] == $this->session->data['language']) { echo "class='active'"; } ?>><a onclick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>'); $(this).parent().parent().submit();" style="cursor:pointer;"><?php echo $language['name']; ?></a></li>
		<?php } ?>


    <?php } ?>
    <input type="hidden" name="language_code" value="" />
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
</form>
<?php } ?>
