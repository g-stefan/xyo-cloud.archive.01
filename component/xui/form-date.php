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
		$format="yyyy-mm-dd";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2));
		};
	};
	if($format=="Y/m/d"){
		$format="yyyy/mm/dd";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2));
		};
	};
	if($format=="d-m-Y"){
		$format="dd-mm-yyyy";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4));
		};
	};
	if($format=="d/m/Y"){
		$format="dd/mm/yyyy";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4));
		};
	};
};

$this->setHtmlJsSourceOrAjax("\$(\"".$this->getElementId($element)."\").datepicker();","load");

?>
<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label--danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<input type="text"<?php echo $maxlength; ?> class="xui-form-text<?php if($this->isElementError($element)){echo " xui-form-text--danger";}; ?>" placeholder=""
	name="<?php $this->eElementName($element); ?>"
	value="<?php $this->eElementValue($element, ""); ?>"
	id="<?php $this->eElementId($element); ?>"
	data-date-format="<?php echo $format; ?>" data-language="en"></input>
<br>