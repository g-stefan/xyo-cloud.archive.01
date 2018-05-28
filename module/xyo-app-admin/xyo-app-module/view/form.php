<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->isNew){
	$this->generateComponent("xui.box-1x2-begin");
}else{
	if(!$this->isDialog){
		$this->generateComponent("xui.box-1x1-begin");
	};
};

if(!$this->isDialog){
	$this->generateComponent("xui.panel-begin");
};


$this->generateComponent("xui.form-text-required", array("element" => "name"));
$this->generateComponent("xui.form-text", array("element" => "parent"));
$this->generateComponent("xui.form-text", array("element" => "path"));
$this->generateComponent("xui.form-textarea", array("element" => "description"));
$this->generateComponent("xui.form-switch", array("element" => "enabled"));

if($this->isNew){
	$this->generateComponent("xui.form-action-apply",array("click"=>"doCommand('form-new-apply');"));	
};

if(!$this->isDialog){
	$this->generateComponent("xui.panel-end");
};


if($this->isNew){
	$this->generateComponent("xui.box-1x2-separator");

	$this->generateComponent("xui.panel-begin", array("title"=>"title_default_acl"));
	$this->generateComponent("xui.form-select", array("element" =>"id_xyo_module_group"));
	$this->generateComponent("xui.form-order", array("element" =>"order"));
	$this->generateComponent("xui.form-select", array("element" =>"id_xyo_user_group"));
	$this->generateComponent("xui.form-switch", array("element" =>"acl_enabled"));
	$this->generateComponent("xui.panel-end");

	$this->generateComponent("xui.box-1x2-end");
}else{
	if(!$this->isDialog){
		$this->generateComponent("xui.box-1x1-end");
	};
}

