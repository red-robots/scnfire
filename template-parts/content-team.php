<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-team two-column"); ?>>
	<img src="<?php echo get_template_directory_uri()."/images/logo-bg.png";?>" class="logo-bg">
	<header>
        <h1><?php the_title(); ?></h1>
	</header>
	<?php if(get_the_content()):?>
		<div class="copy">
			<?php the_content();?>
		</div><!--.copy-->
	<?php endif;//if for get the content?>
	<?php $paged= $paged === 0?1:$paged;
	$args = array(
		'post_type'      => "team",
		"posts_per_page" => -1,
		"orderby"=>'menu_order',
		"order"=>'ASC',
		"paged"=>$paged
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ):?>
		<section class="team wrapper is-container">
			<?php while ( $query->have_posts() ):$query->the_post();?>
				<?php $image = get_field("image");
				$position = get_field("position");?>
				<div class="member is-item" <?php if ( $image ):
					echo 'style="background-image: url(' . $image['sizes']['large'] . ');"';
				endif; ?>>
					<a href="<?php echo get_the_permalink(); ?>">
						<div class="row-1 clear-bottom">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
						</div>
						<div class="row-2">
							<h2><?php echo get_the_title(); ?></h2>
							<?php if ( $position ): ?>
								<div class="position"><?php echo $position; ?></div>
							<?php endif; ?>
						</div>
					</a>
				</div><!--.portfolio-->
			<?php endwhile; ?>
		</section><!--.team .wrapper-->
		<nav class="pagi-post">
			<?php pagi_posts_nav( $query ); ?>
		</nav>
	<?php wp_reset_postdata(); endif;//if for have posts?>
	<?php get_footer('content');?>
</article><!-- #post-## -->
