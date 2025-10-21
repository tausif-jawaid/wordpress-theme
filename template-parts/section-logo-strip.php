<?php
/**
 * Template Part: Logo Strip Slider
 * Description: Dynamic logo slider with ACF repeater support and fallback image.
 */

$logo_strip = get_field('logo_strip_logos'); // Repeater field
$default_logo = get_template_directory_uri() . '/assets/img/AL_Rashid_Logo-01.png';
?>

<!-- Logo Slider Section -->
<section class="py-3 mb-5  logo-slider">
    <div class="container">
        <div class="row">
            <section class="logo-strip">
                <div class="container-fluid">
                    <div class="logo-track">

                        <?php if ($logo_strip) : ?>
                            <?php foreach ($logo_strip as $item) :
                                $logo = $item['logo_image'];
                                $logo_url = ($logo && isset($logo['url'])) ? esc_url($logo['url']) : esc_url($default_logo);
                                $logo_alt = ($logo && isset($logo['alt'])) ? esc_attr($logo['alt']) : 'Logo';
                            ?>
                                <img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>">
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!-- Default logo if no repeater rows exist -->
                            <img src="<?php echo esc_url($default_logo); ?>" alt="Default Logo">
                        <?php endif; ?>

                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
