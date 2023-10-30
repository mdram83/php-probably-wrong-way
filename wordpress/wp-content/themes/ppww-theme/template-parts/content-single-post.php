<article class="post">
    <header>
        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?= get_field('subtitle'); ?></p>
        </div>
        <div class="meta">
            <time class="published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
            <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><span class="name"><?php the_author(); ?></span><img src="<?= get_avatar_url(get_the_author_meta('user_email')); ?>" alt="" /></a>
        </div>
    </header>
    <span class="image featured"><img src="<?php the_post_thumbnail_url(); ?>" alt="" /></span>
    <p><?php the_content(); ?></p>
    <footer>

        <ul class="stats">
            <li><?= get_the_category_list(', '); ?></li>
            <li><a href="#" class="icon solid fa-heart">28</a></li>
<!--            <li><a href="#" class="icon solid fa-comment">128</a></li>-->
        </ul>
    </footer>
</article>