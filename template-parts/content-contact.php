<?php
/**
 * Template part for displaying page content in page-contact.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-contact two-column"); ?>>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<header>
        <h1><?php the_title(); ?></h1>
	</header>
    <div class="row-1 clear-bottom">
		<section class="column-1 copy">
			<?php the_content();?>
		</section><!--.copy-->
        <aside class="column-2">
            <?php $map  = get_field("map");
            if($map)echo $map;?>
        </aside>
    </div><!--.wrapper-->
	<?php get_footer('content');?>
</article><!-- #post-## -->
