<?php 
// section team
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_6_hide',0));
   $content_model   = absint(metropoly_option('section_6_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_6_id','section-7')));
   $section_title   = wp_kses(metropoly_option('section_6_title'), $allowedposttags);
   $columns         = absint(metropoly_option('section_6_columns',4));
   $col             = $columns>0?12/$columns:3;
 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="section magee-section metropoly-home-section-6" id="<?php echo $section_id;?>">
  <div class="section-content container">
  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>   
    <?php
	 $team_item = '';
	 $team_str  = '';
	 $n         = 0;
	 for( $j=0; $j<8; $j++ ){
	   
	  $post_id     =  absint(metropoly_option('section_6_member_'.$j));
	  if( $post_id>0 ):
	  $post    = get_post( $post_id ); 
	  $img_id  = get_post_thumbnail_id($post_id); 
      $img_url = wp_get_attachment_image_src($img_id);
	  $avatar  = esc_url($img_url[0]);
	  $link    =  esc_url( get_permalink($post_id) );
	  $name    =  wp_kses($post->post_title, $allowedposttags);
	  $byline  =  esc_attr(metropoly_option('section_6_byline_'.$j)); 
	  $description = wp_kses($post->post_excerpt, $allowedposttags);
	 
	  
	  if( $avatar != '' ):
      if( $link!='' )
	  $image = '<a href="'.$link.'" target="_blank"><img src="'.$avatar.'" alt="'.$name.'" style="border-radius: 0; display: inline-block;border-style: solid;" />
        <div class="img-overlay primary">
          <div class="img-overlay-container">
            <div class="img-overlay-content"><i class="fa fa-link"></i></div>
          </div>
        </div>
        </a>';
		else
		$image = '<img src="'.$avatar.'">
        <div class="img-overlay primary">
          <div class="img-overlay-container">
            <div class="img-overlay-content"></div>
          </div>
        </div>';
	 $icons = '';
	for( $k=0;$k<4;$k++){
		$icon = str_replace('fa-','',esc_attr(metropoly_option('section_6_social_icon_'.$j.'_'.$k)));
		$link = esc_url(metropoly_option('section_6_social_link_'.$j.'_'.$k));
		if( $icon != '' ){
		$icons .= '<li><a href="'.$link.'"><i class="fa fa-'.$icon.'"></i></a></li>';
		}
		}
	
	  $team_item .= '<div class="col-md-'.$col.'">
						<div class="magee-person-box" id="">
						  <div class="person-img-box">
							<div class="img-box figcaption-middle text-center fade-in">'.$image.'</div>
						  </div>
						  <div class="person-vcard text-center">
							<h3 class="person-name" style="text-transform: uppercase;">'.$name.'</h3>
							<h4 class="person-title" style="text-transform: uppercase;">'.$byline.'</h4>
							<p class="person-desc">'.do_shortcode($description).'</p>
							<ul class="person-social">
							 '.$icons.'
							</ul>
						  </div>
						</div>
					  </div>';
	  $m = $n+1;
	  if( $m % $columns == 0 ){
	        $team_str .= '<div class="row">'.$team_item.'</div>';
	        $team_item = '';
	   }
	   endif;
	   $n++;
	   endif;
	 }
	 if( $team_item != '' ){
		    $team_str .= '<div class="row">'.$team_item.'</div>';
	      
		   }
		
	 echo '<div class="'.$metropoly_home_animation.'" data-animationduration="1.2" data-animationtype="fadeInDown" data-imageanimation="no">'.$team_str.'</div>';
	?>

  </div>
</section>
<?php endif;?>