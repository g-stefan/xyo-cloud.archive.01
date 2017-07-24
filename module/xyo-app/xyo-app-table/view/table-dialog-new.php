<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setParameter("form_title","form_title_new");
$this->generateComponent("xui.form-begin");
$this->generateView("form");
$this->generateComponent("xui.form-end",null,array(
	"parameters"=>array(
		"action"=>"table-dialog-new-apply",
		"ajax"=>1
	)
));
