<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setElementValue("id",$this->ds->id);
$this->setElementValue("id_xyo_user",$this->ds->id_xyo_user);
$this->setElementValue("id_xyo_user_group",$this->ds->id_xyo_user_group);
$this->setElementValue("principal",$this->ds->principal);
$this->setElementValue("enabled",$this->ds->enabled);

