<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

class xyo_datasource_xyo_Connection {

	var $module;
	var $name;
	var $databasePath;
	var $notify;
	
	function __construct(&$module, $name, $databasePath) {
		$this->module = &$module;
		$this->name = $name;
		$this->databasePath = $databasePath;

		$this->notify=array();
	}

	function open() {
		if ($this->databasePath) {
			return true;
		}
		return false;
	}

	function close() {

	}

	function setNotify($datasource,$moduleName){
		$this->notify[$datasource]=&$this->module->getModule($moduleName);
	}

};
