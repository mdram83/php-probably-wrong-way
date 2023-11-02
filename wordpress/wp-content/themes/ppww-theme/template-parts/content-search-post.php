<article class="post">
    <header>

        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?= get_field('subtitle'); ?></p>
        </div>

        <?php if (get_post_type() === 'post' || get_post_type() === 'inspiration') { ?>
            <div class="meta">
                <time class="published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
                <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><span class="name"><?php the_author(); ?></span><img src="<?= get_avatar_url(get_the_author_meta('user_email')); ?>" alt="" /></a>
            </div>
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