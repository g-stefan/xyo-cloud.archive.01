<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.box-1x2-begin");

$this->generateComponent("xui.panel-begin",array("title"=>"form_title_user"));
$this->generateComponent("xui.form-file-image", array("element" =>"picture","view_x"=>320,"view_y"=>240));
$this->generateComponent("xui.form-textarea", array("element" =>"description"));
$this->generateComponent("xui.panel-end");

$this->generateComponent("xui.box-1x2-separator");

$this->generateComponent("xui.panel-begin");
$this->generateComponent("xui.form-text", array("element" =>"name"));
$this->generateComponent("xui.form-username", array("element" =>"username"));
$this->generateComponent("xui.form-password", array("element" =>"password1"));
$this->generateComponent("xui.form-password", array("element" =>"password2"));
$this->generateComponent("xui.form-email", array("element" =>"email"));
if($this->isNew){
    $this->generateComponent("xui.form-select", array("element" =>"id_xyo_user_group"));
}
$this->generateComponent("xui.form-select", array("element" =>"id_xyo_language"));
$this->generateComponent("xui.form-select", array("element" =>"invisible"));
$this->generateComponent("xui.form-select", array("element" =>"enabled"));
$this->generateComponent("xui.panel-end");

$this->generateComponent("xui.box-1x2-end");
