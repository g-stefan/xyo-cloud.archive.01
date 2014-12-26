<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

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
