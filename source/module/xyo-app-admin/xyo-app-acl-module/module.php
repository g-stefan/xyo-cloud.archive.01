<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_AclModule";

class xyo_app_AclModule extends xyo_app_Table {

    protected $xyo_module_id;
    protected $xyo_module_group_id;
    
    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        $this->xyo_module_id=0;
        $this->xyo_module_group_id=0;
    }

}
