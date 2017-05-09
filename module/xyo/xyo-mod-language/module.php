<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Language";

class xyo_mod_Language extends xyo_Module {

    protected $language;

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("xyo_mod_Language")) {
            require_once($this->path . "language.php");
        }
    }

    function moduleInit() {
        $this->language = new xyo_mod_language_Language($this->cloud);
        $this->loadLanguage();
        parent::moduleInit();
    }

    function loadLanguage() {
        $this->loadLanguageDirect($this->cloud->get("language"));
    }

    function loadLanguageDirect($language_) {
        $language = strtolower($language_);
        foreach (array_reverse($this->modulePathBase, true) as $module => $path) {
            $this->language->setLanguage($language_);
            $this->language->includeFile($path . "language/" . $language . ".php");
        }
    }

    function loadLanguageFromPathDirect($path, $language_) {
        $language = strtolower($language_);
        $this->language->setLanguage($language_);
        $this->language->includeFile($path . $language . ".php");
    }

    function loadLanguageFromModuleDirect($module, $language_) {
        $language = strtolower($language_);
        $path = $this->cloud->getModulePath($module);
        if ($path) {
            $this->language->setLanguage($language_);
            $this->language->includeFile($path . "language/" . $language . ".php");
        }
    }

    public function generateViewLanguage($name=null, $parameters=null) {
        if ($this->generateView(strtolower($this->cloud->get("language")) . "/" . $name, $parameters)) {
            return true;
        }
        return $this->generateView($name, $parameters);
    }

    public function getSystemLanguage() {
        return $this->cloud->get("language");
    }

    public function getLanguageType() {
        return $this->language->getLanguageType();
    }

    public function isLanguageType($type) {
        return $this->language->isLanguageType($type);
    }

}

