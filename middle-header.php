<?php
/**
 * The template part for top header
 *
 * @package Factory Lite
 * @subpackage factory-lite
 * @since factory-lite 1.0
 */
?>

<div class="middle-bar text-center text-lg-left text-md-left py-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 py-3 py-md-0 py-lg-3">
        <div class="logo text-lg-left text-md-center">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('factory_lite_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title py-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('factory_lite_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title py-1 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('factory_lite_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 py-3">
        <?php if( get_theme_mod('factory_lite_location_text') != '' || get_theme_mod('factory_lite_location') != '' ){ ?>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-3 py-3">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="col-lg-10 col-md-10 col-9 text-left">
              <h6><?php echo esc_html(get_theme_mod('factory_lite_location',''));?></h6>
              <p class="mb-0 ptext"><?php echo esc_html(get_theme_mod('factory_lite_location_text',''));?></p>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-2 col-md-3 py-3">
        <?php if( get_theme_mod('factory_lite_phone_text') != '' || get_theme_mod('factory_lite_phone_number') != '' ){ ?>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-3 py-3">
              <i class="fas fa-phone"></i>
            </div>
            <div class="col-lg-9 col-md-9 col-9 text-left">
              <h6><?php echo esc_html(get_theme_mod('factory_lite_phone_number',''));?></h6>
              <p class="mb-0 ptext"><?php echo esc_html(get_theme_mod('factory_lite_phone_text',''));?></p>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-4 py-3">
        <?php if( get_theme_mod('factory_lite_email_text') != '' || get_theme_mod('factory_lite_email_address') != '' ){ ?>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-3 py-3">
              <i class="fas fa-at"></i>
            </div>
            <div class="col-lg-10 col-md-10 col-9 text-left">
              <h6><?php echo esc_html(get_theme_mod('factory_lite_email_address',''));?></h6>
              <p class="mb-0 ptext"><?php echo esc_html(get_theme_mod('factory_lite_email_text',''));?></p>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>