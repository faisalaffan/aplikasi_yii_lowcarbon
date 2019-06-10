<?php
//section features
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_4_hide',0));
   $content_model   = absint(metropoly_option('section_4_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_4_id','section-5')));
   $section_title   = wp_kses(metropoly_option('section_4_title'), $allowedposttags);
   $image           = esc_url(metropoly_option('section_4_image'));

 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="section magee-section metropoly-home-section-4">
  <div class="section-content container">
  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border">
    </div>
    <?php endif;?>
    <div id="" class=" row">
      <div class=" col-md-2_5" id="">
        <div class=" divider divider-border">
        </div>
        <?php if($image !=''):?>
        <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInDown" data-imageanimation="no">
        <img src="<?php echo $image;?>" alt=''><br>
        </div>
        <?php endif;?>
      </div>
      
      <div class=" col-md-3_5" id="">
      <?php 
	  
	  for( $j=0;$j<6;$j++):
	                                            
	  $feature_icon    =  esc_attr(metropoly_option('section_4_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_url(metropoly_option('section_4_feature_image_'.$j));
	  $page            =  absint(metropoly_option('section_4_feature_page_'.$j));
	  $link            =  esc_url(metropoly_option('section_4_link_'.$j));
	  $target          =  esc_attr(metropoly_option('section_4_target_'.$j));
	  
	  $feature_title   = '';
	  $feature_content   = '';
	  if( $page > 0 ){
	  $page_service = get_post( $page ); 
      $feature_title   = wp_kses($page_service->post_title, $allowedposttags);
	  $feature_content = wp_kses($page_service->post_excerpt, $allowedposttags);
	  }
	  
	  if( $feature_icon !='' || $feature_image !='' || $feature_title!='' || $feature_content!='' ):
	  if( $link == "" )
	  $title = '<h3>'.$feature_title.'</h3>';
	  else
	  $title = '<a href="'.esc_url( get_permalink($page) ).'" target="'.$target.'"><h3>'.$feature_title.'</h3></a>';
	  
	  $icon            = '';
	  if( $feature_image !='' )
	  $icon  = '<img class="feature-box-icon"  src="'.$feature_image.'" alt="" />';
	  else
	  $icon  = '<i class="feature-box-icon fa fa-'.$feature_icon.'"></i>';
	  
	  
	  ?>
      <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInRight" data-imageanimation="no">
      <div class="magee-feature-box style2" data-os-animation="fadeOut" style="padding-left: 75px;">
  <div class="icon-box  icon-circle" style="font-size: 24px;color: #c94332;border-color: #c94332;border-width: 1px;" ><?php echo $icon;?></div>
   <?php echo $title;?>
  <div class="feature-content">
     <p><?php echo do_shortcode($feature_content);?></p>
   <a href="<?php echo $link;?>" target="<?php echo $target;?>" class="feature-link"></a></div>
</div>
</div>

        <?php endif;?>
        <?php endfor;?>
      </div>
    </div>
  </div>
</section>
<?php endif;?>