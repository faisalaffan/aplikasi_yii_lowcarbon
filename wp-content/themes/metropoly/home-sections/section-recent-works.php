<?php
// section recent-works
   global $allowedposttags,$metropoly_home_animation;
   $section_hide    = absint(metropoly_option('section_3_hide',0));
   $content_model   = absint(metropoly_option('section_3_model',0));
   $section_id      = esc_attr(sanitize_title(metropoly_option('section_3_id','section-4')));
   $section_title   = wp_kses(metropoly_option('section_3_title'), $allowedposttags);
   $button_text     = esc_attr(metropoly_option('section_3_button_text'));
   $button_link     = esc_url(metropoly_option('section_3_button_link'));
   $button_target   = esc_attr(metropoly_option('section_3_button_target'),'_blank');
   
   $columns         = absint(metropoly_option('section_3_columns',3));
   $col             = $columns>0?12/$columns:4;
 ?> 
 <?php if( $section_hide != '1' ):?>
<section class="section magee-section metropoly-home-section-3" id="<?php echo $section_id;?>"><div class="section-content container">
<?php if( $section_title != '' ):?>
    <h2 style="text-align: center;" class="section-title"><?php echo $section_title;?></h2>
    <div class="divider divider-border center" id="" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px;"></div>
    </div>
<?php endif;?>
 <?php
	 $works_item = '';
	 $works_str  = '';
	 $animationtype = array('fadeInLeft','fadeInDown','fadeInRight','fadeInLeft','fadeInUp','fadeInRight');
	 for( $j=0; $j<6; $j++ ){
	   
	  $post_id   =  absint(metropoly_option('section_3_image_'.$j));
	  $target    =  esc_attr(metropoly_option('section_3_target_'.$j));
	  
	  $img_url     = '';
	  $link      = '';
	  
	  if( $post_id > 0 ){
	  $post    = get_post( $post_id ); 
      $link    = esc_url( get_permalink($post_id) );
	  $img_id  = get_post_thumbnail_id($post_id);
      $img_url = wp_get_attachment_image_src($img_id);
	  $img_url = esc_url($img_url[0]);
	  }

	  if( $img_url !='' ):
	  $k = $j+1;
	  if( $link == "" ){
	  $work_inner = '<img src="'.$img_url.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                </div>
                                                            </div>
                                                        </div>';
	  }else{
	  $work_inner = '<a target="'.$target.'" href="'.$link.'">
                                                        <img src="'.$img_url.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <i class="fa fa-link"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>';
													
	  }
	  
	  $works_item .= '<div class="col-sm-6 col-md-'.$col.'"><div class="'.$metropoly_home_animation.'" data-animationduration="0.9" data-animationtype="'.$animationtype[$j].'" data-imageanimation="no">
<div class="img-frame rounded"><div class="img-box figcaption-middle text-center fade-in">'.$work_inner.'</div></div></div>
</div>';
      $k = $j+1;
	  if( $k % $columns == 0 ){
	        $works_str .= '<div class="row">'.$works_item.'</div>';
	        $works_item = '';
	   }

    endif;
	
	 }
if( $works_item != '' ){
		    $works_str .= '<div class="row">'.$works_item.'</div>';
	      
		   }
	 echo $works_str;
	  ?>

<?php if( $button_text != '' ){?>
<div style="text-align:center;padding-top:60px;"><a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class=" magee-btn-normal btn-rounded btn-lg" ><?php echo $button_text;?></a></div>
<?php }?>

</div> </section>
<?php endif;?>