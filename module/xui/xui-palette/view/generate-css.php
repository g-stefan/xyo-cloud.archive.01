<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>
/*
//
//
//
*/

<?php foreach($this->palette as $key=>$value){ ?>

.xui_bg_<?php echo $key; ?> {
	background-color: <?php echo $value; ?>;
}

.xui_fg_<?php echo $key; ?> {
	color: <?php echo $value; ?>;
}

.xui_bg_<?php echo $key; ?>-hover:hover {
	background-color: <?php echo $value; ?>;
}

.xui_fg_<?php echo $key; ?>-hover:hover {
	color: <?php echo $value; ?>;
}

<?php }; ?>

