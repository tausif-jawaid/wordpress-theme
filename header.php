<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Title Tag -->
    <title><?php wp_title('|', true, 'right'); ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <?php 
                            // Get the logo image field from the options page
                            $logo = get_field('upload_logo', 'option');
                            
                            // Check if the logo exists before displaying it
                            if ($logo) : 
                        ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="ELMA Logo" class="img-fluid">
                        <?php else : ?>
                            <!-- Fallback logo in case there's no image uploaded -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Images/ElmaLogo-01.png" alt="ELMA Logo" class="img-fluid">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-10">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">

                     <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'depth' => 2,
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'navbarNav',
                            'menu_class' => 'navbar-nav ml-auto',
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker(),
                        ));
                        ?>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </nav>