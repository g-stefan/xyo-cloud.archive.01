<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/css");

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");

?>
/*
//
//
//
*/

.xui-form {
	font-family: "Roboto", sans-serif;
}

<?php

include("css-button.php");
include("css-label.php");
include("css-text.php");
include("css-textarea.php");
include("css-radio.php");
include("css-checkbox.php");
include("css-select.php");
include("css-datepicker.php");
include("css-text-material.php");
