<?php
/**
 * Template Part: Notes from Noor Section
 */

// Get ACF fields
$notes_title       = get_field('notes_title');
$notes_description = get_field('notes_description');
//$notes_list        = get_field('notes_list'); 
$notes_image       = get_field('notes_image'); 
?>

<section class="notes-from-noor-section">
    <div class="container">
        <div class="notes-grid">

            <!-- Left Column -->
            <div class="notes-left">
                <div class="section-header">
                    <div class="icon"></div>

                    <?php if ($notes_title): ?>
                        <h2 class="section-title"><?php echo esc_html($notes_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($notes_description): ?>
                        <p class="section-desc"><?php echo esc_html($notes_description); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Latest 4 Blog Posts -->
                <div class="notes-boxes">
                    <?php
                    $latest_posts = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'post_status'    => 'publish',
                    ]);

                    if ($latest_posts->have_posts()):
                        while ($latest_posts->have_posts()): $latest_posts->the_post(); ?>
                            <div class="note-box">
                                <h3 class="note-title"><?php the_title(); ?></h3>
                                <p class="note-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="arrow">&#8599;</a>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p>No recent posts found.</p>
                    <?php endif; ?>
                </div>

                <div class="mt-5 text-center">
                    <?php if ($hero_button_3 = get_field('hero_button_3')) : ?>
                                            <a href="<?php echo esc_url($hero_button_3['url']); ?>" 
                                            class="btn btn-outline-success btn-sm"
                                            target="<?php echo esc_attr($hero_button_3['target'] ?: '_self'); ?>">
                                                <?php echo esc_html($hero_button_3['title']); ?>
                                            </a>
                    <?php endif; ?>
                </div>

            </div>


            <!-- Right Column -->
            <div class="notes-right">
                <?php
                if ($notes_image && isset($notes_image['url'])) {
                    $image_url = esc_url($notes_image['url']);
                    $image_alt = esc_attr($notes_image['alt']);
                } else {
                    // Default fallback image
                    $image_url = 'http://localhost/subha-task/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-19-at-6.43.58-PM.jpeg';
                    $image_alt = 'Noor';
                }
                ?>
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="noor-image" />
            </div>

        </div>
    </div>
</section>