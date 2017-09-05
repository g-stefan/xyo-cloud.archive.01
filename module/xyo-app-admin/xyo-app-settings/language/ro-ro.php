<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("application_title", "Settings");

$this->set("select_enabled_all", "- activat -");
$this->set("select_enabled_default_disabled", "- nu -");
$this->set("select_enabled_enabled", "da");
$this->set("select_enabled_disabled", "nu");

$this->set("label_website_title","Titlu site");
$this->set("label_user_logoff_after_idle_time","Utilizatorul este delogat dupa perioada de inactivitate");
$this->set("label_user_action","Actiune utilizator");
$this->set("label_user_captcha","Captcha utilizator");

$this->set("label_log_module","Inregistreaza modulele care nu sunt gasite");
$this->set("label_log_request","Inregistreaza cererea");
$this->set("label_log_response","Inregistreaza raspunsul");
$this->set("label_log_language","Inregistreaza index care nu e gasit in limbaj");

$this->set("title_log","Log");

$this->set("label_xui_dashboard_user_background","Fundalul pentru utilizator in panoul principal");
$this->set("label_login_has_select_language","Limba se poate selecta la intrare");
