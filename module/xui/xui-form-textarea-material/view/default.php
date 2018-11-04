<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Textarea Material - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<div class="xui form-textarea-material -<?php echo $context; ?> -has-value">
		<label for="textarea-material-1-<?php echo $context; ?>">Label - <?php echo $context; ?></label>
		<textarea id="textarea-material-1-<?php echo $context; ?>" rows="9" cols="20" <?php echo $disabled; ?>><?php echo $context; ?></textarea>
		<div class="xui form-textarea-material_border"></div>
	</div>
	<div class="xui separator"></div>
	<div class="xui form-textarea-material -<?php echo $context; ?>">
		<label for="textarea-material-2-<?php echo $context; ?>">Label - <?php echo $context; ?></label>
		<textarea id="textarea-material-2-<?php echo $context; ?>" rows="9" cols="20" <?php echo $disabled; ?>></textarea>
		<div class="xui form-textarea-material_border"></div>
	</div>
</form>
<?php }; ?>
	