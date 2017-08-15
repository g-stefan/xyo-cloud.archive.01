<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/plain");

?>
/*
//
//
//
*/

XUI.FormSelect={};

(function(){

	var this_=this;

	/* --- */

	this.init=function(){
		$(".xui-form-select").select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true
		});
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormSelect);

