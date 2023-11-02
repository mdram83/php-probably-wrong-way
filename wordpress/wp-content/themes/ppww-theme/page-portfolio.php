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
                    <div class="title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?= get_field('subtitle'); ?></p>
                    </div>
                </header>
                <a href="<?php the_permalink(); ?>" class="image featured"><img src="" alt="" /></a>

                <?php the_content(); ?>

                <h3>Projects list</h3>

                <section>
                    <div class="mini-posts-portfolio">

                        <?php
                        $portfolioProjects = new WP_Query(array_merge([
                            'posts_per_page' => -1,
                        ], \PhpProbablyWrongWay\ThemeConfig::getProjectsQueryParams()));
                        while ($portfolioProjects->have_posts()) {
                            $portfolioProjects->the_post();
                            get_template_part('template-parts/content-portfolio', 'project');
                        }
                        wp_reset_postdata();
                        ?>

                    </div>
                </section>

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