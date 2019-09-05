<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

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

echo "<div class=\"xui -right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"default",
	"try"=>"default",
	"next"=>$allOk?"primary":"disabled"
)));
echo "</div>";
echo "<div class=\"xui separator\"></div>";
echo "<br />";


if($allOk){
	$this->generateViewLanguage("msg-check-ok");
}else{
	$this->generateViewLanguage("msg-check-error");
	echo "<br />";
	echo "<div class=\"xui list-group\">";
	echo "<div class=\"xui list-group_content\">";

		foreach ($path as $key => $value) {
			if ($value == "yes") {
				continue;
			};
			echo "<div class=\"xui list-group_item\">";
				echo "<div class=\"xui list-group_item_text\">";
		                        echo $key;
				echo "</div>";			
				echo "<div class=\"xui list-group_item_icon-right\" style=\"color: #AA0000;\">";
					echo "<i class=\"material-icons\">highlight_off</i>";
	                        echo "</div>";
                        echo "</div>";
		};

	echo "</div>";
	echo "</div>";
	echo "<br />";
	echo "<br />";
};


$this->eFormRequest(array(
	"back" => "license",
	"this" => "check",
	"next" => "datasource",
	"website_language" => $this->getSystemLanguage()
));

$this->generateComponent("xui.form-action-end");
