<?php
/**
 * The sidebar containing the footer area.
 */

?>
<footer id="colophon" class="site-footer clear-bottom" role="contentinfo">
    <div class="wrapper">
        <div class="bar"></div><!--.bar-->
        <div class="inner-wrapper">
            <?php $site_name = get_field("site_name","option");
            if($site_name):?>
                <div class="row-1">
                    <a href="<?php echo get_bloginfo('url');?>"><?php echo $site_name;?></a>
                </div><!--.site-title-->
            <?php endif;?>
            <?php $visit_text = get_field("visit_text","option");
            if($visit_text):?>
                <div class="row-2">
                    <?php echo $visit_text;?>
                </div><!-- .row-1-->
            <?php endif;?>
            <nav class="row-3" role="navigation clear-bottom">
                <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
            </nav>
        </div><!--.inner-wrapper-->
    </div><!-- wrapper -->
</footer><!-- #colophon -->
