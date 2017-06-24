<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$_popup=&$this->addItem($menu,"item", $this->site."media/sys/images/utilities-terminal-16.png","application",$module,null);
$_module=$this->getModule("xyo-mod-cms-page");
$_pages=$_module->getPages();
foreach($_pages as $_key=>$_value){
	$this->addItem($_popup,"item", $this->site."media/sys/images/utilities-terminal-16.png",$_value["title"],$module,array("page"=>$_key,"stamp"=>md5(time().rand())));
};