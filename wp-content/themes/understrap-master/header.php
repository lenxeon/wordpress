<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
//获得当前路径
$uri = $_SERVER['REQUEST_URI'];
if(startsWith($uri, '/')){
    $length = strlen($uri);
    $uri = substr($uri, 1, $length);
}
if($uri=='') wp_redirect('/index');
$uri = trim(str_replace('/', '-', $uri));
$GLOBALS['uri'] = $uri;
//echo '['.$uri.']'.($uri=='')
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
    <script type="text/javascript">
        window.$ = jQuery;
        var link = function(href){
            window.location.href = href;
        }
        $(document).ready(function () {
			// 顶部标题
			$(document).scrollTop(0);
            $(document).scroll(function () {
                var top = $(this).scrollTop();
                if(top>10){
                    $('#wrapper-navbar').addClass('fixed');
                } else {
                    $('#wrapper-navbar').removeClass('fixed');
                }
			});
			// 分页加载策略
			$('.view-more a').click(function(e){
				$that = $(this);
				var url = $that.attr('href');
				$.get(url, function(data){
					$('#main .row').append($(data).find('#main .row').children());
					var next = $(data).find('.view-more a').attr('href');
					console.log(next);
					if(next){
						$that.attr('href', next);
					} else {
						$that.remove();
					}
				});
				return false;
			});
			//代码高亮
			$('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
			});
        })
    </script>
</head>

<body <?php body_class($uri); ?>>

<!--[if lt IE 10]>
 <div class="old-browser">
     <a href="http://browsehappy.com/">
        <img src="https://portal.qiniu.com/static/images/older-browsers.be439d60.png" alt="您的浏览器版本过低，为了保障您的访问安全，以及获得更友好的用户体验，建议您升级您的浏览器到最新版本。">
     </a>
 </div>
<![endif]-->

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><img class="brand" src="<?php echo get_parent_theme_file_uri( '/css/images/design-story.svg' )?>"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><img class="brand" src="<?php echo get_parent_theme_file_uri( '/css/images/design-story.svg' )?>"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
                <a class="btn btn-sm btn-white btn-circle btn-icon d-none d-lg-inline-flex" href="/sign-in">免费体验</a>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
