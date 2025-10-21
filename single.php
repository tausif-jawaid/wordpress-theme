<?php get_header(); ?>

<div class="container py-5 mt-5">
  <div class="row g-4">

    <!-- Left Side: Main Article -->
    <div class="col-lg-8">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="fw-bold mb-3"><?php the_title(); ?></h1>

        <p class="article-meta">
          Posted on <?php echo get_the_date(); ?> • By <?php the_author(); ?>
        </p>

        <?php if (has_post_thumbnail()): ?>
          <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" style="height: 400px; width: 100%; object-fit: cover;" class="article-image mb-4">
        <?php endif; ?>

        <div class="article-content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>

    </div>

    <!-- Right Side: Popular Articles -->
    <div class="col-lg-4">
      <h4 class="fw-bold mb-3">Popular Articles</h4>

      <?php
      $popular_posts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'orderby'        => 'comment_count', // Sort by most commented
        'order'          => 'DESC'
      ]);

      if ($popular_posts->have_posts()) :
        while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
          <div class="card popular-card">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
            <?php else: ?>
              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Placeholder">
            <?php endif; ?>

            <div class="card-body p-2">
              <h6 class="card-title mb-1"><?php the_title(); ?></h6>
              <a href="<?php the_permalink(); ?>" class="read-more">Read More »</a>
              <p class="text-muted small mb-0"><?php echo get_the_date(); ?></p>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      else: ?>
        <p>No popular articles found.</p>
      <?php endif; ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>