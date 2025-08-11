<?php



add_action( 'wp_enqueue_scripts', function() {
    // Parent theme style
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );

    // Child theme custom styles
    wp_enqueue_style( 'twentytwentyfive-custom', get_theme_file_uri() . '/assets/custom.css', array('twentytwentyfive-style'), '1.0' );

    // Custom JS
    wp_enqueue_script( 
        'twentytwentyfive-js', 
        get_theme_file_uri() . '/assets/js/custom.js', 
        array('jquery'), // dependency (if needed)
        '1.0',           // version
        true             // load in footer
    );
    
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


function wp_post_filter_shortcode() {
    // Get all categories
    $categories = get_categories(['hide_empty' => true]);

    ob_start();
    ?>

    <div class="custom-filter-data-wrapper">

      <form id="post-filter-form">
          <select name="category" id="category-filter">
              <option value="">Select Category</option>
              <?php foreach ($categories as $cat): ?>
                  <option value="<?php echo esc_attr($cat->term_id); ?>"><?php echo esc_html($cat->name); ?></option>
              <?php endforeach; ?>
          </select>
          <button type="submit">Filter</button>
      </form>

      <div id="filtered-posts">
          <?php
          $query = new WP_Query([
              'post_type' => 'post',
              'posts_per_page' => 10,
          ]);

          if ($query->have_posts()) :
              while ($query->have_posts()): $query->the_post();
                echo '<a href="' . get_permalink() . '" class="post-link" class="post-card">';
                  echo '<h3>' . get_the_title() . '</h3>';
                  echo '<p>' . get_the_excerpt() . '</p>';
                echo '</a>';  
              endwhile;
          else: 
              echo '<p>No posts found.</p>';
          endif;
          wp_reset_postdata();
          ?>
      </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        $('#post-filter-form').on('submit', function(e) {
            e.preventDefault();

            var catID = $('#category-filter').val();

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: {
                    action: 'filter_posts',
                    category: catID
                },
                success: function(response) {
                    $('#filtered-posts').html(response);
                },
                error: function() {
                    $('#filtered-posts').html('<p>Error retrieving posts.</p>');
                }
            });
        });
    });
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('post_filter', 'wp_post_filter_shortcode');


function wp_ajax_filter_posts() {
    $cat = isset($_POST['category']) ? intval($_POST['category']) : 0;

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 10,
    ];

    if ($cat) {
        $args['cat'] = $cat;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()): $query->the_post();
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . get_the_excerpt() . '</p>';
        endwhile;
    else:
        echo '<p>No posts found.</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_filter_posts', 'wp_ajax_filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'wp_ajax_filter_posts');



