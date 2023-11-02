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
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="" /></a>
                </span>
                <?= has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 80); ?>
            </p>
        </div>
    </div>

    <footer>

        <ul class="actions">
            <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
        </ul>

	    <?php if (get_post_type() === 'post') { ?>
            <ul class="stats">
                <li><?= get_the_category_list('</li><li>'); ?></li>
	            <?php foreach (\PhpProbablyWrongWay\ThemeHelper::getCurrentPostRelatedProjects() as $relatedProject) { ?>
                    <li><a href="<?= get_the_permalink($relatedProject); ?>"><?= get_the_title($relatedProject); ?></a></li>
	            <?php } ?>
            </ul>
	    <?php } ?>

    </footer>

</article>