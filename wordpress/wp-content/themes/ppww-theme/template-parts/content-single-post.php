<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
	    <?php get_template_part('template-parts/post-parts/article-header-meta'); ?>
    </header>

    <span class="image featured"><img src="<?php the_post_thumbnail_url(); ?>" alt="" /></span>
    <p><?php the_content(); ?></p>

    <footer>
	    <?php get_template_part('template-parts/post-parts/article-footer-stats'); ?>
    </footer>
</article>