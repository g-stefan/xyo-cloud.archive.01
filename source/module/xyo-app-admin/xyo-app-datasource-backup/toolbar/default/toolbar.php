<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setItem("backup",
	"item-js",
	"<i class=\"material-icons\">done</i>",
	"backup",
	"warning",
	"#",
	"doCommand('datasource-check');"
);

if($this->isRequestCall()){
	$this->setItem("cancel",
        "item-js",
        "<i class=\"material-icons\">cancel</i>",
        "cancel",
        "danger",
        "#",
		"doReturn();"
	);
};

