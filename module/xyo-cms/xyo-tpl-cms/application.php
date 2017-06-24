<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$modPage=&$this->getModule("xyo-mod-cms-page");
//
$modPage->page=$this->getRequest("page","index");
$pageName=$this->getRequest("__");
if(strlen($pageName)>0){
	$list=explode(".", $pageName);
	if(count($list)>0){
		if($list[1]==".html"){
			$modPage->page=$list[0];
		};
	};
};
//
$modPage->initPage($modPage->page);
$modPage->requireViewPage($modPage->page);
$modPage->loadPage($modPage->page);
//
$title=$modPage->getPageElement("title","");
$description=$modPage->getPageElement("description","");

$modHtml=&$this->getModule("xyo-mod-html");
$htmlClass=$modHtml->getHTMLClass();
if(strlen($htmlClass)>0){
	$htmlClass=" class=\"".$htmlClass."\"";
};

?><!DOCTYPE html>
<html<?php $this->eHtmlLanguage(); $this->eHtmlClass();?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php $this->eHtmlTitle(); ?>
		<?php $this->eHtmlDescription(); ?>
		<?php $this->eHtmlCss(); ?>
	</head>
	<body>
		<?php $modPage->viewPage($modPage->page); ?>
		<?php $this->eHtmlScript(); ?>
	</body>
</html>