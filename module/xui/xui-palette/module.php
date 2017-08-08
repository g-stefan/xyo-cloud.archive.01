<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Palette";

class xui_Palette extends xyo_Module {

	public $colorCore;
	public $colorPalette;
	public $colorType;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Palette")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}

		$xuiColor=&$this->getModule("xui-color");

		$this->colorCore=array(
			"xui-grapefruit"=>array("#ED5565","#DA4453"),
			"xui-bittersweet"=>array("#FC6E51","#E9573F"),
			"xui-sunflower"=>array("#FFCE54","#F6BB42"),
			"xui-grass"=>array("#A0D468","#8CC152"),
			"xui-mint"=>array("#48CFAD","#37BC9B"),
			"xui-aqua"=>array("#4FC1E9","#3BAFDA"),
			"xui-blue-jeans"=>array("#5D9CEC","#4A89DC"),
			"xui-lavender"=>array("#AC92EC","#967ADC"),
			"xui-pink-rose"=>array("#EC87C0","#D770AD"),
			"xui-light-gray"=>array("#F5F7FA","#E6E9ED"),
			"xui-medium-gray"=>array("#CCD1D9","#AAB2BD"),
			"xui-dark-gray"=>array("#656D78","#434A54")
		);

		$this->colorPalette=array();

		foreach($this->colorCore as $key=>$value){
			$this->colorPalette[$key]=$xuiColor->rgbHexMiddle($this->colorCore[$key][0],$this->colorCore[$key][1]);
			$this->colorPalette[$key."-v1"]=$this->colorCore[$key][0];
			$this->colorPalette[$key."-v2"]=$this->colorCore[$key][1];
		};

		$this->colorTypeButton=array(
			"default"=>$this->colorPalette["xui-light-gray"],
			"primary"=>$this->colorPalette["xui-blue-jeans"],
			"success"=>$this->colorPalette["xui-grass"],
			"info"=>$this->colorPalette["xui-aqua"],
			"warning"=>$this->colorPalette["xui-sunflower"],
			"danger"=>$this->colorPalette["xui-grapefruit"],
			"disabled"=>"#DDDDDD"
		);

		$this->colorTypeButtonText=array(
			"default"=>"#000000",
			"primary"=>"#FFFFFF",
			"success"=>"#FFFFFF",
			"info"=>"#FFFFFF",
			"warning"=>"#000000",
			"danger"=>"#FFFFFF",
			"disabled"=>"#888888"
		);

		$this->colorTypeLabel=array(
			"default"=>"#000000",
			"primary"=>$xuiColor->rgbHexHSLAdjust($this->colorPalette["xui-blue-jeans"],0,0,-20),
			"success"=>$xuiColor->rgbHexHSLAdjust($this->colorPalette["xui-grass"],0,0,-20),
			"info"=>$xuiColor->rgbHexHSLAdjust($this->colorPalette["xui-aqua"],0,0,-20),
			"warning"=>$xuiColor->rgbHexHSLAdjust($this->colorPalette["xui-sunflower"],0,0,-20),
			"danger"=>$xuiColor->rgbHexHSLAdjust($this->colorPalette["xui-grapefruit"],0,0,-20),
			"disabled"=>"#CCCCCC"
		);

		$this->colorTypeInput=array(
			"default"=>$this->colorPalette["xui-medium-gray"],
			"primary"=>$this->colorPalette["xui-blue-jeans"],
			"success"=>$this->colorPalette["xui-grass"],
			"info"=>$this->colorPalette["xui-aqua"],
			"warning"=>$this->colorPalette["xui-sunflower"],
			"danger"=>$this->colorPalette["xui-grapefruit"],
			"disabled"=>"#DDDDDD"
		);

		$this->colorTypeInputActive=$this->colorPalette["xui-lavender"];

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

