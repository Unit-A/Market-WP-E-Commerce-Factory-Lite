<?php
/**
 * Factory Lite Theme Customizer
 *
 * @package Factory Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function factory_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'factory_lite_custom_controls' );

function factory_lite_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'factory_lite_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'factory_lite_Customize_partial_blogdescription',
	));

	//add home page setting pannel
	$factory_lite_parent_panel = new Factory_Lite_WP_Customize_Panel( $wp_customize, 'factory_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'factory-lite' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'factory_lite_left_right', array(
    	'title' => esc_html__( 'General Settings', 'factory-lite' ),
		'panel' => 'factory_lite_panel_id'
	) );

	$wp_customize->add_setting('factory_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Factory_Lite_Image_Radio_Control($wp_customize, 'factory_lite_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','factory-lite'),
        'description' => esc_html__('Here you can change the width layout of Website.','factory-lite'),
        'section' => 'factory_lite_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('factory_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control('factory_lite_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','factory-lite'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','factory-lite'),
        'section' => 'factory_lite_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','factory-lite'),
            'Right Sidebar' => esc_html__('Right Sidebar','factory-lite'),
            'One Column' => esc_html__('One Column','factory-lite'),
            'Grid Layout' => esc_html__('Grid Layout','factory-lite')
        ),
	) );

	$wp_customize->add_setting('factory_lite_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control('factory_lite_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','factory-lite'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','factory-lite'),
        'section' => 'factory_lite_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','factory-lite'),
            'Right_Sidebar' => esc_html__('Right Sidebar','factory-lite'),
            'One_Column' => esc_html__('One Column','factory-lite')
        ),
	) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'factory_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','factory-lite' ),
		'section' => 'factory_lite_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'factory_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','factory-lite' ),
		'section' => 'factory_lite_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'factory_lite_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','factory-lite' ),
        'section' => 'factory_lite_left_right'
    )));

	$wp_customize->add_setting('factory_lite_preloader_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'factory_lite_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'factory-lite'),
		'section'  => 'factory_lite_left_right',
	)));

	$wp_customize->add_setting('factory_lite_preloader_border_color', array(
		'default'           => '#ff7109',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'factory_lite_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'factory-lite'),
		'section'  => 'factory_lite_left_right',
	)));

	// Header
	$wp_customize->add_section( 'factory_lite_header' , array(
    	'title' => esc_html__( 'Header', 'factory-lite' ),
		'panel' => 'factory_lite_panel_id'
	) );

	$wp_customize->add_setting('factory_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_location',array(
		'label'	=> esc_html__('Add Location','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Brooklyn Street, London', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_location_text',array(
		'label'	=> esc_html__('Add Location Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Visit us', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_phone_number',array(
		'label'	=> esc_html__('Add Phone Number','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '9876543210', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_phone_text',array(
		'label'	=> esc_html__('Add Phone Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Phone Line', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('factory_lite_email_address',array(
		'label'	=> esc_html__('Add Email Address','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'info@factory.com', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_email_text',array(
		'label'	=> esc_html__('Add Email Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Email address', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_get_quote_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_get_quote_text',array(
		'label'	=> esc_html__('Button Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'GET A QUOTE', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_get_quote_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('factory_lite_get_quote_link',array(
		'label'	=> esc_html__('Button Link','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.com/#', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_header',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'factory_lite_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'factory-lite' ),
		'panel' => 'factory_lite_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('factory_lite_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_slider_arrows',
	));

	$wp_customize->add_setting( 'factory_lite_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','factory-lite' ),
      	'section' => 'factory_lite_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'factory_lite_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'factory_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'factory_lite_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'factory-lite' ),
			'description' => esc_html__('Slider image size (1600 x 650)','factory-lite'),
			'section'  => 'factory_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('factory_lite_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Factory_Lite_Image_Radio_Control($wp_customize, 'factory_lite_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','factory-lite'),
        'section' => 'factory_lite_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    $wp_customize->add_setting( 'factory_lite_slider_excerpt_number', array(
		'default'              => 45,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'factory_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'factory_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','factory-lite' ),
		'section'     => 'factory_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'factory_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('factory_lite_slider_button_text',array(
		'default'=> esc_html__('GET A QUOTE','factory-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('factory_lite_slider_button_text',array(
		'label'	=> esc_html__('Add Button Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'GET A QUOTE', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_slidersettings',
		'type'=> 'text'
	));

	//Services
	$wp_customize->add_section('factory_lite_services',array(
		'title'	=> __('Our Services Section','factory-lite'),
		'panel' => 'factory_lite_panel_id',
	));

	$wp_customize->add_setting('factory_lite_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_services_text',array(
		'label'	=> esc_html__('Services Heading Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Our Services', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_services_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_services_title',array(
		'label'	=> esc_html__('Services Heading Title','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Industries Served', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_services',
		'type'=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('factory_lite_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'factory_lite_sanitize_choices',
	));
	$wp_customize->add_control('factory_lite_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display services','factory-lite'),
		'section' => 'factory_lite_services',
	));

	//content layout
	$wp_customize->add_setting('factory_lite_services_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Factory_Lite_Image_Radio_Control($wp_customize, 'factory_lite_services_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Services Content Layouts','factory-lite'),
        'section' => 'factory_lite_services',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    $wp_customize->add_setting( 'factory_lite_services_excerpt_number', array(
		'default'              => 10,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'factory_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'factory_lite_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','factory-lite' ),
		'section'     => 'factory_lite_services',
		'type'        => 'range',
		'settings'    => 'factory_lite_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 30,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $factory_lite_parent_panel );

	$BlogPostParentPanel = new Factory_Lite_WP_Customize_Panel( $wp_customize, 'factory_lite_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'factory-lite' ),
		'panel' => 'factory_lite_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'factory_lite_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'factory-lite' ),
		'panel' => 'factory_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('factory_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'factory_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','factory-lite' ),
        'section' => 'factory_lite_post_settings'
    )));

    $wp_customize->add_setting( 'factory_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_toggle_author',array(
		'label' => esc_html__( 'Author','factory-lite' ),
		'section' => 'factory_lite_post_settings'
    )));

    $wp_customize->add_setting( 'factory_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','factory-lite' ),
		'section' => 'factory_lite_post_settings'
    )));

    $wp_customize->add_setting( 'factory_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','factory-lite' ),
		'section' => 'factory_lite_post_settings'
    )));

    $wp_customize->add_setting( 'factory_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'factory_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'factory_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','factory-lite' ),
		'section'     => 'factory_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'factory_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('factory_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control('factory_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','factory-lite'),
        'section' => 'factory_lite_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','factory-lite'),
            'Excerpt' => esc_html__('Excerpt','factory-lite'),
            'No Content' => esc_html__('No Content','factory-lite')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'factory_lite_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'factory-lite' ),
		'panel' => 'factory_lite_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'factory_lite_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'factory_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'factory_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','factory-lite' ),
		'section'     => 'factory_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('factory_lite_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_button_text', 
	));

    $wp_customize->add_setting('factory_lite_button_text',array(
		'default'=> esc_html__('READ MORE','factory-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('factory_lite_button_text',array(
		'label'	=> esc_html__('Add Button Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'factory_lite_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'factory-lite' ),
		'panel' => 'factory_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('factory_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'factory_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_related_post',array(
		'label' => esc_html__( 'Related Post','factory-lite' ),
		'section' => 'factory_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('factory_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('factory_lite_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('factory_lite_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('factory_lite_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('factory_lite_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','factory-lite'),
		'panel' => 'factory_lite_panel_id',
	));

    $wp_customize->add_setting( 'factory_lite_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','factory-lite' ),
      	'section' => 'factory_lite_responsive_media'
    )));

	$wp_customize->add_setting( 'factory_lite_metabox_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_metabox_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Metabox','factory-lite' ),
      	'section' => 'factory_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'factory_lite_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','factory-lite' ),
      	'section' => 'factory_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'factory_lite_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','factory-lite' ),
      	'section' => 'factory_lite_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('factory_lite_footer',array(
		'title'	=> esc_html__('Footer Settings','factory-lite'),
		'panel' => 'factory_lite_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('factory_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_footer_text', 
	));
	
	$wp_customize->add_setting('factory_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('factory_lite_footer_text',array(
		'label'	=> esc_html__('Copyright Text','factory-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'factory-lite' ),
        ),
		'section'=> 'factory_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('factory_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Factory_Lite_Image_Radio_Control($wp_customize, 'factory_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','factory-lite'),
        'section' => 'factory_lite_footer',
        'settings' => 'factory_lite_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'factory_lite_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'factory_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Factory_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'factory_lite_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','factory-lite' ),
      	'section' => 'factory_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('factory_lite_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'factory_lite_Customize_partial_factory_lite_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('factory_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'factory_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Factory_Lite_Image_Radio_Control($wp_customize, 'factory_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','factory-lite'),
        'section' => 'factory_lite_footer',
        'settings' => 'factory_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Factory_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Factory_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'factory_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Factory_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'factory_lite_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Factory_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'factory_lite_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function factory_lite_Customize_controls_scripts() {
	wp_enqueue_script( 'factory-lite-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'factory_lite_Customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Factory_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Factory_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Factory_Lite_Customize_Section_Pro( $manager,'factory_lite_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'FACTORY PRO', 'factory-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'factory-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/factory-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'factory-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'factory-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Factory_Lite_Customize::get_instance();