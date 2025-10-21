<?php

//bootstrap-navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';



function elma_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    register_nav_menus([
        'primary' => __('Primary Menu', 'elma-theme'),
    ]);
}

add_action('after_setup_theme', 'elma_setup');




// Register Custom Post Types
function elma_cpts()
{
// Projects
    $labels = ['name' => 'Projects', 'singular_name' => 'Project'];
    $args   = ['labels' => $labels, 'public' => true, 'has_archive' => true, 'supports' => ['title', 'editor', 'thumbnail'], 'rewrite' => ['slug' => 'projects']];
    register_post_type('project', $args);

// Team
    register_post_type('team', ['labels' => ['name' => 'Team', 'singular_name' => 'Team Member'], 'public' => true, 'supports' => ['title', 'editor', 'thumbnail']]);

// Testimonials
    register_post_type('testimonial', ['labels' => ['name' => 'Testimonials', 'singular_name' => 'Testimonial'], 'public' => true, 'supports' => ['title', 'editor']]);
}
add_action('init', 'elma_cpts');

// ACF local field groups (will only run if ACF is active)
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key'      => 'group_homepage_sections',
        'title'    => 'Homepage Sections',
        'fields'   => [
            ['key' => 'field_hero_heading', 'label' => 'Hero Heading', 'name' => 'hero_heading', 'type' => 'text'],
            ['key' => 'field_hero_text', 'label' => 'Hero Text', 'name' => 'hero_text', 'type' => 'textarea'],
            ['key' => 'field_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'url'],
            ['key' => 'field_featured_projects', 'label' => 'Featured Projects', 'name' => 'featured_projects', 'type' => 'relationship', 'post_type' => ['project'], 'max' => 6],
        ],
        'location' => [[['param' => 'page', 'operator' => '==', 'value' => 'front-page']]],
    ]);
}

// Theme helper: safe get field
function elma_field($name)
{
    if (function_exists('get_field')) {
        return get_field($name);
    }

    return null;
}



function elma_scripts() {
    // 1. Google Fonts (Inter and Playfair Display)
    wp_enqueue_style(
        'elma-google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@400;700&display=swap', 
        [], 
        null
    );
    
    // 2. Bootstrap CSS (CDN - Version 5.3.2)
    wp_enqueue_style(
        'bootstrap-css', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', 
        [], 
        '5.3.2'
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        [],
        '1.11.3'
    );
    
    // 3. Custom Style (style.css from /assets/css/)
    wp_enqueue_style(
        'elma-style', 
        get_template_directory_uri() . '/assets/css/style.css', 
        ['bootstrap-css'],  // Bootstrap as dependency to ensure correct load order
        null
    );
    
    // 4. Bootstrap JS (CDN - Bundle version with Popper)
    wp_enqueue_script(
        'bootstrap-js', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', 
        [], 
        '5.3.2', 
        true  // Load in footer for better performance
    );
    
    // 5. Custom JS (main.js from /assets/js/)
    wp_enqueue_script(
        'elma-main', 
        get_template_directory_uri() . '/assets/js/main.js', 
        ['jquery'],  // Ensure jQuery is loaded before your script
        '1.0', 
        true  // Load in footer to improve page load time
    );


    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0');
    wp_enqueue_script('jquery');
    
    // Enqueue jQuery UI from CDN
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.13.2/jquery-ui.js', array('jquery'), '1.13.2');
    
    // Enqueue jQuery UI CSS from CDN
    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css');
}

add_action('wp_enqueue_scripts', 'elma_scripts');






function elma_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'elma'),
        'footer_left'  => __('Footer Menu Left', 'elma'),
        'footer_right' => __('Footer Menu Right', 'elma'),
    ));
}
add_action('after_setup_theme', 'elma_register_menus');




// function add_custom_menu_item($items, $args) {
//     if ($args->theme_location == 'primary') {
//         $items .= '<li class="nav-item ms-lg-3">
//             <a class="btn btn-outline-primary" href="#contact">Let\'s Collaborate</a>
//         </li>';
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_items', 'add_custom_menu_item', 10, 2);



// function theme_enqueue_fontawesome() {
//     wp_enqueue_style(
//         'font-awesome',
//         'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
//         array(),
//         '6.5.0'
//     );
// }
// add_action('wp_enqueue_scripts', 'theme_enqueue_fontawesome');

function add_custom_fonts() {
    wp_enqueue_style('custom-fonts', get_stylesheet_directory_uri() . '/assets/css/custom-fonts.css');
}
add_action('wp_enqueue_scripts', 'add_custom_fonts');
