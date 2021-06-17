<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'factory_lite_before_slider' ); ?>

  <?php if( get_theme_mod('factory_lite_slider_arrows') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <?php $factory_lite_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'factory_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $factory_lite_pages[] = $mod;
            }
          }
          if( !empty($factory_lite_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $factory_lite_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()) {?>
                <div class="slide-image">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php }?>
              <div class="carousel-caption">
                <div class="slider-inner-box">
                  <h1 class="mb-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( factory_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('factory_lite_slider_excerpt_number','45')))); ?></p>
                  <?php if( get_theme_mod('factory_lite_slider_button_text','GET A QUOTE') != ''){ ?>
                    <div class="more-btn my-3 my-lg-5 my-md-4">
                      <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('factory_lite_slider_button_text',__('GET A QUOTE','factory-lite')));?><i class="fas fa-angle-double-right ml-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('factory_lite_button_text',__('GET A QUOTE','factory-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Previous','factory-lite'); ?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Next','factory-lite'); ?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'factory_lite_after_slider' ); ?>

  <section id="services-sec" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('factory_lite_services_text') != '' ){ ?>
        <p class="mb-0 htext text-center"><?php echo esc_html(get_theme_mod('factory_lite_services_text',''));?></p>
      <?php }?>
      <?php if( get_theme_mod('factory_lite_services_title') != '' ){ ?>
        <h3 class="text-center mb-4"><?php echo esc_html(get_theme_mod('factory_lite_services_title',''));?></h3>
      <?php }?>
      <div class="row">
        <?php
        $factory_lite_catData = get_theme_mod('factory_lite_services_category');
        if($factory_lite_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $factory_lite_catData ,'factory-lite')));
          $bgcolor = 1; ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6">
              <?php if(has_post_thumbnail()) {?>
                <div class="box mb-4">
                  <?php the_post_thumbnail(); ?>
                  <div class="box-content">
                    <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( factory_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('factory_lite_services_excerpt_number','10')))); ?></p>                 
                  </div>
                </div>
              <?php }?>
            </div>
          <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'factory_lite_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>