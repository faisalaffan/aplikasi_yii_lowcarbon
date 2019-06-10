<?php

get_header(); 
global  $metropoly_page_meta,$metropoly_blog_style, $metropoly_css_class;
$detect  = new Mobile_Detect;
$sidebar ='none';
$enable_page_title_bar     = metropoly_option('enable_page_title_bar','yes');
$page_title_bg_parallax    = esc_attr(metropoly_option('page_title_bg_parallax','no'));
$page_title_bg_parallax    = $page_title_bg_parallax=="yes"?"parallax-scrolling":"";
$page_title_align          = esc_attr(metropoly_option('page_title_align','left'));
$display_breadcrumb        = esc_attr(metropoly_option('display_breadcrumb','yes'));
$breadcrumbs_on_mobile     = esc_attr(metropoly_option('breadcrumbs_on_mobile_devices','yes'));
$breadcrumb_menu_prefix    = esc_attr(metropoly_option('breadcrumb_menu_prefix',''));
$breadcrumb_menu_separator = esc_attr(metropoly_option('breadcrumb_menu_separator','/'));
$sidebar                   = isset($metropoly_page_meta['page_layout'])?$metropoly_page_meta['page_layout']:'none';
$left_sidebar              = esc_attr(metropoly_option('left_sidebar_pages',''));
$right_sidebar             = esc_attr(metropoly_option('right_sidebar_pages',''));

$slider_banner = isset($metropoly_page_meta['slider_banner'])?$metropoly_page_meta['slider_banner']:'';

$enable_page_title_bar = (isset($metropoly_page_meta['display_title_bar']) && $metropoly_page_meta['display_title_bar']!='' )?$metropoly_page_meta['display_title_bar']:$enable_page_title_bar;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if( $enable_page_title_bar == 'yes' ):?>
  
  <section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $page_title_bg_parallax;?>">
    <div class="container">
      <hgroup class="page-title text-light">
        <?php if(is_home()):?>
        <h1><?php echo esc_attr(metropoly_option('blog_title'));?></h1>
        <?php if(metropoly_option('blog_subtitle')):?>
        <h3><?php echo esc_attr(metropoly_option('blog_subtitle'));?></h3>
        <?php endif;?>
        <?php else:?>
        <h1>
          <?php single_cat_title();?>
        </h1>
        <?php endif;?>
      </hgroup>
      <?php if( $display_breadcrumb == 'yes' && !$detect->isMobile()):?>
      <?php metropoly_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
      <?php endif;?>
      <?php if( $breadcrumbs_on_mobile == 'yes' && $detect->isMobile()):?>
      <?php metropoly_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light'>".$breadcrumb_menu_prefix,"after"=>"</div>","show_browse"=>false,"separator"=>$breadcrumb_menu_separator));?>
      <?php endif;?>
      <div class="clearfix"></div>
    </div>
  </section>
  <?php endif;?>
  <div class="post-wrap">
    <div class="container">
      <div class="post-inner row <?php echo metropoly_get_content_class($sidebar);?>">
        <div class="col-main">
          <div class="<?php echo  esc_attr($metropoly_css_class);?>">
            <?php
			   $args = array (
				  'post_type'              => 'post',
				  'post_status'            => 'publish',
				  'paged'                  => (get_query_var('paged') ? get_query_var('paged') : 1),
			  );
			  $metropoly_query = new WP_Query( $args );
             if ( $metropoly_query->have_posts() ) :
			   ?>
            <?php while ( $metropoly_query->have_posts() ) : $metropoly_query->the_post(); ?>
            <?php  get_template_part( 'content', 'article'.$metropoly_blog_style ); ?>
            <?php endwhile;  ?>
            <?php endif;?>
            <?php wp_reset_postdata();?>
          </div>
          <div class="clear"></div>
          <?php metropoly_paging_nav('echo',$metropoly_query); ?>
        </div>
        <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
        <div class="col-aside-left">
          <aside class="blog-side left text-left">
            <div class="widget-area">
              <?php get_sidebar('pageleft');?>
            </div>
          </aside>
        </div>
        <?php endif; ?>
        <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>
        <div class="col-aside-right">
          <div class="widget-area">
            <?php get_sidebar('pageright');?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</article>
<?php get_footer(); ?>