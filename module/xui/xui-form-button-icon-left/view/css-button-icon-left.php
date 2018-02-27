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

$color=$xuiTheme->colorTypeButton["default"];
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-25);
$colorWallDark=$xuiColor->rgbHexHSLAdjust($color,0,2,-35);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);
$colorHoverDark=$xuiColor->rgbHexHSLAdjust($color,0,0,-10);

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
	background-color: <?php echo $color; ?>;

	font-family: "Roboto", sans-serif;

	border: 1px solid <?php echo $colorHover; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
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
	border-top: 1px solid <?php echo $colorHoverDark; ?>;
	border-left: 1px solid <?php echo $colorHoverDark; ?>;
	border-right: 1px solid <?php echo $colorHoverDark; ?>;
	border-bottom: 1px solid <?php echo $colorHover; ?>;
	background-color: #FFFFFF;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWallDark; ?>;
}

.xui-form-button-icon-left:active{
	background-color: #FFFFFF;
	border-top: 1px solid <?php echo $colorHoverDark; ?>;
	border-left: 1px solid <?php echo $colorHoverDark; ?>;
	border-right: 1px solid <?php echo $colorHoverDark; ?>;
	border-bottom: 1px solid #FFFFFF;
	margin-top: 2px;
	margin-bottom: 1px;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWallDark; ?>;
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

	$color=$value;
	$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-15);
	$colorWallDark=$xuiColor->rgbHexHSLAdjust($color,0,2,-25);
	$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);
	$colorHoverDark=$xuiColor->rgbHexHSLAdjust($color,0,0,-10);

?>
.xui-form-button-icon-left_<?php echo $key; ?>{
	color: <?php echo $xuiTheme->colorTypeButtonText[$key]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_<?php echo $key; ?>:hover,
.xui-form-button-icon-left_<?php echo $key; ?>:focus{
	border-top: 1px solid <?php echo $colorWallDark; ?>;
	border-left: 1px solid <?php echo $colorWallDark; ?>;
	border-right: 1px solid <?php echo $colorWallDark; ?>;
	border-bottom: 1px solid <?php echo $colorHoverDark; ?>;
	background-color: <?php echo $colorHoverDark; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWallDark; ?>;
}

.xui-form-button-icon-left_<?php echo $key; ?>:active{
	border-top: 1px solid <?php echo $colorWallDark; ?>;
	border-left: 1px solid <?php echo $colorWallDark; ?>;
	border-right: 1px solid <?php echo $colorWallDark; ?>;
	border-bottom: 1px solid <?php echo $colorHoverDark; ?>;
	background-color: <?php echo $colorHoverDark; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWallDark; ?>;
}

<?php }; 

$color=$xuiTheme->colorTypeButton["disabled"];
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-20);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

.xui-form-button-icon-left_disabled{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_disabled:hover, .xui-form-button-icon-left_disabled:focus{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-left_disabled:active{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
	margin-top: 0px;
	margin-bottom: 3px;
}

/* --- */
