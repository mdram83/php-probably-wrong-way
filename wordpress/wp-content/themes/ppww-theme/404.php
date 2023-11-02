<?php get_template_part('template-parts/html-doctype'); ?>

<html <?php language_attributes(); ?>>

<?php get_template_part('template-parts/html-head'); ?>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header/Menu -->
        <?php get_header(); ?>

        <!-- Main -->
        <div id="main">

            <article class="post">
                <div style="text-align: center;">
                    <h2>404 | Not Found</h2>
                    <p>Page you are looking for is not available</p>
                </div>
            </article>

            <ul class="actions pagination">
                <li><a href="<?= site_url(''); ?>" class="button large next">Home Page</a></li>
            </ul>

        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <!-- Intro -->
	        <?php get_template_part('template-parts/homepage-section', 'intro'); ?>

            <!-- Footer -->
            <?php get_footer(); ?>

        </section>

    </div>

<?php wp_footer(); ?>

</body>
</html>