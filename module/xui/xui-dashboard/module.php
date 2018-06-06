<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Dasboard";

class xui_Dasboard extends xyo_Module {

	public $navigationDrawerOpenWidth;
	public $navigationDrawerMiniWidth;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Dasboard")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
			$this->setHtmlJs($this->site."lib/xui/js/xui-dashboard.js");
        	}
		
		$this->navigationDrawerOpenWidth=(48+12+12)*4;
		$this->navigationDrawerMiniWidth=48+12+12;		
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
