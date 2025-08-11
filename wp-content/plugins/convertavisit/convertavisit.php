<?php
/*
Plugin Name: Convert-A-Visit
Description: Easily add Convert-A-Visit tracking snippet and more to your site.
*/

// ConvertaVisit Script
function cav_script() {
	 echo '<!--Proven Content CAV SNIPPET-->
		<script type="text/javascript" src="'. esc_url( plugins_url( 'cav.js', __FILE__ ) ) .'"></script>' . "\n";
}
add_action( 'wp_footer', 'cav_script' );

?>