<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$element = $this->getArgument("element");
$on = "";
if($this->getElementValueNumber($element,0)>0){
	$on = " checked ";
};

?>
<div class="xui-form-switch <?php if($this->isElementError($element)){echo " xui-form-switch_danger";}; ?>">
	<input type="checkbox"
	name="<?php $this->eElementName($element); ?>"
	value="1" <?php echo $on; ?>
	id="<?php $this->eElementId($element); ?>" ></input>
	<label for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
</div>
<br>