<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">settings_applications</i>");
$this->setApplicationDataSource("db.table.xyo_settings");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

// system settings

$this->addItem("bootstrap.row-begin");
$this->addItem("bootstrap.panel-begin");
$this->addItem("bootstrap.text", "website_title","");
$this->addItem("bootstrap.integer", "user_logoff_after_idle_time",15);
$this->addItem("bootstrap.enable", "user_action",1);
$this->addItem("bootstrap.enable", "user_captcha",1);
$this->addItem("bootstrap.panel-end");
$this->addItem("bootstrap.panel-begin",null,null,array("title"=>"title_log"));
$this->addItem("bootstrap.enable", "log_module",0);
$this->addItem("bootstrap.enable", "log_request",0);
$this->addItem("bootstrap.enable", "log_response",0);
$this->addItem("bootstrap.enable", "log_language",0);
$this->addItem("bootstrap.panel-end");
$this->addItem("bootstrap.row-end");

$this->addItem("bootstrap.row-begin");
$this->addItem("bootstrap.panel-begin");
$this->addItem("bootstrap.file-image-thumbnail","xui_dashboard_user_background","media/sys/images/mountains-1985027_640.jpg",array(
	"thumbnail-size"=>array(320,240),
	"collapse"=>false,
	"filename"=>"repository/xyo-user/xui-dashboard-user-background-picture-".time(),
	"extension"=>true,
	"delete_before_save"=>true
));
$this->addItem("bootstrap.panel-end");
$this->addItem("bootstrap.row-end");