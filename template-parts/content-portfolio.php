<?php
/**
 * Template part for displaying page content in page-portfolio.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-portfolio two-column" ); ?>>
	<?php get_template_part('/template-parts/form',"search");?>
	<img src="<?php echo get_template_directory_uri() . "/images/logo-bg.png"; ?>" class="logo-bg">
	<?php $post = get_post( 26 );
	setup_postdata( $post ); ?>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php wp_reset_postdata(); ?>
	<?php $args    = array(
		'taxonomy'   => "project_type",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0
	);
	$category_name = get_query_var( "term", null );
	$terms         = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
		<nav class="portfolio-cat">
			<ul>
				<?php for ( $i = 0; $i < count( $terms ); $i ++ ):
					$term = $terms[ $i ]; ?>
					<li>
						<a <?php if ( ( $category_name === null || empty( $category_name ) ) && $i === 0 ) {
							echo 'class="active"';
						} ?>
							href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
					</li>
				<?php endfor; ?>
			</ul>
		</nav><!--.portfolio-cat-->
	<?php endif;//endif ?>
	<?php $paged= $paged === 0?1:$paged;
	$this_term;
	$args = array(
		'post_type'      => "portfolio",
		"posts_per_page" => -1,
		"orderby"=>'menu_order',
		"order"=>'ASC',
		"paged"=>$paged
	);
	if ( $category_name !== null && ! empty( $category_name ) ):
        $this_term = $category_name;
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'project_type',
					'field'    => 'slug',
					'terms'    => $category_name
				),
			);
	elseif ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
        $this_term = $terms[0]->slug;
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'project_type',
					'field'    => 'slug',
					'terms'    => $terms[0]->slug
				),
			);
	endif;
	$query = new WP_Query( $args );
	if ( $query->have_posts() ):?>
		<section class="portfolio wrapper is-container">
			<?php while ( $query->have_posts() ):$query->the_post();
				$location = get_field( "location" );
				$images   = get_field( "gallery" ); ?>
				<div class="portfolio is-item" <?php if ( $images && count( $images ) > 0 ):
					echo 'style="background-image: url(' . $images[0]['sizes']['large'] . ');"';
				endif; ?>>
					<a href="<?php echo esc_url(add_query_arg(array(
						'type_from'=> $this_term
					),get_the_permalink()));?>">
						<div class="row-1 clear-bottom">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
						</div>
						<div class="row-2">
							<h2><?php echo get_the_title(); ?></h2>
							<?php if ( $location ): ?>
								<div class="location"><?php echo $location; ?></div>
							<?php endif; ?>
						</div>
					</a>
				</div><!--.portfolio-->
			<?php endwhile; ?>
		</section><!--.portfolio .wrapper-->
		<nav class="pagi-post">
			<?php pagi_posts_nav( $query ); ?>
		</nav>
	<?php wp_reset_postdata();endif;//if for have posts?>
	<?php get_footer('content');?>
</article><!-- #post-## -->
