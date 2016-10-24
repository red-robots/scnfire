<?php
/**
 * Template part for displaying page content in index.php.
 */

$slider = get_field("slider");
$max = count($slider)-1;
if($max>-1)$index = rand(0,$max);
else $index = 0;
$image = $slider[$index]['image']['url'];
$alt = $slider[$index]['image']['alt']; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>
    <?php if($image):
        echo 'style="background-image:url('.$image.');"';
    endif;?>>
    <?php if($image):?>
        <img src="<?php echo $image;?>" alt="<?php echo $alt;?>">
    <?php endif;?>
    <nav id="home-navigation" class="home-navigation" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
    </nav><!-- #site-navigation -->
</article><!-- #post-## -->
