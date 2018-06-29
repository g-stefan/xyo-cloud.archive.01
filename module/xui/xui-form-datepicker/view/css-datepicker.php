<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?>

/* --- */

.datepicker {
	border-radius: 3px;
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	z-index: 1000;
}

.datepicker--day-name{
	color: <?php echo $xuiTheme->theme["primary"]["input"]["normal"]["color.border"]; ?>;
}

.datepicker--cell.-current-{
	color: <?php echo $xuiTheme->theme["primary"]["input"]["normal"]["color.border"]; ?>;
}

.datepicker--cell.-selected-{
	background-color: <?php echo $xuiTheme->theme["primary"]["input"]["normal"]["color.border"]; ?>;
}

.datepicker--cell.-selected-.-focus-{
	background-color: <?php echo $xuiTheme->theme["primary"]["input"]["active"]["color.border"]; ?>;
}

