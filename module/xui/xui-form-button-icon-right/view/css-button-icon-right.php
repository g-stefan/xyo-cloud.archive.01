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
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

.xui-form-button-icon-right{
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
	padding-left: 11px;
	padding-bottom: 7px;
	padding-right: 35px;

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

.xui-form-button-icon-right i{
	position: absolute;
	top: 5px;
	right: 5px;
}

.xui-form-button-icon-right:focus{
	outline: none;
}

.xui-form-button-icon-right:hover, .xui-form-button-icon-right:focus{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
}

.xui-form-button-icon-right:active{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
	margin-top: 2px;
	margin-bottom: 1px;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWall; ?>;
}

/* --- */

.xui-form-button-icon-right_default{
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
	$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>
.xui-form-button-icon-right_<?php echo $key; ?>{
	color: <?php echo $xuiTheme->colorTypeButtonText[$key]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-right_<?php echo $key; ?>:hover, .xui-form-button-icon-right_<?php echo $key; ?>:focus{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
}

.xui-form-button-icon-right_<?php echo $key; ?>:active{
	border: 1px solid <?php echo $colorHover; ?>;
	background-color: <?php echo $colorHover; ?>;
	box-shadow: 0px 1px 0px 0px <?php echo $colorWall; ?>;
}

<?php }; 

$color=$xuiTheme->colorTypeButton["disabled"];
$colorWall=$xuiColor->rgbHexHSLAdjust($color,0,2,-20);
$colorHover=$xuiColor->rgbHexHSLAdjust($color,0,0,-5);

?>

.xui-form-button-icon-right_disabled{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-right_disabled:hover, .xui-form-button-icon-right_disabled:focus{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
}

.xui-form-button-icon-right_disabled:active{
	cursor: default;
	color: <?php echo $xuiTheme->colorTypeButtonText["disabled"]; ?>;
	background-color: <?php echo $color; ?>;
	border: 1px solid <?php echo $color; ?>;
	box-shadow: 0px 3px 0px 0px <?php echo $colorWall; ?>;
	margin-top: 0px;
	margin-bottom: 3px;
}

/* --- */
