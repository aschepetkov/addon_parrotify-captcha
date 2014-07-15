<?php    defined('C5_EXECUTE') or die('Access denied.');
    $form = Loader::helper('form');
    $parrotifyCaptchaUrl = "http://parrotify.com/";
?>
<div class="clearfix">
	<div class="input">
		<?php     echo $form->label('', t('Learn more at <a target="_blank" href="%s">Parrotify Captcha</a>.', $parrotifyCaptchaUrl)); ?>
	</div>
</div>
