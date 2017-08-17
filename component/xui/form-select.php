<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$select_list = $this->getParameter("select_" . $element);
$select_value = $this->getElementValue($element);
$submit=$this->getArgument("submit",false);
$onChange=$this->getArgument("on_change",null);
if($submit){
	$submit=" onchange=\"this.form.submit();\"";
}else{
	$submit="";
};

if($onChange){
	$submit=" onchange=\"".$onChange."\"";
};

?>	

<label class="xui-form-label<?php if($this->isElementError($element)){echo " xui-form-label--danger";}; ?>" for="<?php $this->eElementId($element); ?>"><?php $this->eLanguage("label_" . $element); ?><?php if($this->isElementError($element)){echo " - "; $this->eElementError($element);}; ?></label>
<br>
<select class="xui-form-select<?php if($this->isElementError($element)){echo " xui-form-select--danger";}; ?>" name="<?php $this->eElementName($element); ?>" id="<?php $this->eElementId($element); ?>" <?php echo $submit; ?> >
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

<?php

if($this->isAjax()){
	$this->ejsBegin();
	echo "XUI.FormSelect.initById(\"".$this->getElementId($element)."\");";
	$this->ejsEnd();
};
