<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_settings");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action", "form-edit"));
                    
$this->addItem("row-begin");

$this->addItem("panel-begin");
$this->addItem("text", "element_text","");
$this->addItem("integer", "element_integer",100);
$this->addItem("enable", "element_enable",1);
$this->addItem("order", "element_order",0);
$this->addItem("username", "element_username");
$this->addItem("password", "element_password","password");

$this->addItem("select", "element_select",2,array(
	"1"=>"one",
	"2"=>"two",
	"3"=>"three"
));

$this->addItem("textarea", "element_textarea");
$this->addItem("panel-end");

$this->addItem("panel-begin",null,null,array("title"=>"other_title"));
$this->addItem("captcha", "element_captcha");
$this->addItem("date", "element_date");
$this->addItem("time", "element_time");
$this->addItem("datetime", "element_datetime");
$this->addItem("file", "element_file");
$this->addItem("file-image-thumbnail","element_file_image_thumbnail");
$this->addItem("text-typeahead", "element_text_typeahead");
$this->addItem("panel-end");

$this->addItem("row-separator");

$this->addItem("panel-wide-begin");
$this->addItem("html", "element_html");
$this->addItem("file-html", "element_html_file");
$this->addItem("panel-wide-end");

$this->addItem("row-separator");

$this->addItem("box-begin");
$this->addItem("file-image-thumbnail","element_file_image_thumbnail2",null,array("thumbnail-size"=>array(320,240),"collapse"=>"in"));
$this->addItem("file-image-thumbnail", "element_file_image_thumbnail3",null,array("thumbnail-size"=>array(320,240),"collapse"=>true));
$this->addItem("file-link", "element_file_link2",null, array("collapse"=>true));
$this->addItem("file-link", "element_file_link3",null, array("collapse"=>"in"));
$this->addItem("box-end");

$this->addItem("panel-begin");
$this->addItem("file-link", "element_file_link1");
$this->addItem("panel-end");

$this->addItem("row-separator");

$this->addItem("panel-begin",null,null,array("title"=>"material_title"));
$this->addItem("material.text", "material_text", "", array("required"=>true));
$this->addItem("panel-end");

$this->addItem("row-end");



