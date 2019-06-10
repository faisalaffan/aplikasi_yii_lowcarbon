<?php
/**
 * The template part for header
 *
 * @package VW Solar Energy 
 * @subpackage vw_solar_energy
 * @since VW Solar Energy 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-solar-energy'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>