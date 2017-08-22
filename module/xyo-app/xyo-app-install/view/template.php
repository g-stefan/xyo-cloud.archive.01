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
	array("id"=>1,"key"=>"welcome","text"=>$this->getFromLanguage("panel_welcome"),"selected"=>false,"icon-left" => ""),
	array("id"=>2,"key"=>"package","text"=>$this->getFromLanguage("panel_package"),"selected"=>false,"icon-left" => ""),
	array("id"=>3,"key"=>"require","text"=>$this->getFromLanguage("panel_require"),"selected"=>false,"icon-left" => ""),
	array("id"=>3,"key"=>"licence","text"=>$this->getFromLanguage("panel_licence"),"selected"=>false,"icon-left" => ""),
	array("id"=>4,"key"=>"install","text"=>$this->getFromLanguage("panel_install"),"selected"=>false,"icon-left" => "")	
);

foreach ($listGroup as $key => &$value) {
    if ($value["key"] === $view) {
        $value["selected"] = true;
	$value["icon-left"] = "<i class=\"material-icons\">chevron_right</i>";
    }
};


	echo "<br>";
	$this->generateComponent("xui.box-x-900-begin");
	$this->generateComponent("xui.panel2-begin");
	$this->eLanguage("alt_install");
	$this->generateComponent("xui.panel2-content");

?>

<div class="xyo-install__application">
	<div class="xyo-install__panel">
		<?php $this->generateComponent("xui.list-group", array("items"=>$listGroup)); ?>
		<img class="hidden-xs" src="<?php echo $this->site; ?>lib/xyo/images/system-installer-2-128.png"
			style="width:128px;height:128px;display:block;margin-left:auto;margin-right:auto;margin-top:0px;"
			alt="<?php $this->eLanguage("alt_install"); ?>" ></img>
	</div>
	<div class="xyo-install__content">
		<?php $this->generateCurrentView(); ?>
	</div>
</div>


<?php

	$this->generateComponent("xui.panel2-end");
	$this->generateComponent("xui.box-x-900-end");

