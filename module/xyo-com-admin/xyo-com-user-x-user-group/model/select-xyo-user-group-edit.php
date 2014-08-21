<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$userGroup = array();
$userGroup["*"] = $this->getFromLanguage("select_xyo_user_group_none");
$dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");
if ($dsUserGroup) {
    $dsUserGroup->clear();
    $dsUserGroup->setOrder("name",1);

if(!$this->user->isInGroup("wheel")){
		$dsUserGroup->pushOperator("and");
		$dsUserGroup->setOperator("name","!=","wheel",null,false,false);	
};

    for ($dsUserGroup->load(); $dsUserGroup->isValid(); $dsUserGroup->loadNext()) {
        $userGroup[$dsUserGroup->id] = $dsUserGroup->name;
    }
};

$this->returnParameter("select_id_xyo_user_group",$userGroup);

