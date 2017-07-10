<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$view = $this->getView();

$panel = array(
	array("id"=>1,"key"=>"welcome","text"=>$this->getFromLanguage("panel_welcome"),"selected"=>false),
	array("id"=>2,"key"=>"package","text"=>$this->getFromLanguage("panel_package"),"selected"=>false),
	array("id"=>3,"key"=>"require","text"=>$this->getFromLanguage("panel_require"),"selected"=>false),
	array("id"=>3,"key"=>"licence","text"=>$this->getFromLanguage("panel_licence"),"selected"=>false),
	array("id"=>4,"key"=>"install","text"=>$this->getFromLanguage("panel_install"),"selected"=>false)	
);

foreach ($panel as $key => &$value) {
    if ($value["key"] === $view) {
        $value["selected"] = true;
    }
};
?>

		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-9 col-md-9 col-sm-12">


	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $this->eLanguage("alt_install"); ?>
                </div>
		<div class="panel-body">


<div class="containter">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<?php $this->execModule("xyo-mod-panel2", $panel); ?>

			<img class="hidden-xs" src="<?php echo $this->site; ?>media/sys/images/system-installer-128.png"
			  style="width:128px;height:128px;display:block;margin-left:auto;margin-right:auto;margin-top:0px;"
			  alt="<?php $this->eLanguage("alt_install"); ?>" />

		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php $this->generateCurrentView(); ?>
		</div>
	</div>
</div>


		</div>
	</div>



        				</div>
				<div class="col-lg-1 col-md-1"></div>
			</div>	
		</div>
	


	<div class="clearfix"></div>

