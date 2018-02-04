<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

//
$this->setModule(null,null,"lib");
//
$this->setModule("lib",null,"lib-roboto-regular");
$this->setModule("lib",null,"lib-material-icons");
$this->setModule("lib",null,"lib-font-awesome");
$this->setModule("lib",null,"lib-ionicons");
$this->setModule("lib",null,"lib-jquery");
$this->setModule("lib",null,"lib-normalize");
$this->setModule("lib",null,"lib-select2");
$this->setModule("lib",null,"lib-maximize-select2-height");
$this->setModule("lib",null,"lib-air-datepicker");
$this->setModule("lib",null,"lib-tinymce");
$this->setModule("lib",null,"lib-cropit");
//
include("xyo-cloud.xui.php");
//
//
$this->setModule("lib",null,"lib-js-cookie");
$this->setModule("lib",null,"lib-jquery-form");
$this->setModule("lib",null,"lib-jquery-stickytableheaders");
$this->setModule("lib",null,"lib-md5");
$this->setModule("lib",null,"lib-sha512");
$this->setModule("lib",null,"lib-pear-archive-tar");
$this->setModule("lib",null,"lib-izimodal");
//
//
$this->setModule(null,null,"xyo");
//
$this->setModule("xyo",null,"xyo-mod-application");
$this->setModule("xyo",null,"xyo-mod-ds-acl");
$this->setModule("xyo",null,"xyo-mod-ds-loader-mod");
$this->setModule("xyo",null,"xyo-mod-ds-user");
$this->setModule("xyo",null,"xyo-mod-jsonx");
$this->setModule("xyo",null,"xyo-mod-setup");
$this->setModule("xyo",null,"xyo-mod-thumbnail");
//
$this->setModule(null,null,"xyo-app");
$this->setModule("xyo-app",null,"xyo-mod-xui-sidebar");
$this->setModule("xyo-app",null,"xyo-app-dashboard");
//
