<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$title=$this->getArgument("title-text",$this->getLanguage($this->getArgument("title",$this->getParameter("form_title"))));

?>
<div class="xui-panel">
	<div class="xui-panel__title"><?php echo $title; ?></div>
	<div class="xui-panel__content">
