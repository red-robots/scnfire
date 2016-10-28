<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-news two-column" ); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php $args = array(
		'taxonomy'   => "category",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0
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
		"posts_per_page" => - 1
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
		<div class="news">
			<?php while($query->have_posts()):$query->the_post();
				echo get_the_title();?>
			<?php endwhile;?>
		</div><!--.news-->
	<?php endif;//if for have posts?>
</article><!-- #post-## -->
