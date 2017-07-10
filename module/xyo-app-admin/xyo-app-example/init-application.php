<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">extension</i>");
$this->setApplicationDataSource("db.table.xyo_settings");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action","form-edit"));
                    
$this->addItem("bootstrap.row-begin");

$this->addItem("bootstrap.panel-begin");
$this->addItem("bootstrap.text","element_text","");
$this->addItem("bootstrap.integer","element_integer",100);
$this->addItem("bootstrap.enable","element_enable",1);
$this->addItem("bootstrap.order","element_order",0);
$this->addItem("bootstrap.username","element_username");
$this->addItem("bootstrap.password","element_password","password");

$this->addItem("bootstrap.select","element_select",2,array(
	"1"=>"one",
	"2"=>"two",
	"3"=>"three"
));

$this->addItem("bootstrap.textarea","element_textarea");
$this->addItem("bootstrap.panel-end");

$this->addItem("bootstrap.panel-begin",null,null,array("title"=>"other_title"));
$this->addItem("bootstrap.captcha","element_captcha");
$this->addItem("bootstrap.date","element_date");
$this->addItem("bootstrap.time","element_time");
$this->addItem("bootstrap.datetime","element_datetime");
$this->addItem("bootstrap.file","element_file");
$this->addItem("bootstrap.file-image-thumbnail","element_file_image_thumbnail");
$this->addItem("bootstrap.text-typeahead","element_text_typeahead");
$this->addItem("bootstrap.panel-end");

$this->addItem("bootstrap.row-separator");

$this->addItem("bootstrap.panel-wide-begin");
$this->addItem("bootstrap.html","element_html");
$this->addItem("bootstrap.file-html","element_html_file");
$this->addItem("bootstrap.panel-wide-end");

$this->addItem("bootstrap.row-separator");

$this->addItem("bootstrap.box-begin");
$this->addItem("bootstrap.file-image-thumbnail","element_file_image_thumbnail2",null,array("thumbnail-size"=>array(320,240),"collapse"=>"in"));
$this->addItem("bootstrap.file-image-thumbnail", "element_file_image_thumbnail3",null,array("thumbnail-size"=>array(320,240),"collapse"=>true));
$this->addItem("bootstrap.file-link", "element_file_link2",null, array("collapse"=>true));
$this->addItem("bootstrap.file-link", "element_file_link3",null, array("collapse"=>"in"));
$this->addItem("bootstrap.box-end");

$this->addItem("bootstrap.panel-begin");
$this->addItem("bootstrap.file-link", "element_file_link1");
$this->addItem("bootstrap.panel-end");

$this->addItem("bootstrap.row-end");

