<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

//
$this->setModule(null,null,"xyo");
//
$this->setModule("xyo",null,"xyo-mod-application");
$this->setModule("xyo",null,"xyo-mod-ds-acl");
$this->setModule("xyo",null,"xyo-mod-ds-loader-mod");
$this->setModule("xyo",null,"xyo-mod-ds-user");
$this->setModule("xyo",null,"xyo-mod-crypt-rpc");
$this->setModule("xyo",null,"xyo-mod-setup");
$this->setModule("xyo",null,"xyo-mod-thumbnail");
//
$this->setModule(null,null,"xyo-app");
$this->setModule("xyo-app",null,"xyo-mod-xui-sidebar");
$this->setModule("xyo-app",null,"xyo-app-dashboard");
//
