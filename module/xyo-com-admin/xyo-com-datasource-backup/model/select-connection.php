<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$list=array();
$modDs=&$this->getModule("xyo-mod-datasource");
if($modDs){
	$list=array_keys($modDs->getDataSourceConnectionProviderList());
};

$this->setParameter("select_connection",$list);
