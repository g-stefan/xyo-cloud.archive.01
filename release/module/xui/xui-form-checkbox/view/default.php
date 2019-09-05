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
	Form - Checkbox - <?php echo ucfirst($context); ?>
</div>
<form>
	<div class="xui form-checkbox -<?php echo $context; ?>">
		<input type="checkbox" id="chekbox-item-1-<?php echo $context; ?>" name="chekbox-item-1-<?php echo $context; ?>" value="chekbox-option-1-<?php echo $context; ?>"<?php echo $disabled; ?> checked="checked"></input>
		<label for="chekbox-item-1-<?php echo $context; ?>">Item 1</label>
	</div>
	<div class="xui form-checkbox -<?php echo $context; ?>">
		<input type="checkbox" id="chekbox-item-2-<?php echo $context; ?>" name="chekbox-item-2-<?php echo $context; ?>" value="chekbox-option-2-<?php echo $context; ?>"<?php echo $disabled; ?>></input>
		<label for="chekbox-item-2-<?php echo $context; ?>">Item 2</label>
	</div>
</form>
<?php }; ?>


<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Checkbox - empty label - <?php echo ucfirst($context); ?>
</div>
<form>
	<div class="xui form-checkbox -<?php echo $context; ?>">
		<input type="checkbox" id="chekbox-item-1x-<?php echo $context; ?>" name="chekbox-item-1x-<?php echo $context; ?>" value="chekbox-option-1x-<?php echo $context; ?>"<?php echo $disabled; ?> checked="checked"></input>
		<label for="chekbox-item-1x-<?php echo $context; ?>"></label>
	</div>
	<div class="xui form-checkbox -<?php echo $context; ?>">
		<input type="checkbox" id="chekbox-item-2x-<?php echo $context; ?>" name="chekbox-item-2x-<?php echo $context; ?>" value="chekbox-option-2x-<?php echo $context; ?>"<?php echo $disabled; ?>></input>
		<label for="chekbox-item-2x-<?php echo $context; ?>"></label>
	</div>
</form>
<?php }; ?>

	