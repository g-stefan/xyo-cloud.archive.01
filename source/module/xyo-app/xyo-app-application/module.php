<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_Application";

class xyo_app_Application extends xyo_mod_Application {

	//
	protected $toolbarParameter;
	//

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->toolbarParameter = array();
	}

}
