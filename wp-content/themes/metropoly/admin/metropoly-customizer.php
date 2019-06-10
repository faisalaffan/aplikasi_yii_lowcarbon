<?php
  function metropoly_customize_importer_js() {
	// Import old version 
	global $pagenow,$metropoly_upgrade_from_options;
	
	if( $pagenow == "customize.php" ){
	$themename = metropoly_get_textdomain();
	
	$theme_options_version = 0;
	if( get_option($themename) && $metropoly_upgrade_from_options == '0' )
	$theme_options_version = 1;
	
	$btn_forum         = __('Support Forum','metropoly');
	$loading           = __('Loading','metropoly');
	$complete           = __('Complete','metropoly');
	$error           = __('Error','metropoly');
	$import_options  = __('Import Theme Options','metropoly');
	$transfer  = __('Click to transfer data from theme options to customizer.','metropoly');
	
	wp_enqueue_style( 'metropoly-customize',  get_template_directory_uri() .'/admin/customizer-library/css/metropoly-customizer.css', '', '' );
    wp_enqueue_script( 'metropoly-customize-importer', get_template_directory_uri() . '/admin/customizer-library/js/metropoly-customizer.js', '', '' );
	wp_localize_script( 'metropoly-customize-importer', 'metropoly_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'theme_options_version' => $theme_options_version,
			'btn_forum' => $btn_forum,
			'loading' => $loading,
			'complete' => $complete,
			'error' => $error,
			'import_options' =>$import_options,
			'transfer' =>$transfer,
		)  );
}
  }

 add_action( 'admin_enqueue_scripts', 'metropoly_customize_importer_js' );
 add_action( 'wp_ajax_metropoly_otpions_customize', 'metropoly_otpions_customize' );
 add_action( 'wp_ajax_nopriv_metropoly_otpions_customize', 'metropoly_otpions_customize' );

 function metropoly_otpions_customize(){
	 
	  $themename = metropoly_get_textdomain();
	
	 $metropoly_options = get_option($themename);
	 foreach( $metropoly_options as $option_name => $option_value ){
		 
		 set_theme_mod ( 'metropoly_'.$option_name, $option_value );
		 
		 }
		 set_theme_mod ( 'metropoly_upgrade_from_options', '1' );
	  
	 }