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

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>

<div class="xui text -label-40">
	Progress Bar - <?php echo ucfirst($context); ?>
</div>

<div class="xui progress-bar -<?php echo $context; ?>">
	<div class="xui progress-bar_background"></div>
	<div class="xui progress-bar_bar"></div>
	<div class="xui progress-bar_label">50%</div>
</div>

<?php }; ?>
	