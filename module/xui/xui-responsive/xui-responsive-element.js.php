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

XUI.Responsive.Element={};

(function(){

	var this_=this;

	this.elements={};
	this.elementsState=[];
	this.elementSuffix="_responsive-iframe";

	this.add=function(elementId,fnNotify){
		var elResponsive=document.getElementById(elementId+this.elementSuffix);
		if(!elResponsive){
			var element=document.getElementById(elementId);
			if(element){
				elResponsive=document.createElement("iframe");
				elResponsive.id=elementId+this.elementSuffix;
				elResponsive.style.position="absolute";
				elResponsive.style.top="0px";
				elResponsive.style.left="0px";
				elResponsive.style.width="100%";
				elResponsive.style.height="0px";
				elResponsive.style.opacity="0";
				elResponsive.style.zIndex=-1000;
				elResponsive.style.pointerEvents="none";
				elResponsive.style.display="block";
				elResponsive.style.border="0px";

				element.appendChild(elResponsive);
				if(!Array.isArray(this.elements[elementId])){
					this.elements[elementId]=[];
				};
				this.elements[elementId].push(fnNotify);

				this.processEvent=function(){
					var state=elResponsive.offsetWidth;
					if(this_.elementsState[elementId]!=state){
						this_.elementsState[elementId]=state;
						for(var k=0;k<this_.elements[elementId].length;++k){
							if(this_.elements[elementId][k]){
								this_.elements[elementId][k].call(undefined,state);
							};
						};
					};
				};
								
				var elWindow=elResponsive.contentWindow;
				if(elWindow!=null){
					elWindow.addEventListener("resize", this.processEvent);
					this.processEvent();
					return true;
				};
			};
			return false;
		};
		this.elements[elementId].push(fnNotify);
		if(fnNotify){
			fnNotify.call(undefined,elResponsive.offsetWidth);
		};
		return true;
	};

	this.remove=function(elementId,fnNotify){
		if(!Array.isArray(this.elements[elementId])){
			return false;
		};
		if(fnNotify===null){
			this.elements[elementId]=[];
		}else{
			for(var k=0;k<this.elements[elementId].length;++k){
				if(this.elements[elementId][k]===fnNotify){
					delete this.elements[elementId][k];				
				};
			};
		};
		if(this.elements[elementId].length==0){
			delete this.elements[elementId];
			delete this.elementsState[elementId];
			var elResponsive=document.getElementById(elementId+this.elementSuffix);
			if(elResponsive){
				elResponsive.parentElement.removeChild(elem);
			};
		};
	};

	this.linkContainer=function(responsiveId,superId,containerId,classList){
		var elSuper=document.getElementById(superId);
		var elContainer=document.getElementById(containerId);
		var processing=false;
		var checkState=0;
		var lastState=0;
		var memoryState={};

		var processEvent=function(){
			var childrenState=0;
			var ln=elContainer.children.length;
			if(ln>0){
				for(var k=0;k<ln;++k){
					childrenState+=elContainer.children[k].offsetWidth;
					if(elContainer.children[k].offsetTop!=0){
						if(elContainer.children[k].offsetWidth==0){
							continue;
						};
						childrenState=checkState+1;
						break;
					};
				};
			};
			var currentClass="";
			var nextClass=classList[classList.length-1];
			if(elSuper.classList){
				for(var k=0;k<classList.length;++k){
					if(elSuper.classList.contains(classList[k])){
						currentClass=classList[k];
						if(childrenState>checkState){
							lastState=checkState;							
							if(k-1>0){
								nextClass=classList[k-1];
							}else{
								nextClass=classList[0];
							};
							break;
						};
						if(checkState>lastState){
							lastState=checkState;							
							if(k+1<classList.length){
								nextClass=classList[k+1];
							}else{
								nextClass=classList[classList.length-1];
							};
							if(memoryState[nextClass]>checkState){
								nextClass=currentClass;									
							};
							break;	
						};
						memoryState[currentClass]=checkState;
						nextClass=currentClass;
						break;	
					};
				};
				if(currentClass==nextClass){
					processing=false;
					return;
				};
				if(currentClass.length>0){
					elSuper.classList.remove(currentClass);
				};
				if(nextClass.length>0){
					elSuper.classList.add(nextClass);
				};
				setTimeout(processEvent,100);
				return;
			};
			processing=false;
		};

		XUI.Responsive.Element.add(responsiveId,function(state){
			checkState=state;
			if(processing){
				return;
			};
			processing=true;
			setTimeout(processEvent,100);
		});
	};

}).apply(XUI.Responsive.Element);

</script>
