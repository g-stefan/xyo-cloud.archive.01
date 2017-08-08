<?php 

$scan=explode("-",$this->getRequest("xui-dashboard","over-closed"));
$mode=$scan[0];
$state=$scan[1];

?>
<div class="xui-brand xui-brand--<?php echo $mode; ?> xui-brand--<?php echo $state; ?> xui-toggle" data-xui-toggle-group="xui-brand">