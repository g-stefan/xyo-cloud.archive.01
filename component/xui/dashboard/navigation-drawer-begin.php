<?php 

$scan=explode("-",$this->getRequest("xui-dashboard","over-closed"));
$mode=$scan[0];
$state=$scan[1];

?>
<div class="xui-navigation-drawer xui-navigation-drawer--<?php echo $mode; ?> xui-navigation-drawer--<?php echo $state; ?> xui--toggle" data-xui-toggle-group="xui-navigation-drawer">
