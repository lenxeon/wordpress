<?php
$page = max( 1, get_query_var('paged') );
$maxPage = $GLOBALS['wp_query']->max_num_pages;
if ($page < $maxPage) {
    ?>
    <div class="view-more" id="view-more">
        <div class="more" style="padding:15px;text-align:center;">
            <a class="btn btn-primary btn-circle btn-translate--hover px-4" href="<?php echo (esc_url( get_pagenum_link( $page + 1 ))); ?>">更多文章</a>
        </div>
    </div>
    <?php
}
?>