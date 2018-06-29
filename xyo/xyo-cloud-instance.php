<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

//
// Shorcut to xyoCloud configured instance
//

if (defined('XYO_CLOUD')) {
	return;
};
define("XYO_CLOUD_INSTANCE", 1);

$xyoCloudServiceConfigOnly=true;

require_once("xyo-cloud-service.php");
