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

XUI.FormFile={};

(function(){

	var this_=this;

	this.init=function(){

		var elList=XUI.getByClassName(document,"xui form-file_file");
		for($k=0;$k<elList.length;++$k){
			var el=elList[$k];
			var elLabel=el.nextElementSibling;
			var elButton=elLabel.nextElementSibling;
			var elLabelSpanList=elLabel.getElementsByTagName("span");
			var elLabelSpanTextOriginal="";
			var elLabelSpan=null;

			if(elLabelSpanList.length>0){
				elLabelSpan=elLabelSpanList[0];
				elLabelSpanTextOriginal=elLabelSpan.innerHTML;
			};				

			el.addEventListener("change", function(e){
				if(elLabelSpan){
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
						if(elLabelSpan.innerHTML!=fileName){
							elLabelSpan.innerHTML=fileName;
						};
					}else{
						if(elLabelSpan.innerHTML!=elLabelSpanTextOriginal){
							elLabelSpan.innerHTML=elLabelSpanTextOriginal;
						};
					};
				};
			});

			el.addEventListener("focus", function(){
				if(!el.classList.contains("form-file_file-focus")){
					el.classList.add("form-file_file-focus");
				};
			});

			el.addEventListener("blur", function(){
				if(el.classList.contains("form-file_file-focus")){
					el.classList.remove("form-file_file-focus");
				};
			});

			elButton.addEventListener("click", function(){
				el.value=null;
				XUI.triggerEvent(el,"change");
				return false;
			});
			
		};

	};	

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormFile);

</script>
