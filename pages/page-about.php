<?php
/**
 * Template Name: About
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
            get_sidebar();
			if ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'about' );
			endif; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
