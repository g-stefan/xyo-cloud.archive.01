<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_mod_sys_Sidebar";

class xyo_mod_sys_Sidebar extends xyo_mod_Application {

    protected $menu;
	protected $groupSp_;
	protected $group_;

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
    }

    public function moduleMain() {
        $this->menu = array();

		$this->groupSp_= array();
		$this->group_= null;

        $group = $this->getParameter("group");
        if ($group) {
            $this->addGroup($this->menu, $group);
        }
        $this->generateView();
    }

    public function addGroup(&$menu, $name) {
        $list = &$this->cloud->getGroup($name);
        if (count($list)) {
			array_push($this->groupSp_,$this->group_);
			$this->group_=$name;

            foreach ($list as $value) {
                $this->addModule($menu, $value);
            }

			$this->group_=array_pop($this->groupSp_);
        }
    }

    public function addModule(&$menu, $module) {
        $path = $this->cloud->getModulePath($module);
        if ($path) {
            $this->loadLanguageFromPathDirect($path . "sys/language/",$this->getSystemLanguage());
            $file = $path . "sys/sidebar.php";
            if (file_exists($file)) {
                include($file);
            } else {
                $this->addItem($menu, "item", null, $module, $module, null);
            }
        }
    }

    public function &addItem(&$menu, $type, $img, $title, $module, $parameters=null) {
		if($this->isApplication($module)){
			if($type==="item"){
				$type="item-activated";
			};
			if($type==="item-hidden"){
				$type="item-hidden-activated";
			};
		};
        $item = array();
        $item["type"] = $type;
	$item["img"] = $img;
	
		if($title){
	        $item["title"] = $this->getFromlanguage($title);
		}else{
			$item["title"] = "&#160;";
		}
        $item["url"] = $this->cloud->requestUriModule($module, $parameters);        
        $item["popup"] = array();
        $menu[] = &$item;
        return $item["popup"];
    }

	public function getMenuGroup(){
		return $this->group_;
	}

	public function isMenuGroup($name){
		return ($this->group_===$name);
	}

}
