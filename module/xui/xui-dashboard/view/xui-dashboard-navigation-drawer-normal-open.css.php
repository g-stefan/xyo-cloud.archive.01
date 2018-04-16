/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

/* --- dasboard navigation drawer normal open --- */

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open{
	width: <?php echo $this->navigationDrawerOpenWidth; ?>px;
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
	padding-top: 8px;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup {
	position: relative;
	height: auto;
	overflow: hidden;
	cursor: pointer;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action{
	position: relative;
	height: 40px;
	overflow: hidden;
	padding-left: 12px;
	cursor: pointer;
	display: block;
	transition: background-color 0.5s ease, height 0.5s ease;

	-webkit-touch-callout: none;
	-webkit-user-select: none;
     	-khtml-user-select: none;
       	-moz-user-select: none;
        -ms-user-select: none;
        user-select: none;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-separator{
	transition: height 0.5s ease;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action:hover{
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action .xui_effect-ripple__element {
	background-color: <?php echo $this->navigationDrawerBackgroundColorRipple; ?>;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action .xui-icon-left{
	position: relative;
	float:left;
	width: 48px;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	font-size: 24px;
	line-height: 24px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action .xui-text{
	position: relative;
	float:left;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	font-size: 15px;
	line-height: 24px;
	margin-left: 8px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-action .xui-icon-right{
	position: relative;
	float:right;
	width: 48px;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	transition: transform 0.3s ease;
	font-size: 24px;
	line-height: 24px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup_on .xui-icon-right{
	transform: rotate(90deg);
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup_off .xui-icon-right{
	transform: rotate(0deg);
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup_on .xui-next .xui-action{
	height: 40px;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup_off .xui-next .xui-action{
	height: 0px;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open .xui-popup_off .xui-next .xui-separator{
	display: none;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_open + .xui-content{
	margin-left: <?php echo $this->navigationDrawerOpenWidth; ?>px;
}

