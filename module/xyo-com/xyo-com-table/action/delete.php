<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("select-id");

if(is_array($this->id)){
	if(count($this->id)==0){
		$this->doRedirect("view");
		return;
	};
}else{
	if($this->id==0){
		$this->doRedirect("view");
		return;
	};
};

$this->processModel("set-ds");
if ($this->isError()) {
    
} else {
    $this->processModel("delete");
}
$this->doRedirect("view");
