<?php
/**
 * Template part for displaying no search results.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-none two-column"); ?>>
    <img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
    <header>
        <h1>Search</h1>
    </header>
    <div class="copy">
        <p><?php esc_html_e( 'It looks like nothing was found. Maybe try one of the links below?', 'acstarter' ); ?></p>
        <nav class="sitemap">
			<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
        </nav>
    </div><!-- .copy -->
	<?php get_footer('content');?>
</article><!-- #post-## -->
