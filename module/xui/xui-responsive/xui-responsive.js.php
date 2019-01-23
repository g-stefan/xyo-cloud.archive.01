<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<script>

XUI.Responsive={};

(function(){

	var this_=this;

	this.initOk=false;
	this.processResponsiveList=[];

	this.currentState=0;
	this.lastState=0;

	this.init=function(){

		this.initOk=true;
				
		this.elResponsive = document.createElement("div");
		this.elResponsive.innerHTML = "";
		this.elResponsive.className = "xui responsive";
		this.elResponsive.id = "xui-responsive";
		this.elResponsive.style.pointerEvents = "none";
		this.elResponsive.style.display = "none";

		document.body.appendChild(this.elResponsive);

		this.elResponsiveAfter = window.getComputedStyle ? window.getComputedStyle(this.elResponsive, ":after") : null;
		this.currentState = 0;
		this.lastState = 0;

		this.processEvent = function(){
			this_.currentState = parseInt(("" + this_.elResponsiveAfter.getPropertyValue("content")).replace(/["']/g, ""));
			if(this_.lastState == this_.currentState){
				return;
			};
			for(var k=0;k<this_.processResponsiveList.length;++k){
				this_.processResponsiveList[k][0].call(this_.processResponsiveList[k][1],this_.currentState,this_.lastState);
			};
			this_.lastState = this_.currentState;
		}

		if(this.elResponsiveAfter){
			window.addEventListener("load", this_.processEvent);
			window.addEventListener("resize", this_.processEvent);
			window.addEventListener("orientationchange", this_.processEvent);
			this_.processEvent();
		};
	};

	this.addProcessResponsive=function(processResponsive,processResponsiveThis){
		this.processResponsiveList[this.processResponsiveList.length]=[processResponsive,processResponsiveThis];
		if(this.initOk){
			processResponsive.call(processResponsiveThis,1*this.currentState,1*this.lastState);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);		
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Responsive);

</script>

<?php $this->includeJS("xui-responsive","xui-responsive-element"); ?>
