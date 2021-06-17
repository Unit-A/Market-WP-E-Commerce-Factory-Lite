function factory_lite_menu_open_nav() {
	window.factory_lite_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function factory_lite_menu_close_nav() {
	window.factory_lite_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

jQuery(document).ready(function () {
	window.factory_lite_currentfocus=null;
  	factory_lite_checkfocusdElement();
	var factory_lite_body = document.querySelector('body');
	factory_lite_body.addEventListener('keyup', factory_lite_check_tab_press);
	var factory_lite_gotoHome = false;
	var factory_lite_gotoClose = false;
	window.factory_lite_responsiveMenu=false;
 	function factory_lite_checkfocusdElement(){
	 	if(window.factory_lite_currentfocus=document.activeElement.className){
		 	window.factory_lite_currentfocus=document.activeElement.className;
	 	}
 	}
 	function factory_lite_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.factory_lite_responsiveMenu){
			if (!e.shiftKey) {
				if(factory_lite_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				factory_lite_gotoHome = true;
			} else {
				factory_lite_gotoHome = false;
			}

		}else{

			if(window.factory_lite_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.factory_lite_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.factory_lite_responsiveMenu){
				if(factory_lite_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					factory_lite_gotoClose = true;
				} else {
					factory_lite_gotoClose = false;
				}
			
			}else{

			if(window.factory_lite_responsiveMenu){
			}}}}
		}
	 	factory_lite_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
	jQuery(window).load(function() {
	    jQuery("#status").fadeOut();
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup i').fadeIn();
	    } else {
	        jQuery('.scrollup i').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});