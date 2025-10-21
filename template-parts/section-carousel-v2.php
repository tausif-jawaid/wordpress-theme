<?php
/**
 * Template Part: Custom Carousel V2
 * Description: Dynamic image carousel with ACF repeater support and fallback image.
 */


$carousel_images = get_field('carousel_v2_images'); 
$default_image   = get_template_directory_uri() . '/assets/img/Image_3.jpg';
?>

<section class="py-5 mt-5">
    <div class="container" style="height: 400px;">
        <div class="row">
            <div class="col-12">
                <div class="custom-carousel-container-v2 position-relative overflow-hidden">
                    <div class="custom-carousel-track-v2 d-flex transition-transform" id="carouselTrackV2">

                        <?php
                     
                        if ($carousel_images) :
                            foreach ($carousel_images as $item) :
                                $image = $item['carousel_image'];
                                $image_url = ($image && isset($image['url'])) ? esc_url($image['url']) : esc_url($default_image);
                                $image_alt = ($image && isset($image['alt'])) ? esc_attr($image['alt']) : 'Carousel Image';
                        ?>
                                <div class="carousel-slide-v2 flex-shrink-0">
                                    <div class="px-2">
                                        <img src="<?php echo $image_url; ?>" class="d-block w-100 rounded" alt="<?php echo $image_alt; ?>">
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        else :
                            
                        ?>
                            <div class="carousel-slide-v2 flex-shrink-0">
                                <div class="px-2">
                                    <img src="<?php echo esc_url($default_image); ?>" class="d-block w-100 rounded" alt="Default Image">
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Navigation buttons -->
                    <button class="carousel-btn-v2 carousel-btn-prev-v2" id="prevBtnV2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                        </svg>
                    </button>

                    <button class="carousel-btn-v2 carousel-btn-next-v2" id="nextBtnV2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/>
                        </svg>
                    </button>

                    <!-- Indicators -->
                    <div class="carousel-indicators-custom-v2 d-flex justify-content-center mt-3" id="indicatorsV2">
                        <?php if ($carousel_images) : ?>
                            <?php foreach ($carousel_images as $index => $item) : ?>
                                <button class="indicator-v2 <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo esc_attr($index); ?>"></button>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <button class="indicator-v2 active" data-slide="0"></button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
