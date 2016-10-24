<?php
/**
 * The sidebar containing the footer area.
 */

?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrapper">
        <?php $visit_text = get_field("visit_text","option");
        $visit_link = get_field("visit_link","option");
        if($visit_text&&$visit_link):?>
            <div class="row-1">
                <a href="<?php echo $visit_link;?>" target="_blank"><?php echo $visit_text;?></a>
            </div><!-- .site-info -->
        <?php endif;?>
        <nav class="row-2" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
        </nav>
    </div><!-- wrapper -->
</footer><!-- #colophon -->
