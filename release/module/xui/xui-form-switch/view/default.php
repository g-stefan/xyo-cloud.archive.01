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
	Form - Switch - <?php echo ucfirst($context); ?>
</div>
<form>
	<div class="xui form-switch -<?php echo $context; ?>">
		<input type="checkbox" id="switch-item-1-<?php echo $context; ?>" name="switch-item-1-<?php echo $context; ?>" value="switch-option-1-<?php echo $context; ?>"<?php echo $disabled; ?> checked="checked"></input>
		<label for="switch-item-1-<?php echo $context; ?>">Item 1</label>
	</div>
	<div class="xui form-switch -<?php echo $context; ?>">
		<input type="checkbox" id="switch-item-2-<?php echo $context; ?>" name="switch-item-2-<?php echo $context; ?>" value="switch-option-2-<?php echo $context; ?>"<?php echo $disabled; ?>></input>
		<label for="switch-item-2-<?php echo $context; ?>">Item 2</label>
	</div>
</form>
<?php }; ?>
	