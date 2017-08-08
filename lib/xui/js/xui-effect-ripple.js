/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.EffectRipple={};

(function(){

	var this_=this;

	this.animationInterval=300;
	this.animationStep=20;
	this.animationIntervalOut=200;
	this.animationMinOpacity=0.1;
	this.animationMaxOpacity=1;

	this.outEffect=function(el,animationProcessOut){
		if(el.classList.contains("xui-effect-ripple--animation-active")){
			el.classList.remove("xui-effect-ripple--animation-active");
			el.classList.remove("xui-effect-ripple--animation-in");
			el.classList.add("xui-effect-ripple--animation-out");
			animationProcessOut();
			return;
		};
		if(el.classList.contains("xui-effect-ripple--animation-in")){
			setTimeout(function(){
				this_.outEffect(el,animationProcessOut);
			},Math.floor(this_.animationInterval/2));
		};
	};

	this.initElement=function(parent,el){
		var frameAnimationOut=0;
		var opacityOutEl=this_.animationMaxOpacity;
		var opacityOutElDelta=((0.0-this_.animationMaxOpacity)*this_.animationStep)/this_.animationIntervalOut;
		var animationProcessOut=function(){
			frameAnimationOut+=this_.animationStep;

			opacityOutEl+=opacityOutElDelta;

			el.style.opacity=opacityOutEl;
	
			if(frameAnimationOut<this_.animationIntervalOut){
				setTimeout(animationProcessOut,this_.animationStep);
				return;
			};

			// reset
			frameAnimationOut=0;
			opacityOutEl=this_.animationMaxOpacity;
			el.style.opacity=0.0;
		};

		parent.addEventListener("mouseup", function(event){			
			this_.outEffect(el,animationProcessOut);
		});

		parent.addEventListener("mouseleave", function(event){
			this_.outEffect(el,animationProcessOut);
		});

	};

	this.prepareElement=function(parent,effectColor,effectColorClass){
		var el=XUI.getByClassNameFirst(parent,"xui-effect-ripple__element");

		if(!el){
			var childN=[];
			for(var k=0;k<parent.childNodes.length;++k){
				childN[k]=parent.childNodes[k];
			};
			while (parent.firstChild) {
				parent.removeChild(parent.firstChild);
			};
                
			var el = document.createElement("div");
			el.innerHTML = "";
			el.className = "xui-effect-ripple__element";
			el.style.pointerEvents = "none";
	
			if(effectColor){
				el.style.backgroundColor=effectColor;
			};

			if(effectColorClass){
				el.className = "xui-effect-ripple__element " + effectColorClass;
			};

			parent.appendChild(el);
				
			var elSuper = document.createElement("div");
			elSuper.innerHTML = "";
			elSuper.className = "xui-effect-ripple__super";
			parent.appendChild(elSuper);

			for(var k=0;k<childN.length;++k){
				elSuper.appendChild(childN[k]);
			};
        
			childN=null;

			this_.initElement(parent,el);
		};

		return el;
	};

	this.add=function(el,effectType,effectColor,effectColorClass){
		var parent=el;

		this.prepareElement(parent,effectColor,effectColorClass);

		parent.addEventListener("mousedown", function(event){

			var el=XUI.getByClassNameFirst(parent,"xui-effect-ripple__element");

			if(!el){
				el=this_.prepareElement(parent);
			};
			
			if(el.classList.contains("xui-effect-ripple--animation-in")){
				return;
			};

			el.classList.remove("xui-effect-ripple--animation-out");	
			el.classList.remove("xui-effect-ripple--animation-dummy");	

			var sizeParent = Math.max(parent.offsetWidth, parent.offsetHeight);
			var sizeElInitial = 6;

			var elLeftX;
			var elLeftY;

			if(effectType=="center"){
				elLeftX=parent.clientWidth/2;
				elLeftY=parent.clientHeight/2;
			}else{
				elLeftX=event.pageX-XUI.getOffsetX(parent);
				elLeftY=event.pageY-XUI.getOffsetY(parent);
			};

			el.style.height=sizeElInitial+"px";
			el.style.width=sizeElInitial+"px";	
			el.style.left=elLeftX-(sizeElInitial/2)+"px";
			el.style.top=elLeftY-(sizeElInitial/2)+"px";

			el.classList.add("xui-effect-ripple--animation-in");

			var frameAnimation=0;
			var sizeEl=sizeElInitial;
			var sizeElDelta=(3*((sizeParent-sizeElInitial)*this_.animationStep))/this_.animationInterval;
			var opacityEl=this_.animationMinOpacity;
			var opacityElDelta=((this_.animationMaxOpacity-this_.animationMinOpacity)*this_.animationStep)/this_.animationInterval;
			
			var animationProcessIn=function(){
				frameAnimation+=this_.animationStep;

				sizeEl+=sizeElDelta;
				opacityEl+=opacityElDelta;

				el.style.opacity=opacityEl;

				el.style.height=Math.floor(sizeEl)+"px";
				el.style.width=Math.floor(sizeEl)+"px";
				el.style.left=Math.floor(elLeftX-(sizeEl/2))+"px";
				el.style.top=Math.floor(elLeftY-(sizeEl/2))+"px";
	
				if(frameAnimation<this_.animationInterval){
					setTimeout(animationProcessIn,this_.animationStep);
					return;
				};

				el.classList.add("xui-effect-ripple--animation-active");
			};

			animationProcessIn();			
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui-effect-ripple");
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			var effectType=elList[elIndex].getAttribute("data-xui-ripple");
			var effectColor=elList[elIndex].getAttribute("data-xui-ripple-color");
			var effectColorClass=elList[elIndex].getAttribute("data-xui-ripple-color-class");
			this_.add(elList[elIndex],effectType,effectColor,effectColorClass);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	

}).apply(XUI.EffectRipple);

