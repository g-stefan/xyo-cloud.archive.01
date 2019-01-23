<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_mod_sys_Panel";

class xyo_mod_sys_Panel extends xyo_mod_Application {

    protected $panel;

	protected $groupSp_;
	protected $group_;

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isOk) {
            if ($this->isBase("xyo_mod_sys_Panel")) {
                $this->setHtmlCss($this->site."lib/xyo/css/xyo-mod-sys-panel.css");
            }            
        }
    }

    public function moduleMain() {
        $this->panel = array();

		$this->groupSp_= array();
		$this->group_= null;

        $group = $this->getParameter("group");
        if ($group) {
            $this->addGroup($group);
        }
        $this->generateView();
    }

    public function addGroup($name) {
        $list = &$this->cloud->getGroup($name);
        if (count($list)) {

			array_push($this->groupSp_,$this->group_);
			$this->group_=$name;

            foreach ($list as $value) {
                $this->addModule($value);
            }

			$this->group_=array_pop($this->groupSp_);
        }
    }

    public function addModule($module) {
        $path = $this->cloud->getModulePath($module);
        if ($path) {
            $this->loadLanguageFromPathDirect($path . "sys/language/", $this->getSystemLanguage());
            $file = $path . "sys/panel.php";
            if (file_exists($file)) {
                include($file);
            } else {
                $this->addItem("item", null, $module, $module, null);
            }
        }
    }

    public function addItem($type, $img, $title, $module, $parameters=null) {
        $item = array();
        $item["type"] = $type;
        $item["img"] = $img;
		if($title){
	        $item["title"] = $this->getFromlanguage($title);
		}else{
			$item["title"] = "&nbsp;";
		}
        $item["url"] = $this->cloud->requestUriModule($module, $parameters);
        $this->panel[] = &$item;
    }

	public function getPanelGroup(){
		return $this->group_;
	}

	public function isPanelGroup($name){
		return ($this->group_===$name);
	}

}

