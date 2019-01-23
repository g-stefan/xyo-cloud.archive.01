<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->processLink($package,$path,"xyo-app-acl-module");
$this->processLink($package,$path,"xyo-app-acl-module-parameter");
$this->processLink($package,$path,"xyo-app-acl-property");
$this->processLink($package,$path,"xyo-app-datasource");
$this->processLink($package,$path,"xyo-app-language");
$this->processLink($package,$path,"xyo-app-module");
$this->processLink($package,$path,"xyo-app-module-group");
$this->processLink($package,$path,"xyo-app-user");
$this->processLink($package,$path,"xyo-app-user-group");
$this->processLink($package,$path,"xyo-app-user-group-x-user-group");
$this->processLink($package,$path,"xyo-app-user-x-user-group");

