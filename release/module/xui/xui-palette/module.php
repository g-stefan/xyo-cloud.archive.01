<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Palette";

class xui_Palette extends xyo_Module {

	public $xuiColor;
	public $color;
	public $palette;	

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Palette")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-palette.css");
        	}

		$this->xuiColor=&$this->getModule("xui-color");

		$this->color=&$this->xuiColor;
		$this->palette=array();

		include("xui-palette-butter.php");
		include("xui-palette-orange.php");
		include("xui-palette-chocolate.php");
		include("xui-palette-chameleon.php");
		include("xui-palette-sky-blue.php");
		include("xui-palette-plum.php");
		include("xui-palette-scarlet-red.php");
		include("xui-palette-aluminium.php");

		// ---

		include("xui-palette-aqua.php");
		include("xui-palette-mint.php");
		include("xui-palette-sunflower.php");
		include("xui-palette-science-blue.php");
		include("xui-palette-rock.php");
	}
}
