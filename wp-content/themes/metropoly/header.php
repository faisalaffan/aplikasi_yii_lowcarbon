<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>
<?php
 global  $metropoly_page_meta,$post,$metropoly_banner_position,$metropoly_banner_type;
			  
 $layout     = esc_attr(metropoly_option('layout','wide'));
 $full_width = isset($metropoly_page_meta['full_width'])?$metropoly_page_meta['full_width']:'no';
 $wrapper    = '';
 $body_class = '';
 if( $layout == 'boxed' )
 $wrapper    = ' wrapper-boxed container ';
 
 if( $full_width == 'yes' )
 $body_class     = 'page-full-width';
 
// slider
 $metropoly_banner_type     = isset($metropoly_page_meta['slider_banner'])?$metropoly_page_meta['slider_banner']:'0';
 $metropoly_banner_position = isset($metropoly_page_meta['banner_position'])?$metropoly_page_meta['banner_position']:'1';
 if( $metropoly_banner_type != '0' && $metropoly_banner_type != '' ):
 if( $metropoly_banner_position == '2'):
 $body_class   .= ' slider-above-header';
 else:
 $body_class   .= ' slider-below-header';
 endif;
 endif;
 $header_image = get_header_image();
?>
<body <?php body_class($body_class); ?>>
<div class="wrapper <?php echo $wrapper;?>">
<div class="top-wrap">
  <?php if( $header_image ):?>
  <img src="<?php echo esc_url($header_image); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
  <?php endif;?>
  <?php if( $metropoly_banner_position === '2'):
	           metropoly_get_page_slider( $metropoly_banner_type );
			   endif;
			  
	?>
  <?php 
		$header_style = absint(metropoly_option('header_style','0'));
		get_template_part( 'header-template/header', $header_style );
		?>
  <?php if( $metropoly_banner_position === '1'):
                metropoly_get_page_slider( $metropoly_banner_type );
			   endif;
			    
	?>
</div>
