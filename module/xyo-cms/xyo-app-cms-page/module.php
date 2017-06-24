<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_app_cms_Page";

class xyo_app_cms_Page extends xyo_app_Application {

	public $page;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);		

		$this->page=&$this->getModule("xyo-mod-cms-page");
	}
}
