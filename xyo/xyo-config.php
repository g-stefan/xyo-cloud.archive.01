<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

class xyo_Config extends xyo_Attributes {

	protected $cloud;

	public function __construct(&$cloud, $defaultAttributes=null) {
		parent::__construct($defaultAttributes);
		$this->cloud = &$cloud;
	}

	public function includeConfig($name) {
		$retV = false;
		$path = $this->getConfigPath();
		$config = $path . $name . ".php";
		if ($this->includeFile($config)) {
			$retV = true;
		};
		return $retV;
	}

	public function getConfigPath() {
		return $this->cloud->getCloudPath()."config/";
	}

	public function includeConfigWithPattern($name) {
		$retV = false;
		$path = $this->getConfigPath();
		$config = $path . $name . ".*.php";
		foreach(glob($config) as $configFilename){
			if ($this->includeFile($configFilename)) {
				$retV = true;
			};
		};
		return $retV;
	}
}
