<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<?php $this->setDefaultSelector(".-accordion"); ?>

<style>

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?>:after{
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

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_submenu {
	height: auto;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_item_content{
	height: 40px;
	transition: height 0.5s ease;
}

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> .xui.menu_item > .xui.menu_submenu .xui.menu_item > .xui.menu_item_content {
	height: 0px;	
}

/*
// Level 1
*/

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content{
	height: 40px;	
}

/*
// Level 2
*/

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item > .xui.menu_item_content{
	height: 40px;	
}

/*
// Level 3
*/

<?php $this->eSuperSelector(); ?>.xui.menu<?php $this->eSelector(); ?> > .xui.menu_content >
 .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
  .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
   .xui.menu_item.-on > .xui.menu_submenu > .xui.menu_submenu_content >
    .xui.menu_item > .xui.menu_item_content{
	height: 40px;	
}

</style>
