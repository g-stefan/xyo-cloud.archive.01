<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

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

	this.initById=function(id){
		$("#"+id).select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true
		}).maximizeSelect2Height();
	};


	this.init=function(id){
		$(".xui-form-select").select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true
		}).maximizeSelect2Height();
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormSelect);

