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
	Form - Textarea - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<textarea class="xui form-textarea -<?php echo $context; ?>" rows="4" cols="32" name="text-<?php echo $context; ?>" <?php echo $disabled; ?>><?php echo $context; ?></textarea>
</form>
<?php }; ?>
	