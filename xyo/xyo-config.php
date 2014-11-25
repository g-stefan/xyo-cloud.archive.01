<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_Config extends xyo_Attributes {

	protected $cloud;

	public function __construct(&$cloud, $defaultAttributes=null) {
		parent::__construct($defaultAttributes);
		$this->cloud = &$cloud;
	}

	public function includeConfig($name_) {
		$retV = false;
		$path_ = "config/";
		$config = $path_ . $name_ . ".php";
		if ($this->includeFile($config)) {
			$retV = true;
		};
		$core = $this->cloud->get("system_core");
		if (strlen($core) > 0) {
			$core = "." . $core;
			$config = $path_ . $name_ . $core . ".php";
			if ($this->includeFile($config)) {
				$retV = true;
			};
		};
		return $retV;
	}

	public function getConfigPath() {
		return "config/";
	}

}
