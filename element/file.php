<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");

if($this->isAjax()){
	$this->ejsBegin();
	echo "\$(\"#".$this->getElementId($element)."\").fileinput({showUpload: false});";
	$this->ejsEnd();
}else{
	$this->setHtmlFooterJsSource("\$(function(){\$(\"#".$this->getElementId($element)."\").fileinput({showUpload: false});});");
};

?>
<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <input type="file" class="form-control"
       name="<?php $this->eElementName($element); ?>"
       value=""
       id="<?php $this->eElementId($element); ?>" ></input>
    <input type="hidden"
       name="<?php $this->eElementName($element); ?>_file"
       value="<?php $this->eElementValue($element); ?>" ></input>
</div>

