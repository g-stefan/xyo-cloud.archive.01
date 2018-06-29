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

XUI.FormFile={};

(function(){

	var this_=this;

	this.init=function(){

		$(".xui-form-file__file").each(function(){
									
			var el=$(this);
			var elLabel=el.next("label");
			var elLabelOriginal=elLabel.html();

			el.on("change", function(e){		
				var fileName="";
				if(e.target.value){
					fileName=e.target.value;
					if(fileName.indexOf("\\")>=0){
						fileName = e.target.value.split("\\").pop();
					}else
					if(fileName.indexOf("/")>=0){
						fileName = e.target.value.split("/").pop();
					};
				};

				if(fileName.length>0){
					elLabel.html("<i class=\"material-icons\">file_upload</i>"+fileName);
				}else{
					elLabel.html(elLabelOriginal);
				};
			});

			el.on("focus",function(){
				el.addClass("xui-form-file__file_focus");
			});

			el.on("blur",function(){
				el.removeClass("xui-form-file__file_focus");
			});
		});

	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormFile);

