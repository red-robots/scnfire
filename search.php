<?php
/** Template for displaying search results
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main clear-bottom" role="main">
			<?php
			get_sidebar();
			if ( have_posts() ):
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', 'none' );

            endif; // End of the loop.
			?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
