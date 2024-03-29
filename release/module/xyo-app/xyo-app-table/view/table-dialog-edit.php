<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setParameter("form_title","form_title_edit");
$this->generateComponent("xui.form-action-begin");
$this->generateView("form");
$this->generateComponent("xui.form-action-end",array(
	"parameters"=>array(
		"action"=>"table-dialog-edit-apply",
		$this->getElementName("primary_key_value") => $this->getElementValue("primary_key_value", ""),
		"ajax"=>1
	)
));
