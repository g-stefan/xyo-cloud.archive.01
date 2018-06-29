<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

class xyo_datasource_EmptyField {

}

class xyo_DataSource extends xyo_Config {

	var $dataSourceConnectionProvider_;
	var $dataSourceCache_;
	var $dataSourceAs_;
	var $dataSourceDescriptor_;

	function __construct(&$cloud) {
		parent::__construct($cloud);

		$this->dataSourceProvider_ = array();
		$this->dataSourceCache_ = array();
		$this->dataSourceAs_ = array();
		$this->dataSourceDescriptor_ = array();
		$this->dataSourceConnectionProvider_=array();
	}

	function loadConfig() {
		$this->includeConfig("config.ds");
	}

	function setDataSourceConnectionProvider($name, $provider) {
		$this->dataSourceConnectionProvider_[$name] = $provider;
	}

	function getDataSourceConnectionProviderList() {
		return $this->dataSourceConnectionProvider_;
	}

	function setDataSourceAs($nameNew, $nameOld) {
		if (strcmp($nameNew, $nameOld) == 0) {
			return;
		}
		$this->dataSourceAs_[$nameNew] = $nameOld;
	}

	function getDataSourceAsList($connection) {
		$connectionX=$connection.".";
		$list_ = $this->dataSourceAs_;

		$list = array();
		$path="datasource";
		if (!$dh = @opendir($path)) {
		} else {
			while (false !== ($obj = readdir($dh))) {
				if ($obj == '.' || $obj == '..') {
					continue;
				};
				if (is_dir($path . $obj)) {
				} else {
					array_push($list, $obj);
				};
			};
			closedir($dh);
		};

		foreach($list as $value) {
			if(strncmp($value,$connectionX,strlen($connectionX))==0) {
				$valueX=str_replace(".php","",$value);
				$list_[$valueX]=$valueX;
			};
		};

		return $list_;
	}

	function &getDataSource($name, $as_=null) {
		if (array_key_exists($name, $this->dataSourceCache_)) {
			$rVal = &$this->dataSourceCache_[$name]->copyThis();
			return $rVal;
		};
		if (array_key_exists($name, $this->dataSourceAs_)) {
			$v_ = &$this->getDataSource($this->dataSourceAs_[$name], $name);
			if ($v_) {
				$this->dataSourceCache_[$name] = &$v_->copyThis();
			};
			return $v_;
		};
		if (!$as_) {
			if (file_exists($this->cloud->path."datasource/".$name.".php")) {
				$this->setDataSourceDescriptor($name, $this->cloud->path."datasource/". $name.".php");
				if (array_key_exists($name, $this->dataSourceAs_)) {
					$v_ = &$this->getDataSource($this->dataSourceAs_[$name], $name);
					if ($v_) {
						$this->dataSourceCache_[$name] = &$v_->copyThis();
					};
					return $v_;
				};
			};
		};

		$matches = array();
		if(preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/", $name, $matches)) {
			if (count($matches) > 3) {

				foreach ($this->dataSourceConnectionProvider_ as $key_ => $value_) {
					if ($matches[1]==$key_) {
						$module = &$this->cloud->getModule($value_);
						if ($module) {
							if(array_key_exists($name,$this->dataSourceDescriptor_)) {
								$module->setDataSourceDescriptor($name,$this->dataSourceDescriptor_[$name]);
							};

							$rVal = &$module->getDataSource($name, $as_);
							if ($rVal) {
								$this->dataSourceCache_[$name] = &$rVal;
								$rVal = &$rVal->copyThis();
								return $rVal;
							};
						};
					};
				};

			};
		};
		$rNull = null;
		return $rNull;
	}

	function getDataSourceDescriptor($name) {
		if (array_key_exists($name, $this->dataSourceDescriptor_)) {
			return $this->dataSourceDescriptor_[$name];
		};
		return null;
	}

	function setDataSourceDescriptor($name, $descriptor) {
		$this->dataSourceDescriptor_[$name] = $descriptor;
	}

	function setModuleDataSource($module, $name) {
		$descriptor = $this->cloud->path."datasource/" . $name . ".php";
		if (!file_exists($descriptor)) {
			$descriptorPath = $this->cloud->getModulePathBase($module);
			if ($descriptorPath) {
				$notFound=true;
				foreach ($descriptorPath as $path) {
					$descriptor=$path."datasource/" . $name . ".php";
					if (file_exists($descriptor)) {
						$notFound=false;
						break;
					}
				}
				if($notFound) {
					return false;
				};
			}
		}

		$this->setDataSourceDescriptor($name, $descriptor);
		return true;
	}

}

