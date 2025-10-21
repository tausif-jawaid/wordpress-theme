<?php 
/*
Template Name: Contact TMPL
*/
get_header(); ?>

 <!-- Contact Section -->
  <section class="contact-section">
    <div class="container">
      <div class="row g-4 align-items-stretch">
        
        <!-- Contact Form -->
        <div class="col-lg-6">
          <div class="contact-card h-100">
            <h2 class="mb-4 fw-bold">Get in Touch</h2>
            <div id="contactForm">
             <?php echo do_shortcode('[contact-form-7 id="1b68848" title="Contact form"]'); ?>

            </div>
          </div>
        </div>

        <!-- Google Map -->
        <div class="col-lg-6">
          <!-- <div class="h-100 contact-card p-0 overflow-hidden">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086695526259!2d-122.42067918468157!3d37.774929779759404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808a0639e4f1%3A0x93c3e3c5d4e6c1c!2sSan%20Francisco!5e0!3m2!1sen!2sus!4v1697212345678"
              allowfullscreen=""
              loading="lazy">
            </iframe>
          </div> -->
          <?php
            $google_map_iframe = get_field('map_iframe_url');

            if ($google_map_iframe): ?>
            <div class="h-100 contact-card p-0 overflow-hidden">
                <?php echo $google_map_iframe; ?>
            </div>
            <?php endif; ?>

        </div>

      </div>
    </div>
  </section>

<?php
get_footer();?>