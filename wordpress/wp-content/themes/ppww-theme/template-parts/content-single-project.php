<article class="post">
    <header>
	    <?php get_template_part('template-parts/post-parts/article-header-h2-title-subtitle'); ?>
    </header>

    <div class="row gtr-uniform">
        <div class="col-12">
            <p>
                <span class="image project">
                    <img src="<?php the_post_thumbnail_url('medium-large'); ?>" alt="" />
                </span>
                <?php the_content(); ?>
            </p>
        </div>
    </div>

    <?php if (get_field('production_link') != '' || get_field('repository_link') != '') { ?>
        <ul class="actions">
	        <?= get_field('production_link') != '' ? '<li><a href="' . get_field('production_link') . '" class="button large" target="_blank">Visit Site</a></li>' : ''; ?>
	        <?= get_field('repository_link') != '' ? '<li><a href="' . get_field('repository_link') . '" class="button large icon brands fa-github" target="_blank">GitHub</a></li>' : ''; ?>
        </ul>
    <?php } ?>

    <h3>Additional information</h3>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Technologies</strong></td>
                    <?php $technologies = array_map(fn($term) => $term->to_array()['name'], get_the_terms(get_the_ID(), 'technology')) ?? []; ?>
                    <td><?= implode(' | ', $technologies); ?></td>
                </tr>
                <tr>
                    <td><strong>Phase</strong></td>
                    <?php $project_status = array_map(fn($term) => $term->to_array()['name'], get_the_terms(get_the_ID(), 'project-status')) ?? []; ?>
                    <td><?= implode(', ', $project_status); ?></td>
                </tr>
                <tr>
                    <td><strong>Started on</strong></td>
                    <td><?= (new DateTime(get_field('start_date')))->format('F, Y'); ?></td>
                </tr>
                <tr>
                    <td><strong>Closed on</strong></td>
                    <td><?= get_field('end_date') != '' ? (new DateTime(get_field('end_date')))->format('F, Y') : ''; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
    $relatedBlogPosts = get_posts( [
	    'post_type' => 'post',
	    'posts_per_page' => -1,
	    'meta_query' => [
		    [
			    'key' => 'related_project',
			    'value' => '"' . get_the_ID() . '"',
			    'compare' => 'LIKE',
		    ]
	    ]
    ]);

    if($relatedBlogPosts) { ?>
        <h3>Related blog posts</h3>
        <ul>
			<?php foreach($relatedBlogPosts as $relatedBlogPost) { ?>
                <li><a href="<?= get_the_permalink($relatedBlogPost); ?>"><?= get_the_title($relatedBlogPost); ?></a></li>
			<?php } ?>
        </ul>
	<?php } ?>

</article>