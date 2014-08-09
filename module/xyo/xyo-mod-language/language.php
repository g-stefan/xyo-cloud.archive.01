<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_mod_language_Language extends xyo_Attributes {

    protected $cloud;
    protected $log;
    protected $type;
    protected $name;

    public function __construct(&$cloud) {
        parent::__construct();
        $this->cloud = &$cloud;
        $this->log = $this->cloud->get("system_log_language");
        $this->type = "ltr";
        $this->name = "#";
    }

    public function get($name, $default=null) {
        if ($name) {
            if (array_key_exists($name, $this->attributes_)) {
                return $this->attributes_[$name];
            };
        };
        if ($default) {
            return $default;
        };
        if ($this->log) {
            $this->cloud->logMessage("language", "NOT-FOUND:" . $this->name . ":" . $name);
        };
        return $name;
    }

    public function setLanguage($name) {
        $this->name = $name;
    }

    public function setLanguageType($type) {
        $this->type = $type;
    }

    public function getLanguageType() {
        return $this->type;
    }

    public function isLanguageType($type) {
        if ($this->type === $type) {
            return true;
        }
        return false;
    }

}

