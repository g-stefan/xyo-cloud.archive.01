<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");

?>
<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label--danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<div class="xui-form-file" style="width:100%;display:block;height:39px;box-sizing: border-box;">
<input type="file" name="<?php $this->eElementName($element); ?>" id="<?php $this->eElementId($element); ?>" class="xui-form-file__file"></input>
<label for="<?php $this->eElementId($element); ?>" style="position:absolute;display:block;top:0px;right:46px;left:0px;box-sizing: border-box;"><i class="material-icons">file_upload</i> Browse ...</label><!--
--><button type="button" class="xui-form-button-icon xui-form-button-icon--info" style="position:absolute;top:0px;right:0px;" onclick="document.getElementById('<?php $this->eElementId($element); ?>').value=null;$('#<?php $this->eElementId($element); ?>').trigger('change');"><i class="material-icons">delete</i></button>
</div>
<input type="hidden"
	name="<?php $this->eElementName($element); ?>_delete"
	value="0"
	id="<?php $this->eElementId($element); ?>_delete" ></input>
<input type="hidden"
	name="<?php $this->eElementName($element); ?>_value"
	value="<?php $this->eElementValue($element); ?>" ></input>
<input type="hidden"
	name="<?php $this->eElementName($element); ?>_file"
	value="<?php $this->eElementValue($element); ?>" ></input>
<div class="xui-separator"></div>
