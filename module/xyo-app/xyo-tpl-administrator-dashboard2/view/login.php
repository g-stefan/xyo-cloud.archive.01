<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/html; charset=utf-8"); 

$sidebarSmall="";
if(1*$this->getParameterRequest("sidebar-small",0)){
	$sidebarSmall=" sidebar-small";
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
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="template-navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand">
			            	<img src="<?php echo $this->site; ?>media/sys/images/xyo-32.png" alt="XYO" ></img>
		   			<span>&#160;CLOUD&#160;</span>
				</span>
		    	</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
		            <?php $this->generateApplicationView(); ?>
		</div>

        <div style="border-top: 1px solid #DDD;padding-top: 2px;margin-top: 6px;">
            <div style="font-family:arial;color:#0194FE;font-size:10px;float:left;">
                &#160;&#160;<span style="font-family:arial;color:#00147D;">X</span><span style="font-family:arial;color:#0194FE;">Y</span><span style="font-family:arial;color:#90D0FC;">O</span>&#160;<span style="font-family:arial;color:#0194FE;">Cloud&#160;<?php $this->eLanguage("version"); ?>&#160;<?php echo $this->cloud->get("version"); ?></span>
            </div>
            <div style="font-family:arial;color:#0194FE;font-size:10px;float:right;"><?php echo $this->getFromLanguage("copyright"); ?>&#160;&copy;&#160;2014&#160;<a href="http://www.xyo.ro" style="text-decoration:none;"><span style="font-family:arial;color:#0194FE;">Grigore Stefan</span></a>&#160;&#160;</div>
            <div class="clearfix"></div>
        </div>	

	</div>
	<?php $this->execModule("lib-bootstrap-back-to-top"); ?>
	<?php $this->eHtmlScript(); ?>
    </body>
</html>
