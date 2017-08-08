<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/css");
?>
/*
//
//
//
*/

<?php foreach($this->colorPalette as $key=>$value){ ?>

.xui-palette--bg-<?php echo $key; ?> {
	background-color: <?php echo $value; ?>;
}

.xui-palette--fg-<?php echo $key; ?> {
	color: <?php echo $value; ?>;
}

.xui-palette--bg-<?php echo $key; ?>-hover:hover {
	background-color: <?php echo $value; ?>;
}

.xui-palette--fg-<?php echo $key; ?>-hover:hover {
	color: <?php echo $value; ?>;
}

<?php }; ?>