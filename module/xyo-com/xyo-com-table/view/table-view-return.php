<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$request=$this->getRequestDirect();
if($this->hasRequestStack($request)){
	$request=$this->returnRequest($request);
	echo "<form name=\"fn_return\" method=\"POST\" action=\"".$this->requestUri($this->moduleFromRequestDirect($request))."\">";
	$this->eFormBuildRequest($request);
	echo "</form>";
	$this->ejsBegin();
	echo "function doReturn(){";
		echo "document.forms.fn_return.submit();";
		echo "return false;";
	echo "};";	
	$this->ejsEnd();
};
