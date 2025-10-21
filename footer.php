
 <!-- Footer -->

<footer class="footer">
  <div class="container">


    <div class="row align-items-start gy-4">

      <!-- Brand + Tagline -->
      <div class="col-12 col-md-4 col-lg-3 text-center text-md-start">
        <p class="mb-0 small"><?php the_field('footer_description','option');?></p>
        <a class="navbar-brand d-block mb-2" href="<?php echo home_url(); ?>">
                        <?php 
                            // Get the logo image field from the options page
                            $logo = get_field('upload_footer_logo', 'option');
                            
                            // Check if the logo exists before displaying it
                            if ($logo) : 
                        ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="ELMA Logo" class="img-fluid" style="max-width:150px;">
                        <?php else : ?>
                            <!-- Fallback logo in case there's no image uploaded -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Images/ElmaLogo-01.png" alt="ELMA Logo" class="img-fluid" style="max-width:150px;">
                        <?php endif; ?>
                    </a>
        
        <p class="mb-0 small"><?php the_field('subscribe_short_description','option');?></p>
      </div>

      <!-- Spacer Column (optional) -->
      <div class="d-none d-lg-block col-lg-1"></div>

      <!-- Navigation + Subscribe + Social -->
      <div class="col-12 col-md-8 col-lg-8">
        
        <!-- Navigation Links -->
        <div class="mb-4">
          <!-- <p class="fw-semibold mb-3">Navigational Links</p> -->
          <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3 gap-md-4 text-center text-md-start">

            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_left',
                    'container'      => false,
                    'menu_class'     => 'footer-menu list-unstyled d-flex justify-content-center gap-4 m-0',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'depth'          => 1,
                ));
            ?>

            <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_right',
                    'container' => false,
                    'menu_class' => 'footer-menu list-unstyled d-flex justify-content-center gap-4 m-0',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 1,
                ));
            ?>
          </div>
        </div>

        <!-- Subscribe Form -->
        <div>        
            <?php echo do_shortcode('[contact-form-7 id="b6daa8a" title="Newsletter Form"]'); ?>
        </div>

        <!-- Social Icons -->
        <div class="text-center text-md-start">
          <div class="d-flex justify-content-center justify-content-md-start gap-3">
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

      </div>
    </div>





    <!-- Footer Bottom -->
    <div class="footer-bottom mt-4 pt-3 border-top">
      <div class="row">
        <div class="col-12 text-center">
            <p class="mb-0 small">© <?php echo date('Y'); ?><?php the_field('copyright_text','option');?></p>

        </div>
      </div>
    </div>
  </div>
</footer>


</main>
<?php wp_footer(); ?>
</body>
</html>