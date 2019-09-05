<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

.xui.table {
	position: relative;
	box-sizing: border-box;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;
	width: auto;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	border: 0px solid #000000;
	border-spacing: 0px;
	box-sizing: border-box;
}

.xui.table thead,
.xui.table thead tr,
.xui.table tbody,
.xui.table tbody tr {
	width: 100%;
}

.xui.table thead > tr > th {
	font-size: 18px;
	line-height: 24px;
	font-weight: normal;
	box-sizing: border-box;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	padding-top: 4px;
	padding-right: 8px;
	padding-bottom: 4px;
	padding-left: 8px;
	box-sizing: border-box;
}

.xui.table thead th:last-child {
	border-bottom: 0px solid #000000;
}

.xui.table tbody > tr > td {
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	padding-top: 4px;
	padding-right: 4px;
	padding-bottom: 4px;
	padding-left: 4px;
	box-sizing: border-box;
}

.xui.table thead tr:first-child th:first-child {
	border-top-left-radius: 3px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.xui.table thead tr:first-child th:last-child {
	border-top-left-radius: 0px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.xui.table tbody tr:last-child td:first-child {
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 0px;
}

.xui.table tbody tr:last-child td:last-child {
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 3px;
}

<?php foreach($this->context as $context){ ?>
<?php $selector=($context=="default")?"":".-".$context; ?>

.xui.table<?php echo $selector; ?> thead tr th {
	color: <?php echo $this->settings["table-".$context."-head-color"]; ?>;
}

.xui.table<?php echo $selector; ?> thead tr {
	background-color: <?php echo $this->settings["table-".$context."-background-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr {
	background-color: <?php echo $this->settings["table-".$context."-background-color"]; ?>;
	color: <?php echo $this->settings["table-".$context."-color"]; ?>;
}

.xui.table<?php echo $selector; ?> thead th {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	color: <?php echo $this->settings["table-".$context."-color"]; ?>;
}

.xui.table<?php echo $selector; ?> thead th:last-child {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr td {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr td:last-child {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:nth-child(even) {
	background-color: <?php echo $this->settings["table-".$context."-even-background-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:last-child td {
	border-bottom: 1px solid <?php echo $this->settings["table-".$context."-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:hover {
	background-color: <?php echo $this->settings["table-".$context."-hover-background-color"]; ?>;
	color: <?php echo $this->settings["table-".$context."-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:hover td {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-hover-inner-border-color"]; ?>;
	border-bottom: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:hover + tr > td {
	border-top: 0px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:hover td:first-child {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
	border-left: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:hover td:last-child {
	border-top: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
	border-right: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
}

.xui.table<?php echo $selector; ?> tbody tr:last-child:hover > td {
	border-bottom: 1px solid <?php echo $this->settings["table-".$context."-hover-border-color"]; ?>;
}


<?php }; ?>


</style>

