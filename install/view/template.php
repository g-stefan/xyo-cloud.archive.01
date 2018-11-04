<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$view = $this->getView();

$listGroup = array(
    array("id" => 1, "key" => "language", "text" => $this->getFromLanguage("panel_language"), "selected" => false, "icon-right" => ""),
    array("id" => 2, "key" => "license", "text" => $this->getFromLanguage("panel_license"), "selected" => false, "icon-right" => ""),
    array("id" => 3, "key" => "check", "text" => $this->getFromLanguage("panel_check"), "selected" => false, "icon-right" => ""),
    array("id" => 4, "key" => "datasource", "text" => $this->getFromLanguage("panel_datasource"), "selected" => false, "icon-right" => ""),
    array("id" => 5, "key" => "install", "text" => $this->getFromLanguage("panel_install"), "selected" => false, "icon-right" => ""),
    array("id" => 6, "key" => "settings", "text" => $this->getFromLanguage("panel_settings"), "selected" => false, "icon-right" => ""),
    array("id" => 7, "key" => "done", "text" => $this->getFromLanguage("panel_done"), "selected" => false, "icon-right" => "")
);

foreach ($listGroup as $key => &$value) {
    if ($value["key"] === $view) {
        $value["selected"] = true;
	$value["icon-right"] = "<i class=\"material-icons\">chevron_right</i>";
    }
};  

?>

<div class="xyo install-application">
	<div class="xyo install-application_panel">
		<?php $this->generateComponent("xui.list-group", array("items"=>$listGroup)); ?>
		<img class="xyo install-application_image" src="<?php echo $this->site; ?>lib/xyo/images/system-installer-2-128.png"
			alt="<?php $this->eLanguage("alt_install"); ?>" ></img>
	</div>
	<div class="xyo install-application_content">
		<?php $this->generateCurrentView(); ?>
	</div>
</div>

