<ul class="stats">
	<li><?= get_the_category_list('</li><li>'); ?></li>
	<?php foreach (\PhpProbablyWrongWay\ThemeHelper::getCurrentPostRelatedProjects() as $relatedProject) { ?>
		<li><a href="<?= get_the_permalink($relatedProject); ?>"><?= get_the_title($relatedProject); ?></a></li>
	<?php } ?>
</ul>