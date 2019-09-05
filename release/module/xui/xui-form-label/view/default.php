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
<div class="xui text -label-40">
	Form - Label - <?php echo ucfirst($context); ?>
</div>
<form>
	<label class="xui form-label -<?php echo $context; ?>">
	Label - <?php echo $context; ?>
	</label>
</form>
<?php }; ?>
	