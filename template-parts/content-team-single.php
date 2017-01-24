<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-team-single two-column" ); ?>>
	<?php get_template_part('/template-parts/form',"search");?>
	<img src="<?php echo get_template_directory_uri() . "/images/logo-bg.png"; ?>" class="logo-bg">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<?php $back_text = get_field( "team_back_text", 62 ); ?>
	<?php if ( $back_text && get_post( 62 ) ): ?>
		<div class="link">
			<a href="<?php echo get_the_permalink( 62 ); ?>">
				<?php echo $back_text; ?>
			</a>
		</div><!--.link-->
	<?php endif; ?>
	<div class="row-1">
		<section class="column-1">
			<?php $phone = get_field( "phone" );
			$fax         = get_field( "fax" );
			$email       = get_field( "email" );
			$linkedin    = get_field( "linkedin" );
			$position    = get_field( "position" );
			$image       = get_field( "image" ); ?>
			<div class="row-1">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			</div>
			<div class="row-2" <?php
			$watermark = get_field( "watermark", 62 );
			if ( $watermark ):
				echo 'style="background-image: url(' . $watermark['url'] . ');"';
			endif;
			?>>
				<div class="wrapper">
					<?php if ( $position ): ?>
						<div class="position"><?php echo $position; ?></div><!--.position-->
					<?php endif;//if for position?>
					<?php if ( $phone ): ?>
						<div class="phone">(p) <?php echo $phone; ?></div><!--.phone-->
					<?php endif;//if for phone?>
					<?php if ( $fax ): ?>
						<div class="fax <?php if(!$email && !$linkedin) echo "no-below";?>">(f) <?php echo $fax; ?></div><!--.fax-->
					<?php endif;//if for fax?>
					<?php if ( $email || $linkedin ): ?>
						<div class="font-awesome-icons">
							<?php if ( $email ): ?>
								<a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope"></i></a>
							<?php endif;//if for email?>
							<?php if ( $linkedin ): ?>
								<a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
							<?php endif;//if for linkedin?>
						</div><!--.font-awesome-icons-->
					<?php endif;//if for font awesome icons?>
				</div><!--.wrapper-->
			</div><!--.row-2-->
		</section><!--.column-1-->
		<section class="column-2">
			<?php $certifications_header_text = get_field( "certifications_header_text", 62 );
			$professional_affiliations_header_text = get_field( "professional_affiliations_header_text", 62 );
			$education_header_text            = get_field( "education_header_text", 62 );
			$fun_fact_header_text             = get_field( "fun_fact_header_text", 62 );
			$certifications                   = get_field( "certifications" );
			$professional_affiliations        = get_field( "professional_affiliations" );
			$education                        = get_field( "education" );
			$fun_fact                         = get_field( "fun_fact" ); ?>
			<?php if ( get_the_content() ): ?>
				<div class="copy">
					<?php the_content(); ?>
				</div><!--.copy-->
			<?php endif;//if for get the content?>
			<?php if ( $education ): ?>
				<div class="education">
					<?php if ( $education_header_text ): ?>
						<header><h2><?php echo $education_header_text; ?></h2></header>
					<?php endif;//if certifications header text?>
					<ul>
						<?php foreach ( $education as $row ): ?>
							<li><?php echo $row['achievement']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div><!--.education-->
			<?php endif;//if for education?>
			<?php if ( $certifications ): ?>
				<div class="certifications">
					<?php if ( $certifications_header_text ): ?>
						<header><h2><?php echo $certifications_header_text; ?></h2></header>
					<?php endif;//if certifications header text?>
					<ul>
						<?php foreach ( $certifications as $row ): ?>
							<li><?php echo $row['certification']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div><!--.certifications-->
			<?php endif;//if for certifications?>
			<?php if ( $professional_affiliations ): ?>
				<div class="professional-affiliations">
					<?php if ( $professional_affiliations_header_text ): ?>
						<header><h2><?php echo $professional_affiliations_header_text; ?></h2></header>
					<?php endif;//if certifications header text?>
					<ul>
						<?php foreach ( $professional_affiliations as $row ): ?>
							<li><?php echo $row['affiliation']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div><!--.education-->
			<?php endif;//if for education?>
			<?php if ( $fun_fact ): ?>
				<div class="fun-fact">
					<?php if ( $fun_fact_header_text ): ?>
					<header><h2><?php echo $fun_fact_header_text; ?></h2></header>
					<?php endif;//if certifications header text?>
					<ul>
						<li>
							<?php echo $fun_fact; ?>
						</li>
					</ul>
				</div>
			<?php endif;//if fun fact?>
		</section><!--.column-2-->
		<?php $args = array(
			'post_type'      => "team",
			"posts_per_page" => -1,
			"order"          => "ASC",
			"orderby"        => "rand"
		);
		$query      = new WP_Query( $args );
		if ( $query->have_posts() ): ?>
			<aside class="column-3 other-team-members clear-bottom">
				<?php $other_text = get_field( "team_other_text", 62 );
				if ( $other_text ):?>
					<header>
						<h2><?php echo $other_text; ?></h2>
					</header>
				<?php endif; ?>
				<div class="wrapper">
					<?php while ( $query->have_posts() ):$query->the_post(); ?>
						<div class="member" <?php
						$image      = get_field( "image" );
						$first_name = get_field( "first_name" );
						$last_name  = get_field( "last_name" );
						if ( $image ):
							echo 'style="background-image: url(' . $image['sizes']['thumbnail'] . ');"';
						endif;
						?>>
							<a href="<?php echo get_the_permalink(); ?>">
								<?php if ( $first_name ): ?>
									<div class="first-name"><?php echo $first_name; ?></div>
								<?php endif; ?>
								<?php if ( $last_name ): ?>
									<div class="last-name"><?php echo $last_name; ?></div>
								<?php endif; ?>
							</a>
						</div><!--.news-->
					<?php endwhile; ?>
				</div><!--.wrapper-->
			</aside><!--.recent-news-->
			<?php wp_reset_postdata(); endif; ?>
	</div><!--.row-1-->
	<?php get_footer('content');?>
</article><!-- #post-## -->
