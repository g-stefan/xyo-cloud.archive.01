<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");                    
$format = $this->getArgument("format","HH:mm");
if(strlen($format)){
	$format="data-date-format=\"".$format."\"";
};

$value=$this->getElementValue($element);
if(strlen($value)==0){
	$this->setElementValue($element,null);	
}else{
	$this->setElementValue($element,substr($value,0,5)); // no seconds
};

if($this->isAjax()){
	$this->ejsBegin();
	echo "$(\"#time_".($this->getElementId($element))."\").datetimepicker({pickDate: false});";
	$this->ejsEnd();
}else{
	$this->setHtmlFooterJsSource("\$(function(){\$(\"#time_".($this->getElementId($element))."\").datetimepicker({pickDate: false});});");
};


?>
<div class="form-group <?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <div class="input-group date" id="time_<?php $this->eElementId($element); ?>">
    <input type="text" maxlength="64" class="form-control" placeholder="" <?php echo $format; ?>
       name="<?php $this->eElementName($element); ?>"
       value="<?php $this->eElementValue($element, ""); ?>"
       id="<?php $this->eElementId($element); ?>" ></input>
	<span class="input-group-addon">
		<span class="glyphicon glyphicon-time"></span>
	</span>
   </div>
</div>
