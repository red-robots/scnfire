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
	$first_slide_text  = get_field("first_slide_text",26);
	$back_text  = get_field("back_text",26);
	$location                         = get_field( "location" );
	$images                           = get_field( "gallery" );
	$our_involvement                  = get_field( "our_involvement" );
	$project_description              = get_field( "project_description" );
	$square_footage                   = get_field( "square_footage" );
	$type_from = isset($_GET['type_from'])?sanitize_text_field($_GET['type_from']):null; ?>
	<header>
		<div class="row-1">
			<div class="logo">
				<a href="<?php bloginfo( 'url' ); ?>"><img
						src="<?php echo get_template_directory_uri() . "/images/logo.jpg"; ?>" alt="logo"></a>
			</div>
            <div class="wrapper">
                <div class="copy">
                    <a href="<?php
	                if($type_from):
		                echo get_term_link($type_from,"project_type");
	                else :
		                $terms = get_the_terms( $post->ID,'project_type');
		                if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
			                echo get_term_link($terms[0]);
		                elseif(get_post(26)):
			                echo get_the_permalink(26);
		                endif;
	                endif;?>">
                        <?php echo $back_text;?>
                    </a>
                </div><!--.copy-->
                <div class="close-box">
                    <a href="<?php
                    if($type_from):
                        echo get_term_link($type_from,"project_type");
                    else :
                        $terms = get_the_terms( $post->ID,'project_type');
                        if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
                            echo get_term_link($terms[0]);
                        elseif(get_post(26)):
                            echo get_the_permalink(26);
                        endif;
                    endif;?>">
                        <i class="fa fa-close"></i>
                    </a>
                </div><!--.close-box-->
	            <?php get_template_part('/template-parts/form',"search");?>
            </div><!--.wrapper-->
		</div><!--.row-1-->
        <div class="row-2">
	        <?php get_template_part('/template-parts/form',"search");?>
        </div><!--.row-2-->
		<div class="row-3">
			<h1><?php the_title(); ?></h1>
			<?php if ( $location ): ?>
				<div class="location"><?php echo $location; ?></div><!--.location-->
			<?php endif;//endif for location?>
		</div><!--.row-3-->
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
			<section class="overlay">
				<img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/+.png" alt="plus icon">
				<div class="info">
					<div class="row-1">
						<img class="close-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/details-x.png"
						     alt="close icon">
					</div><!--.row-1-->
					<div class="row-2">
						<?php if ( $square_footage && $square_footage_header_text ): ?>
							<div class="square-footage copy">
								<header><h2><?php echo $square_footage_header_text; ?></h2></header>
								<p><?php echo $square_footage; ?></p>
							</div><!--.square-footage-->
						<?php endif; ?>
						<?php if ( $project_description && $project_description_header_text ): ?>
							<div class="project-description copy">
								<header><h2><?php echo $project_description_header_text; ?></h2></header>
								<?php echo $project_description; ?>
							</div><!--.project-description-->
						<?php endif; ?>
						<?php if ( $our_involvement && $our_involvement_header_text ): ?>
							<div class="our-involvement copy">
								<header><h2><?php echo $our_involvement_header_text; ?></h2></header>
								<?php echo $our_involvement; ?>
							</div><!--.our-involvement-->
						<?php endif; ?>
					</div><!--.row-2-->
				</div><!--.info-overlay-->
			</section><!--.overlay-->
			<a class="flex-prev" href="#">Prev</a>
			<a class="flex-next" href="#">Next</a>
		</div><!--.slider.wrapper-->
        <div class="carousel-wrapper clear-bottom">
			<?php if($first_slide_text):?>
                <div class="first-slide">
					<?php echo $first_slide_text;?>
                </div>
			<?php endif;?>
            <nav id="carousel" class="flexslider-nav">
                <ul class="slides">
                    <?php foreach ( $images as $image ): ?>
                        <li>
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav><!--.flexslider-nav-->
        </div><!--.carousel-wrapper-->
	<?php endif;//endif for images?>
	<?php get_footer('content');?>
</article><!-- #post-## -->
