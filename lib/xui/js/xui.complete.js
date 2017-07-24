/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI={};

(function(){

	var this_=this;

	this.getByClassName=function(el,className){
		var classNameList=className.split(" ");
		var i;
		var retV=[];
		var elList=el.getElementsByClassName(className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].classList){
				for(i=0;i<classNameList.length;++i){
					if(!elList[elIndex].classList.contains(classNameList[i])){
						break;
					};
				};
				if(i==classNameList.length){
					retV[retV.length]=elList[elIndex];
				};
			};
		};
		return retV;
	};

	this.getByClassNameAndAttribute=function(el,className,attribute){
		var retV=[];
		var elList=this.getByClassName(el,className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].getAttribute(attribute)){
				retV[retV.length]=elList[elIndex];
			};
		};
		return retV;
	};

	this.getByClassNameAndAttributeValue=function(el,className,attribute,attributeValue){
		var retV=[];
		var elList=this.getByClassName(el,className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].getAttribute(attribute)==attributeValue){
				retV[retV.length]=elList[elIndex];
			};
		};
		return retV;
	};

	this.getByClassNameFirst=function(el,className){
		var retV=[];
		var elList=this.getByClassName(el,className);
		if(elList.length>0){
			return elList[0];
		};
		return null;
	};

	this.getNextSiblingByClassName=function(el,className){
		var classNameList=className.split(" ");
		var i;
		for(var scan=el.nextSibling;scan;scan=scan.nextSibling){
			if(scan.classList){
				for(i=0;i<classNameList.length;++i){
					if(!scan.classList.contains(classNameList[i])){
						break;
					};
				};
				if(i==classNameList.length){
					return scan;
				};
			};
		};
		return null;
	};

	this.getOffsetX=function(el){	
		var clientRect = el.getBoundingClientRect();

		var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;
		var clientLeft = document.documentElement.clientLeft || document.body.clientLeft || 0;

		return Math.floor(clientRect.left + scrollLeft - clientLeft);
	};

	this.getOffsetY=function(el){	
		var clientRect = el.getBoundingClientRect();

		var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
		var clientTop = document.documentElement.clientTop || document.body.clientTop || 0;

		return Math.floor(clientRect.top + scrollTop - clientTop);
	};

	this.isChildOf=function(child, parent) {		
		var el = child.parentNode;
		while (el != null) {
			if (el == parent) {
				return true;
			};
			el = el.parentNode;
		};
		return false;
	};

	this.getCookie=function (name){
		var start,len,end;
		start=document.cookie.indexOf(name+"=");
		len=start+name.length+1;
		if((!start)&&(name!=document.cookie.substring(0,name.length))){
			return null;
		};
		if(start==-1){
			return null;
		};
		end=document.cookie.indexOf(";",len);
		if (end==-1){
			end=document.cookie.length;
		};
		return unescape(document.cookie.substring(len,end));
	};

	this.setCookie=function(name,value,expires,path,domain,secure){
		document.cookie=name+"="+escape(value)+
		((expires)?";expires="+expires.toGMTString():"")+
		((path)?";path="+path:"")+
		((domain)?";domain="+domain:"")+
		((secure)?";secure":"");
	};

	this.removeCookie=function(name,path,domain){
		if(this.getCookie(name)){
			document.cookie=name+"="+
			((path)?";path="+path:"")+
			((domain)?";domain="+domain:"")+
			";expires=Thu, 01-Jan-1970 00:00:01 GMT";
		};
	};

	this.init=function(){
		//
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	

}).apply(XUI);



XUI.Toggle={};

(function(){

	var this_=this;

	this.onClickTogleElementListClass=function(el,elList_,toggleClass){
		if(elList_.length){
			var classItems=toggleClass.split(",");
			if(classItems.length>1){
				var elList=elList_;
				el.addEventListener("click", function(event){
					var thisEl=this;
					if(this.getAttribute("toggle")=="parent"){
						thisEl=this.parentNode;
					};
					thisEl.classList.toggle("active");
					for(var elIndex in elList){
						if(elList[elIndex].classList.contains(classItems[0])){
							elList[elIndex].classList.remove(classItems[0]);
							elList[elIndex].classList.add(classItems[1]);
							continue;
						};
						if(elList[elIndex].classList.contains(classItems[1])){
							elList[elIndex].classList.remove(classItems[1]);
							elList[elIndex].classList.add(classItems[0]);
							continue;
						};
						elList[elIndex].classList.add(classItems[0]);						
					};
				});
				return;
			};
			var elList=elList_;
			el.addEventListener("click", function(event){
				var thisEl=this;
				if(this.getAttribute("toggle")=="parent"){
					thisEl=this.parentNode;
				};
				thisEl.classList.toggle("active");
				for(var elIndex in elList){
					elList[elIndex].classList.toggle(toggleClass);
				};
			});
			return;
		};
		var classItems=toggleClass.split(",");
		if(classItems.length>1){
			el.addEventListener("click", function(event){
				var thisEl=this;
				if(this.getAttribute("toggle")=="parent"){
					thisEl=this.parentNode;
				};
				if(thisEl.classList.contains(classItems[0])){
					thisEl.classList.remove(classItems[0]);
					thisEl.classList.add(classItems[1]);
					return;
				};
				if(thisEl.classList.contains(classItems[1])){
					thisEl.classList.remove(classItems[1]);
					thisEl.classList.add(classItems[0]);
					return;
				};
				thisEl.classList.add(classItems[0]);
			});
			return;
		};
		el.addEventListener("click", function(event){		
			var thisEl=this;
			if(this.getAttribute("toggle")=="parent"){
				thisEl=this.parentNode;
			};
			thisEl.classList.toggle(toggleClass);
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui toggle");
		for(var elIndex=0;elIndex<elList.length; ++elIndex){
			var toggleGroupValue=elList[elIndex].getAttribute("toggle-action");
			var toggleGroupClass=elList[elIndex].getAttribute("toggle-class");
			var toggleGroupList=elList[elIndex].getAttribute("toggle-group");
			if(toggleGroupList){
				if(!toggleGroupValue){
					continue;
				};
			};
			if(!toggleGroupClass){
				toggleGroupClass="on,off";
			};				
			var toggleGroupList=[];
			if(toggleGroupValue){
				var groupItems=toggleGroupValue.split(",");
				if(groupItems.length>1){
					for(groupItemsIndex=0;groupItemsIndex<groupItems.length;++groupItemsIndex){
						var list=XUI.getByClassNameAndAttributeValue(document,"xui toggle","toggle-group",groupItems[groupItemsIndex]);
						for(var k=0;k<list.length;++k){
							toggleGroupList[toggleGroupList.length]=list[k];
						};
					};
				}else{
					toggleGroupList=XUI.getByClassNameAndAttributeValue(document,"xui toggle","toggle-group",toggleGroupValue);
				};
			};
			
			this.onClickTogleElementListClass(elList[elIndex],toggleGroupList,toggleGroupClass);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Toggle);



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



XUI.EffectRipple={};

(function(){

	var this_=this;

	this.animationInterval=300;
	this.animationStep=20;
	this.animationIntervalOut=200;
	this.animationMinOpacity=0.1;
	this.animationMaxOpacity=1;

	this.outEffect=function(el,animationProcessOut){
		if(el.classList.contains("animation-active")){
			el.classList.remove("animation-active");
			el.classList.remove("animation-in");
			el.classList.add("animation-out");
			animationProcessOut();
			return;
		};
		if(el.classList.contains("animation-in")){
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

	this.prepareElement=function(parent,effectColor){
		var el=XUI.getByClassNameFirst(parent,"xui effect-ripple-element");			

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
			el.className = "xui effect-ripple-element";
			el.style.pointerEvents = "none";

			if(effectColor){
				el.className = "xui effect-ripple-element" + " background-" + effectColor;
			};

			parent.appendChild(el);
				
			var elSuper = document.createElement("div");
			elSuper.innerHTML = "";
			elSuper.className = "xui effect-ripple-element-super";
			parent.appendChild(elSuper);

			for(var k=0;k<childN.length;++k){
				elSuper.appendChild(childN[k]);
			};
        
			childN=null;

			this_.initElement(parent,el);
		};

		return el;
	};

	this.add=function(el,effectType,effectColor){
		var parent=el;

		this.prepareElement(parent,effectColor);

		parent.addEventListener("mousedown", function(event){

			var el=XUI.getByClassNameFirst(parent,"xui effect-ripple-element");

			if(!el){
				el=this_.prepareElement(parent);
			};
			
			if(el.classList.contains("animation-in")){
				return;
			};

			el.classList.remove("animation-out");	
			el.classList.remove("animation-dummy");	

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

			el.classList.add("animation-in");

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

				el.classList.add("animation-active");
			};

			animationProcessIn();			
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui effect-ripple");
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			var effectType=elList[elIndex].getAttribute("ripple");
			var effectColor=elList[elIndex].getAttribute("ripple-color");
			this_.add(elList[elIndex],effectType,effectColor);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	

}).apply(XUI.EffectRipple);



XUI.DashboardSizeX48={};

(function(){

	var this_=this;

	this.cookieOk=false;

	this.setCookie=function(value){
		if(value=="mini-open"){
			value="mini-closed";
		};
		if(value=="over-open"){
			value="over-closed";
		};
		XUI.setCookie("xui-dashboard-size-x48",value);		
	};

	this.processResponsive=function(state){

		var elList=XUI.getByClassName(document,"xui dashboard size-x48");
		for(var elIndex=0; elIndex<elList.length; ++elIndex){
			var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui navigation-drawer");
			if(elNavigation){
				if(state<600){
					elNavigation.classList.remove("normal");
					elNavigation.classList.remove("mini");
					elNavigation.classList.add("over");
					if(this.cookieOk){
						this.cookieUpdateMode("over");
					};
				};
				if((state>=600)&&(state<960)){
					elNavigation.classList.remove("over");
					elNavigation.classList.remove("normal");
					elNavigation.classList.add("mini");
					if(this.cookieOk){
						this.cookieUpdateMode("mini");
					};
				};
				if(state>=960){
					elNavigation.classList.remove("over");
					elNavigation.classList.remove("mini");
					elNavigation.classList.add("normal");
					if(this.cookieOk){
						this.cookieUpdateMode("normal");
					};
				};

				if(state<960){
                
					if(elNavigation.classList.contains("open")){
						elNavigation.classList.remove("open");
						elNavigation.classList.add("closed");
						if(this.cookieOk){
							this.cookieUpdateState("closed");
						};
					};

                              	};

				if(state>=1280){
					if(elNavigation.classList.contains("closed")){
						elNavigation.classList.remove("closed");
						elNavigation.classList.add("open");
						if(this.cookieOk){
							this.cookieUpdateState("open");
						};
					};
				}
			};

			var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui brand");
			if(elBrand){
				if(state<600){
					elBrand.classList.remove("normal");
					elBrand.classList.remove("mini");
					elBrand.classList.add("over");
				};
				if((state>=600)&&(state<960)){
					elBrand.classList.remove("normal");
					elBrand.classList.remove("over");
					elBrand.classList.add("mini");					
				};
				if(state>=960){
					elBrand.classList.remove("over");
					elBrand.classList.remove("mini");
					elBrand.classList.add("normal");
				};

				if(state<960){
                
					if(elBrand.classList.contains("open")){
						elBrand.classList.remove("open");
						elBrand.classList.add("closed");
					};

                              	};

				if(state>=1280){
					if(elBrand.classList.contains("closed")){
						elBrand.classList.remove("closed");
						elBrand.classList.add("open");
					};
				};

			};
			

		};

	}

	this.notifyResponsive=function(e){
		this_.processResponsive(e.detail.state,e.detail.last);
	}

	this.cookieUpdateState=function(newState){
		var cookieState=XUI.getCookie("xui-dashboard-size-x48");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=scan[0];
			state=newState;
			this.setCookie(mode+"-"+state);
		};		
	}

	this.cookieUpdateMode=function(newMode){
		var cookieState=XUI.getCookie("xui-dashboard-size-x48");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=newMode;
			state=scan[1];
			this.setCookie(mode+"-"+state);
		};		
	}

	this.toogleAction=function(){
		var el=XUI.getByClassNameFirst(document,"xui dashboard size-x48");
		if(el){
			var elNavigation=XUI.getByClassNameFirst(el,"xui navigation-drawer");
			if(elNavigation){
				var mode="";
				var state="";
				if(elNavigation.classList.contains("normal")){
					mode="normal";
				};
				if(elNavigation.classList.contains("mini")){
					mode="mini";
				};
				if(elNavigation.classList.contains("over")){
					mode="over";
				};
				if(elNavigation.classList.contains("open")){
					state="closed";
				};
				if(elNavigation.classList.contains("closed")){
					state="open";
				};
				this.setCookie(mode+"-"+state);
			};
		};
	}

	this.init=function(){
		this.cookieOk=false;
		XUI.Responsive.addProcessResponsive(this.processResponsive,this);
		var cookieState=XUI.getCookie("xui-dashboard-size-x48");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=scan[0];
			state=scan[1];
			var elList=XUI.getByClassName(document,"xui dashboard size-x48");
			for(var elIndex=0; elIndex<elList.length; ++elIndex){
				var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui navigation-drawer");
				if(elNavigation){
					if(mode=="normal"){
						if(elNavigation.classList.contains("over")){
							elNavigation.classList.remove("over");
							elNavigation.classList.add("normal");
						};
					};
					if(mode=="over"){
						if(elNavigation.classList.contains("normal")){
							elNavigation.classList.remove("normal");
							elNavigation.classList.add("over");
						};
					};
					if(state=="open"){
						if(elNavigation.classList.contains("closed")){
							elNavigation.classList.remove("closed");
							elNavigation.classList.add("open");
						};
					};	
					if(state=="closed"){
						if(elNavigation.classList.contains("open")){
							elNavigation.classList.remove("open");
							elNavigation.classList.add("closed");
						};
					};	
				};
				var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui brand");
				if(elBrand){
					if(mode=="normal"){
						if(elBrand.classList.contains("over")){
							elBrand.classList.remove("over");
							elBrand.classList.add("normal");
						};
					};
					if(mode=="over"){
						if(elBrand.classList.contains("normal")){
							elBrand.classList.remove("normal");
							elBrand.classList.add("over");
						};
					};
					if(state=="open"){
						if(elBrand.classList.contains("closed")){
							elBrand.classList.remove("closed");
							elBrand.classList.add("open");
						};
					};	
					if(state=="closed"){
						if(elBrand.classList.contains("open")){
							elBrand.classList.remove("open");
							elBrand.classList.add("closed");
						};
					};	
				};
			};
		}else{		
			var el=XUI.getByClassNameFirst(document,"xui dashboard size-x48");
			if(el){
				var elNavigation=XUI.getByClassNameFirst(el,"xui navigation-drawer");
				if(elNavigation){
					var mode="";
					var state="";
					if(elNavigation.classList.contains("normal")){
						mode="normal";
					};
					if(elNavigation.classList.contains("over")){
						mode="over";
					};
					if(elNavigation.classList.contains("open")){
						state="open";
					};
					if(elNavigation.classList.contains("closed")){
						state="closed";
					};
					this.setCookie(mode+"-"+state);
				};
			};
		};
		this.cookieOk=true;
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.DashboardSizeX48);

