<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

    <?php get_template_part( 'page-templates/content', 'search' ); ?>

<!--    <section class="slice" style="background: transparent">-->
<!--        <div class="container">-->
<!--            <div class="row row-grid">-->
<!--                <div class="col-lg-3">-->
<!--                    <div class="card bg-gradient-primary">-->
<!--                        <div class="px-3 py-5 text-center">-->
<!--                            <h4 class="text-white mb-3">Download</h4>-->
<!--                            <p class="text-white mb-0">Get closer to you goals by choosing our theme for building web projects.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3">-->
<!--                    <div class="card bg-secondary">-->
<!--                        <div class="px-3 py-5 text-center">-->
<!--                            <h4 class="mb-3">Customize</h4>-->
<!--                            <p class="mb-0">Get closer to you goals by choosing our theme for building web projects.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3">-->
<!--                    <div class="card bg-gradient-primary">-->
<!--                        <div class="px-3 py-5 text-center">-->
<!--                            <h4 class="text-white mb-3">Build</h4>-->
<!--                            <p class="text-white mb-0">Get closer to you goals by choosing our theme for building web projects.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3">-->
<!--                    <div class="card bg-secondary">-->
<!--                        <div class="px-3 py-5 text-center">-->
<!--                            <h4 class="mb-3">Launch</h4>-->
<!--                            <p class="mb-0">Get closer to you goals by choosing our theme for building web projects.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <?php if ( has_nav_menu( 'docs' ) ) : ?>
                <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'understrap' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'docs',
                        'menu_class'     => 'docs-links-menu',
                        'depth'          => 1,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>',
                    ) );
                    ?>
                </nav><!-- .social-navigation -->
            <?php endif; ?>


			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'loop-templates/content', get_post_format() );
                            ?>

                        <?php endwhile; ?>
                    </div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->

            <?php get_template_part( 'page-templates/widget', 'page-more' ); ?>

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	    </div> <!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
