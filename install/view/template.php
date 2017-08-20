<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$view = $this->getView();

$listGroup = array(
    array("id" => 1, "key" => "language", "text" => $this->getFromLanguage("panel_language"), "selected" => false, "icon-left" => ""),
    array("id" => 2, "key" => "licence", "text" => $this->getFromLanguage("panel_licence"), "selected" => false, "icon-left" => ""),
    array("id" => 3, "key" => "check", "text" => $this->getFromLanguage("panel_check"), "selected" => false, "icon-left" => ""),
    array("id" => 4, "key" => "datasource", "text" => $this->getFromLanguage("panel_datasource"), "selected" => false, "icon-left" => ""),
    array("id" => 5, "key" => "install", "text" => $this->getFromLanguage("panel_install"), "selected" => false, "icon-left" => ""),
    array("id" => 6, "key" => "settings", "text" => $this->getFromLanguage("panel_settings"), "selected" => false, "icon-left" => ""),
    array("id" => 7, "key" => "done", "text" => $this->getFromLanguage("panel_done"), "selected" => false, "icon-left" => "")
);

foreach ($listGroup as $key => &$value) {
    if ($value["key"] === $view) {
        $value["selected"] = true;
	$value["icon-left"] = "<i class=\"material-icons\">chevron_right</i>";
    }
};  

?>

<div class="xyo-install__application">
	<div class="xyo-install__panel">
		<?php $this->generateComponent("xui.list-group", array("items"=>$listGroup)); ?>
		<img class="hidden-xs" src="<?php echo $this->site; ?>media/sys/images/system-installer-2-128.png"
			style="width:128px;height:128px;display:block;margin-left:auto;margin-right:auto;margin-top:0px;"
			alt="<?php $this->eLanguage("alt_install"); ?>" ></img>
	</div>
	<div class="xyo-install__content">
		<?php $this->generateCurrentView(); ?>
	</div>
</div>

