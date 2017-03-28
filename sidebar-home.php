<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>
<div class="false-sidebar"></div>
<aside id="main-sidebar" class="home-sidebar" role="complementary">
	<div class="wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
				<?php if ( is_home() ) { ?>
					<h1 class="logo">
						<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.jpg";?>" alt="Fire Station"></a>
					</h1>
				<?php } else { ?>
					<div class="logo">
						<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.jpg";?>" alt="Fire Station"></a>
					</div>
				<?php } ?>
			</div><!-- wrapper -->
		</header><!-- #masthead -->
		<?php $tag = get_field( "tagline" );
		$sub_1     = get_field( "sub_heading_1" );
		$sub_2     = get_field( "sub_heading_2" ); ?>
		<div class="wrapper">
            <div class="bar"></div><!--.bar-->
            <div class="inner-wrapper">
                <?php if ( $tag || $sub_1 || $sub_2 ): ?>
                    <div class="row-1">
                        <?php if ( $tag ): ?>
                            <div class="tag"><?php echo $tag; ?></div>
                        <?php endif; ?>
                        <?php if ( $sub_1 ): ?>
                            <div class="sub-1"><?php echo $sub_1; ?></div>
                        <?php endif; ?>
                        <?php if ( $sub_2 ): ?>
                            <div class="sub-2"><?php echo $sub_2; ?></div>
                        <?php endif; ?>
                    </div><!--.row-1-->
                <?php endif; ?>
            </div>
		</div><!--.wrapper-->
	</div><!--.wrapper-->
	<?php get_sidebar( "footer" ); ?>
</aside><!-- #secondary -->
