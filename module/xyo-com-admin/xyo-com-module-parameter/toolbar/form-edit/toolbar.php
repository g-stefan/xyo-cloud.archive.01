<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItem("apply", "item-js", $this->site."media/sys/images/approved-32.png", "apply", true, "#", "doCommand('form-edit-apply')");

if($this->isRequestCall()){
	$this->setItem("cancel",
        "item-js",
        $this->site."media/sys/images/denied-32.png",
        "cancel",
        true,
        "#",
		"doReturn();"
	);
};
