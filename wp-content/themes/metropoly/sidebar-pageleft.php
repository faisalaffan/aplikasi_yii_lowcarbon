<?php
    global  $metropoly_page_meta;

	$left_sidebar = (isset($metropoly_page_meta['left_sidebar']) && $metropoly_page_meta['left_sidebar']!="")?$metropoly_page_meta['left_sidebar']:esc_attr(metropoly_option('left_sidebar_pages',''));
	 if ( $left_sidebar && is_active_sidebar( $left_sidebar ) ){
	 dynamic_sidebar( $left_sidebar );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	 dynamic_sidebar('default_sidebar');
	 }