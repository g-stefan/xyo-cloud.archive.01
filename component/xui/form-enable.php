<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$select_list = array(
    "1" => $this->getFromLanguage("select_enabled_enabled"),
    "0" => $this->getFromLanguage("select_enabled_disabled")
);
$select_value = $this->getElementValue($element);
?>	

<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label_danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<select class="xui-form-select<?php if($this->isElementError($element)){echo " xui-form-select_danger";}; ?>" name="<?php $this->eElementName($element); ?>" id="<?php $this->eElementId($element); ?>">
<?php
	foreach ($select_list as $key => $value) {
		$selected = "";
		if (strcmp($key, $select_value) == 0) {
			$selected = " selected=\"selected\"";
		}
		echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";
	}

?>
</select>
<br>