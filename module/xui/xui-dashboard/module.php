<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Dashboard";

class xui_Dashboard extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Dashboard")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-dashboard.css");
			$this->setHtmlJs($this->site."lib/xui/js/xui-dashboard.js");
        	}
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
