<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setItem("delete", "item-js.important", "<i class=\"material-icons\">close</i>", "delete", "danger", "#", "cmdDialogDelete()");

if($this->getParameter("dialog_edit",false)){
	$this->setItem("edit", "item-js.important", "<i class=\"material-icons\">create</i>", "edit", "success", "#", "cmdDialogEdit()");
}else{
	$this->setItem("edit", "item-js.important", "<i class=\"material-icons\">create</i>", "edit", "success", "#", "doCommand('form-edit')");
};

if($this->getParameter("dialog_new",false)){
	$this->setItem("new", "item-js.important", "<i class=\"material-icons\">add</i>", "new", "primary", "#", "cmdDialogNew()");
}else{
	$this->setItem("new", "item-js.important", "<i class=\"material-icons\">add</i>", "new", "primary", "#", "doCommand('form-new')");
};

