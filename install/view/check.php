<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$path = $this->getParameter("path", array());
$allOk = true;
foreach ($path as $key => $value) {
	if ($value == "yes") {
		continue;
	};
	$allOk = false;
	break;
};			


$this->generateComponent("xui.form-action-begin");

echo "<div class=\"xui--right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"default",
	"try"=>"default",
	"next"=>$allOk?"primary":"disabled"
)));
echo "</div>";
echo "<div class=\"xui-separator\"></div>";
echo "<br />";


if($allOk){
	$this->generateViewLanguage("msg-check-ok");
}else{
	$this->generateViewLanguage("msg-check-error");
	echo "<ul class=\"list-group\">";

		foreach ($path as $key => $value) {
			if ($value == "yes") {
				continue;
			};
			echo "<li class=\"list-group-item list-group-item-danger\">";
                        echo $key;
			echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
                        echo "</li>";
		};

	echo "</ul>";
};


$this->eFormRequest(array(
	"back" => "licence",
	"this" => "check",
	"next" => "datasource",
	"website_language" => $this->getSystemLanguage()
));

$this->generateComponent("xui.form-action-end");
