<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$title=$this->getArgument("title",$this->getParameter("form_title"));

?>
	<div class="panel panel-default pull-left xyo-form-group-wide">
		<div class="panel-heading"><?php $this->eLanguage($title); ?></div>
		<div class="panel-body">
