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
							<section id="intro">
								<a href="<?= site_url(); ?>" class="logo"><img src="<?= get_theme_file_uri('/images/logo.png'); ?>" alt="" /></a>
								<header>
									<h2><?php bloginfo('name'); ?></h2>
									<p><?php bloginfo('description'); ?></p>
								</header>
							</section>

						<!-- Footer -->
							<?php get_footer(); ?>

					</section>

			</div>

    <?php wp_footer(); ?>

	</body>
</html>