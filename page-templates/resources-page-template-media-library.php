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
						<?php 
							$videos_array = array();
							$vid_id = 1;
						?>
						<?php while( have_rows('videos')): the_row(); ?>
							<?php if(get_sub_field('video_link_spanish')) :
								$english_title = get_sub_field('video_title');
								$spanish_title = get_sub_field('video_title_spanish');
								$english_src = get_sub_field('video_link');
								$spanish_src = get_sub_field('video_link_spanish');
								$videos_array[$vid_id] = array(
									"english_title" => $english_title,
									"english_src"   => $english_src,
									"spanish_title" => $spanish_title,
									"spanish_src"   => $spanish_src
								)
							?>
								<div id="video-<?php echo $vid_id; ?>" class="col-lg-6 mb-4">
									<div class="multi-vid-row row no-gutters mb-2">
										<h4 class="multi-vid-title video-title main-h4" title="<?php the_sub_field('video_title'); ?>">
											<?php the_sub_field('video_title'); ?>
										</h4>
									</div>
									<div class="row no-gutters">
										<div class="video-container embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php the_sub_field('video_link'); ?>" allowfullscreen></iframe>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-3">
											<a class="english-toggle" href="<?php echo $vid_id; ?>">English</a>
										</div>
										<div class="col-3">
											<a class="spanish-toggle" href="<?php echo $vid_id; ?>">Spanish</a>
										</div>
									</div>
								</div>
							<?php 
								$vid_id++; 
							?>	
							<? else: ?>
								<div class="col-lg-6 mb-4">
									<div class="row no-gutters mb-2">
										<h4 class="video-title main-h4" title="<?php the_sub_field('video_title'); ?>">
											<?php the_sub_field('video_title'); ?>
										</h4>
									</div>
									<div class="row no-gutters">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="<?php the_sub_field('video_link'); ?>" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							<?php endif; ?>
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
							<div class="col-lg-6 pr-2">
								<div class="row no-gutters">
									<h4 class="main-h4">
										<?php the_sub_field('podcast_title'); ?>
									</h4>
								</div>
								<div class="audio-container row no-gutters my-3">
										<?php the_sub_field('podcast_file'); ?>
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
<script type="text/javascript">
	jQuery(document).ready(function($) {
		let video = <?php echo json_encode($videos_array, JSON_FORCE_OBJECT); ?>;
		console.log(video);
		$('.spanish-toggle').on('click', function(e) {
			e.preventDefault();
			let vidId = $(this).attr('href');
			console.log(vidId);
			let targetVid = "#video-" + vidId;
			console.log(targetVid);
			$(targetVid)
				.find('.multi-vid-title')
				.html(video[vidId]['spanish_title']);
			$(targetVid)
				.find('iframe')
				.attr('src', video[vidId]['spanish_src']);
		});
		$('.english-toggle').on('click', function(e) {
			e.preventDefault();
			let vidId = $(this).attr('href');
			console.log(vidId);
			let targetVid = "#video-" + vidId;
			console.log(targetVid);
			$(targetVid)
				.find('.multi-vid-title')
				.html(video[vidId]['english_title']);
			$(targetVid)
				.find('iframe')
				.attr('src', video[vidId]['english_src']);
		});
	});
</script>

<?php get_footer(); ?>