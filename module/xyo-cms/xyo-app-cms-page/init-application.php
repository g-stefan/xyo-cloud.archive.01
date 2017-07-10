<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">layers</i>");
$this->setApplicationDataSource("db.table.xyo_user");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$this->keepRequest("page");

$this->page->requireComponent(array(
	"bootstrap.select",
	"bootstrap.text",
	"bootstrap.textarea",
	"bootstrap.username",
	"bootstrap.password",
	"bootstrap.panel-begin",
	"bootstrap.panel-end",
	"bootstrap.row-begin",
	"bootstrap.row-end",
	"bootstrap.file-image-thumbnail",
	"bootstrap.box-begin",
	"bootstrap.box-end",
	"bootstrap.row-separator",
	"bootstrap.email",
	"bootstrap.panel-wide-begin",
	"bootstrap.panel-wide-end",
	"bootstrap.panel-wide3-begin",
	"bootstrap.panel-wide3-end"
));

$this->page->selectedLanguage="en-GB";
$this->page->page=trim($this->getRequest("page",""));

if(strlen($this->page->page)>0){
	$this->page->initPage($this->page->page);
	$this->page->pageTitle=$this->page->pages[$this->page->page]["title"];
	$this->page->requireEditPage($this->page->page);
};
