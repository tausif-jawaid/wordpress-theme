
 <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="mb-4">ELMA</h3>
                    <p class="mb-4"><?php the_field('footer_description','option');?></p>
                    <div class="d-flex gap-3">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="mb-4"><?php the_field('navigation_title','option');?></h4>
                    <div class="row">
                        <div class="col-6">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer_left',
                                'container' => false,
                                'menu_class' => 'list-unstyled',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                'depth' => 1,
                            ));
                            ?>
                        </div>

                        <div class="col-6">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer_right',
                                'container' => false,
                                'menu_class' => 'list-unstyled',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                'depth' => 1,
                            ));
                            ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="mb-4"><?php the_field('subscribe_title','option');?></h4>
                    <p class="mb-4"><?php the_field('subscribe_short_description','option');?></p>
                   <div class="newsletter-form">
                        <?php echo do_shortcode('[contact-form-7 id="b6daa8a" title="Newsletter Form"]'); ?>
                    </div>

                </div>
            </div>

            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <!-- <p class="mb-0">Terms and Conditions | Privacy Policy</p> -->
                         <?php if (have_rows('links', 'option')) : ?>
                            <ul class="links-list">
                                <?php while (have_rows('links', 'option')) : the_row();
                                    $link = get_sub_field('link_url');
                                    if ($link):
                                        $url = $link['url'];
                                        $target = $link['target'] ?: '_self';

                                        // Get the last part of the URL and format it
                                        $title = $link['title']; // e.g., Privacy Policy
                                     ?>
                                    <li>
                                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </li>
                                <?php endif; endwhile; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0">© <?php echo date('Y'); ?><?php the_field('copyright_text','option');?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</main>
<?php wp_footer(); ?>
</body>
</html>