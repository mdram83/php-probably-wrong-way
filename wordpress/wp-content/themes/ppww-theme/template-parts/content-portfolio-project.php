<article class="mini-post">
    <header>
	    <?php get_template_part('template-parts/project-parts/article-header-h3-title-dates'); ?>

        <ul class="actions small">
            <li><a href="<?php the_permalink(); ?>" class="button small">Learn More</a></li>
	        <?= get_field('production_link') != '' ? '<li><a href="' . get_field('production_link') . '" class="button small" target="_blank">Visit Site</a></li>' : ''; ?>
        </ul>

    </header>
    <a href="<?php the_permalink(); ?>" class="image">
        <img class="mini-posts-portfolio" src="<?php the_post_thumbnail_url('medium'); ?>" alt="" />
    </a>
</article>