<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$hasTopSpace=$this->getArgument("top-space",0);

?>
<div class="xui-box-row<?php if($hasTopSpace){echo " xui-box-row_top-space";}; ?>">
	<div class="xui-box-x-900">
