<?php
/**
 * Template Name: News
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
            get_sidebar();
			get_template_part( 'template-parts/content', 'news' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
