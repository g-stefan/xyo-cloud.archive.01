<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItem("delete", "item-js", "media/sys/images/edit-delete-32.png", "delete", true, "#", "cmdDialogDelete()");

if($this->getParameter("dialog_edit",false)){
	$this->setItem("edit", "item-js", "media/sys/images/edit-32.png", "edit", true, "#", "cmdDialogEdit()");
}else{
	$this->setItem("edit", "item-js", "media/sys/images/edit-32.png", "edit", true, "#", "doCommand('form-edit')");
};

if($this->getParameter("dialog_new",false)){
	$this->setItem("new", "item-js", "media/sys/images/list-add-32.png", "new", true, "#", "cmdDialogNew()");
}else{
	$this->setItem("new", "item-js", "media/sys/images/list-add-32.png", "new", true, "#", "doCommand('form-new')");
};
