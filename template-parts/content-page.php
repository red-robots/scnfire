<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
        <h1><?php the_title(); ?></h1>
	</header>
    <nav id="about-navigation" class="about-navigation" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'aboutsub' )); ?>
    </nav><!-- #about-navigation -->
	<div class="copy">
		<?php the_content();?>
	</div>
</article><!-- #post-## -->
