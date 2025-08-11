<?php



// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );

    // custom styles for the child theme
    wp_enqueue_style( 'twentytwentyfive-custom', get_theme_file_uri() . '/assets/custom.css' );
    

    
    
} );


