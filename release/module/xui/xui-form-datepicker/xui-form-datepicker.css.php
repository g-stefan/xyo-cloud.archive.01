<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<style>

.datepicker {
	border-radius: 3px;
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	z-index: 1000;
}

.datepicker--day-name{
	color: <?php echo $this->settings["form-text-primary-border-color"]; ?>;
}

.datepicker--cell.-current-{
	color: <?php echo $this->settings["form-text-primary-border-color"]; ?>;
}

.datepicker--cell.-selected-{
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

.datepicker--cell.-selected-.-focus-{
	background-color: <?php echo $this->settings["form-text-primary-focus-border-color"]; ?>;
}

</style>
