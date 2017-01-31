<?php
/**
 * The template for displaying the page footer.
 */
?>

<div class="footer sitemapbw clear-bottom">
	<?php get_template_part('/template-parts/form',"search");?>
    <?php wp_nav_menu(array('theme_location' => 'sitemapbw'));?>
</div>