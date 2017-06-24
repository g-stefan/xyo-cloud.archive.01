<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_user");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$this->keepRequest("page");

$this->page->requireComponent(array(
	"select",
	"text",
	"textarea",
	"username",
	"password",
	"panel-begin",
	"panel-end",
	"row-begin",
	"row-end",
	"file-image-thumbnail",
	"box-begin",
	"box-end",
	"row-separator",
	"email",
	"panel-wide-begin",
	"panel-wide-end",
	"panel-wide3-begin",
	"panel-wide3-end"
));

$this->page->selectedLanguage="en-GB";
$this->page->page=trim($this->getRequest("page",""));

if(strlen($this->page->page)>0){
	$this->page->initPage($this->page->page);
	$this->page->pageTitle=$this->page->pages[$this->page->page]["title"];
	$this->page->requireEditPage($this->page->page);
};
