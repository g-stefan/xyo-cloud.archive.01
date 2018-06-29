<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Palette";

class xui_Palette extends xyo_Module {

	public $xuiColor;
	public $palette;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Palette")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}

		$this->xuiColor=&$this->getModule("xui-color");

		$this->palette=array();

		include("xui-palette-core-grapefruit.php");
		include("xui-palette-core-bittersweet.php");
		include("xui-palette-core-sunflower.php");
		include("xui-palette-core-grass.php");
		include("xui-palette-core-mint.php");
		include("xui-palette-core-aqua.php");
		include("xui-palette-core-blue-jeans.php");
		include("xui-palette-core-lavender.php");
		include("xui-palette-core-pink-rose.php");
		include("xui-palette-core-light-gray.php");
		include("xui-palette-core-medium-gray.php");
		include("xui-palette-core-dark-gray.php");
		include("xui-palette-material-red.php");
		include("xui-palette-material-pink.php");
		include("xui-palette-material-purple.php");
		include("xui-palette-material-deep-purple.php");
		include("xui-palette-material-indigo.php");
		include("xui-palette-material-blue.php");
		include("xui-palette-material-light-blue.php");
		include("xui-palette-material-cyan.php");
		include("xui-palette-material-teal.php");
		include("xui-palette-material-green.php");
		include("xui-palette-material-light-green.php");
		include("xui-palette-material-lime.php");
		include("xui-palette-material-yellow.php");
		include("xui-palette-material-amber.php");
		include("xui-palette-material-orange.php");
		include("xui-palette-material-deep-orange.php");
		include("xui-palette-material-brown.php");
		include("xui-palette-material-grey.php");
		include("xui-palette-material-blue-grey.php");
		include("xui-palette-material-black.php");
		include("xui-palette-material-white.php");
		include("xui-palette-tango-butter.php");
		include("xui-palette-tango-orange.php");
		include("xui-palette-tango-chocolate.php");
		include("xui-palette-tango-chameleon.php");
		include("xui-palette-tango-sky-blue.php");
		include("xui-palette-tango-plum.php");
		include("xui-palette-tango-scarlet-red.php");
		include("xui-palette-tango-aluminium.php");

	}

}

