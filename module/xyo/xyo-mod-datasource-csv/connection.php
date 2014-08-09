<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_mod_datasource_csv_Connection {

    var $module;
    var $name;
    var $databasePath;

    function __construct(&$module, $name, $databasePath) {
        $this->module = &$module;
        $this->name = $name;
        $this->databasePath = $databasePath;
    }

    function open() {
        if ($this->databasePath)
            return true;
        return false;
    }

    function close() {
        
    }

};

