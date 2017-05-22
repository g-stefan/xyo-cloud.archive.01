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

?><!doctype html>
<html lang="en"<?php echo $htmlClass; ?>>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>">
		<meta name="robots" content="index, follow">
		<link rel="icon" href="favicon.ico">
		<?php $this->generateHtmlHead(); ?>
	</head>
	<body>
		<?php $modPage->viewPage($modPage->page); ?>
		<?php $this->generateHtmlFooter(); ?>
	</body>
</html>