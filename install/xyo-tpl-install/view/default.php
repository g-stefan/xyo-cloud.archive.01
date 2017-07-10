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
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php $this->eHtmlTitle(); ?>
		<?php $this->eHtmlDescription(); ?>
		<?php $this->eHtmlCss(); ?>
	</head>
    <body>
	<div style="margin-top: 9px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-9 col-md-9 col-sm-12">
	
	<div class="panel panel-default">
		<div class="panel-heading">
	            <img src="<?php echo $this->site; ?>media/sys/images/xyo-32.png" style="width:32px;height:32px;border: 0px;vertical-align: middle;" alt="XYO" ></img>
        	    <span style="font-family:arial;color:#0194FE;font-size:22px;font-weight:bold;vertical-align: middle;">&#160;CLOUD&#160;</span>
	            <span class="pull-right" style="font-family:arial;color:#0194FE;font-size:11px;margin-top:18px;">
        	        <?php echo $this->cloud->get("version"); ?>
	            </span>
		</div>
		<div class="panel-body">
        		<?php $this->generateApplicationView(); ?>
		</div>
		<div class="panel-footer">
        	    <span class="pull-right" style="font-family:arial;color:#0194FE;font-size:11px;"><?php echo $this->getFromLanguage("copyright"); ?>&#160;&copy;&#160;2014&#160;<a href="http://www.xyo.ro" style="text-decoration:none;"><span style="font-family:arial;color:#0194FE;">Grigore Stefan</span></a></span>
		    <div class="clearfix" />
	        </div>
	</div>
	
        				</div>
				<div class="col-lg-1 col-md-1"></div>
			</div>	
		</div>
	</div>
        <?php $this->eHtmlScript(); ?>
    </body>
</html>