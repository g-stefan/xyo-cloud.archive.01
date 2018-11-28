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

<?php $this->setDefaultSelector(".-popup"); ?>

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?>{
	display: inline-block;
	width: auto;
	overflow: visible;	
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content {
	position: absolute;
	top: calc(40px - 1px);
	left: 0px;
	width: 288px;
	overflow: visible;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item {
	overflow: visible;
	width: 288px;	
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_submenu {
	overflow: visible;
	height: auto;	
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_item_content{
	height: 0px;
	width: 288px;	
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_submenu .xui.menu_item > .xui.menu_item_content {
	height: 0px;	
	transition: none;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item {
	overflow: visible;
	width: 288px;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?>:hover .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;
}

/* --- border --- */

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item:hover:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item:first-child:hover:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item:last-child:hover:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item:only-child:hover:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item.-submenu:hover:after{
	display: none;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item:hover > .xui.menu_item_content {
	z-index: 12;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item.-submenu:hover > .xui.menu_item_content:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item > .xui.menu_item_content:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:first-child > .xui.menu_item_content:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:last-child > .xui.menu_item_content:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content > .xui.menu_item > .xui.menu_submenu .xui.menu_item:only-child > .xui.menu_item_content:after{
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

/*
// Level 1
*/

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu {
	position: absolute;
	top: 0px;
	left: calc(288px - 1px);
	z-index:8;
	background-color: red;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
  .xui.menu_item > .xui.menu_item_content >
    .xui.action.-active .xui.action_icon-right {	
	transition: none;
	transform: rotate(0deg);
}

/*
// Level 2
*/


<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item > .xui.menu_submenu {
	position: absolute;
	top: 0px;
	left: calc(288px - 1px);
	z-index:8;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
  .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content >
    .xui.action.-active .xui.action_icon-right {	
	transition: none;
	transform: rotate(0deg);
}

/*
// Level 3
*/

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_submenu {
	position: absolute;
	top: 0px;
	left: calc(288px - 1px);
	z-index:8;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item:hover > .xui.menu_submenu > .xui.menu_submenu_content >
    .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;	
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
  .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_submenu > .xui.menu_submenu_content >
    .xui.menu_item > .xui.menu_item_content >
     .xui.action.-active .xui.action_icon-right {	
	transition: none;
	transform: rotate(0deg);
}

</style>

