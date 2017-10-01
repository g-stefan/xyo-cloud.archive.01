<?php 

$scan=explode("-",$this->getRequest("xui-dashboard","over-closed"));
$mode=$scan[0];
$state=$scan[1];

?>
<div class="xui-brand xui-brand_<?php echo $mode; ?> xui-brand_<?php echo $state; ?> xui_toggle" data-xui-toggle-group="xui-brand">