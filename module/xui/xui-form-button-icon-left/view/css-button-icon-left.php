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

<?php

$color=$xuiPalette->colorTypeButton["default"];
$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-20);

$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,5,-10);
$colorHoverBorder=$xuiColor->rgbHexHSLAdjust($color,0,10,-20);

$colorAction=$xuiColor->rgbHexHSLAdjust($color,0,5,-15);

?>

.xui-form-button-icon-left{
	position: relative;
	display: inline-block;
        vertical-align: middle;
	user-select: none;
	cursor: pointer;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	border-radius: 3px;

	padding-top: 8px;
	padding-right: 12px;
	padding-bottom: 8px;
	padding-left: 36px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiPalette->colorTypeButtonText["default"]; ?>;
	background-color: <?php echo $color; ?>;
	border-top: 0px solid <?php echo $colorBorder; ?>; 
	border-right: 0px solid <?php echo $colorBorder; ?>;
	border-bottom: 4px solid <?php echo $colorBorder; ?>;
	border-left: 0px solid <?php echo $colorBorder; ?>;

	font-family: "Roboto", sans-serif;
}

.xui-form-button-icon-left i{
	position: absolute;
	top: 6px;
	left: 6px;
}

.xui-form-button-icon-left:focus{
	outline: none;
}

.xui-form-button-icon-left:hover, .xui-form-button-icon-left:focus{
	background-color: <?php echo $colorHover; ?>;
	border-top: 0px solid <?php echo $colorHoverBorder; ?>; 
	border-right: 0px solid <?php echo $colorHoverBorder; ?>;
	border-bottom: 4px solid <?php echo $colorHoverBorder; ?>;
	border-left: 0px solid <?php echo $colorHoverBorder; ?>;
}

.xui-form-button-icon-left:active{
	background-color: <?php echo $colorAction; ?>;
	margin-top: 2px;
	border-bottom: 2px solid <?php echo $colorHoverBorder; ?>;
}

/* --- */

<?php 

foreach($xuiPalette->colorTypeButton as $key=>$value){
	if($key=="disabled"){
		continue;
	};

	$color=$value;
	$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-20);

	$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,5,-10);
	$colorHoverBorder=$xuiColor->rgbHexHSLAdjust($color,0,10,-20);

	$colorAction=$xuiColor->rgbHexHSLAdjust($color,0,5,-15);

?>
.xui-form-button-icon-left--<?php echo $key; ?>{
	color: <?php echo $xuiPalette->colorTypeButtonText[$key]; ?>;
	background-color: <?php echo $color; ?>;
	border-top: 0px solid <?php echo $colorBorder; ?>; 
	border-right: 0px solid <?php echo $colorBorder; ?>;
	border-bottom: 4px solid <?php echo $colorBorder; ?>;
	border-left: 0px solid <?php echo $colorBorder; ?>;
}

.xui-form-button-icon-left--<?php echo $key; ?>:hover, .xui-form-button-icon-left--<?php echo $key; ?>:focus{
	background-color: <?php echo $colorHover; ?>;
	border-top: 0px solid <?php echo $colorHoverBorder; ?>; 
	border-right: 0px solid <?php echo $colorHoverBorder; ?>;
	border-bottom: 4px solid <?php echo $colorHoverBorder; ?>;
	border-left: 0px solid <?php echo $colorHoverBorder; ?>;
}

.xui-form-button-icon-left--<?php echo $key; ?>:active{
	background-color: <?php echo $colorAction; ?>;
	margin-top: 2px;
	border-bottom: 2px solid <?php echo $colorHoverBorder; ?>;
}

<?php }; 

$color=$xuiPalette->colorTypeButton["disabled"];
$colorBorder=$xuiColor->rgbHexHSLAdjust($value,0,0,-20);

?>

.xui-form-button-icon-left--disabled{
	cursor: default;
	color: <?php echo $xuiPalette->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border-top: 0px solid <?php echo $colorBorder; ?>; 
	border-right: 0px solid <?php echo $colorBorder; ?>;
	border-bottom: 4px solid <?php echo $colorBorder; ?>;
	border-left: 0px solid <?php echo $colorBorder; ?>;
}

.xui-form-button-icon-left--disabled:hover, .xui-form-button-icon-left--disabled:focus{

}

.xui-form-button-icon-left--disabled:active{
}

/* --- */
