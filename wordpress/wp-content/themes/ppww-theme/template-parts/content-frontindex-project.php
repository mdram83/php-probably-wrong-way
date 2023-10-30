<article class="mini-post">
    <header>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <time class="published" datetime="<?= get_field('start_date'); ?>"><?= (new DateTime(get_field('start_date')))->format('F, Y'); ?></time>
    </header>
    <a href="<?php the_permalink(); ?>" class="image"><img src="<?php the_post_thumbnail_url('medium'); ?>" alt="" /></a>
</article>