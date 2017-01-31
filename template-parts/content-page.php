<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page two-column"); ?>>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<header>
        <h1><?php the_title(); ?></h1>
	</header>
	<?php if(get_the_content()):?>
		<section class="copy">
			<?php the_content();?>
		</section><!--.copy-->
	<?php endif;//if for get the content?>
	<?php get_footer('content');?>
</article><!-- #post-## -->
