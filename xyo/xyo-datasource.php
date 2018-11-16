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
	var $dataSourceDescriptor_;

	function __construct(&$cloud) {
		parent::__construct($cloud);

		$this->dataSourceProvider_ = array();
		$this->dataSourceCache_ = array();		
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

	function getDataSourceList($connection) {
		$connectionX=$connection.".";
		$list_ = array();

		$list = array();
		$path="datasource";
		$dh = @opendir($path);
		if (false !== $dh) {
			while (false !== ($obj = readdir($dh))) {
				if ($obj == '.' || $obj == '..') {
					continue;
				};
				if (!is_dir($path . $obj)) {
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

	function &getDataSource($name) {
		if (array_key_exists($name, $this->dataSourceCache_)) {
			$rVal = &$this->dataSourceCache_[$name]->copyThis();
			return $rVal;
		};
		if (!file_exists($this->cloud->getCloudPath()."datasource/".$name.".php")) {
			$rNull = null;
			return $rNull;			
		};		
		$this->setDataSourceDescriptor($name, $this->cloud->getCloudPath()."datasource/". $name.".php");
		$matches = array();
		if(preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/", $name, $matches)) {
			if (count($matches) > 3) {
				if(array_key_exists($matches[1],$this->dataSourceConnectionProvider_)){
					$module = &$this->cloud->getModule($this->dataSourceConnectionProvider_[$matches[1]]);
					if ($module) {
						if(array_key_exists($name,$this->dataSourceDescriptor_)) {
							$module->setDataSourceDescriptor($name,$this->dataSourceDescriptor_[$name]);
						};
						$rVal = &$module->getDataSource($name);
						if ($rVal) {
							$this->dataSourceCache_[$name] = &$rVal;
							$rVal = &$rVal->copyThis();
							return $rVal;
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
		$descriptor = $this->cloud->getCloudPath()."datasource/" . $name . ".php";
		if (!file_exists($descriptor)) {
			$descriptorPath = $this->cloud->getModulePathBase($module);
			if ($descriptorPath) {
				$notFound=true;
				foreach ($descriptorPath as $path) {
					$descriptor=$path."datasource/" . $name . ".php";
					if (file_exists($descriptor)) {
						$notFound=false;
						break;
					};
				};
				if($notFound) {
					return false;
				};
			};
		};

		$this->setDataSourceDescriptor($name, $descriptor);
		return true;
	}

	function &getDataSourceConnection($name) {
		if(!array_key_exists($name,$this->dataSourceConnectionProvider_)){
			return null;			
		};
		$module = &$this->cloud->getModule($this->dataSourceConnectionProvider_[$name]);
		if(!$module){
			return null;
		};
		return $module->getConnection($name);
	}

}

