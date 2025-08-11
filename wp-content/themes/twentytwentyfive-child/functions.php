<?php



// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );

    // custom styles for the child theme
    wp_enqueue_style( 'twentytwentyfive-custom', get_theme_file_uri() . '/assets/custom.css' );
    

    
    
} );


// svg support

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );


// svg support


