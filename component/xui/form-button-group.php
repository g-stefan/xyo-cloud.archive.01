<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$state = $this->getParameter("state_" . $element);
$class = array();
$disabled = array();

foreach($state as $type=>$list){
	$disabled[$type]="";
	$class[$type]="";
	foreach($list as $value){
		if($value=="disabled"){
			$disabled[$type]="disabled";
		};
		if($value=="primary"){
			$class[$type]="primary";
		};
	};
};

?>

<div class="xui-form-button-group">
	<?php foreach($state as $type=>$list){ ?>
	<button class="xui-form-button xui-form-button--<?php echo $class[$type]; ?>" <?php echo $disabled[$type]; ?> ><?php $this->eLanguage("state_".$type."_" . $element);?></button>
	<?php }; ?>
</div>

