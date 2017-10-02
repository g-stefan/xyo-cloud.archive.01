/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

.xui-dashboard .xui-user .xui-user__content{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 287px;
	height: 144px;
	overflow: hidden;
	background-repeat: no-repeat;
	background-position: left top;
	background-size: 287px auto;
}

.xui-dashboard .xui-user .xui-user__background{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 287px;
	height: 144px;
	overflow: hidden;
	background-color: #FFFFFF;
	opacity: 0;
	transition: opacity 0.5s ease;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_closed .xui-user .xui-user__background{
	opacity: 1;
}

.xui-dashboard .xui-navigation-drawer_mini.xui-navigation-drawer_closed .xui-user .xui-user__background{
	opacity: 1;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_closed .xui-user .xui-user__image{
	position: absolute;
	top: 2px;
	left: 12px; 
	width: 44px;
	height: 44px;
	transition: left 0.5s ease, top 0.5s ease, width 0.5s ease, height 0.5s ease;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_mini.xui-navigation-drawer_closed .xui-user .xui-user__image{
	position: absolute;
	top: 2px;
	left: 12px; 
	width: 44px;
	height: 44px;
	transition: left 0.5s ease, top 0.5s ease, width 0.5s ease, height 0.5s ease;
	box-sizing: border-box;
}

.xui-dashboard .xui-user .xui-user__info{
	position: absolute;
	left: 0px;
	top: 112px;
	width: 287px;
	height: 32px;
	overflow: hidden;
	background-color: rgba(0,0,0,0.5);
	color: #FFFFFF;
	font-size: 20px;
	line-height: 20px;
	padding-top: 6px;
	text-align: center;
	font-weight: normal;
}

.xui-dashboard .xui-user .xui-user__image{
	position: absolute;
	top: 4px;
	left: 92px; 
	border-radius: 50%;
	border: 0px solid #424242;
	background-color: #FFFFFF;
	width: 104px;
	height: 104px;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: auto 100%;
	transition: left 0.5s ease, top 0.5s ease, width 0.5s ease, height 0.5s ease;
	box-sizing: border-box;

	background-image: <?php

$color=$xuiPalette->palette["core-mint-v1"];

$svg="<?xml version=\"1.0\" encoding=\"UTF-8\"?>".
"<svg viewBox=\"0 0 640 480\" xmlns=\"http://www.w3.org/2000/svg\">".
"<g transform=\"translate(0,-570)\">".
" <g transform=\"matrix(1.049209,0,0,1.049209,-5.0753295,-45.75514)\">".
"  <circle".
"    r=\"73.214279\"".
"    cy=\"712.7193\"".
"    cx=\"312.50003\"".
"    id=\"path4147\"".
"    style=\"fill:".$color.";fill-opacity:1\" />".
"      <path".
"         transform=\"translate(0,572.36216)\"".
"         d=\"m 313.92773,231.42773 a 138.21428,180.35713 0 0 0 -138.21289,180.35743 138.21428,180.35713 0 0 0 8.48438,61.78711 l 259.39648,0 a 138.21428,180.35713 0 0 0 8.54688,-61.78711 138.21428,180.35713 0 0 0 -138.21485,-180.35743 z\"".
"         style=\"fill:".$color.";fill-opacity:1\"".
"         />".
"   </g>".
"  </g>".
"</svg>";

	echo "url(\"data:image/svg+xml;base64,".base64_encode($svg)."\")";

?>;

}

