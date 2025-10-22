<?php
/**
 * Template Part: Featured Work Section
 */

$section_title       = get_field('featured_work_title');
$section_intro       = get_field('featured_work_intro');
$section_description = get_field('featured_work_description');
$section_button      = get_field('featured_work_button');
$work_images         = get_field('featured_work_images');

if ($section_title || $section_intro || $section_description || $work_images) :
?>
<section id="work" class="py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-8 mx-auto text-center">
                <div>
                    <?php if ($section_title): ?>
                        <h2><?php echo esc_html($section_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($section_intro): ?>
                        <p><?php echo esc_html($section_intro); ?></p>
                    <?php endif; ?>

                    <?php if ($section_description): ?>
                        <p><?php echo esc_html($section_description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

        <!-- Carousel Section -->
        <?php if ($work_images): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="custom-carousel-container position-relative overflow-hidden">
                            <div class="custom-carousel-track d-flex transition-transform" id="carouselTrack">
                                <?php foreach ($work_images as $index => $item): 
                                    $image = $item['upload_image'];
                                    if ($image): ?>
                                        <div class="carousel-slide flex-shrink-0">
                                            <div class="px-2">
                                                <img src="<?php echo esc_url($image['url']); ?>" 
                                                     class="d-block w-100 rounded" 
                                                     alt="<?php echo esc_attr($image['alt']); ?>">
                                            </div>
                                        </div>
                                <?php endif; endforeach; ?>
                            </div>

                            <!-- Navigation buttons -->
                            <button class="carousel-btn carousel-btn-prev position-absolute top-50 start-0 translate-middle-y" id="prevBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                        </svg>
                            </button>
                            <button class="carousel-btn carousel-btn-next position-absolute top-50 end-0 translate-middle-y" id="nextBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/>
                        </svg>
                            </button>

                            <!-- Indicators -->
                            <div class="carousel-indicators-custom d-flex justify-content-center mt-3" id="indicators">
                                <?php foreach ($work_images as $i => $item): ?>
                                    <button class="indicator <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo esc_attr($i); ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Button Section -->
        <?php if ($section_button): ?>
            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-8 d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?php echo esc_url($section_button['url']); ?>" 
                           target="<?php echo esc_attr($section_button['target']); ?>" 
                           class="btn btn-outline-success btn-sm">
                           <?php echo esc_html($section_button['title']); ?>
                        </a>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
