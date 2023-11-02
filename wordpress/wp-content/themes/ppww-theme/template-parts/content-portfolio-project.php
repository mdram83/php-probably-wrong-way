<article class="mini-post">
    <header>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <time class="published" datetime="<?= get_field('start_date'); ?>"><?= (new DateTime(get_field('start_date')))->format('F, Y'); ?></time>

        <ul class="actions small">
            <li><a href="<?php the_permalink(); ?>" class="button small">Learn More</a></li>
	        <?= get_field('production_link') != '' ? '<li><a href="' . get_field('production_link') . '" class="button small" target="_blank">Visit Site</a></li>' : ''; ?>
        </ul>

    </header>
    <a href="<?php the_permalink(); ?>" class="image">
        <img class="mini-posts-portfolio" src="<?php the_post_thumbnail_url('medium'); ?>" alt="" />
    </a>
</article>