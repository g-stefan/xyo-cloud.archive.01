<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_mod_setup_Version {

	var $setup_;
	var $version_;

	function __construct(&$setup_) {
		$this->setup_ = $setup_;
		$this->version_ = null;
	}

	function getModuleVersion($module) {
		$this->version_ = null;
		$path = $this->setup_->getModulePath($module);
		if (!is_null($path)) {
			$file = $path . "cloud.php";
			if (file_exists($file)) {
				$module = "";
				include($file);
			}
		}
		return $this->version_;
	}

	function getModuleVersionFromString($module, $string_) {
		$this->version_ = null;

		eval("?>" . $string_);

		return $this->version_;
	}

	function setReferenceLink($derivate, $base) {

	}

	function setReferenceBase($derivate, $base) {

	}

	function setVersion($module, $version) {
		$this->version_ = $version;
	}

	function enableModule($module, $enable) {

	}

	function disableModule($module, $enable) {

	}

	function setModule($moduleParent, $path, $module, $enabled, $parameters=null, $registered=false, $override=false) {

	}

	function setModuleCheck($module, $check) {

	}

	function setModuleParameters($module, $parameter) {

	}

	function setModuleGroup($module, $group, $order=0) {

	}

	function removeModule($module) {

	}

	function removeModuleFromGroup($module, $group) {

	}

	function removeGroup($group) {

	}

	function setTemplate($name) {

	}

	function setModuleLoader($name) {

	}

	function setRequestBuilder($name) {

	}

	function setDefaultComponent($name) {

	}

}

