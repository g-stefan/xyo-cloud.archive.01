<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.menu.-dropdown{	
	width: 100%;
	overflow: visible;
	display: table;
}

.xui.menu.-dropdown > .xui.menu_content {
	overflow: visible;
	display: table-row;
}

.xui.menu.-dropdown .xui.menu_item {
	overflow: visible;
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item {
	display: table-cell;
}

.xui.menu.-dropdown .xui.menu_item > .xui.menu_submenu {
	overflow: visible;
	height: auto;	
}

.xui.menu.-dropdown .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	width: 288px;
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item > .xui.menu_item_content {
	width: 100%;
}

.xui.menu.-dropdown .xui.menu_item > .xui.menu_submenu .xui.menu_item > .xui.menu_item_content {
	height: 0px;	
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item {
	overflow: hidden;
	width: auto;
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item.-submenu:hover {
	overflow: visible;
	transition: none;
}

/* --- border --- */

.xui.menu.-dropdown:after{
	content: "";	
	display: block;
	position: absolute;	
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 0px 0px 0px 1px #DDDDDD;
	z-index: 6;
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item:hover > .xui.menu_item_content:after{
	content: "";
	display: block;
	position: absolute;	
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 0px 0px 0px 1px #DDDDDD;
	z-index: 13;	
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item:hover > .xui.menu_item_content {
	z-index: 12;
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item > .xui.menu_item_content:after{
	content: "";
	display: block;
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 1px 0px 0px 0px #DDDDDD, inset -1px 0px 0px 0px #DDDDDD;
	z-index: 13;	
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:first-child > .xui.menu_item_content:after{
	content: "";
	display: block;
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 1px 1px 0px 0px #DDDDDD, inset -1px 0px 0px 0px #DDDDDD;
	z-index: 13;	
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:last-child > .xui.menu_item_content:after{
	content: "";
	display: block;
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 1px -1px 0px 0px #DDDDDD, inset -1px 0px 0px 0px #DDDDDD;
	z-index: 13;	
}

.xui.menu.-dropdown > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:only-child > .xui.menu_item_content:after{
	content: "";
	display: block;
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	bottom: 0px;
	pointer-events: none;
	box-shadow: inset 0px 0px 0px 1px #DDDDDD;
	z-index: 13;
}

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item.-submenu:hover >
  .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item:first-child > .xui.menu_item_content:after{
	box-shadow: inset 1px 0px 0px 0px #DDDDDD, inset -1px 0px 0px 0px #DDDDDD;
}

/*
// Level 1
*/

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item > .xui.menu_item_content >
  .xui.action .xui.action_icon-right {
	transition: none;
	transform: rotate(90deg);	
}

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item > .xui.menu_submenu {
	position: absolute;
	top: 40px;
	left: 0px;
	width: 100%;
	z-index:8;
}

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;
	width: 100%;
}

/*
// Level 2
*/

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item > .xui.menu_submenu {
	position: absolute;
	top: 0px;
	left: calc(100% - 1px);
	z-index:8;
}

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;	
}

.xui.menu.-dropdown > .xui.menu_content >
  .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content >
    .xui.action.-active .xui.action_icon-right {	
	transition: none;
	transform: rotate(0deg);
}

/*
// Level 3
*/

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_submenu {
	position: absolute;
	top: 0px;
	left: calc(288px - 1px);
	z-index:8;
}

.xui.menu.-dropdown > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
    .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;	
}

.xui.menu.-dropdown > .xui.menu_content >
  .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
    .xui.menu_item > .xui.menu_item_content >
     .xui.action.-active .xui.action_icon-right {	
	transition: none;
	transform: rotate(0deg);
}

</style>

