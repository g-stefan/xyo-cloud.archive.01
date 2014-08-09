<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->ds->clear();
$website_title="XYO Cloud";
$this->ds->name="website_title";
if($this->ds->load(0,1)){
	$website_title=$this->ds->value;
};
$this->setElementValue("website_title",$website_title);


$this->ds->clear();
$user_logoff_after_idle_time="15";
$this->ds->name="user_logoff_after_idle_time";
if($this->ds->load(0,1)){
	$user_logoff_after_idle_time=$this->ds->value;
};
$this->setElementValue("user_logoff_after_idle_time",$user_logoff_after_idle_time);

$this->ds->clear();
$system_user_action="1";
$this->ds->name="system_user_action";
if($this->ds->load(0,1)){
	$system_user_action=$this->ds->value;
};
$this->setElementValue("system_user_action",$system_user_action);

$this->ds->clear();
$system_user_captcha="1";
$this->ds->name="system_user_captcha";
if($this->ds->load(0,1)){
	$system_user_captcha=$this->ds->value;
};
$this->setElementValue("system_user_captcha",$system_user_captcha);

