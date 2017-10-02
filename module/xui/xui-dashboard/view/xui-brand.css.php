/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

@charset "UTF-8";

.xui-dashboard .xui-app-bar .xui-brand .xui-brand__content{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 287px;
	height: 48px;
	overflow: hidden;
	background-color: #FFFFFF;
	padding-top: 8px;
	padding-left: 20px;
}

.xui-dashboard .xui-app-bar .xui-brand .xui-brand__text{
	padding-left: 48px;
	font-size: 32px;
	line-height: 32px;
	font-weight: bold;
	color: #1853A0;
	overflow: hidden;
	width: auto;
	opacity: 1;
	transition: opacity 0.5s ease;	
}

.xui-dashboard .xui-app-bar .xui-brand_closed .xui-brand__text{
	opacity: 0;
}

.xui-dashboard .xui-app-bar .xui-brand .xui-brand__text-second{
	position: relative;
	top: -19px;
	left: 3px;
	font-size: 16px;
	line-height: 16px;
	font-weight: bold;
	height: 16px;
	color: #4FC1E9;
}

.xui-dashboard .xui-app-bar .xui-brand .xui-brand__logo{
	background-image: <?php

$color=$xuiPalette->palette["core-aqua-v1"];

$svg="<?xml version=\"1.0\" encoding=\"UTF-8\"?>".
"<svg viewBox=\"0 0 128 128\" xmlns=\"http://www.w3.org/2000/svg\">".
" <g transform=\"translate(0,0)\">".
"  <path ".
"style=\"fill:".$color.";fill-opacity:1\" ".
"d=\"M 64.00437,-9.5705332e-8 A 63.999365,63.999378 0 0 0 2.0154263e-7,63.995543 63.999365,63.999378 0 0 0 64.00437,128 63.999365,63.999378 0 0 0 128,63.995543 63.999365,63.999378 0 0 0 64.00437,-9.5705332e-8 Z M 64.00437,24.67309 A 39.322499,39.322502 0 0 1 103.32686,63.995543 39.322499,39.322502 0 0 1 64.00437,103.3182 39.322499,39.322502 0 0 1 24.68188,63.995543 39.322499,39.322502 0 0 1 64.00437,24.67309 Z\" ".
"/>".
" </g>".
"</svg>";

	echo "url(\"data:image/svg+xml;base64,".base64_encode($svg)."\")";

?>;
	
	float: left;
	width: 32px;
	height: 32px;
}
