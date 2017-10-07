<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$checkedX=9;
$checkedY=4;
$checkedLx=14;
$checkedLy=14;

?>

/* --- */

.xui-form-checkbox2{
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

.xui-form-checkbox2 input[type="checkbox"]{
	display: none;
}

.xui-form-checkbox2 label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 0px;
	padding-bottom: 4px;
	padding-left: 26px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	<?php echo $xuiTheme->colorTypeLabel["default"]; ?>
}

.xui-form-checkbox2 label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	left: 0px;
	top: 5px;
	content: " ";

	width: 22px;
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

.xui-form-checkbox2 input[type="checkbox"]:active + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:focus + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-checkbox2 input[type="checkbox"]:checked + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
}

.xui-form-checkbox2 input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: <?php echo ($checkedX+$checkedLx/2-1); ?>px;
	left: <?php echo ($checkedY+$checkedLy/2-1); ?>px;
	content: " ";

	border-radius: 2px;

	width: 2px;
	height: 2px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background: transparent;

	transition: all 0.3s ease;
}

.xui-form-checkbox2 input[type="checkbox"]:checked + label::after {
	top: <?php echo $checkedX; ?>px;
	left: <?php echo $checkedY; ?>px;
	width: <?php echo $checkedLx; ?>px;
	height: <?php echo $checkedLy; ?>px;

	background-color: <?php

$color=$xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput["primary"],0,5,-20);

	echo $color;?>;
}

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>
<?php if($key=="default"){ continue; }; ?>

.xui-form-checkbox2_<?php echo $key; ?> label {
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-checkbox2_<?php echo $key; ?> label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-checkbox2_<?php echo $key; ?> input[type="checkbox"]:checked + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-checkbox2_<?php echo $key; ?> input[type="checkbox"]:checked + label::after {
	background-color: <?php

$color=$xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput[$key],0,5,-20);

echo $color;?>;
}

	
<?php }; ?>

