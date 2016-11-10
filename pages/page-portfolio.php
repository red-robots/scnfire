<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main clear-bottom" role="main">
			<?php
            get_sidebar();
			if ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'portfolio' );
			endif; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
