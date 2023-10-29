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

		<?php

		while (have_posts()) {
			the_post();
			get_template_part('template-parts/content-single', 'post');
		}

		?>

        <ul class="actions pagination">

            <?= (get_post_type() === 'post') ? '<li><a href="' . site_url('/blog/') .'" class="button large next">Back to Blog</a></li>' : ''; ?>
	        <?= (get_post_type() === 'inspiration') ? '<li><a href="' . site_url('/inspirations/') .'" class="button large next">Back to Inspirations</a></li>' : ''; ?>

            <li><a href="<?= site_url(); ?>" class="button large next">Home Page</a></li>
        </ul>

    </div>



    <!-- Footer -->
	<?php get_footer(); ?>

</div>

<?php wp_footer(); ?>

</body>
</html>