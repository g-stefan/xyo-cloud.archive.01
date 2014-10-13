<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->addItem($menu,"separator-begin",null,null,null,null);
$this->addItem($menu,"item","media/sys/images/system-log-out-16.png","application",$module,array("stamp"=>md5(time().rand())));
$this->addItem($menu,"separator-end",null,null,null,null);
