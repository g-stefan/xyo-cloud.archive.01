<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-com-user-x-user-group",
	array("id_xyo_user"=>0),
	"id_xyo_user",
	"callUserXUserGroup"
);


$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-com-user-x-core",
	array("id_xyo_user"=>0),
	"id_xyo_user",
	"callUserXCore"
);

