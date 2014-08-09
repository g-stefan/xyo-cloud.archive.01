<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setView("default");
$this->clearElementError();

$username = $this->getElementValueStr("username");
if (strlen($username) == 0) {
    $this->setElementError("username", $this->getFromLanguage("username_empty"));
}

$password = $this->getElementValueStr("password");
if (strlen($password) == 0) {
    $this->setElementError("password", $this->getFromLanguage("password_empty"));
}

if ($this->isElementError()) {

} else {
    if ($this->user->isAuthorized()) {
        
    } else {	
        $this->setError("error", "error_invalid_login");
    }
}

