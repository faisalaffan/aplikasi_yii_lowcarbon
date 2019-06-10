<?php 
   // section banner
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_0_hide',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_0_id','section-1')));
 
 ?>
 <?php if( $section_hide != '1' ):?>
<section class="section magee-section metropoly-home-section-0" id="<?php echo $section_id;?>">
  <div class="section-content">

   <div id="homepage-carousel" class="carousel slide">
  
   <div class="carousel-inner">
   <?php for( $i=0; $i<5; $i++ ):?>
   <?php 
	$active = '';
	if($i==0)
	$active = 'active';
	
	$display          = absint(metropoly_option('section_0_display_'.$i));
	$image            = esc_url(metropoly_option('section_0_image_'.$i));
	$title            = wp_kses(metropoly_option('section_0_title_'.$i), $allowedposttags);
	$sub_title        = wp_kses(metropoly_option('section_0_sub_title_'.$i), $allowedposttags);
	$left_btn_text    = wp_kses(metropoly_option('section_0_left_btn_text_'.$i), $allowedposttags);
	$left_btn_link    = esc_url(metropoly_option('section_0_left_btn_link_'.$i));
	$left_btn_target  = esc_attr(metropoly_option('section_0_left_btn_target_'.$i));
    $right_btn_text   = wp_kses(metropoly_option('section_0_right_btn_text_'.$i), $allowedposttags);
	$right_btn_link   = esc_url(metropoly_option('section_0_right_btn_link_'.$i));
	$right_btn_target = esc_attr(metropoly_option('section_0_right_btn_target_'.$i));
	if($display == 1):
	?>
      <div class="item <?php echo $active;?>">
               <section class="section magee-section section-banner fullheight verticalmiddle" style="background-image: url(<?php echo $image;?>);">
                  <div class="section-content ">
                  <div class="contaienr">
                   <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="bounce" data-imageanimation="no"> <h1 class="magee-heading section-title"><span class="heading-inner"><span style="font-family: 'Playfair Display SC';"><?php echo do_shortcode($title);?></span></span></h1></div>
                    <div class=" divider divider-border center">
                      <div class="divider-inner divider-border"></div>
                    </div>
                    <p style="text-align: center;font-size: 24px;"><?php echo do_shortcode($sub_title);?></p>
                    <div style="height: 30px;"></div>
                    <div style="text-align: center;">
                      <a href="<?php echo $left_btn_link;?>" target="<?php echo $left_btn_target;?>" class=" magee-btn-normal btn-left btn-rounded btn-lg"><?php echo do_shortcode($left_btn_text);?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo $right_btn_text;?>" target="<?php echo $right_btn_target;?>" class=" magee-btn-normal btn-right btn-rounded btn-lg"><?php echo do_shortcode($right_btn_text);?></a></div>
                  </div>
                  </div>
                </section>
  
      </div>
      <?php endif;?>
      <?php endfor;?>

   </div>
 <a class="carousel-control left" href="#homepage-carousel" data-slide="prev"></a>
   <a class="carousel-control right" href="#homepage-carousel" data-slide="next"></a>
</div> 
      
  </div>
</section>
 <?php endif;?>