<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Theme";

class xui_Theme extends xyo_Module {

	public $xuiTypography;
	public $xuiColor;
	public $xuiPalette;

	public $theme;
	public $panel;
	public $dashboard;

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
		$this->dashboard=array();

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

		$this->theme["default"]["table"]=array();
		$this->theme["default"]["table"]["color.text.head"]="#000000";
		$this->theme["default"]["table"]["normal"]=array();
		$this->theme["default"]["table"]["normal"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->theme["default"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["default"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["default"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,30);
		$this->theme["default"]["table"]["active"]=array();
		$this->theme["default"]["table"]["active"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v1"];
		$this->theme["default"]["table"]["active"]["color.text"]="#000000";
		$this->theme["default"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,25);

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

		$this->theme["primary"]["table"]=array();
		$this->theme["primary"]["table"]["color.text.head"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["table"]["normal"]=array();
		$this->theme["primary"]["table"]["normal"]["color.border"]=$this->xuiPalette->palette["core-blue-jeans-v2"];
		$this->theme["primary"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["primary"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["primary"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,30);
		$this->theme["primary"]["table"]["active"]=array();
		$this->theme["primary"]["table"]["active"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v2"],0,0,-15);
		$this->theme["primary"]["table"]["active"]["color.text"]="#000000";
		$this->theme["primary"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,25);

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

		$this->theme["success"]["table"]=array();
		$this->theme["success"]["table"]["color.text.head"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["table"]["normal"]=array();
		$this->theme["success"]["table"]["normal"]["color.border"]=$this->xuiPalette->palette["core-grass-v2"];
		$this->theme["success"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["success"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["success"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v1"],0,0,30);
		$this->theme["success"]["table"]["active"]=array();
		$this->theme["success"]["table"]["active"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v2"],0,0,-15);
		$this->theme["success"]["table"]["active"]["color.text"]="#000000";
		$this->theme["success"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grass-v1"],0,0,25);

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

		$this->theme["info"]["table"]=array();
		$this->theme["info"]["table"]["color.text.head"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["table"]["normal"]=array();
		$this->theme["info"]["table"]["normal"]["color.border"]=$this->xuiPalette->palette["core-aqua-v2"];
		$this->theme["info"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["info"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["info"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v1"],0,0,30);
		$this->theme["info"]["table"]["active"]=array();
		$this->theme["info"]["table"]["active"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v2"],0,0,-15);
		$this->theme["info"]["table"]["active"]["color.text"]="#000000";
		$this->theme["info"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-aqua-v1"],0,0,25);

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

		$this->theme["warning"]["table"]=array();
		$this->theme["warning"]["table"]["color.text.head"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["table"]["normal"]=array();
		$this->theme["warning"]["table"]["normal"]["color.border"]=$this->xuiPalette->palette["core-sunflower-v2"];
		$this->theme["warning"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["warning"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["warning"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v1"],0,0,30);
		$this->theme["warning"]["table"]["active"]=array();
		$this->theme["warning"]["table"]["active"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v2"],0,0,-15);
		$this->theme["warning"]["table"]["active"]["color.text"]="#000000";
		$this->theme["warning"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-sunflower-v1"],0,0,25);

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

		$this->theme["danger"]["table"]=array();
		$this->theme["danger"]["table"]["color.text.head"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["table"]["normal"]=array();
		$this->theme["danger"]["table"]["normal"]["color.border"]=$this->xuiPalette->palette["core-grapefruit-v2"];
		$this->theme["danger"]["table"]["normal"]["color.text"]="#000000";
		$this->theme["danger"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["danger"]["table"]["normal"]["color.background.even"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v1"],0,0,30);
		$this->theme["danger"]["table"]["active"]=array();
		$this->theme["danger"]["table"]["active"]["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v2"],0,0,-15);
		$this->theme["danger"]["table"]["active"]["color.text"]="#000000";
		$this->theme["danger"]["table"]["active"]["color.background"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-grapefruit-v1"],0,0,25);

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

		$this->theme["disabled"]["table"]=array();
		$this->theme["disabled"]["table"]["color.text.head"]="#EEEEEE";
		$this->theme["disabled"]["table"]["normal"]=array();
		$this->theme["disabled"]["table"]["normal"]["color.border"]="#EEEEEE";
		$this->theme["disabled"]["table"]["normal"]["color.text"]="#EEEEEE";
		$this->theme["disabled"]["table"]["normal"]["color.background"]="#FFFFFF";
		$this->theme["disabled"]["table"]["normal"]["color.background.even"]="#FFFFFF";
		$this->theme["disabled"]["table"]["active"]=array();
		$this->theme["disabled"]["table"]["active"]["color.border"]="#EEEEEE";
		$this->theme["disabled"]["table"]["active"]["color.text"]="#EEEEEE";
		$this->theme["disabled"]["table"]["active"]["color.background"]="#FFFFFF";

		//
		
		$this->inputBorderRadius=3;		

		$this->panel["color.border"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-light-gray-v1"],0,0,-15);
		$this->panel["color.title.background"]="#FFFFFF";
		$this->panel["color.title.color"]=$this->xuiPalette->palette["core-dark-gray-v1"];

		//
		
		$this->dashboard["app.bar.background.color"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-30);
		$this->dashboard["app.bar.background.color.hover"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-25);
		$this->dashboard["app.bar.background.color.ripple"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-15);
		$this->dashboard["app.bar.color"]=$this->xuiPalette->palette["material-white"];
		$this->dashboard["app.bar.brand.background.color"]=$this->xuiPalette->palette["material-white"];

		$this->dashboard["navigation.drawer.background.color"]=$this->xuiPalette->palette["material-white"];
		$this->dashboard["navigation.drawer.background.color.hover"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,30);
		$this->dashboard["navigation.drawer.background.color.ripple"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,20);

		$this->dashboard["navigation.drawer.color"]=$this->xuiPalette->palette["material-black"];
		$this->dashboard["navigation.drawer.color.icon.left"]=$this->xuiPalette->palette["material-grey-p600"];
		$this->dashboard["navigation.drawer.color.icon.right"]=$this->xuiPalette->palette["material-grey-p800"];
		$this->dashboard["navigation.drawer.color.border"]=$this->xuiPalette->palette["material-grey-p300"];

		$this->dashboard["navigation.drawer.user.background.color"]=$this->xuiPalette->palette["core-aqua"];

		$this->dashboard["navigation.drawer.color.active"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-30);
		$this->dashboard["navigation.drawer.color.popup.active"]=$this->xuiColor->rgbHexHSLAdjust($this->xuiPalette->palette["core-blue-jeans-v1"],0,0,-30);
		$this->dashboard["navigation.drawer.color.icon.left.hover"]=$this->xuiPalette->palette["material-grey-p900"];
		$this->dashboard["navigation.drawer.background.color.active"]=$this->xuiPalette->palette["core-light-gray"];
		$this->dashboard["navigation.drawer.bar.color.active"]=$this->xuiPalette->palette["core-blue-jeans-v2"];


	}

}

