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
	display: none;
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
	padding-left: 48px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	<?php echo $xuiTheme->colorTypeLabel["default"]; ?>
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

	border: 2px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-radius: 3px;

	transition: all 0.3s ease;
}

.xui-form-switch input[type="checkbox"]:active + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:focus + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-switch input[type="checkbox"]:checked + label::before {
	border: 2px solid <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput["primary"],0,5,-20); ?>;
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput["primary"],0,5,-20); ?>;
}

.xui-form-switch input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: 9px;
	left: 4px;
	content: " ";

	border-radius: 2px;

	width: 14px;
	height: 14px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput["default"],0,5,-20); ?>;

	transition: all 0.3s ease;
}

.xui-form-switch input[type="checkbox"]:checked + label::after {
	top: 9px;
	left: 26px;	

	background-color: #FFFFFF;
}

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>
<?php if($key=="default"){ continue; }; ?>

.xui-form-switch_<?php echo $key; ?> label {
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"] + label::after {
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput[$key],0,5,-20); ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:checked + label::before {
	border: 2px solid <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput[$key],0,5,-20); ?>;
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput[$key],0,5,-20); ?>;
}

.xui-form-switch_<?php echo $key; ?> input[type="checkbox"]:checked + label::after {
	background-color: #FFFFFF;
}
	
<?php }; ?>

