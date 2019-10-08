<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

            <div class="col-md-3" id="contact">
                <div class="pr-lg-4">
                    <h5 class="heading h6 text-uppercase font-weight-700 mb-3">联系方式</h5>
                    <ul class="list-unstyled text-small">
                        <li class="d-flex py-2">
                            <div>
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            </div>
                            <div><span class="pl-3 d-inline-block">暂无内容</span>
                            </div>
                        </li>
                        <li class="d-flex py-2">
                            <div>
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span class="pl-3 d-inline-block">暂无内容</span>
                            </div>
                        </li>
                        <li class="d-flex py-2">
                            <div>
                                 <i class="fa fa-envelope-open"></i>
                            </div>
                            <div>
                                <span class="pl-3 d-inline-block">暂无内容</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

			<div class="col-md-4">

                <footer id="colophon" class="site-footer" role="contentinfo">
                    <?php if ( has_nav_menu( 'social' ) ) : ?>
                        <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'understrap' ); ?>">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social',
                                'menu_class'     => 'social-links-menu',
                                'depth'          => 2,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>',
                            ) );
                            ?>
                        </nav><!-- .social-navigation -->
                    <?php endif; ?>

                </footer><!-- .site-footer -->

			</div><!--col end -->

            <div class="col-md-4" id="qr-code">
                <div class="pr-lg-4">
                    <h5 class="heading h6 text-uppercase font-weight-700 mb-3">关注微信公众号</h5>
                    <img class="qr-code" src="<?php echo get_parent_theme_file_uri( '/css/images/code.jpg' )?>">
                </div>
            </div>

		</div><!-- row end -->

	</div><!-- container end -->

    <hr class="my-5">

    <div class="container">
        <div class="align-items-center">
            <div class="text-center">
                <a href="../">
                    <img src="<?php echo get_template_directory_uri().'/css/images/design-story.svg' ?>" class="alpha-6 alpha-10--hover" style="width: 70px;">
                </a>
                <span class="d-block mt-4">© 2018 <a href="https://webpixels.io/" class="footer-link" target="_blank">京ICP备13026048号-6</a>. All rights reserved.</span>
            </div>
        </div>
    </div>

<!--    <div id="copyright">京ICP备案证书号（京ICP备13026048号-6） Copyright 2013-2017 Yugusoft（Beijing）All Rights Reserved.</div>-->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

