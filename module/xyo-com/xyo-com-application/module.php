<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_com_Application";

class xyo_com_Application extends xyo_mod_Application {

    protected $applicationTitle;
    protected $applicationIcon;
	//
	protected $toolbarParameter;
	//
    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        if ($this->isBase("xyo_com_Application")) {
	        $this->setHtmlHeadCss($this->pathBase."media/sys/css/xyo-com-application.css");
	};

        $this->applicationIcon = $this->pathBase."media/sys/images/applications-system-48.png";
	$this->applicationTitle = null;

	$this->toolbarParameter = array();
    }

    public function setApplicationIcon($icon) {
        $this->applicationIcon = $icon;
    }

    public function setApplicationTitle($title) {
        $this->applicationTitle = $title;
    }

}
