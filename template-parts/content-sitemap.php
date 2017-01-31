<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-sitemap two-column" ); ?>>
    <img src="<?php echo get_template_directory_uri() . "/images/logo-bg.png"; ?>" class="logo-bg">
    <header>
        <h1><?php the_title(); ?></h1>
    </header>
    <section class="copy">
		<?php the_content(); ?>
        <nav class="sitemap">
			<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
        </nav>
    </section><!--.copy-->
	<?php get_footer( 'content' ); ?>
</article><!-- #post-## -->
