<?php
/**
 * Template part for displaying search.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-search two-column" ); ?>>
    <img src="<?php echo get_template_directory_uri() . "/images/logo-bg.png"; ?>" class="logo-bg">
    <header>
        <h1>Search</h1>
    </header>
    <div class="copy">
        <p><?php esc_html_e( 'Click on one of the links below!', 'acstarter' ); ?></p>
    </div><!--.copy-->
    <div class="wrapper">
		<?php while ( have_posts() ):the_post(); ?>
            <div class="item">
                <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
		<?php endwhile; ?>
    </div><!--.wrapper-->
	<?php get_footer( 'content' ); ?>
</article><!-- #post-## -->
