<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_module>0) {

	foreach($this->items as $item) {
		if(!is_null($item["name"])){
			$this->processComponent($item["type"],$item["name"],$item["parameters"]);
			$this->ds->clear();
			$this->ds->id_xyo_module=$this->id_xyo_module;
			$this->ds->name=$item["name"];
			$this->ds->tryLoad(0,1);		
			$this->ds->value=$this->getElementValueStr($item["name"],$item["default_value"]);
			$this->ds->save();		
		};
	};

	$dsModule=&$this->getDataSource("db.table.xyo_module");
	$dsModule->clear();
	$dsModule->id=$this->id_xyo_module;
	$dsModule->parameter=1;
	$dsModule->save();	
};

