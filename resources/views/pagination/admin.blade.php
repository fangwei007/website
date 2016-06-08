<style>
    .pagination {
        padding-bottom: 25px;
    }

    .pagination a {
        text-decoration: none;
    }
</style>
<div class="pagination">
    <?php if ($paginator->hasPages()): ?>
        <!-- Previous page link -->
        <?php if ($paginator->previousPageUrl() != ""): ?>
            <a href="<?php echo $paginator->previousPageUrl(); ?>">
                &lt; Previous
            </a>&nbsp;
        <?php else: ?>
            <span class="disabled">&lt; Previous</span>&nbsp;
        <?php endif; ?>

        <!-- Numbered page links -->
        <?php $last = ceil($paginator->total() / $paginator->perPage()); ?>
        <?php foreach ($paginator->getUrlRange(1, $last) as $key => $url): ?>
            <?php if ($key != $paginator->currentPage()) { ?>
                <a href="<?= $url; ?>">
                    <?php echo $key; ?>
                </a>&nbsp;
                <?php
            } else {
                echo $key;
                ?>&nbsp;
            <?php } ?>
        <?php endforeach; ?>

        <!-- Next page link -->
        <?php if ($paginator->nextPageUrl() != ""): ?>
            <a href="<?php echo $paginator->nextPageUrl(); ?>">
                Next &gt;
            </a>
        <?php else: ?>
            <span class="disabled">Next &gt;</span>
        <?php endif; ?>

    <?php endif; ?>
</div>