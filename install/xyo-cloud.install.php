<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
defined('XYO_CLOUD_INSTALL') or die('Access is denied');
//
//$this->set("log_module",true);
//$this->set("log_request",true);
//$this->set("log_response",true);
//
$this->set("language", "en-GB");
if ($this->isRequest("website_language")) {
    if (strcmp($this->getRequest("website_language"), "-") != 0) {
        $this->set("language", $this->getRequest("website_language"));
    };
};
$this->set("datasource_layer", "xyo-datasource-xyo");
$this->includeConfig("config.website");
//
$this->setModule(null, null, "xyo", true,null,true,false);
$this->setModule(null, null, "lib", true,null,true,false);
$this->setModule(null, null, "xyo-app", true,null,true,false);
//
$this->setModule("xyo", null, "xyo-mod-ds-acl", true,null,true,false);
$this->setModule("xyo", null, "xyo-mod-ds-user", true,null,true,false);
//
$this->setModule("lib", null, "lib-jquery", true,null,true,false);
$this->setModule("lib", null, "lib-bootstrap", true,null,true,false);
$this->setModule("lib", null, "lib-bootstrap-feedback-left", true,null,true,false);
$this->setModule("lib", null, "lib-bootstrap-select", true,null,true,false);
//
$this->setModule("xyo", null, "xyo-mod-application", true,null,true,false);
//
$this->setModule("xyo", null, "xyo-mod-ds-loader-ds", true,null,true,false);
//
$this->setModule("lib", null, "lib-pear-archive-tar", true,null,true,false);
$this->setModule("xyo", null, "xyo-mod-setup", true,null,true,false);
$this->setModule("xyo-app", null, "xyo-mod-panel2", true,null,true,false);

$this->setModule(null, "install", "xyo-app-install", true, null, true,false);

$this->setModule("xyo-app-install", null, "xyo-tpl-install", true,null,true,false);
$this->setModuleGroup("xyo-tpl-install", "xyo-system-exec");
$this->setModuleAsApplication("xyo-app-install");
$this->setApplication("xyo-app-install");

