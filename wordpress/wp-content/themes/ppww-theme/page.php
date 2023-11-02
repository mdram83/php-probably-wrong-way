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

            <!-- Post -->
            <?php the_post(); ?>

            <article class="post">
                <header>
                    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
                </header>

                <?php the_content(); ?>

                <footer>
	                <?php get_template_part('template-parts/page-parts/article-footer-actions'); ?>
                </footer>
            </article>

        </div>

        <!-- Footer -->
        <?php get_footer(); ?>

    </div>

<?php wp_footer(); ?>

</body>
</html>