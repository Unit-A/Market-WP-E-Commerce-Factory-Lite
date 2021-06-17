<?php
/**
 * The template part for header
 *
 * @package Factory Lite 
 * @subpackage factory-lite
 * @since factory-lite 1.0
 */
?>

<div id="header" class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5 py-3">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
      <div class="col-lg-6 col-md-3 col-6 mobile-box">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu text-center my-1">
            <button role="tab" onclick="factory_lite_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars py-2 px-3"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','factory-lite'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'factory-lite' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="factory_lite_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','factory-lite'); ?></span></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6 topbar-btn-outer">
        <?php if( get_theme_mod('factory_lite_get_quote_link') != '' || get_theme_mod('factory_lite_get_quote_text') != '' ){ ?>
          <div class="topbar-btn py-3">
            <a href="<?php echo esc_url(get_theme_mod('factory_lite_get_quote_link',''));?>"><?php echo esc_html(get_theme_mod('factory_lite_get_quote_text',''));?><i class="fas fa-long-arrow-alt-right ml-2"></i></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>