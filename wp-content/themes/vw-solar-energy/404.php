<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Solar Energy
 */

get_header(); ?>

<div id="content-vw">
	<div class="container">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-solar-energy' ), esc_html__( 'Not Found', 'vw-solar-energy' ) ) ?></h1>	
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-solar-energy' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-solar-energy' ); ?></p>
		<div class="error-btn">
    		<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Return to the home page', 'vw-solar-energy' ); ?></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>