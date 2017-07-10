<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_mod_setup_Attributes {

	protected $attributes_;

	public function __construct($defaultAttributes=null) {
		$this->attributes_ = array();
		if ($defaultAttributes) {
			foreach (array_keys($defaultAttributes) as $x) {
				$this->attributes_[$x] = $defaultAttributes[$x];
			};
		};
	}

	public function set($name, $value) {
		$this->attributes_[$name] = $value;
	}

	public function get($name, $default_=null) {
		if ($name) {
			if (array_key_exists($name, $this->attributes_)) {
				return $this->attributes_[$name];
			};
		};
		return $default_;
	}

	public function is($name) {
		if ($name) {
			if (array_key_exists($name, $this->attributes_)) {
				return true;
			}
		};
		return false;
	}

	public function getAttributes() {
		return $this->attributes_;
	}

	public function includeFile($name) {
		if (file_exists($name)) {
			include($name);
			return true;
		};
		return false;
	}

	public function evalString($string_) {
		if ($string_) {
			eval("?>" . $string_);
		}
	}

}

;


