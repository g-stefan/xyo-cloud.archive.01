<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Theme";

class xui_Theme extends xyo_Module {

	public $xuiTypography;
	public $xuiColor;
	public $xuiPalette;

	public $colorCore;
	public $colorPalette;
	public $colorType;

	public $inputBorderRadius;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Theme")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}

		$this->xuiTypography=&$this->getModule("xui-typography");
		$this->xuiColor=&$this->getModule("xui-color");
		$this->xuiPalette=&$this->getModule("xui-palette");

		$this->colorContext=array(
			"default"=>$this->xuiPalette->palette["core-medium-gray"],
			"primary"=>$this->xuiPalette->palette["core-blue-jeans"],
			"success"=>$this->xuiPalette->palette["core-grass"],
			"info"=>$this->xuiPalette->palette["core-aqua"],
			"warning"=>$this->xuiPalette->palette["core-sunflower"],
			"danger"=>$this->xuiPalette->palette["core-grapefruit"],
			"disabled"=>"#DDDDDD"
		);	

		$this->colorTypeButton=array(
			"default"=>$this->xuiPalette->palette["core-light-gray"],
			"primary"=>$this->colorContext["primary"],
			"success"=>$this->colorContext["success"],
			"info"=>$this->colorContext["info"],
			"warning"=>$this->colorContext["warning"],
			"danger"=>$this->colorContext["danger"],
			"disabled"=>$this->colorContext["disabled"]
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
			"primary"=>$this->xuiColor->rgbHexHSLAdjust($this->colorContext["primary"],0,0,-20),
			"success"=>$this->xuiColor->rgbHexHSLAdjust($this->colorContext["success"],0,0,-20),
			"info"=>$this->xuiColor->rgbHexHSLAdjust($this->colorContext["info"],0,0,-20),
			"warning"=>$this->xuiColor->rgbHexHSLAdjust($this->colorContext["warning"],0,0,-20),
			"danger"=>$this->xuiColor->rgbHexHSLAdjust($this->colorContext["danger"],0,0,-20),
			"disabled"=>"#CCCCCC"
		);

		$this->colorTypeInput=array(
			"default"=>$this->colorContext["default"],
			"primary"=>$this->colorContext["primary"],
			"success"=>$this->colorContext["success"],
			"info"=>$this->colorContext["info"],
			"warning"=>$this->colorContext["warning"],
			"danger"=>$this->colorContext["danger"],
			"disabled"=>$this->colorContext["disabled"]
		);

		$this->colorTypeInputActive=$this->xuiPalette->palette["core-blue-jeans"];

		$this->inputBorderRadius=3;		
	}

}

