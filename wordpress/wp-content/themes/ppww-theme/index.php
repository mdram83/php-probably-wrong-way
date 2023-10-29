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
			get_template_part('template-parts/content-index', 'post');
		}

		?>

        <!-- Pagination -->
        <?php get_template_part('template-parts/content-index', 'pagination'); ?>


    </div>

    <!-- Footer -->
    <?php get_footer(); ?>

</div>

<?php wp_footer(); ?>

</body>
</html>