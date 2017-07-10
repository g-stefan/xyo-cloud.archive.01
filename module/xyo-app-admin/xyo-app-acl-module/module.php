<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_app_AclModule";

class xyo_app_AclModule extends xyo_app_Table {

    protected $id_xyo_module;
    protected $id_xyo_module_group;
    
    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        $this->id_xyo_module=0;
        $this->id_xyo_module_group=0;
    }

}
