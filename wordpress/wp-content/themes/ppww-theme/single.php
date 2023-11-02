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
                if (get_post_type() === 'project') {
                    get_template_part('template-parts/content-single', 'project');
                } else {
                    get_template_part('template-parts/content-single', 'post');
                }
            }

            ?>

            <ul class="actions pagination">
                <?= (get_post_type() === 'post') ? '<li><a href="' . site_url('/blog/') .'" class="button large next">Back to Blog</a></li>' : ''; ?>
                <?= (get_post_type() === 'inspiration') ? '<li><a href="' . site_url('/inspirations/') .'" class="button large next">Back to Inspirations</a></li>' : ''; ?>
                <?= (get_post_type() === 'project') ? '<li><a href="' . site_url('/portfolio/') .'" class="button large next">Back to Portfolio</a></li>' : ''; ?>
                <li><a href="<?= site_url(); ?>" class="button large next">Home Page</a></li>
            </ul>

        </div>

        <!-- Footer -->
        <?php get_footer(); ?>

    </div>

    <?php wp_footer(); ?>

</body>
</html>