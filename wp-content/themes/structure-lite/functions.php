<?php
/**
 * This file includes the theme functions.
 *
 * @package Structure Lite
 * @since Structure Lite 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_setup' ) ) :

	/** Function structure_lite_setup */
	function structure_lite_setup() {

		/*
		* Enable support for translation.
		*/
		load_theme_textdomain( 'structure-lite', get_template_directory() . '/languages' );

		/*
		* Enable support for RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Enable selective refresh for Widgets.
		*/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Enable support for post thumbnails.
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'structure-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'structure-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'structure-featured-small', 640, 640, true ); // Small Featured Image.
		add_image_size( 'structure-featured-square', 1200, 1200, true ); // Square Featured Image.

		/*
		* Enable support for site title tag.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for custom logo.
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 640,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title' ),
		) );

		/*
		* Enable support for custom menus.
		*/
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'structure-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'structure-lite' ),
		));

		/*
		* Enable support for custom header.
		*/
		register_default_headers( array(
			'default' => array(
			'url'   => get_template_directory_uri() . '/images/default-header.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
			'description'   => esc_html__( 'Default Custom Header', 'structure-lite' ),
			),
		));
		$defaults = array(
			'width'								=> 1800,
			'height'							=> 480,
			'default-image'					=> get_template_directory_uri() . '/images/default-header.jpg',
			'flex-height'					=> true,
			'flex-width'					=> true,
			'default-text-color'	=> 'ffffff',
			'header-text'					=> true,
			'uploads'							=> true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color'          => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

	}
endif; // End function structure_lite_setup.
add_action( 'after_setup_theme', 'structure_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function structure_lite_admin_notice */
function structure_lite_admin_notice() {
	if ( ! PAnD::is_admin_notice_active( 'notice-structure-lite-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-structure-lite-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Thanks for choosing the Structure Lite theme! Enter your email to receive important updates and information from <a href="%1$s" target="_blank">Organic Themes</a>.', 'structure-lite' ), 'https://organicthemes.com' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
	<?php
}
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'structure_lite_admin_notice' );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_enqueue_scripts' ) ) {

	/** Function structure_lite_enqueue_scripts */
	function structure_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'structure-lite-style', get_stylesheet_uri() );
		wp_enqueue_style( 'structure-lite-style-conditionals', get_template_directory_uri() . '/css/style-conditionals.css', array( 'structure-lite-style' ), '4.0' );
		wp_enqueue_style( 'structure-lite-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'structure-lite-style' ), '4.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'structure-lite-style' ), '4.0' );

		// Resgister Scripts.
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '4.0' );
		wp_register_script( 'jquery-background', get_template_directory_uri() . '/js/jquery.bgBrightness.js', array( 'jquery' ), '4.0' );
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'hoverIntent' ), '4.0' );

		// Enqueue Scripts.
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'structure-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '4.0', true );
		wp_enqueue_script( 'structure-lite-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'jquery-background', 'superfish', 'jquery-fitvids' ), '4.0', true );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'structure_lite_enqueue_scripts' );

if ( ! function_exists( 'structure_lite_custom_styles' ) ) {

	/** Function structure_lite_custom_styles */
	function structure_lite_custom_styles() {

		$desc_color = '';
		$bg_color = '';

		// Text color.
		if ( '' != get_header_textcolor() ) {
			$desc_color .= 'color: #' . get_header_textcolor() . ';';
		}
		if ( '' != $desc_color ) {
			$desc_color = '.site-description {' . $desc_color . '}';
			wp_add_inline_style( 'structure-lite-style', $desc_color );
		}

		// Background color.
		if ( '' != get_theme_mod( 'background_color' ) ) {
			$bg_color .= 'background-color: #' . get_theme_mod( 'background_color' ) . ';';
		}
		if ( '' != $bg_color ) {
			$bg_color = '.menu ul.sub-menu, .menu ul.children, .landing-page .content {' . $bg_color . '}';
			wp_add_inline_style( 'structure-lite-style', $bg_color );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'structure_lite_custom_styles' );

if ( ! function_exists( 'structure_lite_enqueue_admin_scripts' ) ) {

	/** Function structure_lite_enqueue_admin_scripts */
	function structure_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'structure-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'structure_lite_enqueue_admin_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support and Upgrade Link
-------------------------------------------------------------------------------------------------------
*/

function structure_lite_support_link() {
	global $submenu;
	$support_link = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'structure-lite' ), 'manage_options', $support_link );
}
add_action( 'admin_menu', 'structure_lite_support_link' );

function structure_lite_upgrade_link() {
	global $submenu;
	$upgrade_link = esc_url( 'https://organicthemes.com/theme/structure-theme/' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'structure-lite' ), 'manage_options', $upgrade_link );
}
add_action( 'admin_menu', 'structure_lite_upgrade_link' );

/*
-------------------------------------------------------------------------------------------------------
	Custom Logo
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_custom_logo' ) ) :

	function structure_lite_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			if ( is_front_page() && is_home() ) {
				?>
				<h1 class="site-logo"><?php the_custom_logo(); ?></h1>
			<?php
			} else {
				?>
				<p class="site-logo"><?php the_custom_logo(); ?></p>
			<?php
			}
		} else {
			if ( is_front_page() && is_home() ) {
				?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</h1>
			<?php
			} else {
				?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</p>
			<?php
			}
		}

	}
endif;

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes category IDs to names.
 *
 * @param array $id IDs for categories.
 * @return array
 */

if ( ! function_exists( 'structure_lite_cat_id_to_name' ) ) :

	function structure_lite_cat_id_to_name( $id ) {
		$cat = get_category( $id );
		if ( is_wp_error( $cat ) ) {
			return false; }
		return $cat->cat_name;
	}
endif;

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_widgets_init' ) ) :

	/** Function structure_lite_widgets_init */
	function structure_lite_widgets_init() {
		register_sidebar(array(
			'name' => esc_html__( 'Default Sidebar', 'structure-lite' ),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__( 'Blog Sidebar', 'structure-lite' ),
			'id' => 'sidebar-blog',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__( 'Left Sidebar', 'structure-lite' ),
			'id' => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widgets', 'structure-lite' ),
			'id' => 'footer',
			'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="footer-widget">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
endif;
add_action( 'widgets_init', 'structure_lite_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_posted_on' ) ) :

	/** Function structure_lite_posted_on */
	function structure_lite_posted_on() {
		if ( get_the_modified_time() != get_the_time() ) {
			printf( __( '<span class="%1$s">Updated:</span> %2$s', 'structure-lite' ),
				'meta-prep meta-prep-author',
				sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_modified_time() ),
					esc_attr( get_the_modified_date() )
				)
			);
		} else {
			printf( __( '<span class="%1$s">Posted:</span> %2$s', 'structure-lite' ),
				'meta-prep meta-prep-author',
				sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					get_the_date()
				)
			);
		}
	}
endif;

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) { $content_width = 760; }

if ( ! function_exists( 'structure_lite_content_width' ) ) :

	/** Function structure_lite_content_width */
	function structure_lite_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'structure_lite_content_width', 760 );
	}
endif;
add_action( 'after_setup_theme', 'structure_lite_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'structure_lite_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function structure_lite_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'structure-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'structure-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			default :
		?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'structure-lite' ),
							sprintf( __( '<span class="fn">%s</span>', 'structure-lite' ), wp_kses_post( get_comment_author_link() ) ),
							sprintf( __( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>', 'structure-lite' ),
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s, %2$s', 'structure-lite' ), get_comment_date(), get_comment_time() )
							)
						);
						?>
					</div><!-- END .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'structure-lite' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'structure-lite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', 'structure-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

		<?php
		break;
		endswitch;
	}
endif; // Ends check for structure_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds a custom excerpt length.
 *
 * @param array $length Excerpt word count.
 * @return array
 */

if ( ! function_exists( 'structure_lite_excerpt_length' ) ) :

	function structure_lite_excerpt_length( $length ) {
		return 38;
	}
endif;
add_filter( 'excerpt_length', 'structure_lite_excerpt_length', 999 );

/**
 * Return custom read more link text for the excerpt.
 *
 * @param array $more is the excerpt more link.
 * @return array
 */

if ( ! function_exists( 'structure_lite_excerpt_more' ) ) :

	function structure_lite_excerpt_more( $more ) {
		return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__( 'Read More', 'structure-lite' ) .'</a>';
	}
endif;
add_filter( 'excerpt_more', 'structure_lite_excerpt_more' );

/*
-------------------------------------------------------------------------------------------------------
   Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */

if ( ! function_exists( 'structure_lite_wp_link_pages_args_prevnext_add' ) ) :

	function structure_lite_wp_link_pages_args_prevnext_add( $args ) {
		global $page, $numpages, $more, $pagenow;

		if ( ! $args['next_or_number'] == 'next_and_number' ) {
			return $args; }

		$args['next_or_number'] = 'number'; // Keep numbering for the main part.
		if ( ! $more ) {
			return $args; }

		if ( $page -1 ) { // There is a previous page.
			$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

		if ( $page < $numpages ) { // There is a next page.
			$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

		return $args;
	}
endif;
add_filter( 'wp_link_pages_args', 'structure_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'structure_lite_body_class' ) ) :

	function structure_lite_body_class( $classes ) {

		$header_image = get_header_image();
		$post_pages = is_home() || is_archive() || is_search() || is_attachment();

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$classes[] = 'structure-has-logo'; }

		if ( 'left' == get_theme_mod( 'structure_lite_logo_align', 'center' ) ) {
			$classes[] = 'structure-logo-left'; }

		if ( 'center' == get_theme_mod( 'structure_lite_logo_align', 'center' ) ) {
			$classes[] = 'structure-logo-center'; }

		if ( 'right' == get_theme_mod( 'structure_lite_logo_align', 'center' ) ) {
			$classes[] = 'structure-logo-right'; }

		if ( 'blank' != get_theme_mod( 'header_textcolor' ) ) {
			$classes[] = 'structure-desc-active'; }

		if ( 'blank' == get_theme_mod( 'header_textcolor' ) ) {
			$classes[] = 'structure-desc-inactive'; }

		if ( is_singular() && ! has_post_thumbnail() ) {
			$classes[] = 'structure-no-img'; }

		if ( is_singular() && has_post_thumbnail() ) {
			$classes[] = 'structure-has-img'; }

		if ( $post_pages && ! empty( $header_image ) || is_page() && ! has_post_thumbnail() && ! empty( $header_image ) ) {
			$classes[] = 'structure-header-active';
		} else {
			$classes[] = 'structure-header-inactive';
		}

		if ( is_singular() ) {
			$classes[] = 'structure-singular';
		}

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'structure-sidebar-1';
		}

		if ( is_active_sidebar( 'footer' ) ) {
			$classes[] = 'structure-footer-active';
		}

		if ( '' != get_theme_mod( 'background_image' ) ) {
			// This class will render when a background image is set
			// regardless of whether the user has set a color as well.
			$classes[] = 'structure-background-image';
		} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
			// This class will render when a background color is set
			// but no image is set. In the case the content text will
			// Adjust relative to the background color.
			$classes[] = 'structure-relative-text';
		}

		return $classes;
	}
endif;
add_action( 'body_class', 'structure_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/customizer/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/plugin-activation.php' );
require_once( get_template_directory() . '/includes/plugin-activation-class.php' );
