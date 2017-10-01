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

$format = $this->getArgument("format",$this->cloud->get("locale_date_format",""));
if(strlen($format)){
	if($format=="Y-m-d"){
		$format="YYYY-MM-DD HH:mm";
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="Y/m/d"){
		$format="YYYY/MM/DD HH:mm";
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="d-m-Y"){
		$format="DD-MM-YYYY HH:mm";
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4).substr($value,10,strlen($value)));
		};
	};
	if($format=="d/m/Y"){
		$format="DD/MM/YYYY HH:mm";
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4).substr($value,10,strlen($value)));
		};
	};
}else{
	$format="YYYY/MM/DD HH:mm";
};

$this->setHtmlJsSourceOrAjax("\$(\"#".$this->getElementId($element)."\").datepicker({autoClose:true});","load");

?>
<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label_danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<input type="text"<?php echo $maxlength; ?> class="xui-form-text<?php if($this->isElementError($element)){echo " xui-form-text_danger";}; ?>" placeholder=""
	name="<?php $this->eElementName($element); ?>"
	value="<?php $this->eElementValue($element, ""); ?>"
	id="<?php $this->eElementId($element); ?>"
	data-date-format="<?php echo $format; ?>" data-timepicker="true" data-language="en"></input>
<br>