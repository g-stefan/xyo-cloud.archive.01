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
	Form - Text Required - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<div class="xui form-text-required -<?php echo $context; ?>">
		<input type="text" name="text-required-<?php echo $context; ?>" value="<?php echo $context; ?>"<?php echo $disabled; ?>></input>
	</div>
</form>
<?php }; ?>	