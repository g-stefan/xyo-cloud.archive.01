<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.dashboard.main-begin");
$this->generateComponent("xui.dashboard.app-bar-begin");
$this->generateComponent("xui.dashboard.brand-begin");
// ---
echo "<div class=\"xui-brand__content\">";
//echo "<div class=\"xui-brand__logo\" style=\"background-image:url('".$this->site."media/sys/images/xyo-32.png');\"></div>";
echo "<div class=\"xui-brand__logo\"></div>";
echo "<span class=\"xui-brand__text\">Brand</span>";
echo "<span class=\"xui-brand__text-second\">TM</span>";
echo "</div>";
// ---
$this->generateComponent("xui.dashboard.brand-end");
$this->generateComponent("xui.dashboard.app-bar-navigation-drawer-toggle");
// ---
$this->generateComponent("xui.dashboard.app-bar-app-title",array("title"=>"Application"));
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
//$modUser=&$this->getModule("xyo-mod-ds-user");
//$userName=$modUser->info->name;
//$dsUser=&$this->getDataSource("db.table.xyo_user");
//$dsUser->clear();
//$dsUser->id=$modUser->info->id;
//if($dsUser->load(0,1)){
//	$userImage=$dsUser->picture;
//};
//
//$img=$this->cloud->get("xui_dashboard_user_background","media/sys/images/mountains-1985027_640.jpg");
//
$img="";
$userImage="";

//echo "<div class=\"xui-user__content\" style=\"background-image:url('".$this->site.$img."');\">";
echo "<div class=\"xui-user__content\">";
echo "<div class=\"xui-user__background\"></div>";
if(strlen($userImage)>0){
	echo "<div class=\"xui-user__image xui--elevation-2\" style=\"background-image:url('".$this->site.$userImage."');\"></div>";
}else{
	echo "<div class=\"xui-user__image xui--elevation-2\"></div>";
};
echo "<div class=\"xui-user__info\">".$userName."</div>";
echo "</div>";
// ---
$this->generateComponent("xui.dashboard.user-end");
$this->generateComponent("xui.dashboard.navigation-drawer-menu",array("menu"=>array(

	array(
            "active" => 1,
            "type" => "item-activated",
            "icon" => "<i class=\"material-icons\">dashboard</i>",
            "text" => "Panou principal"
        ),    
        array(
            "type" => "item",
            "icon" => "<i class=\"material-icons\">settings</i>",
            "text" => "Panou de control",
            "popup" => array(
                        array(
                            "type" => "item",
                            "icon" => "<i class=\"material-icons\">file_download</i>",
                            "text" => "Instalare",
                        ),
                        array(
                            "type" => "item",
                            "icon" => "<i class=\"material-icons\">person</i>",
                            "text" => "Utilizatori",
                        )
                )
        ),
        array(
            "type" => "item",
            "icon" => "<i class=\"material-icons\">layers</i>",
            "text" => "Pagini"
        )
	
)));
$this->generateComponent("xui.dashboard.navigation-drawer-end");
$this->generateComponent("xui.dashboard.content-begin");

echo "Hello World!";

$this->generateComponent("xui.dashboard.content-end");
$this->generateComponent("xui.dashboard.main-end");
