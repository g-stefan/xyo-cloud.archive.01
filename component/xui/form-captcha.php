<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$element = $this->getArgument("element");

$params=array();
$rnd = $this->getArgument("rnd","");
if($rnd) {
	$params=array_merge($params,array("rnd"=>$rnd));
};
$prefix = $this->getArgument("prefix","");
if($prefix) {
	$params=array_merge($params,array("prefix"=>$prefix));
};

?>

<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label_danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<div class="xui-form-captcha">
	<img id="<?php $this->eElementId($element); ?>__image" src="<?php echo $this->requestUriModule("xui-image-captcha",array_merge($params,array("stamp"=>md5(time().rand())))); ?>"></img>
	<div class="xui-form-captcha__input">
	<input type="text" class="xui-form-text xui-form-text_default" placeholder=""
		value="<?php $this->eElementValue($element, ""); ?>"
		name="<?php $this->eElementName($element); ?>"
		id="<?php $this->eElementId($element); ?>" ></input>
	<button type="button" class="xui-form-text-button-icon" onclick="window.<?php $this->eElementId($element); ?>_refresh();"><i class="material-icons">sync</i></button>
	</div>
</div>

<?php

$id=$this->getElementId($element);
$source="window.".$id."_refresh=function(){";
$source.="var el=document.getElementById(\"".$id."__image\");";
$source.="if(el){";
$source.=" el.src=\"".$this->requestUriModule("xui-image-captcha",$params)."&stamp=\"+Math.random();";
$source.="};";
$source.="return false;";
$source.="};";
$this->setHtmlJsSource($source,"load");
