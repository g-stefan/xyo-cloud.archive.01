<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->ds->setGroup("id",true);
$this->ds->setGroup("id_xyo_user_group",true);
$this->ds->setGroup("language",true);

if(!$this->user->isInGroup("wheel")){
	$this->ds->pushOperator("and");
	$this->ds->setOperator("user_group","!=","wheel",null,false,false);	
};
