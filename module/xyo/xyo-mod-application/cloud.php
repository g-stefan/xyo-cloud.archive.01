<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setReferenceLink($module,"xyo-mod-datasource");
$this->setReferenceLink($module,"xyo-mod-ds-acl");
$this->setReferenceLink($module,"xyo-mod-ds-user");
$this->setReferenceLink($module,"xyo-mod-htmlhead");
$this->setReferenceLink($module,"xyo-mod-htmlfooter");
$this->setReferenceBase($module,"xyo-mod-language");
$this->setReferenceBase($module,"lib-mod-jquery");
$this->setReferenceBase($module,"lib-mod-bootstrap");
$this->setVersion($module, "2.0.0");
