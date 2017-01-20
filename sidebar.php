<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>
<div class="false-sidebar"></div>
<aside id="main-sidebar" class="sidebar" role="complementary">
	<div class="wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
				<?php if ( is_home() ) { ?>
					<h1 class="logo">
						<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.jpg";?>" alt="logo"></a>
					</h1>
				<?php } else { ?>
					<div class="logo">
						<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.jpg";?>" alt="logo"></a>
					</div>
				<?php } ?>
				<img class="hamburger" src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
			</div><!-- wrapper -->
		</header><!-- #masthead -->
		<div class="wrapper">
            <div class="inner-wrapper">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            </div><!--.inner-wrapper-->
		</div><!--.wrapper-->
	</div><!--.wrapper-->
	<?php get_sidebar( "footer" ); ?>
</aside><!-- #secondary -->
