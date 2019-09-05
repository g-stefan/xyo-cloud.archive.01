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
	Form - Button - <?php echo ucfirst($context); ?>
</div>
<form>
	<input class="xui form-button -<?php echo $context; ?>" type="button" name="button-<?php echo $context; ?>" value="<?php echo $context; ?>"<?php echo $disabled; ?>></input>
</form>
<?php }; ?>	

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Button - Icon - <?php echo ucfirst($context); ?>
</div>
<form>
	<button type="button" class="xui form-button -icon -<?php echo $context; ?>"  name="button-icon-<?php echo $context; ?>" <?php echo $disabled; ?>><i class="material-icons">radio_button_unchecked</i></button>
</form>
<?php }; ?>

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Button - Icon Left - <?php echo ucfirst($context); ?>
</div>
<form>
	<button type="button" class="xui form-button -icon-left -<?php echo $context; ?>"  name="button-icon-left-<?php echo $context; ?>" <?php echo $disabled; ?>><i class="material-icons">radio_button_unchecked</i><?php echo $context; ?></button>
</form>
<?php }; ?>

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Button - Icon Right - <?php echo ucfirst($context); ?>
</div>
<form>
	<button type="button" class="xui form-button -icon-right -<?php echo $context; ?>"  name="button-icon-right-<?php echo $context; ?>" <?php echo $disabled; ?>><?php echo $context; ?><i class="material-icons">radio_button_unchecked</i></button>
</form>
<?php }; ?>

