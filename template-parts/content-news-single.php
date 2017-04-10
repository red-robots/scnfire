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
	<?php get_template_part('/template-parts/form',"search");?>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php $back_text = get_field( "news_back_text", 72); ?>
	<?php if ( $back_text && get_post( 72 ) ): ?>
		<div class="link">
			<a href="<?php echo get_the_permalink( 72 ); ?>">
				<?php echo $back_text; ?>
			</a>
		</div><!--.link-->
	<?php endif; ?>
	<div class="row-1 clear-bottom">
		<?php $args = array(
			'post_type'        => "post",
			"posts_per_page"   => 5,
			"category__not_in" => array( 1 ),
            "orderby"=>"menu_order",
			"order"=>"ASC"
		);
		$terms = get_the_terms(get_the_ID(),'category');
		if(!is_wp_error($terms)&&is_array($terms) && !empty($terms)):
            $args['tax_query']= array(array(
                    'taxonomy'=>'category',
                    'field'=>'term_id',
                    'terms'=>$terms[0]->term_id
            ));
        endif;
		$query      = new WP_Query( $args );
		if ( $query->have_posts() ): ?>
			<aside class="recent-news">
				<?php $recent_text = get_field( "news_recent_text", 72 );
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
			</aside><!--.recent-news-->
		<?php wp_reset_postdata(); endif; ?>
		<section class="copy">
			<?php $dates = get_field( "dates" );
			if ( $dates ):?>
				<div class="dates">
					<?php echo $dates; ?>
				</div><!--.dates-->
			<?php endif; ?>
			<?php the_content(); ?>
		</section><!--.copy-->
	</div><!--.row-1-->
	<?php get_footer('content');?>
</article><!-- #post-## -->
