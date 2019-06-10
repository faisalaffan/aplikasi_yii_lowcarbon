<?php
/**
 * Defines customizer options
 *
 */

function metropoly_customizer_options() {
	global $metropoly_social_icons,$metropoly_sidebars,$metropoly_default_options , $metropoly_homepage_sections;
	// Theme defaults
  // Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'Select a page:', 'metropoly' );
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	
	
 $choices =  array( 
            'yes'   => __( 'Yes', 'metropoly' ),
            'no' => __( 'No', 'metropoly' )
 
        );
 
 $choices_reverse =  array( 
           'no'=> __( 'No', 'metropoly' ),
            'yes' => __( 'Yes', 'metropoly' )
         
        );
$choices2 =  array( 
          
            '1'   => __( 'Yes', 'metropoly' ),
            '0' => __( 'No', 'metropoly' )
 
        );
  $align =  array( 
          
          'left' => __( 'Left', 'metropoly' ),
          'right' => __( 'Right', 'metropoly' ),
          'center'  => __( 'Center', 'metropoly' )         
        );
  $repeat = array( 
          
          'repeat' => __( 'repeat', 'metropoly' ),
          'repeat-x'  => __( 'repeat-x', 'metropoly' ),
          'repeat-y' => __( 'repeat-y', 'metropoly' ),
          'no-repeat'  => __( 'no-repeat', 'metropoly' )
          
        );
  
  $position =  array( 
          
           'top left' => __( 'Top Left', 'metropoly' ),
           'top center' => __( 'Top Center', 'metropoly' ),
           'top right' => __( 'Top Right', 'metropoly' ),
           'center left' => __( 'Center Left', 'metropoly' ),
           'center center'  => __( 'Center Center', 'metropoly' ),
           'center right' => __( 'Center Right', 'metropoly' ),
           'bottom left'  => __( 'Bottom Left', 'metropoly' ),
           'bottom center'  => __( 'Bottom Center', 'metropoly' ),
           'bottom right' => __( 'Bottom Right', 'metropoly' )
            
        );
  
  $opacity   =  array_combine(range(0.1,1,0.1), range(0.1,1,0.1));
  $font_size =  array_combine(range(1,100,1), range(1,100,1));
  
  
  $metropoly_social_icons = array(
		  array('title'=>'Facebook','icon' => 'facebook', 'link'=>'#'),
		  array ('title'=>'Twitter','icon' => 'twitter', 'link'=>'#'), 
		  array('title'=>'LinkedIn','icon' => 'linkedin', 'link'=>'#'),
		  array  ('title'=>'YouTube','icon' => 'youtube', 'link'=>'#'),
		  array('title'=>'Skype','icon' => 'skype', 'link'=>'#'),
		  array ('title'=>'Pinterest','icon' => 'pinterest', 'link'=>'#'),
		  array('title'=>'Google+','icon' => 'google-plus', 'link'=>'#'),
		  array('title'=>'Email','icon' => 'envelope', 'link'=>'#'),
		  array ('title'=>'RSS','icon' => 'rss', 'link'=>'#')
        );
  $target = array(
				  '_blank' => __( 'Open in new window', 'metropoly' ),
				  '_self' => __( 'Open in same window', 'metropoly' )
				  );
  
  
	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
 ##### Home Page #####
	
		$metropoly_homepage_sections = array(
							  'banner' => __( 'Section - Banner', 'metropoly' ),
							  'service' => __( 'Section - Service', 'metropoly' ),
							  'recent-works' => __( 'Section - Recent Works', 'metropoly' ),
							  'features' => __( 'Section - Features', 'metropoly' ),
							  'panels' => __( 'Section - Panels', 'metropoly' ),
							  'team' => __( 'Section - Our Team', 'metropoly' ),
							  'testimonials' => __( 'Section - Testimonials', 'metropoly' ),
							  'news' => __( 'Section - News', 'metropoly' ),
							  'partners' => __( 'Section - Partners', 'metropoly' ),
							  'slogan' => __( 'Section - Slogan', 'metropoly' ),
							  );
	
	$panel = 'metropoly-home-page';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Home Page', 'metropoly' ),
		'priority' => '1'
	);
	
	
	// Home Page General Options
	$section = 'metropoly-sections-general';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'metropoly' ),
		'priority' => '8',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_home_animation'] = array(
		'id' => 'metropoly_home_animation',
		'label' => __( 'Enable Home Page Animation', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices2,
		'default' => '1',
	);

	
	// Section Banner
	$section = 'metropoly-section-banner';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Banner', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
  $options['metropoly_section_0_hide'] = array(
		'id' => 'metropoly_section_0_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);	
	
 
		
	$display_slide = array('1','1','','','');
	$slide_image   = array(
						   $imagepath.'banner_001.jpg',
						   $imagepath.'banner_002.jpg',
						   '',
						   '',
						   '');
	
	for( $i=0;$i<5;$i++ ){
		
		$options['metropoly_section_0_display_'.$i] = array(
		'id' => 'metropoly_section_0_display_'.$i,
		'label' => sprintf(__( 'Display Slide %d', 'metropoly' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => $display_slide[$i],
	    );
		
		$options['metropoly_section_0_image_'.$i] = array(
		'id' => 'metropoly_section_0_image_'.$i,
		'label'   => sprintf(__( 'Background Image %d', 'metropoly' ),$i+1),
		'section' => $section,
		'type'    => 'upload',
		'default' => $slide_image[$i],
		'description' => __( 'Upload background image for this slide.', 'metropoly' )
	);
		
		$options['metropoly_section_0_title_'.$i] = array(
		'id' => 'metropoly_section_0_title_'.$i,
		'label' => sprintf(__( 'Slide Title %d', 'metropoly' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'BUILD A BEAUTIFUL SITE',
	    );
		
		$options['metropoly_section_0_'.$i] = array(
		'id' => 'metropoly_section_0_'.$i,
		'label' => sprintf(__( 'Slide Sub Title %d', 'metropoly' ),$i+1),
		'description' => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'The most customizable WordPress theme for free',
	    );
		
		$options['metropoly_section_0_left_btn_text_'.$i] = array(
		'id' => 'metropoly_section_0_left_btn_text_'.$i,
		'label' => __( 'Left Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'ALL FEATURES',
	);
	$options['metropoly_section_0_left_btn_link_'.$i] = array(
		'id' => 'metropoly_section_0_left_btn_link_'.$i,
		'label' => __( 'Left Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
		
	$options['metropoly_section_0_left_btn_target_'.$i] = array(
		'id' => 'metropoly_section_0_left_btn_target_'.$i,
		'label' => __( 'Left Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);	
	
	$options['metropoly_section_0_right_btn_text_'.$i] = array(
		'id' => 'metropoly_section_0_right_btn_text_'.$i,
		'label' => __( 'Right Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'BUY NOW',
	);
	$options['metropoly_section_0_right_btn_link_'.$i] = array(
		'id' => 'metropoly_section_0_right_btn_link_'.$i,
		'label' => __( 'Right Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
		
	$options['metropoly_section_0_right_btn_target_'.$i] = array(
		'id' => 'metropoly_section_0_right_btn_target_'.$i,
		'label' => __( 'Right Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);	
}
 $options['metropoly_section_0_id'] = array(
		'id' => 'metropoly_section_0_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-1',
	);
	
	// Section Service
	$section = 'metropoly-section-service';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Service', 'metropoly' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);
	$options['metropoly_section_2_hide'] = array(
		'id' => 'metropoly_section_2_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_2_color'] = array(
		'id' => 'metropoly_section_2_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_2_background_color'] = array(
		'id' => 'metropoly_section_2_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_2_background_image'] = array(
		'id' => 'metropoly_section_2_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_2_top_padding'] = array(
		'id' => 'metropoly_section_2_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_2_bottom_padding'] = array(
		'id' => 'metropoly_section_2_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_2_title'] = array(
		'id' => 'metropoly_section_2_title',
		'label' => __( 'Section Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Services We Offer',
	);

	
	$options['metropoly_section_2_columns'] = array(
		'id' => 'metropoly_section_2_columns',
		'label' => __( 'Columns', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	
	
	$feature_icons  = array('magic','desktop','thumbs-up','flag','leaf','user');
	$feature_titles = array('Impressive Design','Responsive Layout','Bootstrap Framwork','Font Awesome Icons','SEO Friendly','Continuous Support');
	
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
		$options['metropoly_section_2_feature_icon_'.$i] = array(
		'id' => 'metropoly_section_2_feature_icon_'.$i,
		'label' => sprintf(__( 'Font Awesome Icon %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $feature_icons[$i],
	);
		
		$options['metropoly_section_2_feature_image_'.$i] = array(
		'id' => 'metropoly_section_2_feature_image_'.$i,
		'label' => sprintf(__( 'Upload Icon %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);
		
		$options['metropoly_section_2_page_'.$i] = array(
		'id' => 'metropoly_section_2_page_'.$i,
		'label' => sprintf(__( 'Service Content %d', 'metropoly' ),$j),
		'description'   => __( 'Page excerpt content.', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $options_pages,
		'default' => '',
	);
		
		
		$options['metropoly_section_2_link_'.$i] = array(
		'id' => 'metropoly_section_2_link_'.$i,
		'label' => sprintf(__( 'Enable Title Link %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	$options['metropoly_section_2_target_'.$i] = array(
		'id' => 'metropoly_section_2_target_'.$i,
		'label' => sprintf(__( 'Link Target %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
		
		
		}
		
	$options['metropoly_section_2_id'] = array(
		'id' => 'metropoly_section_2_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-3',
	);
	
	


	
	// Section Recent Works
	
	$section = 'metropoly-section-recent-works';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Recent Works', 'metropoly' ),
		'priority' => '13',
		'description' => '',
		'panel' => $panel
	);
	
		$options['metropoly_section_3_hide'] = array(
		'id' => 'metropoly_section_3_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
    $options['metropoly_section_3_color'] = array(
		'id' => 'metropoly_section_3_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_3_background_color'] = array(
		'id' => 'metropoly_section_3_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#272727',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_3_background_image'] = array(
		'id' => 'metropoly_section_3_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_3_top_padding'] = array(
		'id' => 'metropoly_section_3_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_3_bottom_padding'] = array(
		'id' => 'metropoly_section_3_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	
	$options['metropoly_section_3_title'] = array(
		'id' => 'metropoly_section_3_title',
		'label' => __( 'Section Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Recent Works',
	);
	
	
	$options['metropoly_section_3_columns'] = array(
		'id' => 'metropoly_section_3_columns',
		'label' => __( 'Columns', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	
	for( $i=0;$i < 8; $i++ ){
		$j = $i+1;
		
    $options['metropoly_section_3_image_'.$i] = array(
		'id' => 'metropoly_section_3_image_'.$i,
		'label' => sprintf(__( 'Featured Image %d', 'metropoly' ),$j),
		'description'   => __( 'Display page featured image.', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $options_pages,
		'default' => '',
	);
	
	
	$options['metropoly_section_3_target_'.$i] = array(
		'id' => 'metropoly_section_3_target_'.$i,
		'label' => sprintf(__( 'Link Target %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);	
		
	}
	
	$options['metropoly_section_3_button_text'] = array(
		'id' => 'metropoly_section_3_button_text',
		'label' => __( 'Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Launch More',
	);
	$options['metropoly_section_3_button_link'] = array(
		'id' => 'metropoly_section_3_button_link',
		'label' => __( 'Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	$options['metropoly_section_3_button_target'] = array(
		'id' => 'metropoly_section_3_button_target',
		'label' => __( 'Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
	
		$options['metropoly_section_3_id'] = array(
		'id' => 'metropoly_section_3_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-4',
	);
	


	
	// Section Features
	
	$section = 'metropoly-section-features';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Features', 'metropoly' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_section_4_hide'] = array(
		'id' => 'metropoly_section_4_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_4_color'] = array(
		'id' => 'metropoly_section_4_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_4_background_color'] = array(
		'id' => 'metropoly_section_4_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_4_background_image'] = array(
		'id' => 'metropoly_section_4_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_4_top_padding'] = array(
		'id' => 'metropoly_section_4_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '60px',
	);
	
	$options['metropoly_section_4_bottom_padding'] = array(
		'id' => 'metropoly_section_4_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	
	$options['metropoly_section_4_title'] = array(
		'id' => 'metropoly_section_4_title',
		'label' => __( 'Section Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Use <strong>Metropoly Theme</strong> to build beautiful site.',
	);

	
	$options['metropoly_section_4_image'] = array(
		'id' => 'metropoly_section_4_image',
		'label' => __( 'Image', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => esc_url('https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/09/show-img-1.png'),
	);
	
	$feature_icons   = array('magic','desktop','thumbs-up','','','');

	
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
		$options['metropoly_section_4_feature_icon_'.$i] = array(
		'id' => 'metropoly_section_4_feature_icon_'.$i,
		'label' => sprintf(__( 'Font Awesome Icon %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $feature_icons[$i],
	);
		
		$options['metropoly_section_4_feature_image_'.$i] = array(
		'id' => 'metropoly_section_4_feature_image_'.$i,
		'label' => sprintf(__( 'Upload Icon %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);
		
		$options['metropoly_section_4_feature_page_'.$i] = array(
		'id' => 'metropoly_section_4_feature_page_'.$i,
		'label' => sprintf(__( 'Feature Box Content %d', 'metropoly' ),$j),
		'description'   => __( 'Page excerpt content.', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $options_pages,
		'default' => '',
	);
		
	$options['metropoly_section_4_link_'.$i] = array(
		'id' => 'metropoly_section_4_link_'.$i,
		'label' => sprintf(__( 'Enable Title Link %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);

	$options['metropoly_section_4_target_'.$i] = array(
		'id' => 'metropoly_section_4_target_'.$i,
		'label' => sprintf(__( 'Link Target %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
		
		
		}
		
	$options['metropoly_section_4_id'] = array(
		'id' => 'metropoly_section_4_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-5',
	);
	

	
	
	// Section Panels
	
	$section = 'metropoly-section-panels';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Panels', 'metropoly' ),
		'priority' => '15',
		'description' => '',
		'panel' => $panel
	);
	
		$options['metropoly_section_5_hide'] = array(
		'id' => 'metropoly_section_5_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_5_color'] = array(
		'id' => 'metropoly_section_5_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_5_background_color'] = array(
		'id' => 'metropoly_section_5_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_5_background_image'] = array(
		'id' => 'metropoly_section_5_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => esc_url('https://demo.mageewp.com/wootest/wp-content/uploads/sites/31/2016/02/banner_02.jpg'),
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_5_top_padding'] = array(
		'id' => 'metropoly_section_5_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '60px',
	);
	
	$options['metropoly_section_5_bottom_padding'] = array(
		'id' => 'metropoly_section_5_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_5_title'] = array(
		'id' => 'metropoly_section_5_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'WHAT DO YOU WANT',
	);
	
	
	$options['metropoly_section_5_id'] = array(
		'id' => 'metropoly_section_5_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-panels',
	);
	
	
	$options['metropoly_section_5_left_content'] = array(
		'id' => 'metropoly_section_5_left_content',
		'label' => __( 'Left Box Content', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Want to know more about our work?',
	);
	$options['metropoly_section_5_left_btn_text'] = array(
		'id' => 'metropoly_section_5_left_btn_text',
		'label' => __( 'Left Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'SEE MORE PROJECTS',
	);
	$options['metropoly_section_5_left_btn_link'] = array(
		'id' => 'metropoly_section_5_left_btn_link',
		'label' => __( 'Left Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
		
	$options['metropoly_section_5_left_btn_target'] = array(
		'id' => 'metropoly_section_5_left_btn_target',
		'label' => __( 'Left Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);	
	
	$options['metropoly_section_5_right_content'] = array(
		'id' => 'metropoly_section_5_right_content',
		'label' => __( 'Right Box Content', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Want to have a talk with us?',
	);
	$options['metropoly_section_5_right_btn_text'] = array(
		'id' => 'metropoly_section_5_right_btn_text',
		'label' => __( 'Right Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'CONTACT US',
	);
	$options['metropoly_section_5_right_btn_link'] = array(
		'id' => 'metropoly_section_5_right_btn_link',
		'label' => __( 'Right Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
		
	$options['metropoly_section_5_right_btn_target'] = array(
		'id' => 'metropoly_section_5_right_btn_target',
		'label' => __( 'Right Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);	
	



	
	
	// Section Our Team
	$section = 'metropoly-section-team';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Our Team', 'metropoly' ),
		'priority' => '16',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_section_6_hide'] = array(
		'id' => 'metropoly_section_6_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);

	
	$options['metropoly_section_6_color'] = array(
		'id' => 'metropoly_section_6_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_6_background_color'] = array(
		'id' => 'metropoly_section_6_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#000000',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_6_background_image'] = array(
		'id' => 'metropoly_section_6_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_6_top_padding'] = array(
		'id' => 'metropoly_section_6_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_6_bottom_padding'] = array(
		'id' => 'metropoly_section_6_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_6_title'] = array(
		'id' => 'metropoly_section_6_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Team',
	);
	
	
	$options['metropoly_section_6_columns'] = array(
		'id' => 'metropoly_section_6_columns',
		'label' => __( 'Columns', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '4',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/team-img-3.jpg'),
					esc_url('https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/team-img-1.jpg'),
					esc_url('https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/team-img-2.jpg'),
					esc_url('https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/team-img-4.jpg'),
					'',
					'',
					'',
					'');
	$name        = array('JOHN GREEN','JOHN GREEN','JOHN GREEN','JOHN GREEN','','','','');
	$byline      = array('CEO','CEO','CEO','CEO','','','','');
	$social_icon = array('instagram','facebook','google-plus','envelope');
	
	for( $i=0;$i < 8;$i++ ){
		$j = $i+1;
				
		$options['metropoly_section_6_member_'.$i] = array(
		'id' => 'metropoly_section_6_member_'.$i,
		'label' => sprintf(__( 'Member %d', 'metropoly' ),$j),
		'description'   => __( 'Display featured image, title and excerpt.', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $options_pages,
		'default' => '',
	);
	
		$options['metropoly_section_6_byline_'.$i] = array(
		'id' => 'metropoly_section_6_byline_'.$i,
		'label' => sprintf(__( 'Byline %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $byline[$i],
	);
		
		
		for($k=0;$k<4;$k++):
		
		$options['metropoly_section_6_social_icon_'.$i.'_'.$k] = array(
		'id' => 'metropoly_section_6_social_icon_'.$i.'_'.$k,
		'label' => sprintf(__( 'Social Icon %d - %d', 'metropoly' ),$j,$k+1),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $social_icon[$k],
	);
		$options['metropoly_section_6_social_link_'.$i.'_'.$k] = array(
		'id' => 'metropoly_section_6_social_link_'.$i.'_'.$k,
		'label' => sprintf(__( 'Social Icon Link %d - %d', 'metropoly' ),$j,$k+1),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	
		endfor;
		
		}
		
	$options['metropoly_section_6_id'] = array(
		'id' => 'metropoly_section_6_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-7',
	);


	
	// Section Testimonials
	
	$section = 'metropoly-section-testimonials';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Testimonials', 'metropoly' ),
		'priority' => '17',
		'description' => '',
		'panel' => $panel
	);
		$options['metropoly_section_7_hide'] = array(
		'id' => 'metropoly_section_7_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_7_color'] = array(
		'id' => 'metropoly_section_7_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_7_background_color'] = array(
		'id' => 'metropoly_section_7_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#4154c0',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_7_background_image'] = array(
		'id' => 'metropoly_section_7_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_7_top_padding'] = array(
		'id' => 'metropoly_section_7_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_7_bottom_padding'] = array(
		'id' => 'metropoly_section_7_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_7_title'] = array(
		'id' => 'metropoly_section_7_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Testimonials',
	);
	
	
	$options['metropoly_section_7_columns'] = array(
		'id' => 'metropoly_section_7_columns',
		'label' => __( 'Columns', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	
	$avatar = array(
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/111.jpg'),
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/222.jpg'),
					esc_url('https://demo.mageewp.com/onetone/wp-content/uploads/sites/17/2015/11/222.jpg'),
					'',
					'',
					'',
					'',
					'');
	$name        = array('JACK GREEN','ANNA CASS','ANNA CASS','','','');
	$byline      = array('Web Developer','Conference','Conference','','','');
		
	for( $i=0;$i < 6;$i++ ){
		$j = $i+1;
				
		$options['metropoly_section_7_member_'.$i] = array(
		'id' => 'metropoly_section_7_member_'.$i,
		'label' => sprintf(__( 'Member %d', 'metropoly' ),$j),
		'description'   => __( 'Display featured image, title and excerpt.', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $options_pages,
		'default' => '',
	);
		
		$options['metropoly_section_7_byline_'.$i] = array(
		'id' => 'metropoly_section_7_byline_'.$i,
		'label' => sprintf(__( 'Byline %d', 'metropoly' ),$j),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => $byline[$i],
	);
		
		
		}
		
	$options['metropoly_section_7_id'] = array(
		'id' => 'metropoly_section_7_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-8',
	);
	
	


	
	// Section Latest News
	$section = 'metropoly-section-news';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Latest News', 'metropoly' ),
		'priority' => '18',
		'description' => '',
		'panel' => $panel
	);
	$options['metropoly_section_8_hide'] = array(
		'id' => 'metropoly_section_8_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_8_color'] = array(
		'id' => 'metropoly_section_8_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_8_background_color'] = array(
		'id' => 'metropoly_section_8_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_8_background_image'] = array(
		'id' => 'metropoly_section_8_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_8_top_padding'] = array(
		'id' => 'metropoly_section_8_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_8_bottom_padding'] = array(
		'id' => 'metropoly_section_8_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_8_title'] = array(
		'id' => 'metropoly_section_8_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Latest News',
	);
	
	
	$options['metropoly_section_8_columns'] = array(
		'id' => 'metropoly_section_8_columns',
		'label' => __( 'Columns', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4),
		'default' => '3',
	);
	
	$options['metropoly_section_8_posts_num'] = array(
		'id' => 'metropoly_section_8_posts_num',
		'label' => __( 'Posts Num', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => array(2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
		'default' => '3',
	);
	
	
	$options['metropoly_section_8_id'] = array(
		'id' => 'metropoly_section_8_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-9',
	);
	
	
	// Section Partners
	$section = 'metropoly-section-partners';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Partners', 'metropoly' ),
		'priority' => '20',
		'description' => '',
		'panel' => $panel
	);
	$options['metropoly_section_9_model'] = array(
		'id' => 'metropoly_section_9_model',
		'label'   => __( 'Content Model', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0'=>__( 'Default', 'metropoly' ),'1'=>__( 'Custom', 'metropoly' )),
		'default' => '0',
		'description' => __( 'Choose <b>Default</b> to fill this section form with fixed layout. Choose <b>Custom</b> to fill this section with custom html code.', 'metropoly' )
	);
	
	$options['metropoly_section_9_color'] = array(
		'id' => 'metropoly_section_9_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	
	$options['metropoly_section_9_background_color'] = array(
		'id' => 'metropoly_section_9_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#eeeeee',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_9_background_image'] = array(
		'id' => 'metropoly_section_9_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_9_top_padding'] = array(
		'id' => 'metropoly_section_9_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '20px',
	);
	
	$options['metropoly_section_9_bottom_padding'] = array(
		'id' => 'metropoly_section_9_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30px',
	);
	
	$options['metropoly_section_9_title'] = array(
		'id' => 'metropoly_section_9_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
	
	
	$partners = array(
					  'https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/partners1.png',
					  'https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/partners2.png',
					  'https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/partners3.png',
					  'https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/partners4.png',
					  'https://demo.mageewp.com/metropoly/wp-content/uploads/sites/21/2015/08/partners5.png',
					  ''
					  );
	
   for( $i=0;$i<5;$i++){
	   
	   $options['metropoly_section_9_partner_'.$i] = array(
		'id' => 'metropoly_section_9_partner_'.$i,
		'label' => __( 'Upload Image', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'upload',
		'default' => $partners[$i],
	);
	   
	   $options['metropoly_section_9_link_'.$i] = array(
		'id' => 'metropoly_section_9_link_'.$i,
		'label' => __( 'Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	   
	    $options['metropoly_section_9_title_'.$i] = array(
		'id' => 'metropoly_section_9_title_'.$i,
		'label' => __( 'Tooltip Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '',
	);
		
	   }
	
	
	
	$options['metropoly_section_9_id'] = array(
		'id' => 'metropoly_section_9_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-10',
	);
	
	$options['metropoly_section_9_content'] = array(
		'id' => 'metropoly_section_9_content',
		'label' => __( 'Custom Section Content', 'metropoly' ),
		'description'   => __( 'This would display instead of fixed layout once Content Modal is set as <b>Custom</b>. HTML Code and Shortcode are both allowed.', 'metropoly' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '',
	);
	

	$options['metropoly_section_9_hide'] = array(
		'id' => 'metropoly_section_9_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);


// Section Slogan
	$section = 'metropoly-section-slogan';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Section - Slogan', 'metropoly' ),
		'priority' => '21',
		'description' => '',
		'panel' => $panel
	);
   $options['metropoly_section_10_hide'] = array(
		'id' => 'metropoly_section_10_hide',
		'label' => __( 'Hide Section', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '',
	);
	
	$options['metropoly_section_10_color'] = array(
		'id' => 'metropoly_section_10_color',
		'label'   => __( 'Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' =>  '#ffffff',
		'description' => __( 'Set color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_10_background_color'] = array(
		'id' => 'metropoly_section_10_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' =>  '#26b9a3',
		'description' => __( 'Set background color for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_10_background_image'] = array(
		'id' => 'metropoly_section_10_background_image',
		'label'   => __( 'Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' =>  '',
		'description' => __( 'Upload background image for this section.', 'metropoly' )
	);
	
	$options['metropoly_section_10_top_padding'] = array(
		'id' => 'metropoly_section_10_top_padding',
		'label' => __( 'Section Top Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	$options['metropoly_section_10_bottom_padding'] = array(
		'id' => 'metropoly_section_10_bottom_padding',
		'label' => __( 'Section Bottom Padding', 'metropoly' ),
		'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '50px',
	);
	
	
	$options['metropoly_section_10_title'] = array(
		'id' => 'metropoly_section_10_title',
		'label' => __( 'Title', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'The most elegant theme you\'ve ever seen.<br>Want it? Feel free to contact us.',
	);
	
	
	$options['metropoly_section_10_button_text'] = array(
		'id' => 'metropoly_section_10_button_text',
		'label' => __( 'Button Text', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'Get The Theme!',
	);
	$options['metropoly_section_10_button_link'] = array(
		'id' => 'metropoly_section_10_button_link',
		'label' => __( 'Button Link', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => '#',
	);
	$options['metropoly_section_10_button_target'] = array(
		'id' => 'metropoly_section_10_button_target',
		'label' => __( 'Button Link Target', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'select',
		'choices' => $target,
		'default' => '_blank',
	);
	
	
	$options['metropoly_section_10_id'] = array(
		'id' => 'metropoly_section_10_id',
		'label' => __( 'Section ID', 'metropoly' ),
		'description'   => '',
		'section' => $section,
		'type'    => 'text',
		'default' => 'section-11',
	);
	
				
	
	##### General panel #####


	$section = 'metropoly_general';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => ''
	);
	
	$options['metropoly_custom_css'] =  array(
			'id'          => 'metropoly_custom_css',
			'label'       => __( 'Custom CSS', 'metropoly' ),
			'description' => __( 'The following css code will add to the header before the closing &lt;/head&gt; tag.', 'metropoly'),
			'default'     => '#custom {
				}',
			'type'        => 'textarea',
			'section'     => $section,
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
			
		  );


// styleling

 
### Styling ###
    $panel = 'styling';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Styling', 'metropoly' ),
		'priority' => '12'
	);
	
	$section = 'styling_general';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_scheme'] = array(
		'id' => 'metropoly_scheme',
		'label'   => __( 'Primary Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#26b9a3',
		'description' => __( 'Set primary color for your site.', 'metropoly' )
	);
	
	//Background Colors

   $section = 'background_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Colors', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);


$options['metropoly_sticky_header_background_color'] =  array(
        'id'          => 'metropoly_sticky_header_background_color',
        'label'      => __( 'Sticky Header Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for sticky header.', 'metropoly' ),
        'default'         => '#ffffff',
        'type'        => 'color',
        'section' => $section,

      );
$options['metropoly_sticky_header_background_opacity'] = array(
        'id'          => 'metropoly_sticky_header_background_opacity',
        'label'      => __( 'Sticky Header Background Opacity', 'metropoly' ),
        'description'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'metropoly' ),
        'default'         => '0.7',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $opacity,
        
        
      );
$options['metropoly_header_background_color'] = array(
        'id'          => 'metropoly_header_background_color',
        'label'      => __( 'Header Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for header.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_header_background_opacity'] = array(
        'id'          => 'metropoly_header_background_opacity',
        'label'      => __( 'Header Background Opacity', 'metropoly' ),
        'description'        => __( 'Opacity only works with header top position and ranges between 0 (transparent) and 1.', 'metropoly' ),
        'default'         => '1',
        'type'        => 'select',
        'section' => $section,
        
        'choices'     => $opacity,
        
        
      );
$options['metropoly_header_border_color'] = array(
        'id'          => 'metropoly_header_border_color',
        'label'      => __( 'Header Border Color', 'metropoly' ),
        'description'        => __( 'Set border color for header.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
      );



$options['metropoly_page_title_bar_background_color'] =  array(
        'id'          => 'metropoly_page_title_bar_background_color',
        'label'      => __( 'Page Title Bar Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for page title bar.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_page_title_bar_borders_color'] = array(
        'id'          => 'metropoly_page_title_bar_borders_color',
        'label'      => __( 'Page Title Bar Borders Color', 'metropoly' ),
        'description'        => __( 'Set border color for page title bar.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_content_background_color'] = array(
        'id'          => 'metropoly_content_background_color',
        'label'      => __( 'Content Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for content area.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_sidebar_background_color'] = array(
        'id'          => 'metropoly_sidebar_background_color',
        'label'      => __( 'Sidebar Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for sidebar.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_footer_background_color'] = array(
        'id'          => 'metropoly_footer_background_color',
        'label'      => __( 'Footer Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for footer.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_footer_border_color'] = array(
        'id'          => 'metropoly_footer_border_color',
        'label'      => __( 'Footer Border Color', 'metropoly' ),
        'description'        => __( 'Set border color for header.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_copyright_background_color'] = array(
        'id'          => 'metropoly_copyright_background_color',
        'label'      => __( 'Copyright Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for copyright area.', 'metropoly' ),
        'default'         => '#666666',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options[ 'copyright_border_color'] = array(
        'id'          => 'metropoly_copyright_border_color',
        'label'      => __( 'Copyright Border Color', 'metropoly' ),
        'description'        => __( 'Set border color for copyright area', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
	
//Element Colors

   $section = 'element_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Element Colors', 'metropoly' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);


$options['metropoly_footer_widget_divider_color'] =  array(
        'id'          => 'metropoly_footer_widget_divider_color',
        'label'      => __( 'Footer Widget Divider Color', 'metropoly' ),
        'description'        => __( 'Set divider color for footer.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_form_background_color'] =  array(
        'id'          => 'metropoly_form_background_color',
        'label'      => __( 'Form Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for form fields.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_form_text_color'] =  array(
        'id'          => 'metropoly_form_text_color',
        'label'      => __( 'Form Text Color', 'metropoly' ),
        'description'        => __( 'Set text color for forms.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_form_border_color'] =  array(
        'id'          => 'metropoly_form_border_color',
        'label'      => __( 'Form Border Color', 'metropoly' ),
        'description'        => __( 'Set border color for forms.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
    
      );
 
 // Font Colors
	 
	$section = 'font_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Colors', 'metropoly' ),
		'priority' => '14',
		'description' => '',
		'panel' => $panel
	);

 
$options['metropoly_header_tagline_color'] =  array(
        'id'          => 'metropoly_header_tagline_color',
        'label'      => __( 'Header Tagline', 'metropoly' ),
        'description'        => __( 'Set color for header tagline.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_page_title_color'] =  array(
        'id'          => 'metropoly_page_title_color',
        'label'      => __( 'Page Title', 'metropoly' ),
        'description'        => __( 'Set color for page title.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );

$options['metropoly_h1_color'] =  array(
        'id'          => 'metropoly_h1_color',
        'label'      => __( 'Heading 1 (H1) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h1 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_h2_color'] =  array(
        'id'          => 'metropoly_h2_color',
        'label'      => __( 'Heading 2 (H2) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h2 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_h3_color'] =  array(
        'id'          => 'metropoly_h3_color',
        'label'      => __( 'Heading 3 (H3) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h3 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_h4_color'] =  array(
        'id'          => 'metropoly_h4_color',
        'label'      => __( 'Heading 4 (H4) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h4 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_h5_color'] =  array(
        'id'          => 'metropoly_h5_color',
        'label'      => __( 'Heading 5 (H5) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h5 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_h6_color'] =  array(
        'id'          => 'metropoly_h6_color',
        'label'      => __( 'Heading 6 (H6) Font Color', 'metropoly' ),
        'description'        => __( 'Set color for h6 element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
 
$options['metropoly_body_text_color'] =  array(
        'id'          => 'metropoly_body_text_color',
        'label'      => __( 'Body Text Color', 'metropoly' ),
        'description'        => __( 'Set color for body text.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_link_color'] =  array(
        'id'          => 'metropoly_link_color',
        'label'      => __( 'Link Color', 'metropoly' ),
        'description'        => __( 'Set color for hypelink element.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_breadcrumbs_text_color'] =  array(
        'id'          => 'metropoly_breadcrumbs_text_color',
        'label'      => __( 'Breadcrumbs Text Color', 'metropoly' ),
        'description'        => __( 'Set color for breadcrumbs text.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );

$options['metropoly_sidebar_widget_headings_color'] =  array(
        'id'          => 'metropoly_sidebar_widget_headings_color',
        'label'      => __( 'Sidebar Widget Headings Color', 'metropoly' ),
        'description'        => __( 'Set color for widget headings in sidebar.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_footer_headings_color'] = array(
        'id'          => 'metropoly_footer_headings_color',
        'label'      => __( 'Footer Headings Color', 'metropoly' ),
        'description'        => __( 'Set color for widget headings in footer.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_footer_text_color'] = array(
        'id'          => 'metropoly_footer_text_color',
        'label'      => __( 'Footer Text Color', 'metropoly' ),
        'description'        => __( 'Set color for text in footer.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
$options['metropoly_footer_link_color'] = array(
        'id'          => 'metropoly_footer_link_color',
        'label'      => __( 'Footer Link Color', 'metropoly' ),
        'description'        => __( 'Set color for link in footer.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
        
        
      );
 

	 // main menu colors
	 
	 $section = 'main_menu_colors';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Main Menu Colors', 'metropoly' ),
		'priority' => '15',
		'description' => '',
		'panel' => $panel
	);


$options[ 'main_menu_background_color_1'] =  array(
        'id'          => 'metropoly_main_menu_background_color_1',
        'label'      => __( 'Main Menu Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for main menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
      );
$options['metropoly_main_menu_font_color_1'] =  array(
        'id'          => 'metropoly_main_menu_font_color_1',
        'label'      => __( 'Main Menu Font Color ( First Level )', 'metropoly' ),
        'description'        => __( 'Set font color for main menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,  
      );
$options[ 'main_menu_font_hover_color_1'] =  array(
        'id'          => 'metropoly_main_menu_font_hover_color_1',
        'label'      => __( 'Main Menu Font Hover Color ( First Level )', 'metropoly' ),
        'description'        => __( 'Set hover font color for main menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
 
      );
$options[ 'main_menu_background_color_2'] =  array(
        'id'          => 'metropoly_main_menu_background_color_2',
        'label'      => __( 'Main Menu Background Color ( Sub Level )', 'metropoly' ),
        'description'        => __( 'Set background color for sub menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
   
$options[ 'main_menu_font_color_2'] =  array(
        'id'          => 'metropoly_main_menu_font_color_2',
        'label'      => __( 'Main Menu Font Color ( Sub Level )', 'metropoly' ),
        'description'        => __( 'Set font color for sub menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['metropoly_main_menu_font_hover_color_2'] =  array(
        'id'          => 'metropoly_main_menu_font_hover_color_2',
        'label'      => __( 'Main Menu Font Hover Color ( Sub Level )', 'metropoly' ),
        'description'        => __( 'Set hover font color for sub menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['metropoly_main_menu_separator_color_2'] =  array(
        'id'          => 'metropoly_main_menu_separator_color_2',
        'label'      => __( 'Main Menu Separator Color ( Sub Levels )', 'metropoly' ),
        'description'        => __( 'Set border color for sub menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,

      );
$options['metropoly_woo_cart_menu_background_color'] =  array(
        'id'          => 'metropoly_woo_cart_menu_background_color',
        'label'      => __( 'Woo Cart Menu Background Color', 'metropoly' ),
        'description'        => __( 'Set background color for woocommerce cart menu.', 'metropoly' ),
        'default'         => '',
        'type'        => 'color',
        'section' => $section,
        
      );	
  ##### Site Width #####
	
	// Site Width panel
	
	$panel = 'site-width';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Site Width', 'metropoly' ),
		'priority' => '11'
	);
	
	// Layout Options
	$section = 'layout-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout Options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_layout'] = array(
		'id' => 'metropoly_layout',
		'label'   => __( 'Layout', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array( 
          'boxed'     => __( 'Boxed', 'metropoly' ),
		  'wide'     => __( 'Wide', 'metropoly' ),
        ),
		'default' => 'wide',
		'description' => __( 'Select boxed or wide layout.', 'metropoly')
	);
	
	$options['metropoly_site_width'] = array(
		'id' => 'metropoly_site_width',
		'label' => __( 'Site Width', 'metropoly' ),
		'description'   =>__( 'Controls the overall site width. In px or %, ex: 100% or 1170px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '1170px',
	);

  // Content Width/Sidebar Width
  
  $section = 'content-sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Content Width/Sidebar Width', 'metropoly' ),
		'priority' => '10',
		'description' => __( 'These settings are used on pages with 1 sidebar. Total values must add up to 100.', 'metropoly' ),
		'panel' => $panel
	);
	
	$options['metropoly_content_width_1'] = array(
		'id' => 'metropoly_content_width_1',
		'label' => __( 'Content Width', 'metropoly' ),
		'description'   => __( 'Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '75%%',
	);


  $options['metropoly_sidebar_width'] = array(
		'id' => 'metropoly_sidebar_width',
		'label' => __( 'Sidebar Width', 'metropoly' ),
		'description'   => __( 'Controls the width of the sidebar. In px or %', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '25%%',
	);
  
  // Content Width/Sidebar Width
  
  $section = 'content-sidebar-sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Content Width/Left & Right Sidebar Width', 'metropoly' ),
		'priority' => '10',
		'description' => __( 'These settings are used on pages with 2 sidebars. Total values must add up to 100%.', 'metropoly' ),
		'panel' => $panel
	);
	
	$options['metropoly_content_width_2'] = array(
		'id' => 'metropoly_content_width_2',
		'label' => __( 'Content Width', 'metropoly' ),
		'description'   => __( 'Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '60%%',
	);


  $options['metropoly_sidebar_width_1'] = array(
		'id' => 'metropoly_sidebar_width_1',
		'label' => __( 'Sidebar 1 Width', 'metropoly' ),
		'description'   => __( 'Controls the width of the sidebar 1. In px or %.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '20%%',
	);
  
  $options['metropoly_sidebar_width_2'] = array(
		'id' => 'metropoly_sidebar_width_2',
		'label' => __( 'Sidebar 2 Width', 'metropoly' ),
		'description'   => __( 'Controls the width of the sidebar 2. In px or %.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '20%%',
	);
  
  
    ##### Header #####
	
	// Header panel
	
	$panel = 'header';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Header', 'metropoly' ),
		'priority' => '12'
	);
	
	
	// Top Bar Options
	$section = 'top-bar-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Top Bar Options', 'metropoly' ),
		'priority' => '10',
		'description' => __( 'Top Bar Options.', 'metropoly' ),
		'panel' => $panel
	);
	
	$options['metropoly_display_top_bar'] = array(
		'id' => 'metropoly_display_top_bar',
		'label'   => __( 'Display Top Bar', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'no',
		'description'   => __( 'Choose to display top bar or not.', 'metropoly' ),
	);
	
	$options['metropoly_top_bar_background_color'] = array(
		'id' => 'metropoly_top_bar_background_color',
		'label'   => __( 'Background Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#eee',
		'description' => __( 'Set background color for top bar.', 'metropoly' )
	);
	
	$options['metropoly_top_bar_left_content'] = array(
		'id' => 'metropoly_top_bar_left_content',
		'label'   => __( 'Left Content', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array( 
          'info'     => __( 'Info', 'metropoly' ),
          'sns'     => __( 'SNS', 'metropoly' ),
          'menu'     => __( 'Menu', 'metropoly' ),
          'none'     => __( 'None', 'metropoly' ),
           
        ),
		'default' => 'info',
		'description' => __( 'Select which content displays in left content area.', 'metropoly')
	);
	
	$options['metropoly_top_bar_right_content'] = array(
		'id' => 'metropoly_top_bar_right_content',
		'label'   => __( 'Right Content', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array( 
          'info'     => __( 'Info', 'metropoly' ),
          'sns'     => __( 'SNS', 'metropoly' ),
          'menu'     => __( 'Menu', 'metropoly' ),
          'none'     => __( 'None', 'metropoly' ),
           
        ),
		'default' => 'sns',
		'description' => __( 'Select which content displays in right content area.', 'metropoly')
	);
	
	$options['metropoly_top_bar_info_content'] = array(
		'id' => 'metropoly_top_bar_info_content',
		'label'   => __( 'Info Content', 'metropoly' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => __( 'Mail: support@mageewp.com&nbsp;&nbsp;&nbsp;Phone: 1-234-567-8899', 'metropoly' )
	);

	$options['metropoly_top_bar_info_color'] = array(
		'id' => 'metropoly_top_bar_info_color',
		'label'   => __( 'Info Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
	);
	
	$options['metropoly_top_bar_menu_color'] = array(
		'id' => 'metropoly_top_bar_menu_color',
		'label'   => __( 'Menu Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set font color for menu.', 'metropoly')
	);
	
	if( $metropoly_social_icons ):
 $i = 1;
 foreach($metropoly_social_icons as $social_icon){
	
	 $options['metropoly_header_social_title_'.$i] =  array(
        'id'          => 'metropoly_header_social_title_'.$i,
        'label'       => __( 'Social Title', 'metropoly' ) .' '.$i,
		'default'         => $social_icon['title'],
        'section' => $section,
        'type'        => 'text',
        'description' => __( 'This would display in tooltip.', 'metropoly' )
      );
 $options['metropoly_header_social_icon_'.$i] = array(
        'id'          => 'metropoly_header_social_icon_'.$i,
        'label'       => __( 'Social Icon', 'metropoly' ).' '.$i,
		'default'         => $social_icon['icon'],
        'section' => $section,
        'type'        => 'text',
        'description' => sprintf(__( 'Insert font awesome icon here, more icons can be found at <a href="%s" target="_blank">FontAwesome Icons</a>.', 'metropoly' ),esc_url('http://fontawesome.io/icons'))
      );
 $options['metropoly_header_social_link_'.$i] = array(
        'id'          => 'metropoly_header_social_link_'.$i,
        'label'       => __( 'Social Icon Link', 'metropoly' ).' '.$i,
        'default'         => $social_icon['link'],
        'section' => $section,
        'type'        => 'text',
        'description' => __( 'Insert the link to show this icon.', 'metropoly' )
      );

	 $i++;
	 }
	endif;	
	
	$options['metropoly_top_bar_social_icons_color'] = array(
		'id' => 'metropoly_top_bar_social_icons_color',
		'label'   =>  __( 'Social Icons Color', 'metropoly' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '',
		'description' => __( 'Set color for social icons.', 'metropoly' )
	);
	
	
	$options['metropoly_top_bar_social_icons_tooltip_position'] = array(
		'id' => 'metropoly_top_bar_social_icons_tooltip_position',
		'label'   => __( 'Tooltip Position for Social Icons', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array( 
          'left'     => __( 'left', 'metropoly' ),
		  'right'     => __( 'right', 'metropoly' ),
          'bottom'     => __( 'bottom', 'metropoly' ),
           
        ),
		'default' => 'left',
		'description' => __( 'Controls the tooltip position of the social icons in top bar.', 'metropoly' )
	);

	// Header options
	$section = 'header-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_header_style'] = array(
    'id' => 'metropoly_header_style',
    'label'   => __( 'Header Style', 'metropoly' ),
    'section' => $section,
    'type'    => 'select',
    'choices' => array('0'=>__('Style 1', 'metropoly'),'1'=>__('Style 2', 'metropoly')),
    'default' => '0',
    'description'   => __( 'Choose header style.', 'metropoly'),
  );
	
	$options['metropoly_header_overlay'] = array(
		'id' => 'metropoly_header_overlay',
		'label'   => __( 'Header Overlay', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices_reverse,
		'default' => 'yes',
		'description'   => __( 'Choose to set header as overlay style.', 'metropoly'),
	);
	
	
	$options['metropoly_header_background_image'] = array(
		'id' => 'metropoly_header_background_image',
		'label'   => __( 'Header Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description'   => __( 'Background Image For Header Area.', 'metropoly' ),
	);
	
	
	$options['metropoly_header_background_full'] = array(
		'id' => 'metropoly_header_background_full',
		'label'   => __( '100% Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'no',
		'description'   => __( 'Turn on to have the header background image display at 100% in width and height and scale according to the browser size.', 'metropoly' ),
	);
	
	$options['metropoly_header_background_parallax'] = array(
		'id' => 'metropoly_header_background_parallax',
		'label'   => __( 'Parallax Background Image', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices_reverse,
		'default' => 'no',
		'description'   =>  __( 'Turn on to enable parallax scrolling on the background image for header top positions.', 'metropoly' ),
	);
	
	
	$options['metropoly_header_background_repeat'] = array(
		'id' => 'metropoly_header_background_repeat',
		'label'   => __( 'Background Repeat', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $repeat,
		'default' => 'no',
		'description'   =>  __( 'Select how the background image repeats.', 'metropoly' ),
	);
	
	$options['metropoly_header_top_padding'] = array(
		'id' => 'metropoly_header_top_padding',
		'label' => __( 'Header Top Padding', 'metropoly' ),
		'description'   => __( 'In pixels or percentage, ex: 10px or 10%.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0px',
	);
	
	$options['metropoly_header_bottom_padding'] = array(
		'id' => 'metropoly_header_bottom_padding',
		'label' => __( 'Header Bottom Padding', 'metropoly' ),
		'description'   => __( 'In pixels or percentage, ex: 10px or 10%.', 'metropoly' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0px',
	);
	
	 $options['metropoly_main_menu_dropdown_width'] = array(
        'id'          => 'metropoly_main_menu_dropdown_width',
        'label'      => __( 'Main Menu Dropdown Width', 'metropoly' ),
        'description'        => '',
        'default'         => '150px',
        'type'        => 'text',
        'section' => $section,
        
      );
	
	$options['metropoly_tagline'] = array(
        'id'          => 'metropoly_tagline',
        'label'      => __( 'Tagline', 'metropoly' ),
        'description'        => __( 'Header Style 2 only.', 'metropoly' ),
        'default'         => '',
        'type'        => 'text',
        'section' => $section,
        
      );
	  
	 // Logo
	$section = 'logo';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);

	$options['metropoly_default_logo'] = array(
			'id'          => 'metropoly_default_logo',
			'label'       => __( 'Upload Logo', 'metropoly' ),
			'description'        => __( 'Select an image file for your logo.', 'metropoly' ),
			'default'         => '',
			'type'        => 'upload',
			'section'     => $section,
			
		  );
		
	$options['metropoly_default_logo_retina'] =  array(
			'id'          => 'metropoly_default_logo_retina',
			'label'       => __( 'Upload Logo (Retina Version @2x)', 'metropoly' ),
			'description'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'metropoly' ),
			'default'         => '',
			'type'        => 'upload',
			'section'     => $section,
			
		  );
	$options['metropoly_retina_logo_width'] = array(
			'id'          => 'metropoly_retina_logo_width',
			'label'       => __( 'Standard Logo Width for Retina Logo', 'metropoly' ),
			'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	
	$options['metropoly_retina_logo_height'] =  array(
			'id'          => 'metropoly_retina_logo_height',
			'label'       => __( 'Standard Logo Height for Retina Logo', 'metropoly' ),
			'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	
	
	
	 // Logo Options
	$section = 'logo-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo Options', 'metropoly' ),
		'priority' => '30',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_logo_position'] =  array(
        'id'          => 'metropoly_logo_position',
        'label'      => __( 'Logo Position', 'metropoly' ),
        'description'        => '',
        'default'         => 'left',
        'type'        => 'select',
        'section' => $section,
        'choices'     => $align
      );
		
	$options['metropoly_logo_left_margin'] =  array(
			'id'          => 'metropoly_logo_left_margin',
			'label'       => __( 'Logo Left Margin', 'metropoly' ),
			'description'        => __( 'Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	$options['metropoly_logo_right_margin'] = array(
			'id'          => 'metropoly_logo_right_margin',
			'label'       => __( 'Logo Right Margin', 'metropoly' ),
			'description'        => __( 'Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	$options['metropoly_logo_top_margin'] = array(
			'id'          => 'metropoly_logo_top_margin',
			'label'       => __( 'Logo Top Margin', 'metropoly' ),
			'description'        => __( 'Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	$options['metropoly_logo_bottom_margin'] = array(
			'id'          => 'metropoly_logo_bottom_margin',
			'label'       => __( 'Logo Bottom Margin', 'metropoly' ),
			'description'        => __( 'Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	


 ##### Sticky Header #####
	$panel = 'sticky-header';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Sticky Header', 'metropoly' ),
		'priority' => '13'
	);

	
	// Sticky Header options
	$section = 'sticky-header-options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sticky Header options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['metropoly_enable_sticky_header'] = array(
		'id' => 'metropoly_enable_sticky_header',
		'label'   => __( 'Enable Sticky Header', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'yes',
		'description'   => __( 'Choose to enable a fixed header when scrolling.', 'metropoly' ),
	);
	
	$options['metropoly_enable_sticky_header_tablets'] = array(
		'id' => 'metropoly_enable_sticky_header_tablets',
		'label'   => __( 'Enable Sticky Header on Tablets', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'no',
		'description'   => __( 'Choose to enable a fixed header when scrolling on tablets.', 'metropoly' ),
	);


  $options['metropoly_enable_sticky_header_mobiles'] = array(
		'id' => 'metropoly_enable_sticky_header_mobiles',
		'label'   => __( 'Enable Sticky Header on Mobiles', 'metropoly' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'no',
		'description'   => __( 'Choose to enable a fixed header when scrolling on mobiles.', 'metropoly' ),
	);
  

  
  $options['metropoly_sticky_header_menu_item_padding'] = array(
        'id'          => 'metropoly_sticky_header_menu_item_padding',
        'label'       => __( 'Sticky Header Menu Item Padding', 'metropoly' ),
        'description'        => __( 'Controls the space between each menu item in the sticky header. Use a number without \'px\', default is 0. ex: 10', 'metropoly' ),
        'default'         => '0',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['metropoly_sticky_header_navigation_font_size'] = array(
        'id'          => 'metropoly_sticky_header_navigation_font_size',
        'label'       => __( 'Sticky Header Navigation Font Size', 'metropoly' ),
        'description' => __( 'Controls the font size of the menu items in the sticky header. Use a number without \'px\', default is 14. ex: 14', 'metropoly' ),
        'default'     => '14',
        'type'        => 'text',
        'section'     => $section,
        
      );

 // Sticky Logo
	$section = 'sticky-logo';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sticky Logo', 'metropoly' ),
		'priority' => '20',
		'description' => '',
		'panel' => $panel
	);
		
	$options['metropoly_sticky_header_logo'] =  array(
			'id'          => 'metropoly_sticky_header_logo',
			'label'       => __( 'Sticky Header Logo', 'metropoly' ).' <span data-accordion="accordion-group-4" class="fa fa-plus"></span>',
			'description'        => '',
			'default'         => '',
			'type'        => 'textblock-titled',
			'section'     => $section,
			
		  );
	$options['metropoly_sticky_logo'] = array(
			'id'          => 'metropoly_sticky_logo',
			'label'       => __( 'Upload Logo', 'metropoly' ),
			'description'        => __( 'Select an image file for your logo.', 'metropoly' ),
			'default'         => '',
			'type'        => 'upload',
			'section'     => $section,
		  );
		
	$options['metropoly_sticky_logo_retina'] =  array(
			'id'          => 'metropoly_sticky_logo_retina',
			'label'       => __( 'Upload Logo (Retina Version @2x)', 'metropoly' ),
			'description'        => __( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.', 'metropoly' ),
			'default'         => '',
			'type'        => 'upload',
			'section'     => $section,
			
		  );
	$options['metropoly_sticky_logo_width_for_retina_logo'] = array(
			'id'          => 'metropoly_sticky_logo_width_for_retina_logo',
			'label'       => __( 'Sticky Logo Width for Retina Logo', 'metropoly' ),
			'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width. Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );
	$options['metropoly_sticky_logo_height_for_retina_logo'] = array(
			'id'          => 'metropoly_sticky_logo_height_for_retina_logo',
			'label'       => __( 'Sticky Logo Height for Retina Logo', 'metropoly' ),
			'description'        => __( 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height. Use a number without \'px\', ex: 40', 'metropoly' ),
			'default'         => '',
			'type'        => 'text',
			'section'     => $section,
			
		  );


#### page title bar options ####

$panel = 'page-title-bar';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Page Title Bar', 'metropoly' ),
		'priority' => '14'
	);
// Page Title Bar Options
  $section = 'page-title-bar-options';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Page Title Bar Options', 'metropoly' ),
	  'priority' => '10',
	  'description' => '',
	  'panel' => $panel
  );


$options['metropoly_enable_page_title_bar'] =  array(
        'id'          => 'metropoly_enable_page_title_bar',
        'label'       => __( 'Enable Page Title Bar', 'metropoly' ),
        'description' => '',
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices,
        'description' => __( 'Choose to display page title bar for pages & posts.', 'metropoly' )
      );
   
$options['metropoly_page_title_bar_top_padding'] =  array(
        'id'          => 'metropoly_page_title_bar_top_padding',
        'label'       => __( 'Page Title Bar Top Padding', 'metropoly' ),
        'description' => __( 'In pixels, ex: 210px', 'metropoly' ),
        'default'     => '210px',
        'type'        => 'text',
        'section'     => $section,
        
      );
   
$options['metropoly_page_title_bar_bottom_padding'] =  array(
        'id'          => 'metropoly_page_title_bar_bottom_padding',
        'label'       => __( 'Page Title Bar Bottom Padding', 'metropoly' ),
        'description' => __( 'In pixels, ex: 160px', 'metropoly' ),
        'default'     => '160px',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['metropoly_page_title_bar_mobile_top_padding'] =  array(
        'id'          => 'metropoly_page_title_bar_mobile_top_padding',
        'label'       => __( 'Page Title Bar Mobile Top Padding', 'metropoly' ),
        'description' => __( 'In pixels, ex: 70px', 'metropoly' ),
        'default'     => '70px',
        'type'        => 'text',
        'section'     => $section,
        
      );
   
$options['metropoly_page_title_bar_mobile_bottom_padding'] =  array(
        'id'          => 'metropoly_page_title_bar_mobile_bottom_padding',
        'label'       => __( 'Page Title Bar Mobile Bottom Padding', 'metropoly' ),
        'description' => __( 'In pixels, ex: 50px', 'metropoly' ),
        'default'     => '50px',
        'type'        => 'text',
        'section'     => $section,
        
      );

$options['metropoly_page_title_bar_background'] =  array(
        'id'          => 'metropoly_page_title_bar_background',
        'label'       => __( 'Page Title Bar Background', 'metropoly' ),
        'description' => __( 'Set background image for page title bar.', 'metropoly' ),
        'default'     => $imagepath.'bg-1.jpg',
        'type'        => 'upload',
        'section'     => $section,
        
      );
$options['metropoly_page_title_bar_retina_background'] =  array(
        'id'          => 'metropoly_page_title_bar_retina_background',
        'label'       => __( 'Page Title Bar Background (Retina Version @2x)', 'metropoly' ),
        'description' => __( 'Set background image for retina page title bar.', 'metropoly' ),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
   
$options['metropoly_page_title_bg_full'] =  array(
        'id'          => 'metropoly_page_title_bg_full',
        'label'       => __( '100% Background Image', 'metropoly' ),
        'description' => __( 'Select yes to have the page title bar background image display at 100% in width and height and scale according to the browser size.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_page_title_bg_parallax'] = array(
        'id'          => 'metropoly_page_title_bg_parallax',
        'label'       => __( 'Parallax Background Image', 'metropoly' ),
        'description' => __( 'Select yes to enable parallax background image when scrolling.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
	
$options['metropoly_page_title_align'] =  array(
        'id'          => 'metropoly_page_title_align',
        'label'       => __( 'Page Title Align', 'metropoly' ),
        'description' => __( 'Set alignment for page title.' ,'metropoly' ),
        'default'     => 'left',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $align
      );




// Breadcrumb Options
  $section = 'breadcrumb-options';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Breadcrumb Options', 'metropoly' ),
	  'priority' => '11',
	  'description' => '',
	  'panel' => $panel
  );

 
 $options['metropoly_display_breadcrumb'] =  array(
        'id'          => 'metropoly_display_breadcrumb',
        'label'       => __( 'Display breadcrumbs', 'metropoly' ),
        'description' => __( 'Choose to display or hide breadcrumbs.', 'metropoly'),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['metropoly_breadcrumbs_on_mobile_devices'] =  array(
        'id'          => 'metropoly_breadcrumbs_on_mobile_devices',
        'label'       => __( 'Breadcrumbs on Mobile Devices', 'metropoly' ),
        'description' => __( 'Choose to display breadcrumbs on mobile devices.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_breadcrumb_menu_prefix'] =  array(
        'id'          => 'metropoly_breadcrumb_menu_prefix',
        'label'       => __( 'Breadcrumb Menu Prefix', 'metropoly' ),
        'description' => __( 'The text before the breadcrumb menu.', 'metropoly' ),
        'default'     => '',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['metropoly_breadcrumb_menu_separator'] =  array(
        'id'          => 'metropoly_breadcrumb_menu_separator',
        'label'       => __( 'Breadcrumb Menu Separator', 'metropoly' ),
        'description' => __( 'Choose a separator between the single breadcrumbs.', 'metropoly' ),
        'default'     => '/',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['metropoly_breadcrumb_show_post_type_archive'] =  array(
        'id'          => 'metropoly_breadcrumb_show_post_type_archive',
        'label'       => __( 'Show Custom Post Type Archives on Breadcrumbs.', 'metropoly' ),
        'description' => __( 'Choose to display custom post type archives in the breadcrumb path.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_breadcrumb_show_categories'] =  array(
        'id'          => 'metropoly_breadcrumb_show_categories',
        'label'       => __( 'Show Post Categories on Breadcrumbs', 'metropoly' ),
        'description' => __( 'Choose to display custom post categories in the breadcrumb path.', 'metropoly' ),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );


 ### Footer ###
   $panel = 'footer';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Footer', 'metropoly' ),
		'priority' => '16'
	);
// General Footer Options
	$section = 'general_footer_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Footer Options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);

$options['metropoly_footer_special_effects'] =  array(
        'id'          => 'metropoly_footer_special_effects',
        'label'       => __( 'Footer Special Effects', 'metropoly' ),
        'description' => __( 'Select your preferred footer special effect.', 'metropoly' ),
        'default'     => 'none',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          'none'     => __( 'None', 'metropoly' ),
          'footer_sticky'     => __( 'Sticky Footer', 'metropoly' ),
           
        ),
	
      );
 
// Footer Widgets Area Options
$section = 'footer_widgets_area_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer Widgets Area Options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);

$options['metropoly_display_footer_widgets'] =  array(
        'id'          => 'metropoly_display_footer_widgets',
        'label'       => __( 'Display footer widgets?', 'metropoly' ),
        'description' => __( 'Choose to display footer widget area.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['metropoly_footer_columns'] =  array(
        'id'          => 'metropoly_footer_columns',
        'label'       => __( 'Number of Footer Columns', 'metropoly' ),
        'description' => __( 'Set columns for footer widgets', 'metropoly' ),
        'default'     => '4',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          '1'     => '1',
          '2'     => '2',
          '3'     => '3',
          '4'     => '4',
        ),
	
      );
$options['metropoly_footer_background_image'] =  array(
        'id'          => 'metropoly_footer_background_image',
        'label'       => __( 'Upload Background Image', 'metropoly' ),
        'description' => __( 'Background image for footer', 'metropoly'),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
$options['metropoly_footer_bg_full'] =  array(
        'id'          => 'metropoly_footer_bg_full',
        'label'       => __( '100% Background Image', 'metropoly' ),
        'description' => __( 'Select yes to have the footer widgets area background image display at 100% in width and height and scale according to the browser size.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_footer_parallax_background'] =  array(
        'id'          => 'metropoly_footer_parallax_background',
        'label'       => __( 'Parallax Background Image', 'metropoly' ),
        'description' => __( 'Turn on to enable parallax scrolling on the background image for footer.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_footer_background_repeat'] =  array(
        'id'          => 'metropoly_footer_background_repeat',
        'label'       => __( 'Background Repeat', 'metropoly' ),
        'description' => __( 'Select how the background image repeats.', 'metropoly' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );
$options['metropoly_footer_background_position'] =  array(
        'id'          => 'metropoly_footer_background_position',
        'label'       => __( 'Background Position', 'metropoly' ),
        'description' => __( 'Set background image position.', 'metropoly' ),
        'default'     => 'top left',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $position
      );
$options['metropoly_footer_top_padding'] =  array(
        'id'          => 'metropoly_footer_top_padding',
        'label'       => __( 'Footer Top Padding', 'metropoly' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'metropoly' ),
        'default'     => '60px',
        'type'        => 'text',
        'section'     => $section,
        
      );
$options['metropoly_footer_bottom_padding'] =  array(
        'id'          => 'metropoly_footer_bottom_padding',
        'label'       => __( 'Footer Bottom Padding', 'metropoly' ),
        'description' => __( 'In pixels or percentage, ex: 10px or 10%.', 'metropoly' ),
        'default'     => '40px',
        'type'        => 'text',
        'section'     => $section,
        
      );



 // Social Icon Options
 $section = 'social_icon_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Social Icon Options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);


if( $metropoly_social_icons ):
$i = 1;
 foreach($metropoly_social_icons as $social_icon){
	
	 $options['metropoly_footer_social_title_'.$i] =  array(
        'id'          => 'metropoly_footer_social_title_'.$i,
        'label'       => __( 'Social Title', 'metropoly' ) .' '.$i,
        'description' => __( 'This would display in tooltip.' , 'metropoly' ),
        'default'     => $social_icon['title'],
        'type'        => 'text',
        'section'     => $section,
        
      );
 $options['metropoly_footer_social_icon_'.$i] = array(
        'id'          => 'metropoly_footer_social_icon_'.$i,
        'label'       => __( 'Social Icon', 'metropoly' ).' '.$i,
        'description' => sprintf(__( 'Insert font awesome icon here, more icons can be found at <a href="%s" target="_blank">FontAwesome Icons</a>.', 'metropoly' ),esc_url('http://fontawesome.io/icons')),
        'default'     => $social_icon['icon'],
        'type'        => 'text',
        'section'     => $section,
        
      );
 $options['metropoly_footer_social_link_'.$i] = array(
        'id'          => 'metropoly_footer_social_link_'.$i,
        'label'       => __( 'Social Icon Link', 'metropoly' ).' '.$i,
        'description' => __( 'Insert the link to show this icon.', 'metropoly'),
        'default'     => $social_icon['link'],
        'type'        => 'text',
        'section'     => $section,
        
      );

	 $i++;
	 }
	endif;	
$options['metropoly_footer_social_icons_color'] =  array(
        'id'          => 'metropoly_footer_social_icons_color',
        'label'       => __( 'Social Icons Color', 'metropoly' ),
        'description' => __( 'Set color for icons.', 'metropoly' ),
        'default'     => '#c5c7c9',
        'type'        => 'color',
        'section'     => $section,
        
      );
		
$options['metropoly_footer_social_icons_boxed'] =  array(
        'id'          => 'metropoly_footer_social_icons_boxed',
        'label'       => __( 'Social Icons Boxed', 'metropoly' ),
        'description' => __( 'Choose to display boxed icons', 'metropoly'),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices
      );
$options['metropoly_footer_social_icons_box_color'] = array(
        'id'          => 'metropoly_footer_social_icons_box_color',
        'label'       => __( 'Social Icons Box Color', 'metropoly' ),
        'description' => __( 'Set background color for boxed icons', 'metropoly' ),
        'default'     => '#ffffff',
        'type'        => 'color',
        'section'     => $section,
        
      );
$options['metropoly_footer_social_icons_boxed_radius'] = array(
        'id'          => 'metropoly_footer_social_icons_boxed_radius',
        'label'       => __( 'Social Icons Boxed Radius', 'metropoly' ),
        'description' => __( 'In pixels, ex: 10px.', 'metropoly' ),
        'default'     => '10px',
        'type'        => 'text',
        'section'     => $section,
        
      );
		 
$options['metropoly_footer_social_icons_tooltip_position'] =  array(
        'id'          => 'metropoly_footer_social_icons_tooltip_position',
        'label'       => __( 'Social Icon Tooltip Position', 'metropoly' ),
        'description' => __( 'Controls the tooltip position of the social icons.', 'metropoly' ),
        'default'     => 'top',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => array( 
          'top'     => __( 'Top', 'metropoly' ),
          'bottom'     => __( 'Bottom', 'metropoly' ),
        ),
	
      );


### Blog ###
    $panel = 'blog';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Blog', 'metropoly' ),
		'priority' => '17'
	);
	// General Blog Options
$section = 'general_blog_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Blog Options', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
$options['metropoly_blog_list_style'] =  array(
        'id'          => 'metropoly_blog_list_style',
        'label'      => __( 'Blog List Style', 'metropoly' ),
        'description'        => '',
        'default'         => '1',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( '1' =>  sprintf(__( 'Blog List Style %d', 'metropoly' ),1),
								'2' =>  sprintf(__( 'Blog List Style %d', 'metropoly' ),2),
								'3' =>  sprintf(__( 'Blog List Style %d', 'metropoly' ),3),
								'4' =>  sprintf(__( 'Blog List Style %d', 'metropoly' ),4),
								),
      );	
 
 
 
$options['metropoly_blog_title'] =  array(
        'id'          => 'metropoly_blog_title',
        'label'      => __( 'Blog Page Title', 'metropoly' ),
        'description'        => __( 'This text will display in the page title bar of the assigned blog page.', 'metropoly' ),
        'default'         => 'Blog',
        'type'        => 'text',
        'section' => $section,    
      );



$options['metropoly_blog_pagination_type'] =  array(
        'id'          => 'metropoly_blog_pagination_type',
        'label'      => __( 'Pagination Type', 'metropoly' ),
        'description'        => __( 'Select the pagination type for the assigned blog page.', 'metropoly' ),
        'default'         =>  'pagination',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
          'pagination'     => __( 'Pagination', 'metropoly' ),
          'infinite_scroll'     => __( 'Infinite Scroll', 'metropoly' ),
        ),
	
      );
	
$options['metropoly_excerpt_or_content'] =  array(
        'id'          => 'metropoly_excerpt_or_content',
        'label'      => __( 'Excerpt or Full Blog Content', 'metropoly' ),
        'description'        => __( 'Choose to display an excerpt or full content on blog pages.', 'metropoly' ),
        'default'         => 'excerpt',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
          'excerpt'     => __( 'Excerpt', 'metropoly' ),
          'full_content'     => __( 'Full Content', 'metropoly' ), 
        ),
	
      );
$options['metropoly_excerpt_length'] =  array(
        'id'          => 'metropoly_excerpt_length',
        'label'      => __( 'Excerpt Length', 'metropoly' ),
        'description'        => __( 'Insert the number of words you want to show in the post excerpts.', 'metropoly' ),
        'default'         => '55',
        'type'        => 'text',
        'section' => $section,
      );
$options['metropoly_strip_html_excerpt'] =  array(
        'id'          => 'metropoly_strip_html_excerpt',
        'label'      => __( 'Strip HTML from Excerpt', 'metropoly' ),
        'description'        => __( 'Choose to display an excerpt or full content on blog pages.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_strip_html_excerpt'] =  array(
        'id'          => 'metropoly_strip_html_excerpt',
        'label'      => __( 'Set All Post Items Full Width?', 'metropoly' ),
        'description'        => __( 'Choose to strip HTML from the excerpt content only.', 'metropoly' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices_reverse
	
      );
$options['metropoly_archive_display_image'] =  array(
        'id'          => 'metropoly_archive_display_image',
        'label'      => __( 'Featured image on blog archive page?', 'metropoly' ),
        'description'        => __( 'Choose to display feature image in blog archive page.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );

// Blog Single Post Page Options
    $section = 'single_blog_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Single Post Page Options', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
 
  
/*$options['metropoly_blog_single_sidebar'] =  array(
        'id'          => 'metropoly_blog_single_sidebar',
        'label'      => __( 'Blog Post Sidebar Position', 'metropoly' ),
        'description'        => '',
        'default'         => 'none',
        'type'        => 'select',
        'section' => $section,
        'choices'     => array( 
		  'none'     => __( 'None', 'metropoly' ),
          'left'     => __( 'Left', 'metropoly' ),
          'right'     => __( 'Right', 'metropoly' ),
          'both'     => __( 'Both', 'metropoly' ),
   
        ),
	
      );*/

$options['metropoly_single_display_title_bar'] =  array(
        'id'          => 'metropoly_single_display_title_bar',
        'label'      => __( 'Display Title Bar', 'metropoly' ),
        'description'        => __( 'Choose to display page title bar in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options[ 'metropoly_single_display_image'] =  array(
        'id'          => 'metropoly_single_display_image',
        'label'      => __( 'Display Featured Image', 'metropoly' ),
        'description'        => __( 'Choose to display feature image in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_pagination'] =  array(
        'id'          => 'metropoly_display_pagination',
        'label'      => __( 'Display Previous/Next Pagination', 'metropoly' ),
        'description'        => __( 'Choose to display previous/next pagination in blog posts.', 'metropoly' ),
        'default'         => 'no',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices_reverse
	
      );
$options['metropoly_display_post_title'] =  array(
        'id'          => 'metropoly_display_post_title',
        'label'      => __( 'Display Post Title', 'metropoly' ),
        'description'        => __( 'Choose to display post title in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_author_info_box'] =  array(
        'id'          => 'metropoly_display_author_info_box',
        'label'      => __( 'Display Author Info Box', 'metropoly' ),
        'description'        => __( 'Choose to display author info box in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_social_sharing_box'] =  array(
        'id'          => 'metropoly_display_social_sharing_box',
        'label'      => __( 'Display Social Sharing Box', 'metropoly' ),
        'description'        => __( 'Choose to display social sharing box in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_related_posts'] =  array(
        'id'          => 'metropoly_display_related_posts',
        'label'      => __( 'Display Related Posts', 'metropoly' ),
        'description'        => __( 'Choose to display related posts in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

// Blog Meta Options
    $section = 'blog_meta_options';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Meta Options', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);

$options['metropoly_display_post_meta'] =  array(
        'id'          => 'metropoly_display_post_meta',
        'label'      => __( 'Display Post Meta', 'metropoly' ),
        'description'        => __( 'Choose to display post meta in blog posts.', 'metropoly' ),
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_meta_author'] =  array(
        'id'          => 'metropoly_display_meta_author',
        'label'      => __( 'Disable Post Meta Author', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_meta_date'] =  array(
        'id'          => 'metropoly_display_meta_date',
        'label'      => __( 'Disable Post Meta Date', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_meta_categories'] =  array(
        'id'          => 'metropoly_display_meta_categories',
        'label'      => __( 'Disable Post Meta Categories', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );

$options['metropoly_display_meta_comments'] =  array(
        'id'          => 'metropoly_display_meta_comments',
        'label'      => __( 'Disable Post Meta Comments', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_meta_readmore'] =  array(
        'id'          => 'metropoly_display_meta_readmore',
        'label'      => __( 'Disable Post Meta Readmore', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        'choices'     =>  $choices
	
      );
$options['metropoly_display_meta_tags'] =  array(
        'id'          => 'metropoly_display_meta_tags',
        'label'      => __( 'Disable Post Meta Tags', 'metropoly' ),
        'description'        => '',
        'default'         => 'yes',
        'type'        => 'select',
        'section' => $section,
        
        
        'choices'     =>  $choices
	
      );
$options['metropoly_date_format'] =  array(
        'id'          => 'metropoly_date_format',
        'label'      => __( 'Date Format', 'metropoly' ),
        'description'        => '',
        'default'         => 'M d, Y',
        'type'        => 'text',
        'section' => $section,
    
      );

 ### Sidebar  ###
    $panel = 'sidebar';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Sidebar', 'metropoly' ),
		'priority' => '17'
	);


 
 // Blog Posts
	$section = 'sidebar_blog_posts';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Posts', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);

 
$options['metropoly_left_sidebar_blog_posts'] =  array(
        'id'          => 'metropoly_left_sidebar_blog_posts',
        'label'       => __( 'Left Sidebar', 'metropoly' ),
        'description' => __( 'Select left sidebar that will display on all blog posts.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
$options['metropoly_right_sidebar_blog_posts'] =  array(
        'id'          => 'metropoly_right_sidebar_blog_posts',
        'label'       => __( 'Right Sidebar', 'metropoly' ),
        'description' => __( 'Select right sidebar that will display on all blog posts.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
 
  // Blog Archive
	$section = 'sidebar_blog_archive';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Archive Category Pages', 'metropoly' ),
		'priority' => '12',
		'description' => '',
		'panel' => $panel
	);
	
 
$options['metropoly_left_sidebar_blog_archive'] =  array(
        'id'          => 'metropoly_left_sidebar_blog_archive',
        'label'       => __( 'Left Sidebar', 'metropoly' ),
        'description' => __( 'Select left sidebar that will display on blog archive pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
$options['metropoly_right_sidebar_blog_archive'] =  array(
        'id'          => 'metropoly_right_sidebar_blog_archive',
        'label'       => __( 'Right Sidebar', 'metropoly' ),
        'description' => __( 'Select right sidebar that will display on blog archive pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );

 
  //Sidebar search

  $section = 'sidebar_search';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( 'Search Page', 'metropoly' ),
	  'priority' => '13',
	  'description' => '',
	  'panel' => $panel
  );
	
 
$options['metropoly_left_sidebar_search'] =  array(
        'id'          => 'metropoly_left_sidebar_search',
        'label'       => __( 'Left Sidebar', 'metropoly' ),
        'description' => __( 'Select left sidebar that will display on search pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
$options['metropoly_right_sidebar_search'] =  array(
        'id'          => 'metropoly_right_sidebar_search',
        'label'       => __( 'Right Sidebar', 'metropoly' ),
        'description' => __( 'Select right sidebar that will display on search pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
 
  //Sidebar 404
  
    $section = 'sidebar_404';
  $sections[] = array(
	  'id' => $section,
	  'title' => __( '404 Page', 'metropoly' ),
	  'priority' => '13',
	  'description' => '',
	  'panel' => $panel
  );
	
 $options['metropoly_left_sidebar_404'] =  array(
        'id'          => 'metropoly_left_sidebar_404',
        'label'       => __( 'Left Sidebar', 'metropoly' ),
        'description' => __( 'Select left sidebar that will display on 404 pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
$options['metropoly_right_sidebar_404'] =  array(
        'id'          => 'metropoly_right_sidebar_404',
        'label'       => __( 'Right Sidebar', 'metropoly' ),
        'description' => __( 'Select right sidebar that will display on 404 pages.', 'metropoly' ),
        'default'     => '',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $metropoly_sidebars,
	
      );
 
 
### Background ###
    $panel = 'background_options';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Background Options', 'metropoly' ),
		'priority' => '18'
	);
	// BACKGROUND OPTIONS BELOW ONLY WORK IN BOXED MODE
$section = 'background_boxed';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Options Only Work in Boxed Mode', 'metropoly' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
 

$options['metropoly_bg_image_upload'] =  array(
        'id'          => 'metropoly_bg_image_upload',
        'label'       => __( 'Background Image For Outer Areas In Boxed Mode', 'metropoly' ),
        'description' => __( 'Upload an image to use for the backgroud.', 'metropoly' ),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
 
$options['metropoly_bg_full'] =  array(
        'id'          => 'metropoly_bg_full',
        'label'       => __( '100% Background Image', 'metropoly' ),
        'description' => __( 'Choose to have the background image display at 100% in width and height and scale according to the browser size.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_bg_repeat'] =  array(
        'id'          => 'metropoly_bg_repeat',
        'label'       => __( 'Background Repeat', 'metropoly' ),
        'description' => __( 'Select how the background image repeats.', 'metropoly' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );
 
$options['metropoly_bg_color'] =  array(
        'id'          => 'metropoly_bg_color',
        'label'       => __( 'Background Color For Outer Areas In Boxed Mode', 'metropoly' ),
        'description' => __( 'Set background color for uter areas in boxed mode.', 'metropoly' ),
        'default'     => '#ffffff',
        'type'        => 'color',
        'section'     => $section,
        
      );


	// BACKGROUND OPTIONS  ONLY WORK IN Wide MODE
$section = 'background_wide';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Background Options Work For Wide Mode', 'metropoly' ),
		'priority' => '11',
		'description' => '',
		'panel' => $panel
	);
 
$options['metropoly_content_bg_image'] =  array(
        'id'          => 'metropoly_content_bg_image',
        'label'       => __( 'Background Image For Main Content Area', 'metropoly' ),
        'description' => __( 'Upload an image to use for the backgroud.', 'metropoly' ),
        'default'     => '',
        'type'        => 'upload',
        'section'     => $section,
        
      );
 
$options['metropoly_content_bg_full'] =  array(
        'id'          => 'metropoly_content_bg_full',
        'label'       => __( '100% Background Image', 'metropoly' ),
        'description' => __( 'Choose to have the background image display at 100% in width and height and scale according to the browser size.', 'metropoly' ),
        'default'     => 'no',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $choices_reverse
      );
$options['metropoly_content_bg_repeat'] =  array(
        'id'          => 'metropoly_content_bg_repeat',
        'label'       => __( 'Background Repeat', 'metropoly' ),
        'description' => __( 'Select how the background image repeats.', 'metropoly' ),
        'default'     => 'repeat',
        'type'        => 'select',
        'section'     => $section,
        'choices'     => $repeat
      );
	
### Typography ###
    $panel = 'typography';

	$panels[] = array(
		'id' => $panel,
		'title' => __( 'Typography', 'metropoly' ),
		'priority' => '18'
	);
	
 // Custom Google Fonts
  
  $section = 'load_google_fonts';
  $sections[] = array(
		'id' => $section,
		'title' => __( 'Load Google Fonts', 'metropoly' ),
		'priority' => '19',
		'description' => '',
		'panel' => $panel

	);
  
   $options['metropoly_google_fonts'] =  array(
        'id'          => 'metropoly_google_fonts',
        'label'       => __( 'Google Fonts ( e.g. Playfair+Displa+SC|Raleway )', 'metropoly' ) ,
        'description' => '',
        'default'     => '',
        'type'        => 'text',
        'section'     => $section,
        
      );
### Slider Settings ###

    $section = 'slider-settings';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Slider Settings', 'metropoly' ),
		'priority' => '19',
		'description' => '',

	);
 
$options['metropoly_slider_autoplay'] =  array(
        'id'          => 'metropoly_slider_autoplay',
        'label'       => __( 'Autoplay', 'metropoly' ),
        'description' => __( 'Choose to autoplay the slides.', 'metropoly' ),
        'default'     => 'yes',
        'type'        => 'select',
        'section'     => $section,
        'choices'     =>  $choices
	
      );

$options['metropoly_slideshow_speed'] =  array(
        'id'          => 'metropoly_slideshow_speed',
        'label'       => __( 'Slideshow Speed', 'metropoly' ),
        'description' => __( 'Controls the speed of slideshows for the [metropoly_slider] shortcode and sliders within posts. ex: 1000 = 1 second.', 'metropoly' ),
        'default'     => '3000',
        'type'        => 'text',
        'section'     => $section,
        
      );

$options['metropoly_caption_font_color'] =  array(
        'id'          => 'metropoly_caption_font_color',
        'label'       => __( 'Caption Font Color', 'metropoly' ),
        'description' => __( 'Set font color for slides caption.', 'metropoly' ),
        'default'     => '',
        'type'        => 'color',
        'section'     => $section,
        
      );

$options['metropoly_caption_heading_color'] =  array(
        'id'          => 'metropoly_caption_heading_color',
        'label'       => __( 'Caption Heading h1-h6 Font Color', 'metropoly' ),
        'description' => __( 'Set font color for headings in slides caption.', 'metropoly' ),
        'default'     => '',
        'type'        => 'color',
        'section'     => $section,
        
      );
$options['metropoly_caption_font_size'] =  array(
        'id'          => 'metropoly_caption_font_size',
        'label'       => __( 'Caption Font Size', 'metropoly' ),
        'description' => __( 'Set font size for slides caption.', 'metropoly' ),
        'default'     => '14px',
        'type'        => 'text',
        'section'     => $section,
        'choices'     =>  ''
	
      );

$options['metropoly_caption_alignment'] =  array(
        'id'          => 'metropoly_caption_alignment',
        'label'       => __( 'Caption Alignment', 'metropoly' ),
        'description' => __( 'Set alignment for slides caption.', 'metropoly' ),
        'default'     => 'left',
        'type'        => 'select',
        'section'     => $section,
        'choices'     =>  $align,
	
      );
 
### 404 Page  ###

$section = '404-page';
 $sections[] = array(
		'id' => $section,
		'title' => __( '404 Page', 'metropoly' ),
		'priority' => '20',
		'description' => '',
	);

$options['metropoly_title_404'] =  array(
        'id'          => 'metropoly_title_404',
        'label'       => __( '404 Page Title', 'metropoly' ),
        'description' => __( 'Insert title for 404 page.', 'metropoly' ),
        'default'     => 'OOPS!',
        'type'        => 'text',
        'section'     => $section,
        'choices'     =>  ''
	
      );

$options['metropoly_content_404'] =  array(
        'id'          => 'metropoly_content_404',
        'label'       => __( '404 Page Content', 'metropoly' ),
        'description' => __( 'Insert content for 404 page.', 'metropoly' ),
        'default'     => '<h1>OOPS!</h1><p>Can\'t find the page.</p>',
        'type'        => 'textarea',
        'section'     => $section,
        'choices'     =>  ''
	
      );





    $metropoly_default_options = array();
	foreach ( (array) $options as $option ) {
									  if ( ! isset( $option['id'] ) ) {
										  continue;
									  }
									  if ( ! isset( $option['default'] ) ) {
										  continue;
									  }
    $metropoly_default_options[$option['id']] = $option['default'];
	}


	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'metropoly_customizer_options' );
