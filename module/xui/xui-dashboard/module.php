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
	public $navigationDrawerBackgroundColorActive;
	public $navigationDrawerBarColorActive;

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
		$xuiTheme=&$this->getModule("xui-theme");

		$this->appBarBackgroundColor=$xuiColor->rgbHexHSLAdjust($xuiPalette->palette["core-blue-jeans"],0,0,-25);
		$this->appBarBackgroundColorHover=$xuiColor->rgbHexHSLAdjust($xuiPalette->palette["core-blue-jeans"],0,0,-20);
		$this->appBarBackgroundColorRipple=$xuiColor->rgbHexHSLAdjust($xuiPalette->palette["core-blue-jeans"],0,0,-15);
		$this->appBarColor=$xuiPalette->palette["material-white"];

		$this->appBarBrandBackgroundColor=$xuiPalette->palette["core-blue-jeans"];

		$this->navigationDrawerOpenWidth=(48+12+12)*4;
		$this->navigationDrawerMiniWidth=48+12+12;
		$this->navigationDrawerBackgroundColor=$xuiPalette->palette["material-white"];
		$this->navigationDrawerBackgroundColorHover=$xuiPalette->palette["material-grey-p200"];
		$this->navigationDrawerBackgroundColorRipple=$xuiPalette->palette["material-grey-p400"];
		$this->navigationDrawerColor=$xuiPalette->palette["material-black"];
		$this->navigationDrawerColorIconLeft=$xuiPalette->palette["material-grey-p600"];
		$this->navigationDrawerColorIconRight=$xuiPalette->palette["material-grey-p800"];
		$this->navigationDrawerColorBorder=$xuiPalette->palette["material-grey-p300"];

		$this->navigationDrawerUserBackgroundColor=$xuiPalette->palette["core-aqua"];

		$this->navigationDrawerColorActive=$xuiColor->rgbHexHSLAdjust($xuiPalette->palette["core-blue-jeans"],0,0,-25);
		$this->navigationDrawerColorPopupActive=$xuiColor->rgbHexHSLAdjust($xuiPalette->palette["core-blue-jeans"],0,0,-25);
		$this->navigationDrawerColorIconLeftHover=$xuiPalette->palette["material-grey-p900"];
		$this->navigationDrawerBackgroundColorActive=$xuiPalette->palette["core-light-gray"];
		$this->navigationDrawerBarColorActive=$xuiPalette->palette["core-blue-jeans"];

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
