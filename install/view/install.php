<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("datasource-init");

$selectDatasource = $this->getParameter("select_datasource", array());
$allOk = true;
foreach ($selectDatasource as $key => $value) {
	if ($value == "yes") {
		continue;
	};
	$allOk = false;
	break;
};			

$this->generateComponent("xui.form-action-begin");

echo "<div class=\"xui_right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"default",
	"try"=>$allOk?"disabled":"default",
	"next"=>$allOk?"primary":"disabled"
)));
echo "</div>";
echo "<div class=\"xui-separator\"></div>";
echo "<br />";

if($allOk){
	$this->generateViewLanguage("msg-install-ok");
}else{
	if ($this->isError()) {
		$this->generateView("msg-error");
	}

?>
	<ul class="list-group">
<?php

		foreach ($listDatasource as $key => $value) {
			if ($value == "yes") {
				continue;
			};
			echo "<li class=\"list-group-item list-group-item-danger\">";
                        echo $key;
			echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
                        echo "</li>";
		};

?>
	</ul>
<?php }; ?>

<?php
                    $this->eFormRequest(array(
                        "back" => "datasource",
                        "this" => "install",
                        "next" => "settings",
                        "website_language" => $this->getSystemLanguage()
                    ));

$this->generateComponent("xui.form-action-end");
