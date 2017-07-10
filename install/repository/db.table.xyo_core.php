<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$core = &$dataSource;

$core->clear();
$core->name = "administrator";
$core->tryLoad();
$core->default = 1;
$core->enabled = 1;
$core->save();

$core->clear();
$core->name = "public";
$core->tryLoad();
$core->default = 0;
$core->enabled = 1;
$core->save();
