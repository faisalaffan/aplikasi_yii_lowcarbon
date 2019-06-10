<?php 
  // section slogan 
  
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_10_hide',0));
   $content_model   = absint(metropoly_option('section_10_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_10_id','section-11')));
   $section_title   = wp_kses(metropoly_option('section_10_title'), $allowedposttags);
   $button_text     = esc_attr(metropoly_option('section_10_button_text'));
   $button_link     = esc_attr(metropoly_option('section_10_button_link'));
   $button_target   = esc_attr(metropoly_option('section_10_button_target'));
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="section magee-section parallax-scrolling metropoly-home-section-10" id="<?php echo $section_id;?>">
  <div class="section-content container">
  <div class="<?php echo $metropoly_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInDown" data-imageanimation="no">
  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner light" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
    
    <div style="text-align: center">
    <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" style="" class=" magee-btn-normal btn-rounded btn-lg btn-line btn-light"><?php echo $button_text;?></a>
    </div></div>
  </div>
</section>
<?php endif;?>