<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Theme";

class xui_Theme extends xyo_Module {

	public $xuiTypography;
	public $xuiColor;
	public $xuiPalette;

	public $theme;

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

		$this->theme=array();
		$this->panel=array();

		// default
		$this->theme["default"]=array();
		$this->theme["default"]["button"]=array();
		$this->theme["default"]["button"]["normal"]=array();
		$this->theme["default"]["button"]["normal"]["color.high"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->theme["default"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-light-gray-v1"];
		$this->theme["default"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-30);
		$this->theme["default"]["button"]["normal"]["color.contrast"]="#000000";
		$this->theme["default"]["button"]["active"]=array();
		$this->theme["default"]["button"]["active"]["color.high"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-20);
		$this->theme["default"]["button"]["active"]["color"]="#FFFFFF";
		$this->theme["default"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-40);
		$this->theme["default"]["button"]["active"]["color.contrast"]="#000000";

		$this->theme["default"]["input"]=array();
		$this->theme["default"]["input"]["color.label"]="#000000";
		$this->theme["default"]["input"]["normal"]=array();
		$this->theme["default"]["input"]["normal"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->theme["default"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["default"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["default"]["input"]["active"]=array();
		$this->theme["default"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v1"];
		$this->theme["default"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["default"]["input"]["active"]["color.text"]="#000000";
		$this->theme["default"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,10),"40");

		$this->theme["default"]["alert"]=array();
		$this->theme["default"]["alert"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->theme["default"]["alert"]["color.text"]="#000000";
		$this->theme["default"]["alert"]["color.background"]=$this->xuiPalette->palette["core-light-gray-v1"];

		// primary
		$this->theme["primary"]=array();
		$this->theme["primary"]["button"]=array();
		$this->theme["primary"]["button"]["normal"]=array();
		$this->theme["primary"]["button"]["normal"]["color.high"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v2"],0,0,-15);
		$this->theme["primary"]["button"]["normal"]["color.contrast"]="#FFFFFF";
		$this->theme["primary"]["button"]["active"]=array();
		$this->theme["primary"]["button"]["active"]["color.high"]=$this->xuiPalette->palette["core-blue-jeans-v1"];
		$this->theme["primary"]["button"]["active"]["color"]=$this->xuiPalette->palette["core-blue-jeans-v1"];
		$this->theme["primary"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-30);
		$this->theme["primary"]["button"]["active"]["color.contrast"]="#FFFFFF";

		$this->theme["primary"]["input"]=array();
		$this->theme["primary"]["input"]["color.label"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["input"]["normal"]=array();
		$this->theme["primary"]["input"]["normal"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["primary"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["primary"]["input"]["active"]=array();
		$this->theme["primary"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v1"];
		$this->theme["primary"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["primary"]["input"]["active"]["color.text"]="#000000";
		$this->theme["primary"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,10),"40");

		$this->theme["primary"]["alert"]=array();
		$this->theme["primary"]["alert"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["alert"]["color.text"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v2"],0,0,-15);
		$this->theme["primary"]["alert"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,30);

		// success
		$this->theme["success"]=array();
		$this->theme["success"]["button"]=array();
		$this->theme["success"]["button"]["normal"]=array();
		$this->theme["success"]["button"]["normal"]["color.high"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v2"],0,0,-15);
		$this->theme["success"]["button"]["normal"]["color.contrast"]="#FFFFFF";
		$this->theme["success"]["button"]["active"]=array();
		$this->theme["success"]["button"]["active"]["color.high"]=$this->xuiPalette->palette["core-grass-v1"];
		$this->theme["success"]["button"]["active"]["color"]=$this->xuiPalette->palette["core-grass-v1"];
		$this->theme["success"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v1"],0,0,-30);
		$this->theme["success"]["button"]["active"]["color.contrast"]="#FFFFFF";

		$this->theme["success"]["input"]=array();
		$this->theme["success"]["input"]["color.label"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["input"]["normal"]=array();
		$this->theme["success"]["input"]["normal"]["color.border"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["success"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["success"]["input"]["active"]=array();
		$this->theme["success"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-grass-v1"];
		$this->theme["success"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["success"]["input"]["active"]["color.text"]="#000000";
		$this->theme["success"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v1"],0,0,10),"40");

		$this->theme["success"]["alert"]=array();
		$this->theme["success"]["alert"]["color.border"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["alert"]["color.text"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v2"],0,0,-15);
		$this->theme["success"]["alert"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v1"],0,0,30);


		// info
		$this->theme["info"]=array();
		$this->theme["info"]["button"]=array();
		$this->theme["info"]["button"]["normal"]=array();
		$this->theme["info"]["button"]["normal"]["color.high"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v2"],0,0,-15);
		$this->theme["info"]["button"]["normal"]["color.contrast"]="#FFFFFF";
		$this->theme["info"]["button"]["active"]=array();
		$this->theme["info"]["button"]["active"]["color.high"]=$this->xuiPalette->palette["core-aqua-v1"];
		$this->theme["info"]["button"]["active"]["color"]=$this->xuiPalette->palette["core-aqua-v1"];
		$this->theme["info"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v1"],0,0,-30);
		$this->theme["info"]["button"]["active"]["color.contrast"]="#FFFFFF";

		$this->theme["info"]["input"]=array();
		$this->theme["info"]["input"]["color.label"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["input"]["normal"]=array();
		$this->theme["info"]["input"]["normal"]["color.border"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["info"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["info"]["input"]["active"]=array();
		$this->theme["info"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-aqua-v1"];
		$this->theme["info"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["info"]["input"]["active"]["color.text"]="#000000";
		$this->theme["info"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v1"],0,0,10),"40");

		$this->theme["info"]["alert"]=array();
		$this->theme["info"]["alert"]["color.border"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["alert"]["color.text"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v2"],0,0,-15);
		$this->theme["info"]["alert"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v1"],0,0,30);


		// warning
		$this->theme["warning"]=array();
		$this->theme["warning"]["button"]=array();
		$this->theme["warning"]["button"]["normal"]=array();
		$this->theme["warning"]["button"]["normal"]["color.high"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v2"],0,0,-15);
		$this->theme["warning"]["button"]["normal"]["color.contrast"]="#000000";
		$this->theme["warning"]["button"]["active"]=array();
		$this->theme["warning"]["button"]["active"]["color.high"]=$this->xuiPalette->palette["core-sunflower-v1"];
		$this->theme["warning"]["button"]["active"]["color"]=$this->xuiPalette->palette["core-sunflower-v1"];
		$this->theme["warning"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v1"],0,0,-30);
		$this->theme["warning"]["button"]["active"]["color.contrast"]="#000000";

		$this->theme["warning"]["input"]=array();
		$this->theme["warning"]["input"]["color.label"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["input"]["normal"]=array();
		$this->theme["warning"]["input"]["normal"]["color.border"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["warning"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["warning"]["input"]["active"]=array();
		$this->theme["warning"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-sunflower-v1"];
		$this->theme["warning"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["warning"]["input"]["active"]["color.text"]="#000000";
		$this->theme["warning"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v1"],0,0,10),"40");

		$this->theme["warning"]["alert"]=array();
		$this->theme["warning"]["alert"]["color.border"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["alert"]["color.text"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v2"],0,0,-15);
		$this->theme["warning"]["alert"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v1"],0,0,30);


		// danger
		$this->theme["danger"]=array();
		$this->theme["danger"]["button"]=array();
		$this->theme["danger"]["button"]["normal"]=array();
		$this->theme["danger"]["button"]["normal"]["color.high"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["button"]["normal"]["color"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["button"]["normal"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v2"],0,0,-15);
		$this->theme["danger"]["button"]["normal"]["color.contrast"]="#FFFFFF";
		$this->theme["danger"]["button"]["active"]=array();
		$this->theme["danger"]["button"]["active"]["color.high"]=$this->xuiPalette->palette["core-grapefruit-v1"];
		$this->theme["danger"]["button"]["active"]["color"]=$this->xuiPalette->palette["core-grapefruit-v1"];
		$this->theme["danger"]["button"]["active"]["color.low"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v1"],0,0,-30);
		$this->theme["danger"]["button"]["active"]["color.contrast"]="#FFFFFF";

		$this->theme["danger"]["input"]=array();
		$this->theme["danger"]["input"]["color.label"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["input"]["normal"]=array();
		$this->theme["danger"]["input"]["normal"]["color.border"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["danger"]["input"]["normal"]["color.text"]="#000000";
		$this->theme["danger"]["input"]["active"]=array();
		$this->theme["danger"]["input"]["active"]["color.border"]=$this->xuiPalette->palette["core-grapefruit-v1"];
		$this->theme["danger"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["danger"]["input"]["active"]["color.text"]="#000000";
		$this->theme["danger"]["input"]["active"]["color.high.rgba"]=$this->xuiColor->rgbHexToRGBA($this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v1"],0,0,10),"40");

		$this->theme["danger"]["alert"]=array();
		$this->theme["danger"]["alert"]["color.border"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["alert"]["color.text"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v2"],0,0,-15);
		$this->theme["danger"]["alert"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v1"],0,0,30);


		// disabled
		$this->theme["disabled"]=array();
		$this->theme["disabled"]["button"]=array();
		$this->theme["disabled"]["button"]["normal"]=array();
		$this->theme["disabled"]["button"]["normal"]["color.high"]="#EEEEEE";
		$this->theme["disabled"]["button"]["normal"]["color"]="#FFFFFF";
		$this->theme["disabled"]["button"]["normal"]["color.low"]="#CCCCCC";
		$this->theme["disabled"]["button"]["normal"]["color.contrast"]="#CCCCCC";
		$this->theme["disabled"]["button"]["active"]=array();
		$this->theme["disabled"]["button"]["active"]["color.high"]="#EEEEEE";
		$this->theme["disabled"]["button"]["active"]["color"]="#FFFFFF";
		$this->theme["disabled"]["button"]["active"]["color.low"]="#CCCCCC";
		$this->theme["disabled"]["button"]["active"]["color.contrast"]="#CCCCCC";

		$this->theme["disabled"]["input"]=array();
		$this->theme["disabled"]["input"]["color.label"]="#EEEEEE";
		$this->theme["disabled"]["input"]["normal"]=array();
		$this->theme["disabled"]["input"]["normal"]["color.border"]="#EEEEEE";
		$this->theme["disabled"]["input"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["disabled"]["input"]["normal"]["color.text"]="#CCCCCC";
		$this->theme["disabled"]["input"]["active"]=array();
		$this->theme["disabled"]["input"]["active"]["color.border"]="#EEEEEE";
		$this->theme["disabled"]["input"]["active"]["color.background"]="#FFFFFF";
		$this->theme["disabled"]["input"]["active"]["color.text"]="#CCCCCC";
		$this->theme["disabled"]["input"]["active"]["color.high.rgba"]="#EEEEEE";

		$this->theme["disabled"]["alert"]=array();
		$this->theme["disabled"]["alert"]["color.border"]="#EEEEEE";
		$this->theme["disabled"]["alert"]["color.text"]="#EEEEEE";
		$this->theme["disabled"]["alert"]["color.background"]="#FFFFFF";

		$this->inputBorderRadius=3;		

		$this->panel["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->panel["color.title.background"]="#FFFFFF";
		$this->panel["color.title.color"]=$this->xuiPalette->palette["core-dark-gray-v1"];

	}

}

