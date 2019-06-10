<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package metropoly
 */
 global  $metropoly_page_meta;
 $pages_comments     = metropoly_option('pages_comments','no');
 $display_image      = metropoly_option('pages_featured_images','no');
 $display_page_title = isset($metropoly_page_meta['display_page_title'])?$metropoly_page_meta['display_page_title']:'yes';
?>
<?php if (  $display_image == 'yes' && has_post_thumbnail() ) : ?>

<div class="feature-img-box">
  <div class="img-box figcaption-middle text-center from-top fade-in">
    <?php the_post_thumbnail(); ?>
    <div class="img-overlay">
      <div class="img-overlay-container">
        <div class="img-overlay-content"> <i class="fa fa-plus"></i> </div>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<div class="entry-content">
  <?php the_content(); ?>
  <div class="comments-area text-left">
    <?php
											
 if ( comments_open() && $pages_comments == 'yes'  ) :
 comments_template();
 endif;
 ?>
  </div>
</div>
<!-- .entry-content -->
