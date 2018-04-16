<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$list_layer = array(
	"xyo"=>"xyo",
	"csv"=>"csv",
	"sqlite"=>"sqlite",
	"mysql"=>"mysql",
	"mysqli"=>"mysqli",
	"postgresql"=>"postgresql"
);

$this->setParameter("select_layer",$list_layer);

