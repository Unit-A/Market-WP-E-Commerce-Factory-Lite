<?php

	$factory_lite_custom_css= "";

	/*---------------------------First highlight color-------------------*/

	$factory_lite_first_color = get_theme_mod('factory_lite_first_color');

	if($factory_lite_first_color != false){
		$factory_lite_custom_css .='#header, .page-template-custom-home-page .topbar-btn-outer, .main-navigation ul.sub-menu>li>a:before, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, #footer-2, .scrollup i, #sidebar h3, .pagination span, .pagination a, .widget_product_search button, .woocommerce span.onsale{';
			$factory_lite_custom_css .='background-color: '.esc_attr($factory_lite_first_color).';';
		$factory_lite_custom_css .='}';
	}

	if($factory_lite_first_color != false){
		$factory_lite_custom_css .='a, p.site-description,p.site-title a, .logo h1 a, .middle-bar i, .ptext, .topbar-btn a, .page-template-custom-home-page .main-navigation a:hover, .page-template-custom-home-page .more-btn a:hover, .htext, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price{';
			$factory_lite_custom_css .='color: '.esc_attr($factory_lite_first_color).';';
		$factory_lite_custom_css .='}';
	}

	if($factory_lite_first_color != false){
		$factory_lite_custom_css .='.box{';
			$factory_lite_custom_css .='border-color: '.esc_attr($factory_lite_first_color).';';
		$factory_lite_custom_css .='}';
	}

	$factory_lite_custom_css .='@media screen and (max-width:720px) {';
		if($factory_lite_first_color != false){
			$factory_lite_custom_css .='.mobile-box{
			background-color:'.esc_attr($factory_lite_first_color).';
			}';
		}
	$factory_lite_custom_css .='}';

	$factory_lite_custom_css .='@media screen and (min-width: 768px) and (max-width: 1199px){';
		if($factory_lite_first_color != false){
			$factory_lite_custom_css .='#header{
				background-color:'.esc_attr($factory_lite_first_color).';
			}';
		}

		if($factory_lite_first_color != false){
			$factory_lite_custom_css .='.topbar-btn a{
				color:'.esc_attr($factory_lite_first_color).';
			}';
		}
	$factory_lite_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$factory_lite_theme_lay = get_theme_mod( 'factory_lite_width_option','Full Width');
    if($factory_lite_theme_lay == 'Boxed'){
		$factory_lite_custom_css .='body{';
			$factory_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$factory_lite_custom_css .='}';
		$factory_lite_custom_css .='#slider .carousel-caption{';
			$factory_lite_custom_css .='right: 18% !important; left: 18% !important;';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Wide Width'){
		$factory_lite_custom_css .='body{';
			$factory_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Full Width'){
		$factory_lite_custom_css .='body{';
			$factory_lite_custom_css .='max-width: 100%;';
		$factory_lite_custom_css .='}';
	}

	/*--------------------------- Slider Content Layout -------------------*/

	$factory_lite_theme_lay = get_theme_mod( 'factory_lite_slider_content_option','Left');
    if($factory_lite_theme_lay == 'Left'){
		$factory_lite_custom_css .='#slider .carousel-caption{';
			$factory_lite_custom_css .='text-align:left; right: 45%; left:20%';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Center'){
		$factory_lite_custom_css .='#slider .carousel-caption{';
			$factory_lite_custom_css .='text-align:center; right: 30%; left: 30%;';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Right'){
		$factory_lite_custom_css .='#slider .carousel-caption{';
			$factory_lite_custom_css .='text-align:right; right: 20%; left: 45%;';
		$factory_lite_custom_css .='}';
	}

	/*--------------------------- Services Content Layout -------------------*/

	$factory_lite_theme_lay = get_theme_mod( 'factory_lite_services_content_option','Left');
    if($factory_lite_theme_lay == 'Left'){
		$factory_lite_custom_css .='.box{';
			$factory_lite_custom_css .='text-align:left;';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Center'){
		$factory_lite_custom_css .='.box{';
			$factory_lite_custom_css .='text-align:center;';
		$factory_lite_custom_css .='}';
	}else if($factory_lite_theme_lay == 'Right'){
		$factory_lite_custom_css .='.box{';
			$factory_lite_custom_css .='text-align:right;';
		$factory_lite_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$factory_lite_resp_slider = get_theme_mod( 'factory_lite_resp_slider_hide_show',true);
    if($factory_lite_resp_slider == true){
    	$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='#slider{';
			$factory_lite_custom_css .='display:block;';
		$factory_lite_custom_css .='} }';
	}else if($factory_lite_resp_slider == false){
		$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='#slider{';
			$factory_lite_custom_css .='display:none;';
		$factory_lite_custom_css .='} }';
	}

	$factory_lite_resp_metabox = get_theme_mod( 'factory_lite_metabox_hide_show',true);
    if($factory_lite_resp_metabox == true){
    	$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='.post-info{';
			$factory_lite_custom_css .='display:block;';
		$factory_lite_custom_css .='} }';
	}else if($factory_lite_resp_metabox == false){
		$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='.post-info{';
			$factory_lite_custom_css .='display:none;';
		$factory_lite_custom_css .='} }';
	}

	$factory_lite_resp_sidebar = get_theme_mod( 'factory_lite_sidebar_hide_show',true);
    if($factory_lite_resp_sidebar == true){
    	$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='#sidebar{';
			$factory_lite_custom_css .='display:block;';
		$factory_lite_custom_css .='} }';
	}else if($factory_lite_resp_sidebar == false){
		$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='#sidebar{';
			$factory_lite_custom_css .='display:none;';
		$factory_lite_custom_css .='} }';
	}

	$factory_lite_resp_scroll_top = get_theme_mod( 'factory_lite_resp_scroll_top_hide_show',false);
    if($factory_lite_resp_scroll_top == true){
    	$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='.scrollup i{';
			$factory_lite_custom_css .='display:block;';
		$factory_lite_custom_css .='} }';
	}else if($factory_lite_resp_scroll_top == false){
		$factory_lite_custom_css .='@media screen and (max-width:575px) {';
		$factory_lite_custom_css .='.scrollup i{';
			$factory_lite_custom_css .='display:none !important;';
		$factory_lite_custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$factory_lite_button_border_radius = get_theme_mod('factory_lite_button_border_radius');
	if($factory_lite_button_border_radius != false){
		$factory_lite_custom_css .='.post-main-box .more-btn a{';
			$factory_lite_custom_css .='border-radius: '.esc_attr($factory_lite_button_border_radius).'px;';
		$factory_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$factory_lite_copyright_alingment = get_theme_mod('factory_lite_copyright_alingment');
	if($factory_lite_copyright_alingment != false){
		$factory_lite_custom_css .='.copyright p{';
			$factory_lite_custom_css .='text-align: '.esc_attr($factory_lite_copyright_alingment).';';
		$factory_lite_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$factory_lite_preloader_bg_color = get_theme_mod('factory_lite_preloader_bg_color');
	if($factory_lite_preloader_bg_color != false){
		$factory_lite_custom_css .='#preloader{';
			$factory_lite_custom_css .='background-color: '.esc_attr($factory_lite_preloader_bg_color).';';
		$factory_lite_custom_css .='}';
	}

	$factory_lite_preloader_border_color = get_theme_mod('factory_lite_preloader_border_color');
	if($factory_lite_preloader_border_color != false){
		$factory_lite_custom_css .='.loader-line{';
			$factory_lite_custom_css .='border-color: '.esc_attr($factory_lite_preloader_border_color).'!important;';
		$factory_lite_custom_css .='}';
	}