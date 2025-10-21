<?php
/**
 * Template Part: About Section
 * Description: Displays the dynamic Founder / About ELMA section using ACF fields.
 */

$about_title   = get_field('about_section_title');
$about_intro   = get_field('about_section_intro');
$about_content = get_field('about_section_content');
$about_quote   = get_field('about_section_quote');
$about_name    = get_field('about_section_founder_name');
$about_button  = get_field('about_section_button');
$about_image   = get_field('about_section_image');
?>

<section class="about-section">
    <div class="container">
        <div class="row g-0 align-items-stretch">

            <!-- Left: Dynamic content -->
            <div class="col-lg-6 d-flex align-items-center" style="background-color:#014753; color:#fff; padding:60px;">
                <div>
                    <?php if ($about_title) : ?>
                        <h2><?php echo esc_html($about_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($about_intro) : ?>
                        <p class="fst-italic"><?php echo esc_html($about_intro); ?></p>
                    <?php endif; ?>

                    <?php if ($about_content) : ?>
                        <div class="about-content">
                            <?php echo wp_kses_post($about_content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($about_button) :
                        $btn_url    = $about_button['url'];
                        $btn_title  = $about_button['title'];
                        $btn_target = $about_button['target'] ?: '_self';
                    ?>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="btn btn-outline-success btn-sm">
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Dynamic image -->
            <div class="col-lg-6 d-flex">
                <?php if ($about_image) : ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>"
                        class="img-fluid"
                        style="width:100%; height:100%; object-fit:cover;"
                        alt="<?php echo esc_attr($about_image['alt']); ?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
