<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
	    <?php get_template_part('template-parts/post-parts/article-header-meta'); ?>
    </header>

    <a href="<?php the_permalink(); ?>" class="image featured"><img src="<?php the_post_thumbnail_url('index'); ?>" alt="" /></a>
    <p><?php get_template_part('template-parts/post-parts/article-excerpt'); ?></p>

    <footer>
	    <?php get_template_part('template-parts/post-parts/article-footer-actions'); ?>
	    <?php get_template_part('template-parts/post-parts/article-footer-stats'); ?>
    </footer>
</article>