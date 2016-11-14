<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-portfolio-single" ); ?>>
	<?php $square_footage_header_text = get_field( "square_footage_header_text", 26 );
	$project_description_header_text  = get_field( "project_description_header_text", 26 );
	$our_involvement_header_text      = get_field( "our_involvement_header_text", 26 );
	$location                         = get_field( "location" );
	$images                           = get_field( "gallery" );
	$our_involvement                  = get_field( "our_involvement" );
	$project_description              = get_field( "project_description" );
	$square_footage                   = get_field( "square_footage" ); ?>
	<header>
		<div class="row-1 clear-bottom">
			<div class="logo">
				<a href="<?php bloginfo( 'url' ); ?>"><img
						src="<?php echo get_template_directory_uri() . "/images/logo.jpg"; ?>" alt="logo"></a>
			</div>
		</div><!--.row-1-->
		<div class="row-2">
			<h1><?php the_title(); ?></h1>
			<?php if ( $location ): ?>
				<div class="location"><?php echo $location; ?></div><!--.location-->
			<?php endif;//endif for location?>
		</div><!--.row-2-->
	</header>
	<?php if ( $images && count( $images ) > 0 ): ?>
		<div class="slider wrapper">
			<div id="flexslider">
				<ul class="slides">
					<?php foreach ( $images as $image ): ?>
						<li>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						</li>
					<?php endforeach; ?>
				</ul>
			</div><!--#flexslider-->
			<div class="overlay">
				<img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
				<div class="info">
					<div class="square-footage copy">
						<header><h2><?php echo $square_footage_header_text; ?></h2></header>
						<p><?php echo $square_footage;?></p>
					</div>
					<div class="project-description copy">
						<header><h2><?php echo $project_description_header_text; ?></h2></header>
						<?php echo $project_description;?>
					</div>
					<div class="our-involvement copy">
						<header><h2><?php echo $our_involvement_header_text; ?></h2></header>
						<?php echo $our_involvement;?>
					</div>
					<img class="close-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
				</div><!--.info-overlay-->
			</div><!--.overlay-->
			<a class="flex-prev" href="#">Prev</a>
			<a class="flex-next" href="#">Next</a>
		</div><!--.slider.wrapper-->
		<div id="carousel" class="flexslider-nav">
			<ul class="slides">
				<?php foreach ( $images as $image ): ?>
					<li>
						<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
					</li>
				<?php endforeach; ?>
			</ul>
		</div><!--.flexslider-nav-->
	<?php endif;//endif for images?>
</article><!-- #post-## -->
