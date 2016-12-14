<?php
/**
 * The sidebar containing the footer area.
 */

?>
<footer id="colophon" class="site-footer clear-bottom" role="contentinfo">
    <div class="wrapper">
	    <?php $site_name = get_field("site_name","option");
	    if($site_name):?>
		    <div class="row-1">
			    <a href="<?php echo get_bloginfo('url');?>"><?php echo $site_name;?></a>
		    </div><!--.site-title-->
	    <?php endif;?>
        <?php $visit_text = get_field("visit_text","option");
        $visit_link = get_field("visit_link","option");
        if($visit_text&&$visit_link):?>
            <div class="row-2">
                <a href="<?php echo $visit_link;?>" target="_blank"><?php echo $visit_text;?></a>
            </div><!-- .row-1-->
        <?php endif;?>
        <nav class="row-3" role="navigation clear-bottom">
	        <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
        </nav>
    </div><!-- wrapper -->
</footer><!-- #colophon -->
