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

            <?php
            \PhpProbablyWrongWay\ThemeHelper::loopQueryResultsThroughTemplatePart(
	            ['posts_per_page' => \PhpProbablyWrongWay\ThemeConfig::getHomepagePostsPerPage()],
                'template-parts/content-index',
                'post'
            );
            ?>

            <ul class="actions pagination">
                <li><a href="<?= site_url('/blog/'); ?>" class="button large next">See More</a></li>
            </ul>

        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <!-- Intro -->
	        <?php get_template_part('template-parts/sidebar-section-intro'); ?>

            <!-- About -->
            <?php
                $aboutPage = get_page_by_path('/about/', OBJECT, 'page');
            ?>
            <section class="blurb">
                <h2>About</h2>
                <p><?= get_the_excerpt($aboutPage) ?? wp_trim_words(get_the_content(null, false, $aboutPage), 80); ?></p>
                <ul class="actions">
                    <li><a href="<?= site_url('/about/'); ?>" class="button">Learn More</a></li>
                </ul>
            </section>

            <!-- Mini Posts -->
            <section>
                <h3>Portfolio</h3>
                <div class="mini-posts">

                    <?php
                    \PhpProbablyWrongWay\ThemeHelper::loopQueryResultsThroughTemplatePart(
	                    array_merge([
		                    'posts_per_page' => \PhpProbablyWrongWay\ThemeConfig::getHomepageProjectsPerPage(),
	                    ], \PhpProbablyWrongWay\ThemeConfig::getProjectsQueryParams()),
                        'template-parts/front-page/content-index',
                        'project'
                    );
                    ?>

                    <ul class="actions">
                        <li><a href="<?= site_url('/portfolio/'); ?>" class="button">See All</a></li>
                    </ul>

                </div>
            </section>

            <!-- Posts List -->
            <section>
                <h3>Inspirations</h3>
                <ul class="posts">

                    <?php
                    \PhpProbablyWrongWay\ThemeHelper::loopQueryResultsThroughTemplatePart(
	                    [
                            'posts_per_page' => \PhpProbablyWrongWay\ThemeConfig::getHomepageInspirationsPerPage(),
                            'post_type' => 'inspiration',
                        ],
                        'template-parts/front-page/content-index',
                        'inspiration'
                    );
                    ?>

                </ul>
                <ul class="actions">
                    <li><a href="<?= site_url('/inspirations/'); ?>" class="button">See More</a></li>
                </ul>
            </section>

            <!-- Footer -->
            <?php get_footer(); ?>

        </section>

    </div>

<?php wp_footer(); ?>

</body>
</html>