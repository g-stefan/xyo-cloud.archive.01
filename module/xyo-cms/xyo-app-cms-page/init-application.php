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
	"bootstrap.file-image-thumbnail",
	"bootstrap.email",

	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end",

	"xui.box-1x2-begin",
	"xui.box-1x2-separator",
	"xui.box-1x2-end",

	"xui.box-2x1-begin",
	"xui.box-2x1-end"
));

$this->page->selectedLanguage="en-GB";
$this->page->page=trim($this->getRequest("page",""));

if(strlen($this->page->page)>0){
	$this->page->initPage($this->page->page);
	$this->page->pageTitle=$this->page->pages[$this->page->page]["title"];
	$this->page->requireEditPage($this->page->page);
};
