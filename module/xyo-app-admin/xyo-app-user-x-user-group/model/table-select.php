<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_user){
    $this->ds->id_xyo_user=$this->id_xyo_user;
};

$this->ds->setGroup("id",true);
$this->ds->setGroup("user_group",true);
$this->ds->setGroup("name",true);

if(!$this->user->isInGroup("wheel")){
		$this->ds->pushOperator("and");
		$this->ds->setOperator("user_group","!=","wheel",null,false,false);	
};
