
/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



if(!XUI.App){
	XUI.App={};
};

XUI.App.Toolbar={};

(function(){

	var this_=this;

	this.linkResponsive=function(idResponsive,idToolbar,idToolbarContent){
		XUI.Responsive.Element.linkContainer(
			idResponsive,idToolbar,idToolbarContent,
			["-important","-small","-large"]
		);
	}

}).apply(XUI.App.Toolbar);


