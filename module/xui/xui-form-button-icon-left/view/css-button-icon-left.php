<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

<?php

$color=$xuiTheme->colorTypeButton["default"];
$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,0,-25);

$colorHover="#FFFFFF";
$colorHoverBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-10);
$colorHoverWall=$xuiColor->rgbHexHSLAdjust($color,0,0,-35);

?>

.xui-form-button-icon-left{
	display: inline-block;
	position: relative;
	vertical-align: middle;
	user-select: none;
	cursor: pointer;

	font-size: 16px;
	line-height: 20px;
	font-weight: normal;

	border-radius: 3px;

	padding-top: 7px;
	padding-left: 35px;
	padding-bottom: 7px;
	padding-right: 11px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 3px;
	margin-right: 0px;

	box-sizing: border-box;

	color: <?php echo $xuiTheme->colorTypeButtonText["default"]; ?>;
	font-family: "Roboto", sans-serif;

	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;

	outline: none;

	transition: background-color 0.3s ease,border-color 0.3s ease;
}

.xui-form-button-icon-left i{
	position: absolute;
	top: 6px;
	left: 6px;
}

.xui-form-button-icon-left:focus{
	outline: none;
}

.xui-form-button-icon-left:hover,
.xui-form-button-icon-left:focus{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorHoverWall; ?>;
}

.xui-form-button-icon-left:active{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorHoverWall; ?>;

	margin-top: 2px;
	margin-bottom: 1px;
}

/* --- */

.xui-form-button-icon-left_default{
}

<?php 

foreach($xuiTheme->colorTypeButton as $key=>$value){
	if($key=="default"){
		continue;
	};
	if($key=="disabled"){
		continue;
	};

	$color=$xuiColor->rgbHexHSLAdjust($value,0,0,-10);
	$colorBorder=$color;
	$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,0,-15);

	$colorHover=$value;
	$colorHoverBorder=$colorHover;
	$colorHoverWall=$xuiColor->rgbHexHSLAdjust($colorHover,0,0,-30);

?>
.xui-form-button-icon-left_<?php echo $key; ?>{
	color: <?php echo $xuiTheme->colorTypeButtonText[$key]; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_<?php echo $key; ?>:hover,
.xui-form-button-icon-left_<?php echo $key; ?>:focus{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorHoverWall; ?>;
}

.xui-form-button-icon-left_<?php echo $key; ?>:active{
	border: 1px solid <?php echo $colorHoverBorder; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorHoverWall; ?>;
}

<?php }; 

$color=$xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeButton["disabled"],0,0,10);
$colorText=$xuiColor->rgbHexHSLAdjust($color,0,0,-15);
$colorBorder=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,0,-15);

?>

.xui-form-button-icon-left_disabled{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_disabled:hover, .xui-form-button-icon-left_disabled:focus{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_disabled:active{
	cursor: default;
	color: <?php echo $colorText; ?>;
	border: 1px solid <?php echo $colorBorder; ?>;
	background-color: <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
	margin-top: 0px;
	margin-bottom: 3px;
}

/* --- */
