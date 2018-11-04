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
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<script>

XUI.FormSelect={};

(function(){

	var this_=this;

	this.initById=function(id){
		var theme=$("#"+id).attr("data-xui-select-theme");
		if(!theme){
			theme="default";
		}else{
			theme="default "+theme;
		};
		$("#"+id).select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true,
			theme: theme
		}).maximizeSelect2Height();
	};

	this.init=function(id){
		$(".xui.form-select").each(function() {
			var theme=$(this).attr("data-xui-select-theme");
			if(!theme){
				theme="default";
			}else{
				theme="default "+theme;
			};
			$(this).select2({
				minimumResultsForSearch: Infinity,
				dropdownAutoWidth: true,
				theme: theme
			}).maximizeSelect2Height();
		});
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormSelect);


</script>
