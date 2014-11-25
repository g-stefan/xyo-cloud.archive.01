<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');


	        $img = $this->applicationIcon;
        	if ($img) {
			if(strncmp($img,"#",1)==0){
				// icon
			        $img = substr($img,1);
				$img = "<i class=\"".$img." application-icon\"></i>";
			}else{
		            $img = "<img src=\"".$img."\" class=\"application-img\"></img>";
			};
	        } else {
        	    $img = "<img src=\"media/sys/images/applications-system-48.png\" class=\"application-img\"></img>";
	        };

?>
<div class="application">
	<div class="row-fluid">
	<div class="span12">
		<?php echo $img; ?>
		<span class="application-title">		
		<?php echo $this->applicationTitle; ?>
		</span>
		<span class="pull-right">
<?php
           $this->execModule("xyo-mod-toolbar", array_merge(array(
                        "module" => $this->name,
                        "config" => $this->getParameter("toolbar", "toolbar/default")
                            ), $this->toolbarParameter)
            );

?>		
		</span>
	</div>
	</div>
	<div class="clearfix"></div>
<?php
	if ($this->isMessage("info")) {
    		$this->generateView("message/info");
	}
	if ($this->isError("error")) {
		$this->generateView("message/error");
	}
	echo "<div class=\"clearfix\"></div>";
	$this->generateCurrentView();

?>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
