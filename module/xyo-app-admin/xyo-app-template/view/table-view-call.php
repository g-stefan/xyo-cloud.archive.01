<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-app-module-parameter",
	array("id_xyo_acl_module"=>0),
	"id_xyo_acl_module",
	"callModuleParameter"
);

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-app-acl-module",
	array("id_xyo_acl_module"=>0),
	"id_xyo_acl_module",
	"callModuleAcl"
);
