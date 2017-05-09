<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$path = array(
    "media" => "media",
    "config" => "config",
    "repository" => "repository",
    "package" => "package",
    "module" => "module",
    "datasource" => "datasource",
    "element" => "element",    
    "log" => "log",
    "temp" => "temp"
);

$path_ = array();
foreach ($path as $key => $value) {
    if (is_writable($value)) {
        $path_[$key] = "yes";
    } else {
        $path_[$key] = "no";
    }
}

$this->setParameter("path", $path_);
