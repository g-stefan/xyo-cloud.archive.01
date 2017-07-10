<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$check_require=$this->getRequest("check_require","no");
if($check_require==="ok"){}else{
    $this->doRedirect("require");
    return;
}
$this->setView("licence");

