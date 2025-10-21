<?php
/*
Template Name: Blog TMPL
*/
get_header();
?>

<div class="container py-5 mt-5">
    <h2 class="fw-bold mb-4 text-dark">Articles</h2>

    <div class="row g-4" id="articleContainer">
        <?php
        // Set up custom query for blog posts
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'paged' => $paged
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card article-card h-100 shadow-sm border-0">
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                        <?php else : ?>
                            <img src="https://via.placeholder.com/400x200?text=No+Image" alt="Placeholder" class="card-img-top" style="height:200px; object-fit:cover;">
                        <?php endif; ?>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="article-title mb-2 fw-semibold text-dark"><?php the_title(); ?></h5>
                            <a href="<?php the_permalink(); ?>" class="read-more mt-auto text-primary fw-bold text-decoration-none">Read More »</a>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer text-muted small bg-transparent border-0">
                            <?php echo get_the_date('F j, Y'); ?>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>

    <!-- Pagination -->
    <?php
    $pages = paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_text' => '« Prev',
        'next_text' => 'Next »',
        'type' => 'array'
    ));

    if (is_array($pages)) :
    ?>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-5">
                <?php foreach ($pages as $page) : ?>
                    <?php if (strpos($page, 'current') !== false) : ?>
                        <li class="page-item active">
                            <span class="page-link bg-primary border-primary text-white"><?php echo strip_tags($page); ?></span>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <?php echo str_replace('page-numbers', 'page-link text-primary border-0', $page); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
