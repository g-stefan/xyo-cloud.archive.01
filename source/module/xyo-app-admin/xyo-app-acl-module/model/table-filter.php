<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

foreach ($this->viewData as $key => $value) {
    if ($this->viewData[$key]["user_group_name"]) {
        
    } else {
        $this->viewData[$key]["user_group_name"] = "*";
    }

    if ($this->viewData[$key]["core_name"]) {
        
    } else {
        $this->viewData[$key]["core_name"] = "*";
    }
	
}

