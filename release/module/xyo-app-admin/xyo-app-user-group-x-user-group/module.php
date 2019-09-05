<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_UserGroupXUserGroup";

class xyo_app_UserGroupXUserGroup extends xyo_app_Table {

    protected $xyo_user_group_id_super;
    
    public function __construct(&$object, &$cloud) {
	parent::__construct($object, $cloud);
	$this->xyo_user_group_id_super=0;
    }   

}
