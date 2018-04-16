<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

foreach($this->items as $item) {
	if(!is_null($item["name"])){
		$this->processComponent($item["type"],array_merge(array("element" =>$item["name"]),$item["parameters"]));
		$this->ds->clear();
		$this->ds->name=$item["name"];
		$this->ds->tryLoad(0,1);		
		$this->ds->value=$this->getElementValueString($item["name"],$item["default_value"]);
		$this->ds->save();		
	};
};

//
$this->cloud->set("xui_dashboard_user_background",$this->getElementValueString("xui_dashboard_user_background"));
//