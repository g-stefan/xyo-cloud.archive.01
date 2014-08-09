<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getParameter("element");
$this->setHtmFooterJsSource("\$(function(){\$(\"#date_".($this->getElementId($element))."\").datepicker();});");

?>
<div class="form-group <?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <div class="input-group date" id="date_<?php $this->eElementId($element); ?>">
    <input type="text" maxlength="64" class="form-control" placeholder=""
       name="<?php $this->eElementName($element); ?>"
       value="<?php $this->eElementValue($element, ""); ?>"
       id="<?php $this->eElementId($element); ?>" ></input>
	<span class="input-group-addon">
		<span class="fa fa-calendar"></span>
	</span>
   </div>
</div>
