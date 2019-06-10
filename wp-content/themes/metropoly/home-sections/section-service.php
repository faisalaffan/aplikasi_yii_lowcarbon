<?php 
   // section service
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_2_hide',0));
   $content_model   = absint(metropoly_option('section_2_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_2_id','section-3')));
   $section_title   = wp_kses(metropoly_option('section_2_title'), $allowedposttags);
   $columns         = absint(metropoly_option('section_2_columns',3));
   $col             = $columns>0?12/$columns:4;
 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="section magee-section metropoly-home-section-2" id="<?php echo $section_id;?>">
  <div class="section-content container">

  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" id="" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; border-color: #c94332;"></div>
    </div>
    <?php endif;?>
    <?php
	 $feature_item = '';
	 $feature_str  = '';
	 for( $j=0; $j<6; $j++ ){
	   
	  $feature_icon    =  esc_attr(metropoly_option('section_2_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_attr(metropoly_option('section_2_feature_image_'.$j));
	  $link            =  esc_url(metropoly_option('section_2_link_'.$j));
	  $target          =  esc_attr(metropoly_option('section_2_target_'.$j));
	  $page            =  absint(metropoly_option('section_2_page_'.$j));
	  
	  $feature_title   = '';
	  $feature_content = '';
	  
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
      
	  $feature_item .= '<div class="col-md-'.$col.'">
 <div class="magee-feature-box style1 data-os-animation="fadeOut">
  <div class="icon-box icon-circle" style="border-color: #c94332;color: #c94332"> '.$icon.'</div>
  '.$title.'
  <div class="feature-content">
    <p>'.do_shortcode($feature_content).'</p>
   <a href="'.$link.'" target="'.$target.'" class="feature-link"></a>
	</div>
    </div>
 </div>';
	  $k = $j+1;
	  if( $k % $columns == 0 ){
	        $feature_str .= '<div class="'.$metropoly_home_animation.'" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no"><div class="row">'.$feature_item.'</div></div>';
	        $feature_item = '';
	   }
	   endif;
	   
	 }
	 if( $feature_item != '' ){
		    $feature_str .= '<div class="'.$metropoly_home_animation.'" data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no"><div class="row">'.$feature_item.'</div></div>';
	      
		   }
		
	 echo $feature_str;
	?>
  </div>
</section>
<?php endif;?>