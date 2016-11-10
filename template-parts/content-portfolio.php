<?php
/**
 * Template part for displaying page content in page-portfolio.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-portfolio two-column" ); ?>>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<?php $post = get_post(26);
	setup_postdata($post);?>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php wp_reset_postdata();?>
	<?php $args = array(
		'taxonomy'   => "project-type",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0,
		'exclude' => "1"
	);
	$category_name = get_query_var( "category_name", null );
	$terms      = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
		<nav class="portfolio-cat">
			<ul>
				<?php for($i=0;$i<count($terms);$i++):
					$term = $terms[$i];?>
					<li>
						<a <?php if(($category_name===null ||  empty( $category_name )) && $i===0) echo 'class="active"';?>
							href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
					</li>
				<?php endfor; ?>
			</ul>
		</nav><!--.portfolio-cat-->
	<?php endif;//endif ?>
	<?php $args    = array(
		'post_type'      => "portfolio",
		"posts_per_page" => 8,
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
		<section class="portfolio wrapper">
			<?php while($query->have_posts()):$query->the_post();?>

			<?php endwhile;?>
		</section><!--.portfolio .wrapper-->
		<nav class="pagi-post">
			<?php pagi_posts_nav($query);?>
		</nav>
	<?php endif;//if for have posts?>
</article><!-- #post-## -->
