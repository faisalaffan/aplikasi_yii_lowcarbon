<?php
/*
  Template Name: Front Page
 */
get_header(); 
?>
<div id="metropoly-home-sections">
<?php 
global $metropoly_homepage_sections, $metropoly_home_animation;
$detect = new Mobile_Detect;
$isMobile = 0;
	if( $detect->isMobile() && !$detect->isTablet() ){
		$isMobile = 1;
		}
$metropoly_home_animation = esc_attr(metropoly_option('home_animation'));

if( $metropoly_home_animation == '1' && $isMobile == 0 )
   $metropoly_home_animation = 'metropoly-animated';
   else
   $metropoly_home_animation = '';
   
foreach(  $metropoly_homepage_sections as $k=>$v ){
get_template_part('home-sections/section',$k);
}
?> 
</div>
<?php get_footer(); ?>