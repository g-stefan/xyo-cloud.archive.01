<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');                                                                                                             

$this->generateComponent("xui.form-action-begin");

echo "<div class=\"xui--right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"default",
	"try"=>"disabled",
	"next"=>"primary"
)));
echo "</div>";
echo "<div class=\"xui-separator\"></div>";
echo "<br />";

$this->generateViewLanguage("msg-licence");

$this->eFormRequest(array(
	"back" => "language",
	"this" => "licence",
	"next" => "check",
	"website_language"=>$this->getSystemLanguage()
));

$this->generateComponent("xui.form-action-end");
