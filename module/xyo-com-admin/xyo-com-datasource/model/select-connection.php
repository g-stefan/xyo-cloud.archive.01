<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$select=array("*"=>$this->getFromLanguage("select_connection_none"));
$modDs=&$this->getModule("xyo-mod-datasource");
if($modDs){
	$selectX=array_keys($modDs->getDataSourceConnectionProviderList());
	foreach($selectX as $value){
		$select[$value]=$value;
	};
};

$this->setParameter("select_connection",$select);
