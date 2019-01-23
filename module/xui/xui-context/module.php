<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Context";

class xui_Context extends xyo_Module {

	public $context;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->context=array(
			"default",
			"primary",
			"success",
			"info",
			"warning",
			"danger",
			"disabled"
		);

	}

}
