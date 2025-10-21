<?php
/**
 * Template Part: What We Do Section
 */

// Get current page ID (front-page.php assigns ACF to this template)
$page_id = get_the_ID();

// Get the ACF group field
$what_we_do = get_field('what_we_do_section', $page_id);

if ($what_we_do):
    $section_title = $what_we_do['section_title'] ?? '';
    $section_intro = $what_we_do['section_intro'] ?? '';
    $section_description = $what_we_do['section_description'] ?? '';
    $accordion_items = $what_we_do['accordion_items'] ?? [];
?>

<section id="what-we-do" class="mt-5">
    <div class="container">
        <div class="row">

            <!-- Left Column -->
            <div class="col-lg-6 mb-0 mb-lg-0">
                <?php if ($section_title): ?>
                    <h2><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>

                <div class="col-lg-12">
                    <?php if ($section_intro): ?>
                        <p><?php echo esc_html($section_intro); ?></p>
                    <?php endif; ?>
                    <?php if ($section_description): ?>
                        <p><?php echo esc_html($section_description); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Column (Accordion) -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="col-lg-12">
                    <?php if (!empty($accordion_items)): ?>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <?php foreach ($accordion_items as $index => $item): 
                                $heading_id = 'flush-heading-' . $index;
                                $collapse_id = 'flush-collapse-' . $index;
                            ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                            aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                            <?php echo esc_html($item['title']); ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse"
                                        aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?php echo wp_kses_post($item['content']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php endif; ?>
