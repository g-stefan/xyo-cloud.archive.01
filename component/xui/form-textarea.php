<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$maxlength= 1*$this->getArgument("maxlength");

if($maxlength==0){
	$maxlength="";
}else{
	$maxlength=" maxlength=\"".$maxlength."\"";
};

?>

<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label_danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<textarea<?php echo $maxlength; ?> class="xui-form-textarea<?php if($this->isElementError($element)){echo " xui-form-textarea_danger";}; ?>"
	rows="4"
	name="<?php $this->eElementName($element); ?>"
	id="<?php $this->eElementId($element); ?>"><?php $this->eElementValue($element); ?></textarea>
<br>