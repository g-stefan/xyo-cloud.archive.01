<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

class xyo_Language extends xyo_Attributes {

	protected $cloud;
	protected $log;
	public $type;
	public $name;

	public function __construct(&$cloud) {
		parent::__construct();
		$this->cloud = &$cloud;
		$this->log = $this->cloud->get("log_language");
		$this->type = "ltr";
		$this->name = "en";
	}

	public function get($name, $default=null) {
		if ($name) {
			if (array_key_exists($name, $this->attributes_)) {
				return $this->attributes_[$name];
			};
		};
		if ($default) {
			return $default;
		};
		if ($this->log) {
			$this->cloud->logMessage("language", "NOT-FOUND:" . $this->name . ":" . $name);
		};
		return $name;
	}

	public function setLanguage($name) {
		$this->name = $name;
	}

	public function isLanguage($name) {
		if ($this->name === $name) {
			return true;
		}
		return false;
	}

	public function setLanguageType($type) {
		$this->type = $type;
	}

	public function getLanguageType() {
		return $this->type;
	}

	public function isLanguageType($type) {
		if ($this->type === $type) {
			return true;
		}
		return false;
	}

}

