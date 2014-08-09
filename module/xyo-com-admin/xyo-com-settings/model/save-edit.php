<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->ds->clear();
$this->ds->name="website_title";
$this->ds->tryLoad(0,1);
$this->ds->value=$this->getElementValueStr("website_title","");
$this->ds->save();

$this->ds->clear();
$this->ds->name="user_logoff_after_idle_time";
$this->ds->tryLoad(0,1);
$this->ds->value=$this->getElementValueInt("user_logoff_after_idle_time",0,"*");
$this->ds->save();

$this->ds->clear();
$this->ds->name="system_user_action";
$this->ds->tryLoad(0,1);
$this->ds->value=$this->getElementValueInt("system_user_action",0,"*");
$this->ds->save();

$this->ds->clear();
$this->ds->name="system_user_captcha";
$this->ds->tryLoad(0,1);
$this->ds->value=$this->getElementValueInt("system_user_captcha",0,"*");
$this->ds->save();

