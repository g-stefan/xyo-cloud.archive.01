<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_UserGroupXUserGroup";

class xyo_app_UserGroupXUserGroup extends xyo_app_Table {

    protected $id_xyo_user_group_super;
    
    public function __construct(&$object, &$cloud) {
	parent::__construct($object, $cloud);
	$this->id_xyo_user_group_super=0;
    }   

}
