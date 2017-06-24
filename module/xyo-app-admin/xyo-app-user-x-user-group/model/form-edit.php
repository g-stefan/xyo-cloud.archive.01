<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->id_xyo_user){
}else{
    $this->processModel("select-xyo-user");
}
$this->processModel("select-xyo-user-group-edit");
$this->processModel("select-enabled-edit");
$this->copyParameter("select_principal","select_enabled");
