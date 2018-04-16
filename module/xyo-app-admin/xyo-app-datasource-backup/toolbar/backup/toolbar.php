<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->isRequestCall()){
	$this->setItem("cancel",
        "item-js",
        "<i class=\"material-icons\">cancel</i>",
        "cancel",
        "danger",
        "#",
		"doReturn();"
	);
}else{
	$this->setItem("cancel",
        "item-js",
        "<i class=\"material-icons\">cancel</i>",
        "cancel",
        "danger",
        "#",
		"doCommand('default');"
	);
};

