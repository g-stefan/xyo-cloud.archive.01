<?php
// 
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
define("XYO_CLOUD_ADMINISTRATOR",1);
require_once("xyo/xyo-cloud.php");
$xyoCloud=new xyo_Cloud(dirname(realpath(__FILE__))."/");
defined('XYO_CLOUD') or die('Access is denied');
$xyoCloud->set("request_main","administrator.php");
$xyoCloud->set("system_core","administrator");
$xyoCloud->main();
