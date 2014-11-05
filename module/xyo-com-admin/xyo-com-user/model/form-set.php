<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setElementValue("id",$this->ds->id);
$this->setElementValue("name",$this->ds->name);
$this->setElementValue("username",$this->ds->username);
$this->setElementValue("password1","");
$this->setElementValue("password2","");
$this->setElementValue("enabled",$this->ds->enabled);
$this->setElementValue("invisible",$this->ds->invisible);
$this->setElementValue("id_xyo_language",$this->ds->id_xyo_language);
$this->setElementValue("picture",$this->ds->picture);
$this->setElementValue("description",$this->ds->description);
