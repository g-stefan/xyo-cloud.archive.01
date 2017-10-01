/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Dashboard={};

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
		XUI.setCookie("xui-dashboard",value);		
	};

	this.processResponsive=function(state){

		var elList=XUI.getByClassName(document,"xui-dashboard");
		for(var elIndex=0; elIndex<elList.length; ++elIndex){
			var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui-navigation-drawer");
			if(elNavigation){
				if(state<600){
					elNavigation.classList.remove("xui-navigation-drawer_normal");
					elNavigation.classList.remove("xui-navigation-drawer_mini");
					elNavigation.classList.add("xui-navigation-drawer_over");
					if(this.cookieOk){
						this.cookieUpdateMode("over");
					};
				};
				if((state>=600)&&(state<960)){
					elNavigation.classList.remove("xui-navigation-drawer_over");
					elNavigation.classList.remove("xui-navigation-drawer_normal");
					elNavigation.classList.add("xui-navigation-drawer_mini");
					if(this.cookieOk){
						this.cookieUpdateMode("mini");
					};
				};
				if(state>=960){
					elNavigation.classList.remove("xui-navigation-drawer_over");
					elNavigation.classList.remove("xui-navigation-drawer_mini");
					elNavigation.classList.add("xui-navigation-drawer_normal");
					if(this.cookieOk){
						this.cookieUpdateMode("normal");
					};
				};

				if(state<960){
                
					if(elNavigation.classList.contains("xui-navigation-drawer_open")){
						elNavigation.classList.remove("xui-navigation-drawer_open");
						elNavigation.classList.add("xui-navigation-drawer_closed");
						if(this.cookieOk){
							this.cookieUpdateState("closed");
						};
					};

                              	};

				if(state>=1280){
					if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
						elNavigation.classList.remove("xui-navigation-drawer_closed");
						elNavigation.classList.add("xui-navigation-drawer_open");
						if(this.cookieOk){
							this.cookieUpdateState("open");
						};
					};
				}
			};

			var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui-brand");
			if(elBrand){
				if(state<600){
					elBrand.classList.remove("xui-brand_normal");
					elBrand.classList.remove("xui-brand_mini");
					elBrand.classList.add("xui-brand_over");
				};
				if((state>=600)&&(state<960)){
					elBrand.classList.remove("xui-brand_normal");
					elBrand.classList.remove("xui-brand_over");
					elBrand.classList.add("xui-brand_mini");					
				};
				if(state>=960){
					elBrand.classList.remove("xui-brand_over");
					elBrand.classList.remove("xui-brand_mini");
					elBrand.classList.add("xui-brand_normal");
				};

				if(state<960){
                
					if(elBrand.classList.contains("xui-brand_open")){
						elBrand.classList.remove("xui-brand_open");
						elBrand.classList.add("xui-brand_closed");
					};

                              	};

				if(state>=1280){
					if(elBrand.classList.contains("xui-brand_closed")){
						elBrand.classList.remove("xui-brand_closed");
						elBrand.classList.add("xui-brand_open");
					};
				};

			};
			

		};

	}

	this.notifyResponsive=function(e){
		this_.processResponsive(e.detail.state,e.detail.last);
	}

	this.cookieUpdateState=function(newState){
		var cookieState=XUI.getCookie("xui-dashboard");
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
		var cookieState=XUI.getCookie("xui-dashboard");
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
		var el=XUI.getByClassNameFirst(document,"xui-dashboard");
		if(el){
			var elNavigation=XUI.getByClassNameFirst(el,"xui-navigation-drawer");
			if(elNavigation){
				var mode="";
				var state="";
				if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
					mode="normal";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_mini")){
					mode="mini";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_over")){
					mode="over";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_open")){
					state="closed";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
					state="open";
				};
				this.setCookie(mode+"-"+state);
			};
		};
	}

	this.init=function(){
		this.cookieOk=false;
		XUI.Responsive.addProcessResponsive(this.processResponsive,this);
		var cookieState=XUI.getCookie("xui-dashboard");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=scan[0];
			state=scan[1];
			var elList=XUI.getByClassName(document,"xui-dashboard");
			for(var elIndex=0; elIndex<elList.length; ++elIndex){
				var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui-navigation-drawer");
				if(elNavigation){
					if(mode=="normal"){
						if(elNavigation.classList.contains("xui-navigation-drawer_over")){
							elNavigation.classList.remove("xui-navigation-drawer_over");
							elNavigation.classList.add("xui-navigation-drawer_normal");
						};
					};
					if(mode=="over"){
						if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
							elNavigation.classList.remove("xui-navigation-drawer_normal");
							elNavigation.classList.add("xui-navigation-drawer_over");
						};
					};
					if(state=="open"){
						if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
							elNavigation.classList.remove("xui-navigation-drawer_closed");
							elNavigation.classList.add("xui-navigation-drawer_open");
						};
					};	
					if(state=="closed"){
						if(elNavigation.classList.contains("xui-navigation-drawer_open")){
							elNavigation.classList.remove("xui-navigation-drawer_open");
							elNavigation.classList.add("xui-navigation-drawer_closed");
						};
					};	
				};
				var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui-brand");
				if(elBrand){
					if(mode=="normal"){
						if(elBrand.classList.contains("xui-brand_over")){
							elBrand.classList.remove("xui-brand_over");
							elBrand.classList.add("xui-brand_normal");
						};
					};
					if(mode=="over"){
						if(elBrand.classList.contains("xui-brand_normal")){
							elBrand.classList.remove("xui-brand_normal");
							elBrand.classList.add("xui-brand_over");
						};
					};
					if(state=="open"){
						if(elBrand.classList.contains("xui-brand_closed")){
							elBrand.classList.remove("xui-brand_closed");
							elBrand.classList.add("xui-brand_open");
						};
					};	
					if(state=="closed"){
						if(elBrand.classList.contains("xui-brand_open")){
							elBrand.classList.remove("xui-brand_open");
							elBrand.classList.add("xui-brand_closed");
						};
					};	
				};
			};
		}else{		
			var el=XUI.getByClassNameFirst(document,"xui-dashboard");
			if(el){
				var elNavigation=XUI.getByClassNameFirst(el,"xui-navigation-drawer");
				if(elNavigation){
					var mode="";
					var state="";
					if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
						mode="normal";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_over")){
						mode="over";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_open")){
						state="open";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
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

}).apply(XUI.Dashboard);

