<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$language = &$dataSource;

$language->clear();
$language->name = "administrator";
$language->tryLoad();
$language->description = "";
$language->enabled = 1;
$language->save();

$language->clear();
$language->name = "public";
$language->tryLoad();
$language->description = "";
$language->enabled = 1;
$language->save();

