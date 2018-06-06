/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Dashboard={};

(function(){

	var this_=this;

	this.getDefaultState=function(){
		return {
			mode:"normal",
			state:"open"
		};
	};

	this.getState=function(){
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
					state="open";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
					state="closed";
				};
				return {
					mode:mode,
					state:state
				};
			};
		};
		return this.getDefaultState();
	};

	this.setState=function(state){
		var el=XUI.getByClassNameFirst(document,"xui-dashboard");
		if(el){
			var elNavigation=XUI.getByClassNameFirst(el,"xui-navigation-drawer");
			if(elNavigation){
				switch(state.mode){
					case "normal":
						if(!elNavigation.classList.contains("xui-navigation-drawer_normal")){
							elNavigation.classList.remove("xui-navigation-drawer_mini");
							elNavigation.classList.remove("xui-navigation-drawer_over");
							elNavigation.classList.add("xui-navigation-drawer_normal");
						};
					break;
					case "mini":
						if(!elNavigation.classList.contains("xui-navigation-drawer_mini")){
							elNavigation.classList.remove("xui-navigation-drawer_normal");
							elNavigation.classList.remove("xui-navigation-drawer_over");
							elNavigation.classList.add("xui-navigation-drawer_mini");
						};
					break;
					case "over":
						if(!elNavigation.classList.contains("xui-navigation-drawer_over")){
							elNavigation.classList.remove("xui-navigation-drawer_normal");
							elNavigation.classList.remove("xui-navigation-drawer_mini");
							elNavigation.classList.add("xui-navigation-drawer_over");
						};
					break;
					default:
						break;
				};
				switch(state.state){
					case "open":
						if(!elNavigation.classList.contains("xui-navigation-drawer_open")){
							elNavigation.classList.remove("xui-navigation-drawer_closed");
							elNavigation.classList.add("xui-navigation-drawer_open");
						};
					break;
					case "closed":
						if(!elNavigation.classList.contains("xui-navigation-drawer_closed")){
							elNavigation.classList.remove("xui-navigation-drawer_open");
							elNavigation.classList.add("xui-navigation-drawer_closed");
						};
					break;
					default:
						break;
				};
			};
			var elBrand=XUI.getByClassNameFirst(el,"xui-brand");
			if(elBrand){
				switch(state.mode){
					case "normal":
						if(!elBrand.classList.contains("xui-brand_normal")){
							elBrand.classList.remove("xui-brand_mini");
							elBrand.classList.remove("xui-brand_over");
							elBrand.classList.add("xui-brand_normal");
						};
					break;
					case "mini":
						if(!elBrand.classList.contains("xui-brand_mini")){
							elBrand.classList.remove("xui-brand_normal");
							elBrand.classList.remove("xui-brand_over");
							elBrand.classList.add("xui-brand_mini");
						};
					break;
					case "over":
						if(!elBrand.classList.contains("xui-brand_over")){
							elBrand.classList.remove("xui-brand_normal");
							elBrand.classList.remove("xui-brand_mini");
							elBrand.classList.add("xui-brand_over");
						};
					break;
					default:
						break;
				};
				switch(state.state){
					case "open":
						if(!elBrand.classList.contains("xui-brand_open")){
							elBrand.classList.remove("xui-brand_closed");
							elBrand.classList.add("xui-brand_open");
						};
					break;
					case "closed":
						if(!elBrand.classList.contains("xui-brand_closed")){
							elBrand.classList.remove("xui-brand_open");
							elBrand.classList.add("xui-brand_closed");
						};
					break;
					default:
						break;
				};
			};
		};
	};

	this.setCookie=function(state,isUser){
		XUI.setCookie("xui-dashboard",state.mode+"-"+state.state);
		if(isUser){
			XUI.setCookie("xui-dashboard-user",state.mode+"-"+state.state);
		};
	};

	this.getCookie=function(isUser){
		var state=XUI.getCookie("xui-dashboard");
		if(isUser){
			state=XUI.getCookie("xui-dashboard-user");
		};
		var scan=state.split("-");
		if(scan.length<2){
			return this.getDefaultState();
		};
		return {
			mode:scan[0],
			state:scan[1]
		};
	};

	this.setNextState=function(state,isUser){
		if(!isUser){
			var userState=this.getCookie(true);		
			if(state.mode=="normal"){
				state.state=userState.state;
			};
		};
		this.setCookie(state,isUser);
		if(!isUser){
			this.setState(state);
		};
	};

	this.processResponsive=function(state){
		var nextState=this.getDefaultState();
		if(state<600){
			nextState.mode="over";
			nextState.state="closed";
		}else
		if((state>=600)&&(state<960)){
			nextState.mode="mini";
			nextState.state="closed";
		}else
		if(state>=960){
			nextState.mode="normal";
			nextState.state="closed";
		}else
		if(state>=1280){
			nextState.mode="normal";
			nextState.state="open";
		};
		this.setNextState(nextState);
	};

	this.notifyResponsive=function(e){
		this_.processResponsive(e.detail.state,e.detail.last);
	};
             
	this.toogleAction=function(){
		var nextState=this.getState();
		if(nextState.mode=="normal"){
			if(nextState.state=="open"){
				nextState.state="closed";
			}else
			if(nextState.state=="closed"){
				nextState.state="open";
			};
			this.setNextState(nextState,true);
		};
	};

	this.init=function(){
		XUI.Responsive.addProcessResponsive(this.processResponsive,this);
		this.setNextState(this.getCookie(true),true);
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Dashboard);

