<?php
/**
 * The template part for displaying post
 *
 * @package Factory Lite 
 * @subpackage factory-lite
 * @since factory-lite 1.0
 */
?>

<?php 
  $factory_lite_archive_year  = get_the_time('Y'); 
  $factory_lite_archive_month = get_the_time('m'); 
  $factory_lite_archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3">
    <div class="row">
      <?php if(has_post_thumbnail()) {?>
        <div class="box-image col-lg-6 col-md-6">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <article class="new-text <?php if(has_post_thumbnail()) { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'factory_lite_toggle_postdate',true) != '' || get_theme_mod( 'factory_lite_toggle_author',true) != '' || get_theme_mod( 'factory_lite_toggle_comments',true) != '') { ?>
          <div class="post-info p-2 my-3">
            <?php if(get_theme_mod('factory_lite_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt mr-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $factory_lite_archive_year, $factory_lite_archive_month, $factory_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span> |</span>
            <?php } ?>

            <?php if(get_theme_mod('factory_lite_toggle_author',true)==1){ ?>
              <i class="fas fa-user mr-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span> |</span>
            <?php } ?>

            <?php if(get_theme_mod('factory_lite_toggle_comments',true)==1){ ?>
              <i class="fa fa-comments mr-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'factory-lite'), __('0 Comments', 'factory-lite'), __('% Comments', 'factory-lite') ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $factory_lite_theme_lay = get_theme_mod( 'factory_lite_excerpt_settings','Excerpt');
          if($factory_lite_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($factory_lite_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( factory_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('factory_lite_excerpt_number','30')))); ?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('factory_lite_button_text','READ MORE') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('factory_lite_button_text',__('READ MORE','factory-lite')));?><i class="fas fa-angle-double-right ml-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('factory_lite_button_text',__('READ MORE','factory-lite')));?></span></a>
          </div>
        <?php } ?>
      </article>
    </div>
  </div>
</div>