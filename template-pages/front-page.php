<?php 
/*
Template Name: Home TMPL
*/
get_header(); ?>


    <!-- Hero Section -->
            <section id="home" class="hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-0 mb-lg-0 text-start">
                            <?php if ($hero_heading = get_field('hero_heading')) : ?>
                                <h3 style="margin-top:7rem !important;"><?php echo esc_html($hero_heading); ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="col-lg-12">
                                <?php if ($hero_description = get_field('hero_description')) : ?>
                                    <p><?php echo wp_kses_post($hero_description); ?></p>
                                <?php endif; ?>

                                <div class="d-flex flex-wrap gap-3">
                                    <?php if ($hero_button_1 = get_field('hero_button_1')) : ?>
                                        <a href="<?php echo esc_url($hero_button_1['url']); ?>" 
                                        class="btn btn-outline-success btn-sm"
                                        target="<?php echo esc_attr($hero_button_1['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($hero_button_1['title']); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($hero_button_2 = get_field('hero_button_2')) : ?>
                                        <a href="<?php echo esc_url($hero_button_2['url']); ?>" 
                                        class="btn btn-outline-success btn-sm"
                                        target="<?php echo esc_attr($hero_button_2['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($hero_button_2['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



    <!-- Video Section -->
         <section class="p-0 m-0 position-relative" style="overflow:hidden;">
                <div class="ratio ratio-21x9">
                    <?php 
                    $video = get_field('banner_video'); // This returns an array
                    $poster = get_field('banner_video_poster'); // Optional poster image
                    if ($video && isset($video['url'])): ?>
                        <video id="heroVideo"
                            autoplay
                            muted
                            loop
                            playsinline
                            loading="lazy"
                            style="width:100%; height:100%; object-fit:cover;"
                            <?php if ($poster): ?>poster="<?php echo esc_url($poster['url']); ?>"<?php endif; ?>>
                            <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                            Your browser does not support the video tag.
                        </video>
                    <?php else: ?>
                        <p>No video available.</p>
                    <?php endif; ?>
                </div>

                <!-- 🔊 Mute / Unmute Toggle -->
                <button id="soundToggle"
                        style="position:absolute;bottom:20px;right:20px;
                                background:#00000090;color:#fff;border:none;
                                padding:10px 16px;border-radius:50%;
                                display:flex;align-items:center;justify-content:center;
                                width:48px;height:48px;font-size:20px;
                                cursor:pointer;transition:all .3s;">
                    🔇
                </button>
            </section>

    <!-- Accordion Section What We Do Section-->
    <?php get_template_part('template-parts/what-we-do');?>

    <!-- How we Work Section -->
    <?php get_template_part('template-parts/section', 'how-we-work'); ?>

    <!-- Featured Work Section -->
    <?php get_template_part('template-parts/section', 'featured-work'); ?>


    <!-- Founder Section -->
     <?php get_template_part('template-parts/section', 'about'); ?>


    <!-- Note From Noor Section -->

    <?php get_template_part('template-parts/section', 'notes-from-noor'); ?>


    <!-- Image Slider Section -->
    <?php get_template_part('template-parts/section', 'carousel-v2'); ?>



    <!-- logo Slider Section -->
    <?php get_template_part('template-parts/section', 'logo-strip'); ?>


    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const soundToggle = document.getElementById('soundToggle');
        const video = document.getElementById('heroVideo');

        soundToggle.addEventListener('click', function () {
            video.muted = !video.muted;
            soundToggle.textContent = video.muted ? '🔇' : '🔊';
        });
    });
</script>

  <?php
get_footer();?>