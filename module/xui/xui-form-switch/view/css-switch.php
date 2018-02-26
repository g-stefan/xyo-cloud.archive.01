<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-form-switch{
	display: inline-block;
	vertical-align: middle;
	cursor: pointer;
	position: relative;

	font-size: 16px;
	line-height: 24px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;
}

/* --- */

.xui-form-switch input[type="checkbox"]{
	position: absolute;
	top: 0px;
	left: 0px;
	display: block;
	opacity: 0;
}

.xui-form-switch label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 0px;
	padding-bottom: 4px;
	padding-left: 52px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	color: <?php echo $xuiTheme->colorTypeLabel["default"]; ?>;
}

.xui-form-switch label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	left: 0px;
	top: 5px;
	content: " ";

	width: 44px;
	height: 22px;

	background-color: transparent;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 4px;

	box-sizing: border-box;

	border: 1px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;

	transition: all 0.3s ease;
}

.xui-form-switch input[type="checkbox"]:active + label::before {
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($xuiTheme->colorTypeInputActive,"40"); ?>;
	border: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:focus + label::before {
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($xuiTheme->colorTypeInputActive,"40"); ?>;
	border: 1px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
	background-color: <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
}

.xui-form-switch input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: 8px;
	left: 3px;
	content: " ";

	border-radius: <?php echo $xuiTheme->inputBorderRadius; ?>px;

	width: 16px;
	height: 16px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background-color: <?php echo $xuiTheme->colorTypeInput["default"]; ?>;

	transition: all 0.3s ease;
}

.xui-form-switch input[type="checkbox"]:checked + label::after {
	top: 8px;
	left: 25px;	

	background-color: #FFFFFF;
}

.xui-form-switch input[type="checkbox"]:active + label::after {
	background-color: <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:focus + label::after {
	background-color: <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:active:checked + label::after {
	top: 8px;
	left: 25px;	

	background-color: #FFFFFF;
}

.xui-form-switch input[type="checkbox"]:focus:checked + label::after {
	top: 8px;
	left: 25px;	

	background-color: #FFFFFF;
}


<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>
<?php if($key=="default"){ continue; }; ?>

.xui-form-switch_<?php echo $key; ?> label {
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> label::before {
	border: 1px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"] + label::after {
	background-color: <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:checked + label::before {
	border: 1px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
	background-color: <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:checked + label::after {
	background-color: #FFFFFF;
}

<?php if($key!="default"){ ?>

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:active + label::before {
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($value,"40"); ?>;
	border: 1px solid <?php echo $value; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:focus + label::before {
	outline: none;
	box-shadow: 0px 0px 0px 3px <?php echo $xuiColor->rgbHexToRGBA($value,"40"); ?>;
	border: 1px solid <?php echo $value; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:active + label::after {
	background-color: <?php echo $value; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:focus + label::after {
	background-color: <?php echo $value; ?>;
}

<?php }; ?>
	
<?php }; ?>

