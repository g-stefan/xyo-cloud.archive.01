<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$maxlength= 1*$this->getArgument("maxlength");
$isRequired= 1*$this->getArgument("required");

if($maxlength==0){
	$maxlength="";
}else{
	$maxlength=" maxlength=\"".$maxlength."\"";
};

$hasValue=(strlen($this->getElementValue($element, ""))>0);

?>


<div style="clear:both;"></div>

<div class="mdc-textfield <?php if($hasValue){echo "mdc-textfield--upgraded";}; ?>" data-mdc-auto-init="MDCTextfield">
<input  type="text"
	class="mdc-textfield__input"
	id="<?php $this->eElementId($element); ?>"
	name="<?php $this->eElementName($element); ?>"
	<?php if($isRequired){ ?>aria-controls="<?php $this->eElementId($element); ?>-helptext" required="required"<?php }; ?>
	autocomplete="<?php $this->eElementName($element); ?>"
	value="<?php $this->eElementValue($element, ""); ?>"
>
<label
	for="<?php $this->eElementId($element); ?>"
	class="mdc-textfield__label <?php if($hasValue){echo "mdc-textfield__label--float-above";};?>">
	<?php $this->eLanguage("label_" . $element); ?>
</label>
</div>
<?php if($isRequired){ ?>
<p id="<?php $this->eElementId($element); ?>-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--validation-msg" aria-hidden="true">
<?php $this->eLanguage("required_" . $element); ?>
</p>
<?php }; ?>

<div style="clear:both;"></div>
