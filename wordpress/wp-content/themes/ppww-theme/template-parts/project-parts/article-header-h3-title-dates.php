<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<time class="published" datetime="<?= get_field('start_date'); ?>">
    <?= (new DateTime(get_field('start_date')))->format('F, Y'); ?>
</time>