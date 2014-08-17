<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$path=$this->cloud->get("path_base")."package/";
$list=array();
$modSetup=&$this->cloud->getModule("xyo-mod-setup");
if($modSetup){
    $list=$modSetup->getPackageList2($path);
};
if(count($list)){}else{
    $list["*"]=$this->getFromLanguage("package_none");
};

$this->returnParameter("select_packages",$list);
