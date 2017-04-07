<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-news two-column" ); ?>>
	<?php get_template_part('/template-parts/form',"search");?>
	<img src="<?php echo get_template_directory_uri() . "/images/logo-bg.png"; ?>" class="logo-bg">
	<?php $post = get_post( 32 );
	setup_postdata( $post ); ?>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php wp_reset_postdata(); ?>
	<?php $args    = array(
		'taxonomy'   => "category",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0,
		'exclude'    => "1"
	);
	$category_name = get_query_var( "category_name", null );
	$terms         = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
		<nav class="news-cat">
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
		</nav><!--.news-cat-->
	<?php endif;//endif ?>
	<div class="wrapper clear-bottom">
		<?php $paged = $paged === 0 ? 1 : $paged;
		$args        = array(
			'post_type'        => "post",
			"posts_per_page"   => 8,
			"category__not_in" => array( 1 ),
			"paged"            => $paged
		);
		$events_flag = false;
		if ( $category_name !== null && ! empty( $category_name ) ):
            if(strcmp($category_name,'events')===0):
                $events_flag = true;
		    endif;
			$args['tax_query'] =
				array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category_name
					),
				);
		elseif ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
			if(strcmp($terms[0]->slug,'events')===0):
				$events_flag = true;
			endif;
            $args['tax_query'] =
				array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $terms[0]->slug
					),
				);
		endif;
		$query = new WP_Query( $args );
		if ( $query->have_posts() ):?>
			<section class="news wrapper">
				<?php while ( $query->have_posts() ):$query->the_post(); ?>
					<?php $dates = get_field( "dates" );
					$external_link = get_field("external_link");?>
					<div class="news">
                        <?php if($external_link):?>
                            <a href="<?php echo $external_link;?>" target="_blank">
                        <?php else:
                            if(!$events_flag):?>
                                <a href="<?php echo get_the_permalink(); ?>">
                            <?php endif;
                        endif;?>
							<div class="row-1">
                                <div class="column-1">
									<?php if(!$events_flag || $external_link):?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png"
                                             alt="plus icon">
									<?php endif;?>
                                </div><!--.column-2-->
								<div class="column-2">
									<header>
										<h2><?php echo get_the_title(); ?></h2>
									</header>
									<?php if ( $dates ): ?>
										<div class="dates"><?php echo $dates; ?></div>
									<?php endif; ?>
								</div><!--.column-1-->
							</div><!--.row-1-->
                        <?php if(!$events_flag || $external_link):?>
						    </a>
                        <?php endif;?>
					</div><!--.news-->
				<?php endwhile; ?>
			</section><!--.news .wrapper-->
			<nav class="pagi-post">
				<?php pagi_posts_nav( $query ); ?>
			</nav>
			<?php wp_reset_postdata(); endif;//if for have posts?>
	</div><!--.wrapper-->
	<?php get_footer('content');?>
</article><!-- #post-## -->
