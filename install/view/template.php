<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$view = $this->getView();

$panel = array(
    array("id" => 1, "key" => "language", "text" => $this->getFromLanguage("panel_language"), "selected" => false),
    array("id" => 2, "key" => "licence", "text" => $this->getFromLanguage("panel_licence"), "selected" => false),
    array("id" => 3, "key" => "check", "text" => $this->getFromLanguage("panel_check"), "selected" => false),
    array("id" => 4, "key" => "datasource", "text" => $this->getFromLanguage("panel_datasource"), "selected" => false),
    array("id" => 5, "key" => "install", "text" => $this->getFromLanguage("panel_install"), "selected" => false),
    array("id" => 6, "key" => "settings", "text" => $this->getFromLanguage("panel_settings"), "selected" => false),
    array("id" => 7, "key" => "done", "text" => $this->getFromLanguage("panel_done"), "selected" => false)
);

foreach ($panel as $key => &$value) {
    if ($value["key"] === $view) {
        $value["selected"] = true;
    }
};  

?>

<div class="containter">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<?php $this->execModule("xyo-mod-panel2", $panel); ?>

			<img class="hidden-xs" src="<?php echo $this->pathBase; ?>media/sys/images/system-installer-2-128.png"
			  style="width:128px;height:128px;display:block;margin-left:auto;margin-right:auto;margin-top:0px;"
			  alt="<?php $this->eLanguage("alt_install"); ?>" />

		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php $this->generateCurrentView(); ?>
		</div>
	</div>
</div>
