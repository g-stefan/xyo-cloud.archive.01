<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");

?>
<div class="form-group has-feedback has-feedback-left<?php if($this->isElementError($element)){echo " has-error";}; ?>">
    <label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
    <input type="text" maxlength="128" class="form-control" placeholder=""
       name="<?php $this->eElementName($element); ?>"
       value="<?php $this->eElementValue($element, ""); ?>"
       id="<?php $this->eElementId($element); ?>" ></input>
    <i class="form-control-feedback glyphicon glyphicon-user" style="color:#ccc;"></i>
</div>
