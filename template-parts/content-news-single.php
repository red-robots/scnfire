<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-news-single two-column" ); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php $back_text = get_field( "news_back_text", "option" ); ?>
	<?php if ( $back_text && get_post( 32 ) ): ?>
		<div class="link">
			<a href="<?php echo get_the_permalink( 32 ); ?>">
				<?php echo $back_text; ?>
			</a>
		</div><!--.link-->
	<?php endif; ?>
	<div class="row-1 clear-bottom">
		<?php $args = array(
			'post_type'        => "post",
			"posts_per_page"   => 5,
			"category__not_in" => array( 1 )
		);
		$query      = new WP_Query( $args );
		if ( $query->have_posts() ): ?>
			<div class="recent-news">
				<?php $recent_text = get_field( "news_recent_text", "option" );
				if ( $recent_text ):?>
					<header>
						<h2><?php echo $recent_text; ?></h2>
					</header>
				<?php endif; ?>
				<?php while ( $query->have_posts() ):$query->the_post(); ?>
					<div class="news">
						<a href="<?php echo get_the_permalink(); ?>">
							<div class="row-1">
								<div class="column-1">
									<header>
										<h3><?php echo get_the_title(); ?></h3>
									</header>
								</div><!--.column-1-->
								<div class="column-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png"
									     alt="plus icon">
								</div><!--.column-2-->
							</div><!--.row-1-->
						</a>
					</div><!--.news-->
				<?php endwhile; ?>
			</div><!--.recent-news-->
		<?php endif; ?>
		<div class="copy">
			<?php $dates = get_field( "dates" );
			if ( $dates ):?>
				<div class="dates">
					<?php echo $dates; ?>
				</div><!--.dates-->
			<?php endif; ?>
			<?php the_content(); ?>
		</div><!--.copy-->
	</div><!--.row-1-->
</article><!-- #post-## -->
