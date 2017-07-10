
$(function() {

	$(".nav-sidebar-button-small").on("click",function(e){
		var sidebar=$(".dashboard.sidebar");
		var content=$(".dashboard.content");
		
		if(1*Cookies.get("sidebar-small")){
			sidebar.removeClass("sidebar-small");
			content.removeClass("sidebar-small");
			Cookies.set("sidebar-small",0);
		}else{
			sidebar.addClass("sidebar-small");
			content.addClass("sidebar-small");
			Cookies.set("sidebar-small",1);			
		};
		$(window).trigger('resize');
	});
	
});
