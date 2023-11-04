<div class="meta">
    <time class="published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
    <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" class="author">
        <span class="name"><?php the_author(); ?></span>
        <img src="<?= get_avatar_url(get_the_author_meta('user_email')); ?>" alt="" />
    </a>
</div>