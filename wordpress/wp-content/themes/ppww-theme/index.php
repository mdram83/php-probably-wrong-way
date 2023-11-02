<?php get_template_part('template-parts/html-doctype'); ?>

<html <?php language_attributes(); ?>>

<?php get_template_part('template-parts/html-head'); ?>

<body class="single is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header/Menu -->
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