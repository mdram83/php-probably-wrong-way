<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
	    <?php get_template_part('template-parts/post-parts/article-header-meta'); ?>
    </header>
    <a href="<?php the_permalink(); ?>" class="image featured"><img src="<?php the_post_thumbnail_url('index'); ?>" alt="" /></a>
    <p><?= has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 80); ?></p>
    <footer>
        <ul class="actions">
            <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
        </ul>
        <ul class="stats">
            <li><?= get_the_category_list('</li><li>'); ?></li>
	        <?php foreach (\PhpProbablyWrongWay\ThemeHelper::getCurrentPostRelatedProjects() as $relatedProject) { ?>
                <li><a href="<?= get_the_permalink($relatedProject); ?>"><?= get_the_title($relatedProject); ?></a></li>
	        <?php } ?>
        </ul>
    </footer>
</article>