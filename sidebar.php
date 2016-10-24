<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>
<aside id="main-sidebar" class="sidebar" role="complementary">
    <header id="masthead" class="site-header" role="banner">
        <div class="wrapper">
            <?php if (is_home()) { ?>
                <h1 class="logo">
                    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php } else { ?>
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                </div>
            <?php } ?>
        </div><!-- wrapper -->
    </header><!-- #masthead -->
    <div class="row-1">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
        </nav><!-- #site-navigation -->
        <?php get_sidebar("footer"); ?>
    </div><!--.row-1-->
</aside><!-- #secondary -->
