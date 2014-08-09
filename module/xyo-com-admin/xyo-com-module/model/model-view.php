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
		"action" => "edit",
		"id" => array($this->tablePrimaryKey)
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

$this->processModel("list-enabled");
$this->processModel("list-cmd");
$this->processModel("list-component");

$this->tableSelectInfo=array(
			       "enabled" => $this->getParameter("list_enabled",array()),
			       "cmd" => $this->getParameter("list_cmd",array()),
			       "component" => $this->getParameter("list_component",array())
		       );

