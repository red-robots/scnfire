<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-news two-column" ); ?>>
	<?php $post = get_post(32);
	setup_postdata($post);?>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php wp_reset_postdata();?>
	<?php $args = array(
		'taxonomy'   => "category",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0,
		'exclude' => "1"
	);
	$category_name = get_query_var( "category_name", null );
	$terms      = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
		<nav class="news-cat">
			<ul>
				<?php for($i=0;$i<count($terms);$i++):
					$term = $terms[$i];?>
					<li>
						<a <?php if(($category_name===null ||  empty( $category_name )) && $i===0) echo 'class="active"';?>
							href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
					</li>
				<?php endfor; ?>
			</ul>
		</nav><!--.news-cat-->
	<?php endif;//endif ?>
	<?php $args    = array(
		'post_type'      => "post",
		"posts_per_page" => 10,
		"category__not_in"=>array(1)
	);
	if ( $category_name !== null && ! empty( $category_name ) ):
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $category_name
				),
			);
	elseif( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $terms[0]->slug
				),
			);
	endif;
	$query = new WP_Query($args);
	if($query->have_posts()):?>
		<section class="news wrapper">
			<?php while($query->have_posts()):$query->the_post();?>
				<?php $dates = get_field("dates");?>
				<div class="news clear-bottom">
					<a href="<?php echo get_the_permalink();?>">
						<div class="row-1">
							<div class="column-1">
								<header>
									<h2><?php echo get_the_title();?></h2>
								</header>
								<?php if($dates):?>
									<div class="dates"><?php echo $dates;?></div>
								<?php endif;?>
							</div><!--.column-1-->
							<div class="column-2">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
							</div><!--.column-2-->
						</div><!--.row-1-->
					</a>
				</div><!--.news-->
			<?php endwhile;?>
		</section><!--.news .wrapper-->
		<nav class="pagi-post">
			<?php pagi_posts_nav($query);?>
		</nav>
	<?php endif;//if for have posts?>
</article><!-- #post-## -->
