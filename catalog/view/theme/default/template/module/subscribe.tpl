<div class="center column subscribe<?php echo $module; ?>">
      	<label><?php translate('Введите Ваш', 'Введіть Ваш', 'Enter your'); ?> e-mail*</label>
        <input type="text" id="yoursubscribeemail" name="subscribe_email<?php echo $module; ?>">
        <input type="submit" onclick="addSubscribe(<?php echo $module; ?>);" value="<?php translate('Отправить', 'Відправити', 'Send'); ?>">
</div>


