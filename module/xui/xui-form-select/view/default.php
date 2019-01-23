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
	Form - Select - <?php echo ucfirst($context); ?>
</div>
<form>
	<select class="xui form-select -<?php echo $context; ?>" id="form-select-<?php echo $context; ?>" name="form-select-<?php echo $context; ?>" <?php echo $disabled; ?> data-xui-select-theme="-<?php echo $context; ?>">
		<option value="volvo">Volvo</option>
		<option value="saab">Saab</option>
		<option value="fiat">Fiat</option>
		<option value="audi">Audi</option>
	</select>
</form>
<?php }; ?>	