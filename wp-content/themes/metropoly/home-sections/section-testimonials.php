<?php
  // section testimonials 
  
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_7_hide',0));
   $content_model   = absint(metropoly_option('section_7_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_7_id','section-8')));
   $section_title   = wp_kses(metropoly_option('section_7_title'), $allowedposttags);

 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="section magee-section parallax-scrolling metropoly-home-section-7" id="<?php echo $section_id;?>">
  <div class="section-content container">
  <?php if( $section_title != '' ):?>
    <h2 style="text-align: center"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner light" style="border-bottom-width:3px;"></div>
    </div>
    <?php endif;?>
    <div class="metropoly-animated " data-animationduration="1.2" data-animationtype="fadeIn" data-imageanimation="no" id="">
    <div class="magee-carousel multi-carousel" id="homepage-testimonial">
    <div class="multi-carousel-inner">
      <div class="owl-carousel owl-theme">
     <?php
	 $testimonials  = '';
	 for( $j=0; $j<6; $j++ ){
	   $post_id     =  absint(metropoly_option('section_7_member_'.$j));
	  if( $post_id>0 ):
	  $post    = get_post( $post_id ); 
	  $img_id  = get_post_thumbnail_id($post_id); 
      $img_url = wp_get_attachment_image_src($img_id);
	  $avatar  = esc_url($img_url[0]);
	  $link    =  esc_url( get_permalink($post_id) );
	  $name    =  wp_kses($post->post_title, $allowedposttags);
	  $byline  =  esc_attr(metropoly_option('section_7_byline_'.$j)); 
	  $description = wp_kses($post->post_excerpt, $allowedposttags);

	  
	  if( $avatar != '' || $description !='' ):
	  $image = '';
	  if( $avatar != '' )
	  $image = '<img src="'.$avatar.'" class="img-circle">';
	  
	    $testimonials   .= '<div class="item">
          <div class="magee-testimonial-box text-center">
            <div class="testimonial-content">
              '.($description==''?'':('<div class="testimonial-quote">'.do_shortcode($description).'</div>')).
            '</div>
            <div class="testimonial-vcard style2">
              <div class="testimonial-avatar">'.$image.'</div>
              <div class="testimonial-author">
                <h4 class="name" style="text-transform: uppercase;">'.$name.'</h4>
                <div class="title">'.$byline.'</div>
              </div>
            </div>
          </div>
        </div>';
			endif;
    endif;
	 }
		
	 echo $testimonials;
	  ?>   
       </div>
    </div>
      <!-- Controls -->
    <div class="multi-carousel-nav style2 nav-bg  nav-rounded"> <a href="javascript:;" class="carousel-prev" role="button" data-slide="prev"> <span class="multi-carousel-nav-prev"></span> </a> <a class="carousel-next"  href="javascript:;"  role="button" data-slide="next"> <span class="multi-carousel-nav-next"></span> </a> </div>
  </div>
    </div>
  </div>
</section>
<?php endif;?>