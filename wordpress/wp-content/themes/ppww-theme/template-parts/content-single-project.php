<article class="post">
    <header>
        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?= get_field('subtitle'); ?></p>
        </div>
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

</article>