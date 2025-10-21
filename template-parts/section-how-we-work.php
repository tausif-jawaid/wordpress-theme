<?php
/**
 * Template Part: How We Work Section
 */

// ACF fields
$how_title   = get_field('how_we_work_title');
$how_intro   = get_field('how_we_work_intro');
$how_content = get_field('how_we_work_content');
$how_image   = get_field('how_we_work_image'); // Image field (return: array)
?>

<section id="home" class="mt-5 how-word-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-lg-6 mb-0 mb-lg-0">
                <?php if ($how_title): ?>
                    <h2><?php echo esc_html($how_title); ?></h2>
                <?php endif; ?>

                <div class="col-lg-12">
                    <?php if ($how_intro): ?>
                        <p><?php echo esc_html($how_intro); ?></p>
                    <?php endif; ?>

                    <?php if ($how_content): ?>
                        <p><?php echo wp_kses_post($how_content); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-lg-6 mb-0 mb-lg-0">
                <div class="col-lg-12 text-center mt-5">
                    <?php
                    if ($how_image && isset($how_image['url'])) {
                        $image_url = esc_url($how_image['url']);
                        $image_alt = esc_attr($how_image['alt']);
                    } else {
                        // Default image fallback
                        $image_url = get_template_directory_uri() . '/assets/img/listen-design.png';
                        $image_alt = 'Default How We Work Image';
                    }
                    ?>
                    <img style="height: 100px;" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                </div>
            </div>

        </div>
    </div>
</section>
