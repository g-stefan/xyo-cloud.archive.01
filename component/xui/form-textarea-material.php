<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
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

<div class="xui-form-textarea-material<?php if($this->isElementError($element)){echo " xui-form-textarea-material--danger";}; ?>" style="width:100%">
<label for="<?php $this->eElementId($element); ?>"<?php if(strlen($this->getElementValue($element, ""))>0){ echo " class=\"xui-form-textarea-material--has-value\""; }?>><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<textarea<?php echo $maxlength; ?> 
	rows="4"
	name="<?php $this->eElementName($element); ?>"
	id="<?php $this->eElementId($element); ?>"><?php $this->eElementValue($element); ?></textarea>
</div>
<div class="xui-separator"></div>
