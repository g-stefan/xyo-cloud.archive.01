<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.datepicker {
	border-radius: 3px;
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	z-index: 1000;
}

.datepicker--day-name{
	color: <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
}

.datepicker--cell.-current-{
	color: <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
}

.datepicker--cell.-selected-{
	background-color: <?php echo $xuiTheme->colorTypeInput["primary"]; ?>;
}

.datepicker--cell.-selected-.-focus-{
	background-color: <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

