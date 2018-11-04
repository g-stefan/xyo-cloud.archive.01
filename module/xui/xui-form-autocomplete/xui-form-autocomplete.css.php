<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<style>

.xui-form-autocomplete {
	position: relative;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show {
	position: absolute;
	width: 100%;
	margin-top: -2px;
	z-index: 3;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list {
	outline: none;
	border-radius:  0px 0px 3px 3px;
	color: <?php echo $this->settings["form-text-default-color"]; ?>;
	background-color: #FFFFFF;
	border-top: 0px solid <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
	border-bottom: 1px solid <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item{
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	padding-top: 5px;
	padding-right: 6px;
	padding-bottom: 5px;
	padding-left: 6px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	height: 32px;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item:hover{
	background-color: <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
	color: #FFFFFF;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item-selected {
	background-color: <?php echo $this->settings["form-text-default-focus-border-color"]; ?>;
	color: #000000;
}

.xui.form-text + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item strong {
	font-weight: bold;
}

/* --- */

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>
<?php if($context=="disabled"){ continue; }; ?>

.xui.form-text<?php echo $selector; ?> + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list {
	outline: none;
	border-radius:  0px 0px 3px 3px;
	color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	background-color: #FFFFFF;
	border-top: 0px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	border-bottom: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
}

.xui.form-text<?php echo $selector; ?> + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item:hover{
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	color: #FFFFFF;
}

.xui.form-text<?php echo $selector; ?> + .autocompleter.xui-form-autocomplete.autocompleter-focus.autocompleter-show > ul.autocompleter-list > li.autocompleter-item-selected {
	background-color: <?php echo $this->settings["form-text-".$context."-focus-border-color"]; ?>;
	color: #000000;
}

<?php }; ?>

</style>
