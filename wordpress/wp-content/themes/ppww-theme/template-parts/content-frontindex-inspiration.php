<li>
	<article>
		<header>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<time class="published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
		</header>
		<a href="<?php the_permalink(); ?>" class="image"><img src="<?php the_post_thumbnail_url('medium'); ?>" alt="" /></a>
	</article>
</li>