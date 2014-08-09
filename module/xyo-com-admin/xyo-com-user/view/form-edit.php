<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("group-row-begin",null);
$this->generateElement("group-begin", null);
$this->generateElement("text", "name");
$this->generateElement("text", "username");
$this->generateElement("password", "password1");
$this->generateElement("password", "password2");
$this->generateElement("textarea", "description");
if($this->isNew){
    $this->generateElement("select", "id_xyo_user_group");
}
$this->generateElement("select", "id_xyo_language");
$this->generateElement("select", "invisible");
$this->generateElement("select", "enabled");
$this->generateElement("group-end", null);
$this->generateElement("group-row-end",null);

