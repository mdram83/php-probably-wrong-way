<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
	    <?php get_template_part('template-parts/post-parts/article-header-meta'); ?>
    </header>
    <span class="image featured"><img src="<?php the_post_thumbnail_url(); ?>" alt="" /></span>
    <p><?php the_content(); ?></p>
    <footer>

        <ul class="stats">
            <li><?= get_the_category_list('</li><li>'); ?></li>
            <?php foreach (\PhpProbablyWrongWay\ThemeHelper::getCurrentPostRelatedProjects() as $relatedProject) { ?>
                <li><a href="<?= get_the_permalink($relatedProject); ?>"><?= get_the_title($relatedProject); ?></a></li>
            <?php } ?>
        </ul>

    </footer>
</article>