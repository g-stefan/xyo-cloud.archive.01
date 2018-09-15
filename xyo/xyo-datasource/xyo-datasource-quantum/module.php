<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
//
// implements - Active Record Pattern
//
$className = "xyo_datasource_Quantum";

class xyo_datasource_Quantum extends xyo_Module {

	var $ds;
	var $connectionList_;
	var $dataSourceList_;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->ds = &$this->cloud->dataSource;

		if ($this->isBase("xyo_datasource_Quantum")) {
			require_once($this->path . "connection.php");
			require_once($this->path . "query.php");
		}

		$this->connectionList_ = array();
		$this->dataSourceList_ = array();

		//
		$this->setConnection("quantum");
	}

	function setConnection($name) {
		$this->connectionList_[$name] = new xyo_datasource_quantum_Connection($this, $name);
	}

	function setConnectionOption($name, $option, $value) {

	}

	function getLayer() {
		return "quantum";
	}

	function setDataSourceDescriptor($name, $descriptor) {
		$this->dataSourceList_[$name] = $descriptor;
	}

	function getDataSourceList() {
		return array_keys($this->dataSourceList_);
	}

	function getDataSourceParameter($name) {
		if (array_key_exists($name, $this->dataSourceList_)) {
			return $this->dataSourceList_[$name][1];
		};
		return null;
	}

	function &getConnection($name) {
		$retV = null;
		if (!array_key_exists($name, $this->connectionList_)) {
			$this->includeConfig("config.ds.".$name);
		};
		if (array_key_exists($name, $this->connectionList_)) {
			$retV = $this->connectionList_[$name];
		};
		return $retV;
	}

	function &getDataSource($name, $as_=null) { // system.connexion_name.query.name
		$v_ = null;
		if ($name) {

		} else {
			return $v_;
		};
		$matches = array();
		if (preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/", $name, $matches)) {
			if (count($matches) > 3) {

				if (!array_key_exists($matches[1], $this->connectionList_)) {
					$this->includeConfig("config.ds.".$matches[1]);
				};


				if (array_key_exists($matches[1], $this->connectionList_)) {
					if (array_key_exists($name, $this->dataSourceList_)) {
						if ($this->dataSourceList_[$name]) {
							if (strcmp($matches[2], "query") == 0) {
								if ($this->connectionList_[$matches[1]]->open()) {
									$v_ = new xyo_datasource_quantum_Query($this, $this->connectionList_[$matches[1]], $matches[3], $name, $this->dataSourceList_[$name], $as_);
									if ($v_->isOk()) {

									} else {
										$v_ = null;
									};
								};
							};
						};
					};
				};
			};
		};
		return $v_;
	}

	function setModuleDataSource($module, $name) {
		$descriptor = $this->cloud->path."datasource/" . $name . ".php";
		if (!file_exists($descriptor)) {
			$descriptor = $this->cloud->getModulePath($module);
			if ($descriptor) {
				$descriptor.="datasource/" . $name . ".php";
				if (!file_exists($descriptor)) {
					return false;
				};
			};
		};

		$this->ds->setDataSourceDescriptor($name, $descriptor);
		$this->setDataSourceDescriptor($name, $descriptor);
		return true;
	}

}

