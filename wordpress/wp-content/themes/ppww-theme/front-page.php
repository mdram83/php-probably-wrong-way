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
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<!-- Menu -->
					<?php get_header(); ?>

				<!-- Main -->
					<div id="main">

                        <?php
                            $homepagePosts =new WP_Query(['posts_per_page' => 2]);
                            while ($homepagePosts->have_posts()) {
                                $homepagePosts->the_post();
	                            get_template_part('template-parts/content-index', 'post');
                            }
                            wp_reset_postdata();
                        ?>

                        <ul class="actions pagination">
                            <li><a href="<?= site_url('/blog/'); ?>" class="button large next">See More</a></li>
                        </ul>

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="<?= get_theme_file_uri('/images/logo.png'); ?>" alt="" /></a>
								<header>
									<h2><?php bloginfo('name'); ?></h2>
									<p><?php bloginfo('description'); ?></p>
								</header>
							</section>

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
                                    $homepageProjects = new WP_Query([
                                        'posts_per_page' => 3,
                                        'post_type' => 'project',
                                        'meta_query' => [
                                            'relation' => 'AND',
                                            'featured_clause' => [
                                                'key'     => 'featured',
                                                'compare' => 'EXISTS',
                                            ],
                                            'start_date_clause' => [
                                                'key'     => 'start_date',
                                                'compare' => 'EXISTS',
                                            ],
                                        ],
                                        'orderby' => [
                                            'featured_clause' => 'DESC',
                                            'start_date_clause' => 'ASC',
                                        ],
                                    ]);
                                    while ($homepageProjects->have_posts()) {
                                        $homepageProjects->the_post();
                                        get_template_part('template-parts/content-frontindex', 'project');
                                    }
                                    wp_reset_postdata();
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
                                    $homepageInspirations =new WP_Query([
                                        'posts_per_page' => 2,
                                        'post_type' => 'inspiration',
                                    ]);
                                    while ($homepageInspirations->have_posts()) {
                                        $homepageInspirations->the_post();
                                        get_template_part('template-parts/content-frontindex', 'inspiration');
                                    }
                                    wp_reset_postdata();
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