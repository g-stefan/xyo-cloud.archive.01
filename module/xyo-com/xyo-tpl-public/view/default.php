<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/html; charset=utf-8"); 
echo "\xEF\xBB\xBF";
echo "<" . "?" . "xml version=\"1.0\" encoding=\"UTF-8\"" . "?" . ">\n";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <?php $this->generateHtmlHead(); ?>
    </head>
    <body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
		<div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#template-main-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <span class="navbar-brand">
				<span style="height:32px;width:auto;">
			            <img src="<?php echo $this->site; ?>media/sys/images/xyo-32.png" style="width:32px;height:32px;border: 0px;vertical-align: middle;margin-top: -7px;" alt="XYO" ></img>
        		    		<span style="font-family:arial;color:#0194FE;font-size:22px;font-weight:bold;margin-top: -1px;">&#160;CLOUD&#160;</span>
			    	</span>
                      </span>
	    	</div>
		<div class="collapse navbar-collapse" id="template-main-navbar-collapse">
			<?php $this->execModule("xyo-mod-sys-menu", array("group" => "xyo-desktop")); ?>			
		        <span class="nav navbar-nav navbar-right navbar-nav-span">
				<?php $this->execGroup("xyo-status"); ?>
			</span>			
		</div>
		</div>
	</nav>
        <div>
            <?php $this->generateComponentView(); ?>
        </div>
        <div style="border-top: 1px solid #DDD;padding-top: 2px;margin-top: 6px;">
            <div style="font-family:arial;color:#0194FE;font-size:10px;float:left;">
                &#160;&#160;<span style="font-family:arial;color:#00147D;">X</span><span style="font-family:arial;color:#0194FE;">Y</span><span style="font-family:arial;color:#90D0FC;">O</span>&#160;<span style="font-family:arial;color:#0194FE;">Cloud&#160;<?php $this->eLanguage("version"); ?>&#160;<?php echo $this->cloud->get("system_version"); ?></span>
            </div>
            <div style="font-family:arial;color:#0194FE;font-size:10px;float:right;"><?php echo $this->getFromLanguage("copyright"); ?>&#160;&copy;&#160;2014&#160;<a href="http://www.xyo.ro" style="text-decoration:none;"><span style="font-family:arial;color:#0194FE;">Grigore Stefan</span></a>&#160;&#160;</div>
            <div style="clear:both;"></div>
        </div>
	<?php $this->execModule("lib-mod-bootstrap-back-to-top"); ?>
        <?php $this->generateHtmlFooter(); ?>
    </body>
</html>
