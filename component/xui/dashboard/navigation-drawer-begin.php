<?php 

$scan=explode("-",$this->getRequest("xui-dashboard","over-closed"));
$mode=$scan[0];
$state=$scan[1];

?>
<div class="xui-navigation-drawer xui-navigation-drawer_<?php echo $mode; ?> xui-navigation-drawer_<?php echo $state; ?> xui_toggle" data-xui-toggle-group="xui-navigation-drawer">
