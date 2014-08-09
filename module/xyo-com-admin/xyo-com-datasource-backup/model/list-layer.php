<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$list_layer = array(
	"xyo"=>"xyo",
	"csv"=>"csv",
	"sqlite"=>"sqlite",
	"sqlite3"=>"sqlite3",
	"mysql"=>"mysql",
	"postgresql"=>"postgresql"
);

$this->returnParameter("list_layer",$list_layer);
