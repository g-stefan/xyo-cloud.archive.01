<?php 

$scan=explode("-",$this->getRequest("xui-dashboard-size-x48","over-closed"));
$mode=$scan[0];
$state=$scan[1];

?>
<div class="xui navigation-drawer <?php echo $mode; ?> <?php echo $state; ?> toggle" toggle-group="xui-navigation-drawer">
