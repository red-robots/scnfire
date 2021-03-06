<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about two-column"); ?>>
	<?php get_template_part('/template-parts/form',"search");?>
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
