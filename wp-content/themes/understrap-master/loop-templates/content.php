<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>


<div class="col-md-4 animated fadeIn">
    <div class="card mb-4 post box-shadow">
        <div class="card-body">
            <div class="card-preview">
                <img class="card-img-top"
                     title="<?php echo the_title() ?>"
                     style="height: 225px; width: 100%; display: block;"
                     src="<?php echo catch_that_image(); ?>"
                     data-holder-rendered="true">
                <span class="mask bg-gradient-primary alpha-4"></span>
            </div>
            <h3><?php echo the_title() ?></h3>
            <div class="card-text">
                <?php
                
                the_excerpt();
                ?></div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?php echo esc_url( get_permalink( get_the_ID() )) ?>" class="btn btn-sm btn-outline-secondary">阅读</a>
                <small class="text-muted"><?php the_date('d/m/Y') ?></small>
            </div>
        </div>
    </div>
</div>





