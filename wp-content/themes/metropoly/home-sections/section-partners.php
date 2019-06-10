<?php 
  // section news 
  
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_9_hide',0));
   $content_model   = absint(metropoly_option('section_9_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_9_id','section-10')));
  
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="section magee-section parallax-scrolling metropoly-home-section-9" id="<?php echo $section_id;?>">
  <div class="section-content container">   
     <?php
	$partners = array();
	$html     = '';
    for( $i=0;$i<6;$i++){
		$image = metropoly_option('section_9_partner_'.$i);
     if( $image != '' ){
      $partners[] = $image;
	 }
	}
  $num = count($partners);
  if( $num > 0 ){
  if( $num == 5 )
  $col = '1_5';
  else
  $col = 12/$num;
  foreach( $partners as $partner ){
	  $html .= '<div class="col-md-1_5"><img src="'.esc_url($partner).'" alt=""></div>';
	  }
  }

echo '<div class="'.$metropoly_home_animation.'" data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no"><div class="row">'.$html.'</div></div>';

	  ?>      
  </div>
</section>
<?php endif;?> 