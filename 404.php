<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			get_sidebar();?>
			<section class="error-404 two-column">
				<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
				<header>
					<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
				</header><!-- .page-header -->

				<div class="copy">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
					<nav class="sitemap">
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
					</nav>
				</div><!-- .copy -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
