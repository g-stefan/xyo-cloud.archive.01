<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->tableHead=array(
			 "#" => "#",
			 "name"=>"head_name",
			 "description"=>"head_description",
			 "version"=>"head_version",
			 "component"=>"head_component",
			 "enabled"=>"head_enabled",
			 "id" => "head_id"
		 );

$this->tableSearch=array(
			   "name" => true
		   );

$this->tableSelect=array(
			   "component" => true,
			   "cmd" => true,
			   "enabled" => true
		   );

$this->tableType=array(
	"name" => array("action",array(
		"action" => "form-edit",
		"primary_key_value" => array($this->primaryKey)
	)),
	"component" => array("toggle"),
	"enabled" => array("toggle")			
);

$this->tableSort=array(
			 "name" => "ascendent",
			 "description" => "none",
			 "version"=>"none",
			 "component" => "none",
			 "enabled"=>"none",
			 "id"=>"none"
		 );

$this->processModel("select-enabled");
$this->processModel("select-cmd");
$this->processModel("select-component");

$this->tableSelectInfo=array(
			       "enabled" => $this->getParameter("select_enabled",array()),
			       "cmd" => $this->getParameter("select_cmd",array()),
			       "component" => $this->getParameter("select_component",array())
		       );

