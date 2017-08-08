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

.xui-form__radio{
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
}

/* --- */

.xui-form__radio input[type="radio"]{
	display: none;
}

.xui-form__radio label {
	display: inline-block;
        vertical-align: middle;

	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	box-sizing: border-box;
	padding-top: 4px;
	padding-left: 26px;
	padding-bottom: 4px;
	padding-right: 0px;

	cursor: pointer;

	<?php echo $xuiPalette->colorTypeLabel["default"]; ?>
}

.xui-form__radio label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	left: 0px;
	top: 5px;
	content: " ";

	width: 22px;
	height: 22px;
	border-radius: 11px;
	background-color: transparent;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	border: 2px solid <?php echo $xuiPalette->colorTypeInput["default"]; ?>;
}

.xui-form__radio input[type="radio"]:active + label::before {
	border: 2px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}

.xui-form__radio input[type="radio"]:focus + label::before {
	border: 2px solid <?php echo $xuiPalette->colorTypeInputActive; ?>;
}

.xui-form__radio input[type="radio"] + label::after {
	display: block;
	cursor: pointer;
	position: absolute;
	top: 10px;
	left: 5px;
	content: " ";

	border-radius: 6px;

	width: 12px;
	height: 12px;

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
}

.xui-form__radio input[type="radio"]:checked + label::after {
	background: <?php echo $xuiColor->rgbHexHSLAdjust($xuiPalette->colorTypeInput["default"],0,5,-20); ?>;
}


<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>

.xui-form__radio--<?php echo $key; ?> label {
	color: <?php echo $xuiPalette->colorTypeLabel[$key]; ?>;
}

.xui-form__radio--<?php echo $key; ?> label::before {
	border: 2px solid <?php echo $xuiPalette->colorTypeInput[$key]; ?>;
}

.xui-form__radio--<?php echo $key; ?> input[type="radio"]:checked + label::after {
	background: <?php echo $xuiColor->rgbHexHSLAdjust($xuiPalette->colorTypeInput[$key],0,5,-20); ?>;
}
	
<?php }; ?>

