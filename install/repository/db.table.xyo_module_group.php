<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$module_group = &$dataSource;

$module_group->clear();
$module_group->name = "xyo-none";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-system-init";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-system-load";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-system-exec";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-desktop";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-application";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-control-panel";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-info-about";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-status";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

$module_group->clear();
$module_group->name = "xyo-template";
$module_group->tryLoad();
$module_group->enabled = 1;
$module_group->save();

