<?php
/**
 * VW Solar Energy Theme Customizer
 *
 * @package VW Solar Energy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_solar_energy_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_solar_energy_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-solar-energy' ),
	    'description' => __( 'Description of what this panel does.', 'vw-solar-energy' ),
	) );

	$wp_customize->add_section( 'vw_solar_energy_left_right', array(
    	'title'      => __( 'General Settings', 'vw-solar-energy' ),
		'priority'   => 30,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_solar_energy_theme_options',array(
        'default' => __('Right Sidebar','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_solar_energy_theme_options',array(
        'type' => 'select',
        'label' => __('Do you want this section','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-solar-energy'),
            'Right Sidebar' => __('Right Sidebar','vw-solar-energy'),
            'One Column' => __('One Column','vw-solar-energy'),
            'Three Columns' => __('Three Columns','vw-solar-energy'),
            'Four Columns' => __('Four Columns','vw-solar-energy'),
            'Grid Layout' => __('Grid Layout','vw-solar-energy')
        ),
	) );

	$wp_customize->add_setting('vw_solar_energy_page_layout',array(
        'default' => __('Right Sidebar','vw-solar-energy'),
        'sanitize_callback' => 'vw_solar_energy_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_solar_energy_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-solar-energy'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-solar-energy'),
        'section' => 'vw_solar_energy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-solar-energy'),
            'Right Sidebar' => __('Right Sidebar','vw-solar-energy'),
            'One Column' => __('One Column','vw-solar-energy')
        ),
	) );

	$wp_customize->add_section( 'vw_solar_energy_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-solar-energy' ),
		'priority'   => 30,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting('vw_solar_energy_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_phone',array(
		'label'	=> __('Add Phone no.','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_email_address',array(
		'label'	=> __('Add Email Address','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_solar_energy_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_timming',array(
		'label'	=> __('Add Opening Time','vw-solar-energy'),
		'section'=> 'vw_solar_energy_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_solar_energy_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-solar-energy' ),
		'priority'   => null,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting('vw_solar_energy_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_solar_energy_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-solar-energy'),
       'section' => 'vw_solar_energy_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_solar_energy_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_solar_energy_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_solar_energy_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-solar-energy' ),
			'description' => __('Slider image size (1500 x 590)','vw-solar-energy'),
			'section'  => 'vw_solar_energy_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//About Section
	$wp_customize->add_section( 'vw_solar_energy_about_section' , array(
    	'title'      => __( 'About us', 'vw-solar-energy' ),
		'priority'   => null,
		'panel' => 'vw_solar_energy_panel_id'
	) );

	$wp_customize->add_setting( 'vw_solar_energy_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_solar_energy_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_solar_energy_about_page', array(
		'label'    => __( 'About Page', 'vw-solar-energy' ),
		'description' => __('Image size (1500 x 590)','vw-solar-energy'),
		'section'  => 'vw_solar_energy_about_section',
		'type'     => 'dropdown-pages'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_solar_energy_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_solar_energy_sanitize_choices',
	));
	$wp_customize->add_control('vw_solar_energy_services',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display services','vw-solar-energy'),
		'description' => __('Services Icon size (75 x 65)','vw-solar-energy'),
		'section' => 'vw_solar_energy_about_section',
	));	

	//Footer Text
	$wp_customize->add_section('vw_solar_energy_footer',array(
		'title'	=> __('Footer','vw-solar-energy'),
		'description'=> __('This section will appear in the footer','vw-solar-energy'),
		'panel' => 'vw_solar_energy_panel_id',
	));	
	
	$wp_customize->add_setting('vw_solar_energy_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_solar_energy_footer_text',array(
		'label'	=> __('Copyright Text','vw-solar-energy'),
		'section'=> 'vw_solar_energy_footer',
		'setting'=> 'vw_solar_energy_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_solar_energy_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Solar_Energy_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Solar_Energy_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Solar_Energy_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Solar Energy Pro', 'vw-solar-energy' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-solar-energy' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/solar-energy-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-solar-energy-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-solar-energy-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Solar_Energy_Customize::get_instance();