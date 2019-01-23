<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
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
	Form - Text Material - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<div class="xui form-text-material -<?php echo $context; ?> -has-value">
		<label for="text-material-1-<?php echo $context; ?>">Label - <?php echo $context; ?></label>
		<input id="text-material-1-<?php echo $context; ?>" type="text" value="<?php echo $context; ?>" <?php echo $disabled; ?>></input>
		<div class="xui form-text-material_border"></div>
	</div>
	<div class="xui separator"></div>
	<div class="xui form-text-material -<?php echo $context; ?>">
		<label for="text-material-2-<?php echo $context; ?>">Label - <?php echo $context; ?></label>
		<input id="text-material-2-<?php echo $context; ?>" type="text" value="" <?php echo $disabled; ?>></input>
		<div class="xui form-text-material_border"></div>
	</div>
</form>
<?php }; ?>
	