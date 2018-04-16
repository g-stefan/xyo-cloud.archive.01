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

$this->setHtmlJsSourceOrAjax("\$(\"#".($this->getElementId($element))."\").".
"tinymce({\r\n".
"    selector: \"textarea\",\r\n".
"    plugins: [\r\n".
"        \"advlist autolink lists link image charmap print preview hr anchor pagebreak\",\r\n".
"        \"searchreplace wordcount visualblocks visualchars code fullscreen\",\r\n".
"        \"insertdatetime media nonbreaking save table contextmenu directionality\",\r\n".
"        \"emoticons template paste textcolor colorpicker textpattern\"\r\n".
"    ],\r\n".
"    toolbar1: \"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image\",\r\n".
"    toolbar2: \"print preview media | forecolor backcolor emoticons\",\r\n".
"    image_advtab: true\r\n".
"});","load");


?>

<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label_danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<textarea<?php echo $maxlength; ?> class="xui-form-textarea<?php if($this->isElementError($element)){echo " xui-form-textarea_danger";}; ?>"
	rows="8"
	name="<?php $this->eElementName($element); ?>_html"
	id="<?php $this->eElementId($element); ?>"><?php

	$htmlFile=$this->getElementValue($element);
	if(strlen($htmlFile)){
		echo file_get_contents($htmlFile);
	};

		?></textarea>
    <input type="hidden"
       name="<?php $this->eElementName($element); ?>_file"
       value="<?php $this->eElementValue($element); ?>" ></input>
<br>