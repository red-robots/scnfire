<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about two-column"); ?>>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
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
