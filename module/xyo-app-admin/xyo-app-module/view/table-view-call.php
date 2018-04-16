<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-app-acl-module",
	array("id_xyo_module"=>0),
	"id_xyo_module",
	"callModuleAcl"
);

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-app-module-parameter",
	array("id_xyo_module"=>0),
	"id_xyo_module",
	"callModuleParameter"
);

$this->eGenerateCallRequest(
	array("action"=>"table-view"),
	"xyo-app-form-element",
	array("id_xyo_module"=>0),
	"id_xyo_module",
	"callFormElement"
);

