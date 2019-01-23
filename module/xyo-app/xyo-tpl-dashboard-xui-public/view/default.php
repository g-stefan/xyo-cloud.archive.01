<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$dasboardType=explode("-",$this->getRequest("xui-dashboard","normal-open"));
$dasboardType=" -".$dasboardType[0]." -".$dasboardType[1];

$app=&$this->getModule($this->getApplication());
$title="";
if($app){
	if ($app instanceof xyo_mod_Application) {
		$title=$app->getApplicationTitle();
	}else
	if ($app instanceof xyo_Module) {
		$app->loadLanguage();
		$title=$app->getFromLanguage("application_title","");
	};
};

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
$img=$this->cloud->get("xui_dashboard_user_background","lib/xyo/images/mountains-1985027_640.jpg");

$modImage=&$this->getModule("xui-form-file-image");

$sidebar=&$this->getModule("xyo-mod-xui-sidebar");
$sidebar->initGroup("xyo-desktop");

$xuiDashboard=&$this->getModule("xui-dashboard");

?><!DOCTYPE html>
<html<?php $this->eHtmlLanguage(); $this->eHtmlClass();?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php $this->eHtmlTitle(); ?>
		<?php $this->eHtmlDescription(); ?>
		<?php $this->eHtmlIcon(); ?>
		<?php $this->eHtmlCss(); ?>
		<style>
			.xui.app-user > .xui.app-user_content > .xui.app-user_background_img {
				<?php $modImage->eImageCss($img); ?>
			}
			.xui.app-user > .xui.app-user_content > .xui.app-user_image > .xui.app-user_image_img {
				<?php $modImage->eImageCss($userImage); ?>
			}
		</style>
	</head>
	<body<?php $this->eHtmlBodyClass(); ?>>
		<div class="xui dashboard -main<?php echo $dasboardType; ?>">
			<div class="xui app-header -elevation-4">
				<div class="xui app-brand">
					<div class="xui app-brand_content">
						<div class="xui app-brand_logo" style="background-image:url('<?php echo $this->site."lib/xyo/images/xyo-32.png"; ?>'"></div>
						<div class="xui app-brand_name">Cloud</div>
						<div class="xui app-brand_mark"></div>
					</div>
				</div>
				<div class="xui app-bar">
					<div class="xui button -size-40x40 -left -effect-ripple" onclick="XUI.Dashboard.toogleAction();">
						<i class="material-icons">menu</i>
					</div>
					<div class="xui text -size-h24x40 -left">
						<?php echo $title; ?>
					</div>
					<div class="xui -right">
						<?php $this->runGroup("xyo-status"); ?>
					</div>	
				</div>
			</div>
			<div class="xui navigation-drawer">
				<div class="xui navigation-drawer_content">
					<div class="xui app-user">
						<div class="xui app-user_content">
							<div class="xui app-user_background_img"></div>
							<div class="xui app-user_background"></div>
							<div class="xui app-user_image -elevation-2">
								<div class="xui app-user_image_img"></div>
							</div>
							<div class="xui app-user_info"><?php echo $userName; ?></div>
						</div>
					</div>
					<div class="xui menu">
						<div class="xui menu_content">
							<?php $xuiDashboard->generateNavigationDrawerMenu($sidebar->getMenu()); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="xui content">
				<?php $this->generateApplicationView(); ?>
			</div>
			<div class="xui content-cover"></div>
		</div>
		<?php $this->eHtmlScript(); ?>
	</body>
</html>
