<!-- Header -->
<header id="header">
	<h1><a href="<?= site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
	<nav class="links">
		<ul>
			<li><a <?php if (is_page('about')) echo 'class="current"'; ?> href="<?= site_url('/about/'); ?>">About</a></li>
			<li><a <?php if (get_post_type() === 'post') echo 'class="current"'; ?> href="<?= site_url('/blog/'); ?>">Blog</a></li>
			<li><a <?php if (is_page('portfolio')) echo 'class="current"'; ?> href="<?= site_url('/portfolio/'); ?>">Portfolio</a></li>
            <li><a <?php if (get_post_type() === 'inspiration') echo 'class="current"'; ?> href="<?= site_url('/inspirations/'); ?>">Inspirations</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section id="menu">

	<!-- Search -->
	<section>
		<form class="search" method="get" action="#">
			<input type="text" name="query" placeholder="Search" />
		</form>
	</section>

	<!-- Links -->
	<section>
		<ul class="links">
			<li>
				<a href="<?= site_url('/about/'); ?>">
					<h3>About</h3>
					<p>More about me and this page</p>
				</a>
			</li>
			<li>
				<a href="<?= site_url('/blog/'); ?>">
					<h3>Blog</h3>
					<p>Read the blog</p>
				</a>
			</li>
			<li>
				<a href="<?= site_url('/portfolio/'); ?>">
					<h3>Portfolio</h3>
					<p>Learn more about my projects</p>
				</a>
			</li>
            <li>
                <a href="<?= site_url('/inspirations/'); ?>">
                    <h3>Inspirations</h3>
                    <p>Get inspired... probably</p>
                </a>
            </li>
		</ul>
	</section>

	<!-- Actions -->
	<section>
		<ul class="actions stacked">
			<li><a href="#" class="button large fit">Log In</a></li>
		</ul>
	</section>

</section>