<?php
//about theme info
add_action( 'admin_menu', 'factory_lite_gettingstarted' );
function factory_lite_gettingstarted() {
	add_theme_page( esc_html__('About Factory Lite', 'factory-lite'), esc_html__('About Factory Lite', 'factory-lite'), 'edit_theme_options', 'factory_lite_guide', 'factory_lite_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function factory_lite_admin_theme_style() {
	wp_enqueue_style('factory-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('factory-lite-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'factory_lite_admin_theme_style');

//guidline for about theme
function factory_lite_mostrar_guide() { 
	//custom function about theme customizer
	$factory_lite_return = add_query_arg( array()) ;
	$factory_lite_theme = wp_get_theme( 'factory-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Factory Lite', 'factory-lite' ); ?> <span class="version"><?php esc_html_e( 'Version', 'factory-lite' ); ?>: <?php echo esc_html($factory_lite_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','factory-lite'); ?></p>
    </div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="factory_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'factory-lite' ); ?></button>
			<button class="tablinks" onclick="factory_lite_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'factory-lite' ); ?></button>
			<button class="tablinks" onclick="factory_lite_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'factory-lite' ); ?></button>
		</div>

		<?php
			$factory_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$factory_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Factory_Lite_Plugin_Activation_Settings::get_instance();
			$factory_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="factory-lite-recommended-plugins">
				    <div class="factory-lite-action-list">
				        <?php if ($factory_lite_actions): foreach ($factory_lite_actions as $key => $factory_lite_actionValue): ?>
				                <div class="factory-lite-action" id="<?php echo esc_attr($factory_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($factory_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($factory_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($factory_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'factory-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="factory-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','factory-lite'); ?></a>
			    </div>
			<?php } ?>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Factory_Lite_Plugin_Activation_Settings::get_instance();
			$factory_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="factory-lite-recommended-plugins">
				    <div class="factory-lite-action-list">
				        <?php if ($factory_lite_actions): foreach ($factory_lite_actions as $key => $factory_lite_actionValue): ?>
				                <div class="factory-lite-action" id="<?php echo esc_attr($factory_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($factory_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($factory_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($factory_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','factory-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($factory_lite_plugin_custom_css); ?>">
			  	<h3><?php esc_html_e( 'Block Patterns', 'factory-lite' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','factory-lite'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','factory-lite'); ?></span></b></p>
              	<div class="factory-lite-pattern-page">
			    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','factory-lite'); ?></a>
			    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	        </div>
		</div>

		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Factory_Lite_Plugin_Activation_Settings::get_instance();
				$factory_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="factory-lite-recommended-plugins">
				    <div class="factory-lite-action-list">
				        <?php if ($factory_lite_actions): foreach ($factory_lite_actions as $key => $factory_lite_actionValue): ?>
				                <div class="factory-lite-action" id="<?php echo esc_attr($factory_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($factory_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($factory_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($factory_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','factory-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($factory_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'factory-lite' ); ?></h3>
				<hr class="h3hr">
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'factory-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'factory-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FACTORY_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'factory-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'factory-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'factory-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'factory-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'factory-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'factory-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FACTORY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'factory-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'factory-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'factory-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FACTORY_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'factory-lite'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'factory-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','factory-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=factory_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','factory-lite'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','factory-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','factory-lite'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=factory_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','factory-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=factory_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','factory-lite'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','factory-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','factory-lite'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','factory-lite'); ?></span><?php esc_html_e(' Go to ','factory-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','factory-lite'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','factory-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','factory-lite'); ?></span><?php esc_html_e(' Go to ','factory-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','factory-lite'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','factory-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','factory-lite'); ?> <a class="doc-links" href="<?php echo esc_url( FACTORY_LITE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','factory-lite'); ?></a></p>
			  	</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>