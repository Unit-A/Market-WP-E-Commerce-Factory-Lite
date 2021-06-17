<?php
/**
 * Factory Lite: Block Patterns
 *
 * @package Factory Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'factory-lite',
		array( 'label' => __( 'Factory Lite', 'factory-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'factory-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'factory-lite' ),
			'categories' => array( 'factory-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":1328,\"dimRatio\":70,\"customOverlayColor\":\"#202028\",\"align\":\"full\",\"className\":\"banner-section p-5\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim banner-section p-5\" style=\"background-color:#202028\"><img class=\"wp-block-cover__image-background wp-image-1328\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"px-lg-5\"} -->\n<div class=\"wp-block-columns px-lg-5\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"66.66%\",\"className\":\"banner-content\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center banner-content\" style=\"flex-basis:66.66%\"><!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#ff7109\"}},\"className\":\"banner-smalltitle\",\"fontSize\":\"small\"} -->\n<p class=\"banner-smalltitle has-text-color has-small-font-size\" style=\"color:#ff7109\">WELCOME TO THE FACTORY</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}},\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" style=\"font-size:35px\">Lorem Ipsum&nbsp;is simply dummy text of the printing</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":14}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\" style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":8,\"style\":{\"color\":{\"background\":\"#ff7109\"}},\"textColor\":\"white\",\"className\":\"banner-btn\"} -->\n<div class=\"wp-block-button banner-btn\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:8px;background-color:#ff7109\">GET A QUOTE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'factory-lite/services-section',
		array(
			'title'      => __( 'Services Section', 'factory-lite' ),
			'categories' => array( 'factory-lite' ),
			'content'    => "<!-- wp:group {\"className\":\"service-section py-5\"} -->\n<div class=\"wp-block-group service-section py-5\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"color\":{\"text\":\"#ff7109\"}},\"className\":\"service-smalltitle\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-center service-smalltitle has-text-color has-small-font-size\" style=\"color:#ff7109\">OUR SERVICES</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":32},\"color\":{\"text\":\"#202028\"}}} -->\n<h2 class=\"has-text-align-center has-text-color\" style=\"color:#202028;font-size:32px\">Industries Served</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"className\":\"mt-5 mb-0\"} -->\n<div class=\"wp-block-columns mt-5 mb-0\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\",\"id\":1329,\"dimRatio\":80,\"customOverlayColor\":\"#202028\",\"minHeight\":250,\"className\":\"service-box mb-3 p-4\"} -->\n<div class=\"wp-block-cover has-background-dim-80 has-background-dim service-box mb-3 p-4\" style=\"background-color:#202028;min-height:250px\"><img class=\"wp-block-cover__image-background wp-image-1329\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":22}}} -->\n<h3 style=\"font-size:22px\">Service Title 1</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\",\"id\":1329,\"dimRatio\":80,\"customOverlayColor\":\"#202028\",\"minHeight\":250,\"className\":\"service-box mb-3 p-4\"} -->\n<div class=\"wp-block-cover has-background-dim-80 has-background-dim service-box mb-3 p-4\" style=\"background-color:#202028;min-height:250px\"><img class=\"wp-block-cover__image-background wp-image-1329\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":22}}} -->\n<h3 style=\"font-size:22px\">Service Title 2</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\",\"id\":1330,\"dimRatio\":80,\"customOverlayColor\":\"#202028\",\"minHeight\":250,\"className\":\"service-box mb-3 p-4\"} -->\n<div class=\"wp-block-cover has-background-dim-80 has-background-dim service-box mb-3 p-4\" style=\"background-color:#202028;min-height:250px\"><img class=\"wp-block-cover__image-background wp-image-1330\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":22}}} -->\n<h3 style=\"font-size:22px\">Service Title 3</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);
}