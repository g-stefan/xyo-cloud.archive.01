<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.link{
	position: relative;
	display: inline-block;
	text-decoration: none;
	color: <?php echo $this->settings["xui-link-color"]; ?>;
}

.xui.link:hover{
	color: #000000;
	font-weight: normal;
}

.xui.link:visited{
	color: <?php echo $this->settings["xui-link-color"]; ?>;
}

.xui.link:visited:hover{
	color: #000000;
}

.xui.link::before{
	content: "";
	transition:0.3s all ease;
	left: 50%;
	transform: translateX(-50%);	
	position:absolute;
	bottom: -1px;
	height: 1px;
	width: 0px;
	background: <?php echo $this->settings["context-primary-focus-color"]; ?>;
	backface-visibility: hidden;
}

.xui.link:hover::before{
	width:100%;
}

</style>
