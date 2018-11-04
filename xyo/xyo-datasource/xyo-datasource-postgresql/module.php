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

$className = "xyo_datasource_PostgreSql";

class xyo_datasource_PostgreSql extends xyo_Module {

	var $ds;
	var $connectionList_;
	var $dataSourceList_;

	//----
	var $notifyBeforeLoad_;
	var $notifyBeforeSave_;
	var $notifyBeforeDelete_;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->ds = &$this->cloud->dataSource;

		if ($this->isBase("xyo_datasource_PostgreSql")) {

			require_once($this->path . "connection.php");
			require_once($this->path . "table.php");
			require_once($this->path . "query.php");
		}

		$this->connectionList_ = array();
		$this->dataSourceList_ = array();		

		$this->notifyBeforeLoad_ = null;
		$this->notifyBeforeSave_ = null;
		$this->notifyBeforeDelete_ = null;
	}

	function setConnection($name, $user, $password, $server, $port, $database, $prefix) {
		$this->connectionList_[$name] = new xyo_datasource_postgresql_Connection($this->cloud, $this, $name, $user, $password, $server, $port, $database, $prefix);
	}

	function setConnectionOption($name, $option, $value) {
		$v_ = &$this->getConnection($name);
		if ($v_) {
			if (strcmp($option, "debug") == 0) {
				$v_->setDebug($value);
			} else if (strcmp($option, "log") == 0) {
				$v_->setLog($value);
			}else if (strcmp($option, "notify") == 0) {
				foreach($value as $keyX=>$valueX){
					$v_->setNotify($keyX,$valueX);
				};
			};
		};
	}

	function getLayer() {
		return "postgresql";
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

	function &getDataSource($name, $as_=null) { // postgresql.connexion_name.table/query.name
		$v_ = null;
		$matches = array();
		if (preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/", $name, $matches)) {
			if (count($matches) > 3) {

				if (!array_key_exists($matches[1], $this->connectionList_)) {
					$this->includeConfig("config.ds.".$matches[1]);
				};


				if (array_key_exists($matches[1], $this->connectionList_)) {
					if (array_key_exists($name, $this->dataSourceList_)) {
						if ($this->dataSourceList_[$name]) {

							if (strcmp($matches[2], "table") == 0) {
								if ($this->connectionList_[$matches[1]]->open()) {


									$v_ = new xyo_datasource_postgresql_Table($this, $this->connectionList_[$matches[1]], $matches[3], $name, $this->dataSourceList_[$name], $as_);
									if ($v_->isOk()) {

									} else {
										$v_ = null;
									};
								};
							} else if (strcmp($matches[2], "query") == 0) {
								if ($this->connectionList_[$matches[1]]->open()) {

									$v_ = new xyo_datasource_postgresql_Query($this, $this->connectionList_[$matches[1]], $matches[3], $name, $this->dataSourceList_[$name], $as_);
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
		$descriptor = $this->cloud->getCloudPath()."datasource/" . $name . ".php";
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

