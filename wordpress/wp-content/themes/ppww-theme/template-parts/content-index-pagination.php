<?php $ppwwPaginationLinks = ppwwPaginationLinks(); ?>

<ul class="actions pagination">
    <li><a href="<?= $ppwwPaginationLinks['prev']; ?>" class="button large previous <?= $ppwwPaginationLinks['prev'] ?? 'disabled'; ?>">Previous Page</a></li>
    <li><a href="<?= $ppwwPaginationLinks['next']; ?>" class="button large next <?= $ppwwPaginationLinks['next'] ?? 'disabled'; ?>">Next Page</a></li>
</ul>
