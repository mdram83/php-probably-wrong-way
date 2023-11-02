<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>

        <?php if (get_post_type() === 'post' || get_post_type() === 'inspiration') { ?>
		    <?php get_template_part('template-parts/post-parts/article-header-meta'); ?>
        <?php } ?>
    </header>

    <div class="row gtr-uniform" style="margin-bottom: 2em">
        <div class="col-12">
            <p>
                <span class="image project">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="" />
                    </a>
                </span>
	            <?php get_template_part('template-parts/post-parts/article-excerpt'); ?>
            </p>
        </div>
    </div>

    <footer>
	    <?php get_template_part('template-parts/post-parts/article-footer-actions'); ?>

	    <?php if (get_post_type() === 'post') { ?>
		    <?php get_template_part('template-parts/post-parts/article-footer-stats'); ?>
	    <?php } ?>
    </footer>
</article>