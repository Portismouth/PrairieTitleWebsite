<?php
/*
 * Template Name: PTS Resources Page Template - Media Library
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="main-content-wrapper">
			<div class="video-wrapper row no-gutters justify-content-center mt-5">
				<div class="col-10 col-xl-8">
					<div class="row no-gutters">
						<h2 class="media-section-header">
							Videos
						</h2>
					</div>
					<div class="row">
					<?php if(have_rows('videos')): ?>
						<?php while( have_rows('videos')): the_row(); ?>
						<div class="col-lg-6 mb-4">
							<div class="row no-gutters mb-2">
								<h4 class="main-h4">
									<?php the_sub_field('video_title'); ?>
								</h4>
							</div>
							<div class="row no-gutters">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="<?php the_sub_field('video_link'); ?>" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="audio-wrapper row no-gutters justify-content-center my-5">
				<div class="col-10 col-xl-8">
					<div class="row no-gutters">
						<h2 class="media-section-header">
							Podcasts
						</h2>
					</div>
					<div class="row">
						<?php if(have_rows('podcasts')): ?>
							<?php while( have_rows('podcasts')): the_row(); ?>
							<div class="col-lg-6">
								<div class="row no-gutters">
									<h4 class="main-h4">
										<?php the_sub_field('podcast_title'); ?>
									</h4>
								</div>
								<div class="row no-gutters my-3">
									<audio controls>
										<source src="<?php the_sub_field('podcast_file'); ?>" type="audio/mpeg">
									</audio>
								</div>
							</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!-- main content end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>