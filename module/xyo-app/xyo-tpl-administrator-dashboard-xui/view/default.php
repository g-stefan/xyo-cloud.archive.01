<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?><!DOCTYPE html>
<html<?php $this->eHtmlLanguage(); $this->eHtmlClass();?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php $this->eHtmlTitle(); ?>
		<?php $this->eHtmlDescription(); ?>
		<?php $this->eHtmlCss(); ?>
	</head>
	<body>
<?php

$this->generateComponent("xui.dashboard.main-begin");
$this->generateComponent("xui.dashboard.app-bar-begin");
$this->generateComponent("xui.dashboard.brand-begin");
// ---
echo "<div class=\"xui-brand__content\">";
echo "<div class=\"xui-brand__logo\" style=\"background-image:url('".$this->site."media/sys/images/xyo-32.png');\"></div>";
echo "<span class=\"xui-brand__text\">Cloud</span>";
echo "<span class=\"xui-brand__text-second\"></span>";
echo "</div>";
// ---
$this->generateComponent("xui.dashboard.brand-end");
$this->generateComponent("xui.dashboard.app-bar-navigation-drawer-toggle");
// ---
$app=&$this->getModule($this->getApplication());
$title="";
if($app){
	if ($app instanceof xyo_mod_Application) {
		$title=$app->getApplicationTitle();
	};
};
$this->generateComponent("xui.dashboard.app-bar-app-title",array("title"=>$title));
// ---
echo "<div class=\"xui--right\">";
$this->execGroup("xyo-status");
echo "</div>";
// ---
$this->generateComponent("xui.dashboard.app-bar-end");

$this->generateComponent("xui.dashboard.navigation-drawer-begin");
$this->generateComponent("xui.dashboard.user-begin");

$userName="Jon Doe";
$userImage="";
//
$modUser=&$this->getModule("xyo-mod-ds-user");
$userName=$modUser->info->name;
$dsUser=&$this->getDataSource("db.table.xyo_user");
$dsUser->clear();
$dsUser->id=$modUser->info->id;
if($dsUser->load(0,1)){
	$userImage=$dsUser->picture;
};
//
$img=$this->cloud->get("xui_dashboard_user_background","media/sys/images/mountains-1985027_640.jpg");
//
echo "<div class=\"xui-user__content\" style=\"background-image:url('".$this->site.$img."');\">";
echo "<div class=\"xui-user__background\"></div>";
if(strlen($userImage)>0){
	echo "<div class=\"xui-user__image xui-elevation--2\" style=\"background-image:url('".$this->site.$userImage."');\"></div>";
}else{
	echo "<div class=\"xui-user__image xui-elevation--2\"></div>";
};
echo "<div class=\"xui-user__info\">".$userName."</div>";
echo "</div>";
// ---
$this->generateComponent("xui.dashboard.user-end");
$sidebar=&$this->getModule("xyo-mod-xui-sidebar");
$sidebar->initGroup("xyo-desktop");
$this->generateComponent("xui.dashboard.navigation-drawer-menu",array("menu"=>$sidebar->getMenu()));
$this->generateComponent("xui.dashboard.navigation-drawer-end");
$this->generateComponent("xui.dashboard.content-begin");
$this->generateApplicationView();

$this->generateComponent("xui.dashboard.content-end");
$this->generateComponent("xui.dashboard.main-end");


?>

		<?php $this->execModule("lib-bootstrap-back-to-top"); ?>
		<?php $this->eHtmlScript(); ?>
	</body>
</html>
