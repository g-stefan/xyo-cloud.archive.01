<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
?>
<div class="xui-application">
	<div class="xui-toolbar"><div class="xui--right">
<?php
           $this->execModule("xyo-mod-toolbar", array_merge(array(
                        "module" => $this->name,
                        "config" => $this->getParameter("toolbar", "toolbar/default")
                            ), $this->toolbarParameter)
            );

?>	
	</div></div>

<?php
	if ($this->isAlert()) {
    		$this->generateView("message/alert");
	}
	if ($this->isError()) {
		$this->generateView("message/error");
	}

?>
	<div class="xui-content xui-content--has-toolbar <?php if($this->hasAlert__){echo "xui-content--has-message-alert";}; ?> <?php if ($this->hasError__){echo "xui-content--has-message-error";}; ?>">
	<?php $this->generateCurrentView(); ?>
	</div>
</div>