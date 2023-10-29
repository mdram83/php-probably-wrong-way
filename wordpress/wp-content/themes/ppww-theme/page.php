<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<?php wp_head(); ?>
</head>
<body class="single is-preload">

<!-- Wrapper -->
<div id="wrapper">

	<!-- Header -->
	<!-- Menu -->
	<?php get_header(); ?>

	<!-- Main -->
	<div id="main">

		<!-- Post -->
        <?php the_post(); ?>

		<article class="post">
			<header>
				<div class="title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?= get_field('subtitle'); ?></p>
				</div>
			</header>
			<a href="<?php the_permalink(); ?>" class="image featured"><img src="" alt="" /></a>

            <?php the_content(); ?>

			<footer>
				<ul class="actions">
					<li><a href="<?= site_url(); ?>" class="button large">Back to Home Page</a></li>
				</ul>
			</footer>
		</article>

	</div>

    <!-- Footer -->
	<?php get_footer(); ?>

</div>

<?php wp_footer(); ?>

</body>
</html>