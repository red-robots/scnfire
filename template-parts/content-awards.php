<?php
/**
 * Template part for displaying page content in page-awards.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-awards two-column"); ?>>
	<?php $gallery = get_field("gallery"); ?>
	<?php get_template_part('/template-parts/form',"search");?>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<header>
        <h1><?php the_title(); ?></h1>
	</header>
	<?php if($gallery):?>
        <div class="wrapper two-column">
            <div class="col-1">
	<?php endif;?>
        <?php if(get_the_content()):?>
            <section class="copy">
                <?php the_content();?>
            </section><!--.copy-->
        <?php endif;//if for get the content?>
    <?php if($gallery):?>
            </div><!--.col-1-->
            <div class="col-2">
                <?php foreach($gallery as $image):?>
                   <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                <?php endforeach;?>
            </div><!--.col-2-->
        </div><!--.wrapper.two-column-->
    <?php endif;?>
    <?php get_footer('content');?>
</article><!-- #post-## -->
