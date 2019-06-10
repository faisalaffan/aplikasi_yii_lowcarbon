<?php
  global $metropoly_page_meta;
  $detect                      = new Mobile_Detect;
  $display_top_bar             = metropoly_option('display_top_bar');
  $header_background_parallax  = metropoly_option('header_background_parallax');
  $header_top_padding          = metropoly_option('header_top_padding','');
  $header_bottom_padding       = metropoly_option('header_bottom_padding','');
  $header_background_parallax  = $header_background_parallax=="yes"?"parallax-scrolling":"";
  $top_bar_left_content        = metropoly_option('top_bar_left_content');
  $top_bar_right_content       = metropoly_option('top_bar_right_content');
  
  $header_overlay              = metropoly_option('header_overlay');
  $overlay = '';
  if( $header_overlay == 'yes')
  $overlay = 'overlay';
  
  //sticky
  $enable_sticky_header         = metropoly_option('enable_sticky_header');
  $enable_sticky_header_tablets = metropoly_option('enable_sticky_header_tablets');
  $enable_sticky_header_mobiles = metropoly_option('enable_sticky_header_mobiles');
  $logo_position                = metropoly_option('logo_position','left');
  
  if(isset($metropoly_page_meta['nav_menu']) && $metropoly_page_meta['nav_menu'] !='')
 $theme_location = $metropoly_page_meta['nav_menu'];
 else
 $theme_location = 'primary'; 

 
 $header_position = isset($metropoly_page_meta['header_position'])?$metropoly_page_meta['header_position']:'top';
 switch( $header_position ){
	 case "top":
	 break;
	 case "left":
	 $body_class   .= ' side-header';
	 $wrapper       = '';
	 $logo_position = 'center';
	 $overlay = '';
	 break;
	 case "right":
	 $body_class   .= ' side-header side-header-right';
	 $wrapper       = '';
	 $logo_position = 'center';
	 $overlay       = '';
	 break;
	 } 
?>
<header class="header-style-1 header-wrap <?php echo $overlay; ?> logo-<?php echo $logo_position;?>">
        <?php if( $display_top_bar == 'yes' ):?>
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-left">
                          <?php  metropoly_get_topbar_content( $top_bar_left_content );?>
                    </div>
                    <div class="top-bar-right">
                    <?php metropoly_get_topbar_content( $top_bar_right_content );?>
                    </div>
                </div>
				<div class="clear"></div>
            </div>
            <?php endif;?>
            
             <?php 
					       $logo        = metropoly_option('default_logo','');
					       $logo_retina = metropoly_option('default_logo_retina');
						   $logo        = ( $logo == '' ) ? $logo_retina : $logo;
						   
						   $sticky_logo        = metropoly_option('sticky_logo','');
						   $sticky_logo_retina = metropoly_option('sticky_logo_retina');
						   $sticky_logo        = ( $sticky_logo == '' ) ? $sticky_logo_retina : $sticky_logo;
						   
					?>
            
            <div class="main-header <?php echo $header_background_parallax; ?>">
                <div class="container">
                    <div class="logo-box">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if( $logo ):?>
                        <img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo); ?>" />
                     <?php endif;?>
                       <?php
					if( $logo_retina ):
					$pixels ="";
					if(is_numeric(metropoly_option('retina_logo_width')) && is_numeric(metropoly_option('retina_logo_height'))):
					$pixels ="px";
					endif; ?>
					<img src="<?php echo esc_url($logo_retina); ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo esc_attr(metropoly_option('retina_logo_width')).$pixels; ?>;max-height:<?php echo esc_attr(metropoly_option('retina_logo_height')).$pixels; ?>; " class="site-logo retina_logo" />
					<?php endif; ?>
                     </a>
                        <div class="name-box">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                            <span class="site-tagline"><?php bloginfo('description'); ?></span>
                        </div>
                    </div>
                    <button class="site-nav-toggle">
                        <span class="sr-only"><?php _e( 'Toggle navigation', 'metropoly' );?></span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    <nav class="site-nav" role="navigation">
                    <?php 
				  wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
                    </nav>
                </div>
            </div>
            <?php if( $enable_sticky_header == 'yes' && $header_position !='left' && $header_position !='right' ):?>
            <?php if( !$detect->isTablet() || ( $detect->isTablet() && $enable_sticky_header_tablets == 'yes' ) || ( $detect->isMobile() && !$detect->isTablet() && $enable_sticky_header_mobiles == 'yes' )  ):?>
           <!-- sticky header -->
           <div class="fxd-header logo-<?php echo $logo_position;?>">
                <div class="container">
                    <div class="logo-box text-left">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                    
                    <?php if( $sticky_logo ):?>
                        <img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($sticky_logo); ?>" />
                     <?php endif;?>
                     
                       <?php
					if( $sticky_logo_retina ):
					$pixels ="";
					if( is_numeric(metropoly_option('sticky_logo_width_for_retina_logo')) && is_numeric(metropoly_option('sticky_logo_height_for_retina_logo')) ):
					$pixels ="px";
					endif; ?>
					<img src="<?php echo esc_url($sticky_logo_retina); ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo esc_attr(metropoly_option('sticky_logo_width_for_retina_logo')).$pixels; ?>;max-height:<?php echo esc_attr(metropoly_option('sticky_logo_height_for_retina_logo')).$pixels; ?>; " class="site-logo retina_logo" />
					<?php endif; ?>
                     </a>
                        <div class="name-box">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                            <span class="site-tagline"><?php bloginfo('description'); ?></span>
                        </div>
                    </div>
                    <button class="site-nav-toggle">
                        <span class="sr-only"><?php _e( 'Toggle navigation', 'metropoly' );?></span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    <nav class="site-nav" role="navigation">
                        <?php 
					 wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
                    </nav>
                </div>
            </div>
            <?php endif;?>
             <?php endif; ?>            
            <div class="clear"></div>
        </header>