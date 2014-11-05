<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$select_list = $this->getParameter("select_" . $element);
$select_value = $this->getElementValue($element);
?>	
<div class="form-group<?php if($this->isElementError($element)){echo " has-error";}; ?>">
	<label class="control-label" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
	<br />
	<select class="selectpicker" data-width="auto" name="<?php $this->eElementName($element); ?>" id="<?php $this->eElementId($element); ?>">
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
</div>

<?php

if($this->isAjax()){
	$this->ejsBegin();
	echo "$(\"#".$this->getElementId($element)."\").selectpicker();";
	$this->ejsEnd();
};
