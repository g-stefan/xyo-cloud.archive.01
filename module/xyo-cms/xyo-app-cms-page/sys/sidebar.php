<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$_popup=&$this->addItem($menu,"item", "<i class=\"material-icons\">layers</i>","application",$module,null);
$_module=$this->getModule("xyo-mod-cms-page");
$_pages=$_module->getPages();
foreach($_pages as $_key=>$_value){
	$this->addItem($_popup,"item", "<i class=\"material-icons\">layers</i>",$_value["title"],$module,array("page"=>$_key,"stamp"=>md5(time().rand())));
};