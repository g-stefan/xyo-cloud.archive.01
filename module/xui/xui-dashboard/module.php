<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Dasboard";

class xui_Dasboard extends xyo_Module {

	public $appBarBackgroundColor;
	public $appBarBackgroundColorHover;
	public $appBarBackgroundColorRipple;
	public $appBarColor;

	public $appBarBrandBackgroundColor;

	public $navigationDrawerOpenWidth;
	public $navigationDrawerMiniWidth;
	public $navigationDrawerBackgroundColor;
	public $navigationDrawerBackgroundColorHover;
	public $navigationDrawerBackgroundColorRipple;
	public $navigationDrawerColor;
	public $navigationDrawerColorIconLeft;
	public $navigationDrawerColorIconRight;
	public $navigationDrawerColorBorder;
	public $navigationDrawerColorActive;
	public $navigationDrawerColorPopupActive;
	public $navigationDrawerColorIconLeftHover;

	public $navigationDrawerUserBackgroundColor;


	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Dasboard")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
			$this->setHtmlJs($this->site."lib/xui/js/xui-dashboard.js");
        	}

		$xuiColor=&$this->getModule("xui-color");
		$xuiPalette=&$this->getModule("xui-palette");

		$this->appBarBackgroundColor=$xuiColor->rgbHexHSLAdjust($xuiPalette->colorPalette["xui-blue-jeans"],0,0,-25);
		$this->appBarBackgroundColorHover=$xuiColor->rgbHexHSLAdjust($xuiPalette->colorPalette["xui-blue-jeans"],0,0,-20);
		$this->appBarBackgroundColorRipple=$xuiColor->rgbHexHSLAdjust($xuiPalette->colorPalette["xui-blue-jeans"],0,0,-15);
		$this->appBarColor=$xuiPalette->colorPalette["material-white"];

		$this->appBarBrandBackgroundColor=$xuiPalette->colorPalette["xui-blue-jeans"];

		$this->navigationDrawerOpenWidth=(48+12+12)*4;
		$this->navigationDrawerMiniWidth=48+12+12;
		$this->navigationDrawerBackgroundColor=$xuiPalette->colorPalette["material-white"];
		$this->navigationDrawerBackgroundColorHover=$xuiPalette->colorPalette["material-grey-p200"];
		$this->navigationDrawerBackgroundColorRipple=$xuiPalette->colorPalette["material-grey-p400"];
		$this->navigationDrawerColor=$xuiPalette->colorPalette["material-black"];
		$this->navigationDrawerColorIconLeft=$xuiPalette->colorPalette["material-grey-p600"];
		$this->navigationDrawerColorIconRight=$xuiPalette->colorPalette["material-grey-p800"];
		$this->navigationDrawerColorBorder=$xuiPalette->colorPalette["material-grey-p300"];

		$this->navigationDrawerUserBackgroundColor=$xuiPalette->colorPalette["xui-aqua"];

		$this->navigationDrawerColorActive=$xuiColor->rgbHexHSLAdjust($xuiPalette->colorPalette["xui-blue-jeans"],0,0,-25);
		$this->navigationDrawerColorPopupActive=$xuiColor->rgbHexHSLAdjust($xuiPalette->colorPalette["xui-blue-jeans"],0,0,-25);
		$this->navigationDrawerColorIconLeftHover=$xuiPalette->colorPalette["material-grey-p900"];

	}

	public function scanNavigationDrawerMenuActive(&$menu){
		foreach ($menu as $key => $value) {
			if(array_key_exists("active",$value)){
				if($value["active"]){
					return true;
				}		
			}
			if(array_key_exists("popup",$value)){
				if(count($menu[$key]["popup"])){
					if($this->scanNavigationDrawerMenuActive($menu[$key]["popup"])){
							$menu[$key]["on"]=true;
							$menu[$key]["active"]=true;
							return true;
					}
				}
			}
		}
		return false;
	}

	public function generateNavigationDrawerMenuView($menu){		
		foreach($menu as $key=>$value){
			$this->generateView("navigation-drawer-menu-item",array("item"=>$value));
		}
	}

	public function generateNavigationDrawerMenu($menu){
		$this->scanNavigationDrawerMenuActive($menu);
		$this->generateNavigationDrawerMenuView($menu);
	}

}
