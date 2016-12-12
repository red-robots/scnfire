<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main clear-bottom" role="main">
			<?php
            get_sidebar();
			get_template_part( 'template-parts/content', 'portfolio' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
