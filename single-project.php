<?php get_header(); while(have_posts()): the_post(); ?>
<div class="container section">
<h1><?php the_title(); ?></h1>
<?php if(has_post_thumbnail()): ?><div><?php the_post_thumbnail('large'); ?></div><?php endif; ?>
<div><?php the_content(); ?></div>
</div>
<?php endwhile; get_footer(); ?>