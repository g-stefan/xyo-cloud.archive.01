<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");                    
$format = $this->getArgument("format",$this->cloud->get("locale_date_format",""));
if(strlen($format)){
	if($format=="d-m-Y"){
		$format="DD-MM-YYYY HH:mm";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4).substr($value,10,strlen($value)));
		};
	};
	if($format=="d/m/Y"){
		$format="DD/MM/YYYY HH:mm";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,8,2)."-".substr($value,5,2)."-".substr($value,0,4).substr($value,10,strlen($value)));
		};
	};
	if($format=="Y-m-d"){
		$format="YYYY-DD-MM HH:mm";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="Y/m/d"){
		$format="YYYY/MM/DD HH:mm";
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	$format="data-date-format=\"".$format."\"";
}else{	
	$format="YYYY/MM/DD HH:mm";
	$format="data-date-format=\"".$format."\"";
};

if($this->isAjax()){
	$this->ejsBegin();
	echo "\$(\"#datetime_".($this->getElementId($element))."\").datetimepicker();";
	$this->ejsEnd();
}else{
	$this->setHtmlFooterJsSource("\$(function(){\$(\"#datetime_".($this->getElementId($element))."\").datetimepicker();});");
};


?>
<div class="form-group <?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <div class="input-group date" id="datetime_<?php $this->eElementId($element); ?>">
    <input type="text" maxlength="64" class="form-control" placeholder="" <?php echo $format; ?>
       name="<?php $this->eElementName($element); ?>"
       value="<?php $this->eElementValue($element, ""); ?>"
       id="<?php $this->eElementId($element); ?>" ></input>
	<span class="input-group-addon">
		<span class="fa fa-calendar"></span>
	</span>
   </div>
</div>
