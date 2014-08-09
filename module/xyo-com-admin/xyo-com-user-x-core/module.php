<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_com_UserXUserGroup";

class xyo_com_UserXUserGroup extends xyo_com_Table {

    protected $id_xyo_user;
    
    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        $this->id_xyo_user=0;
    }   

}
