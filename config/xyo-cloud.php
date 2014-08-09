<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$core = $this->cloud->get("system_core");
if(strlen($core)>0){
	if($core==="install"){
		return;
	};
};

include("xyo-cloud.common.php");
