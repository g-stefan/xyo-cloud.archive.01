<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?><!DOCTYPE html>
<html<?php $this->eHtmlLanguage(); $this->eHtmlClass();?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php $this->eHtmlTitle(); ?>
		<?php $this->eHtmlDescription(); ?>
		<?php $this->eHtmlCss(); ?>
		<style>
		.xui-panel__title{
			background-color: #EEEEEE !important;
		}
		</style>
	</head>
    <body<?php $this->eHtmlBodyClass(); ?>>

	<?php
	$this->generateComponent("xui.box-x-900-begin",array("top-space"=>1));
	$this->generateComponent("xui.panel2-begin");
	?>
	
	            <img src="<?php echo $this->site; ?>lib/xyo/images/xyo-32.png" style="width:32px;height:32px;border: 0px;vertical-align: middle;" alt="XYO" ></img>
        	    <span style="font-family:arial;color:#0194FE;font-size:22px;font-weight:bold;vertical-align: middle;">&#160;CLOUD&#160;</span>
	            <span class="xui_right" style="font-family:arial;color:#0194FE;font-size:11px;padding-top:16px;padding-bottom:0px;margin-bottom:0px;overflow:hidden;height:32px;box-sizing: border-box;">
        	        <?php echo $this->cloud->get("xyo_cloud_version"); ?>
	            </span>

        <?php

	$this->generateComponent("xui.panel2-content");
	$this->generateApplicationView();
	$this->generateComponent("xui.panel2-footer");

	?>
        	    <span class="xui_right" style="font-family:arial;color:#0194FE;font-size:11px;"><?php echo $this->getFromLanguage("copyright"); ?>&#160;&copy;&#160;2018&#160;<a href="http://www.xyo.ro" style="text-decoration:none;"><span style="font-family:arial;color:#0194FE;">Grigore Stefan</span></a></span>

	<?php

	$this->generateComponent("xui.panel2-end");
	$this->generateComponent("xui.box-x-900-end");

	?>


        <?php $this->eHtmlScript(); ?>
    </body>
</html>