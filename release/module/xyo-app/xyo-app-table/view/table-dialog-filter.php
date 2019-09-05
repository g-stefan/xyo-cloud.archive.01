<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setParameter("form_title","form_title_filter");
$this->generateComponent("xui.form-action-begin");

foreach ($this->tableSelect as $key => $value) {
	if ($value) {
		$this->generateComponent("xui.form-select", array("element" => $key));
	};
};

$this->generateComponent("xui.form-action-end",array(
	"parameters"=>array(
		"action"=>"table-dialog-filter-apply",
		"ajax"=>1
	)
));

// load selected filters
$this->ejsBegin();
foreach ($this->tableSelect as $key => $value) {
	if($value){
		echo "\$(\"#fn_filter_e_" . $key."\").val(\$(\"#view_select_" . $key."\").val()).trigger(\"change\");";
	};
};

$this->ejsEnd();