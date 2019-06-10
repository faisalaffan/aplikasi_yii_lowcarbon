<?php 
  // section slogan 
  
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_5_hide',0));
   $content_model   = absint(metropoly_option('section_5_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_5_id')));
   $section_title   = wp_kses(metropoly_option('section_5_title'), $allowedposttags);
   
   $left_content       = wp_kses(metropoly_option('section_5_left_content'), $allowedposttags);
   $left_button_text   = esc_attr(metropoly_option('section_5_left_btn_text'));
   $left_button_link   = esc_url(metropoly_option('section_5_left_btn_link'));
   $left_button_target = esc_attr(metropoly_option('section_5_left_btn_target'),'_blank');
   
   $right_content       = wp_kses(metropoly_option('section_5_right_content'), $allowedposttags);
   $right_button_text   = esc_attr(metropoly_option('section_5_right_btn_text'));
   $right_button_link   = esc_url(metropoly_option('section_5_right_btn_link'));
   $right_button_target = esc_attr(metropoly_option('section_5_right_btn_target'),'_blank');

		
 ?>

<?php if( $section_hide != '1' ):?>

<section class="section magee-section parallax-scrolling metropoly-home-section-5" id="<?php echo $section_id;?>">
  <div class="section-content container">
    <?php if( $section_title != '' ):?>
    <h2 class="section-title" style="text-align: center"><?php echo $section_title;?></h2>
    <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner light primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
    <div class=" col-md-6">
      <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInLeft" data-imageanimation="no">

        <div class="magee-alert" role="alert" style="background-color:#272727;color:#ffffff;border-color:#ffffff;border-width:0px;border-radius:0px;">
          <div style="height: 10px;"></div>
          <p><span style="font-size: 16px;"><?php echo do_shortcode($left_content);?></span></p>
          <div style="height: 10px;"></div>
       
          <a href="<?php echo $left_button_link;?>" target="<?php echo $left_button_target;?>" style="color:#ffffff;" class=" magee-btn-normal btn-rounded btn-md" id=""><?php echo do_shortcode($left_button_text);?></a>
          <div style="height: 10px;"></div>
        </div>
      </div>
    </div>
    <div class=" col-md-6">
      <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInRight" data-imageanimation="no">
        
        <div class="magee-alert" style="background-color:#272727;color:#ffffff;border-color:#ffffff;border-width:0px;border-radius:0px;" role="alert">
          <div style="height: 10px;"></div>
          <p><span style="font-size: 16px;"><?php echo do_shortcode($right_content);?></span></p>
          <div style="height: 10px;"></div>
          <a href="<?php echo $right_button_link;?>" target="<?php echo $right_button_target;?>" style="color:#ffffff;" class=" magee-btn-normal btn-rounded btn-md" id=""><?php echo do_shortcode($right_button_text);?></a>
          <div style="height: 10px;"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif;?>
