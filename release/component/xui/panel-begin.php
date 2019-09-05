<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$title=$this->getArgument("title-text",$this->getFromLanguage($this->getArgument("title",$this->getParameter("form_title"))));
$noTitle=$this->getArgument("no-title",0);

?>
<div class="xui box -space"></div>
<div class="xui panel -elevation-4">
<?php if(!$noTitle) {?>
	<div class="xui panel_title"><?php echo $title; ?></div>
	<div class="xui panel_line"></div>
<?php }; ?>
	<div class="xui panel_content">
