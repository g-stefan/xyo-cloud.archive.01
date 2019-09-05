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
	Form - Text - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<input class="xui form-text -<?php echo $context; ?>" type="text" name="text-<?php echo $context; ?>" value="<?php echo $context; ?>"<?php echo $disabled; ?>></input>
</form>
<?php }; ?>
