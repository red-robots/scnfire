<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main clear-bottom" role="main">
			<?php
			get_sidebar();
				get_template_part( 'template-parts/content', 'news' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
