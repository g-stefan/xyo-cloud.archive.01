<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$select=array("*"=>$this->getFromLanguage("select_connection_none"));
$selectX=array_keys($this->cloud->dataSource->getDataSourceConnectionProviderList());
foreach($selectX as $value){
	$select[$value]=$value;
};

$this->setParameter("select_connection",$select);
