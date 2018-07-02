<?php
/**
 * Template Name: PTS Audience Page Template - For Consumers
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
$args = array(
	'posts_per_page'   => 4,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'fields'           => '',
	'post__not_in'     => array( 348, 362, 845),
);
// $posts_array = get_posts( $args );
$loop = new WP_Query($args);
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="audience-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="audience-page-info-wrapper">
			<?php require_once( get_stylesheet_directory() . '/template-includes/audience-page-info.php' ); ?>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right-2.svg" alt="">
			</div>
			<div class="audience-page-cards-wrapper">
				<?php require_once( get_stylesheet_directory() . '/template-includes/info-card.php' ); ?>
			</div><!-- End Cards Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php require( get_stylesheet_directory() . '/template-includes/info-rows.php' ); ?>
			</div><!-- info-rows-wrapper end -->
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-11 col-lg-7 align-items-center">
					<div class="row no-gutters justify-content-center">
						<div class="glossary-link-container col-lg-10 pl-3 px-lg-5">
							<h3 class="main-h3" style="line-height: 47px;">
								Glossary
							</h3>
							<p class="main-p">
								Get familiar with all the title insurance jargon with our A to Z glossary.
							</p>
							<a href="/homepage/for-consumers/glossary/">Start reading&nbsp;<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="recent-articles-wrapper row no-gutters">
				<div id="consumer-page-left-rect" class="recent-articles-circle-square-left d-none d-lg-block">
					<img src="/wp-content/uploads/2018/06/Rectangles-left.svg" alt="">
				</div>
				<div class="recent-articles-circle-square-right d-none d-lg-block">
					<img src="/wp-content/uploads/2018/06/Circle-Square-Right-Full.svg" alt="">
				</div>
				<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
			</div><!-- Recent Articles end -->
			<div class="featured-resources-wrapper row no-gutters justify-content-center py-5">
				<div class="col-11 col-lg-10">
					<div class="row no-gutters justify-content-center">
						<div class="col-12 col-lg-9">
							<div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
								<div class="col-lg-6 text-center text-lg-left">
									<h2>Featured Resources</h2>
								</div>
								<div class="col-6 text-right d-none d-lg-block">
									<a href="/homepage/resources/articles/">
										MORE RESOURCES <i class="fas fa-chevron-right"></i>
									</a>
								</div>
							</div>
							<div class="row no-gutters mt-2">
								<?php if( get_field('video_title')): ?>
									<div class="col">
										<div class="row no-gutters">
											<h4 class="main-h4">
												<?php the_field('video_title'); ?>
											</h4>
										</div>
										<div class="row no-gutters mt-3">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="<?php the_field('video_link'); ?>" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-12 col-lg-3 mt-3 mt-lg-0 pl-lg-4">
							<div class="row no-gutters">
								<h4 class="twitter-heading">
									<i class="fab fa-twitter"></i> @PrairieTitle
								</h4>
							</div>
							<div class="row no-gutters">
								<?php echo do_shortcode('[custom-twitter-feeds showheader=false num=5 showbutton=false]'); ?>
							</div>
							<div class="twitter-link-box row no-gutters align-items-center">
								<div class="col text-center">
									<a href="https://twitter.com/prairietitle">
										View on Twitter
									</a>	
								</div>
							</div>
						</div>
					</div>
					<div class="row no-gutters justify-content-center my-5">
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
					<div class="col-12 text-center d-block d-lg-none">
						<a href="/homepage/resources/articles/">
							MORE RESOURCES <i class="fas fa-chevron-right"></i>
						</a>
					</div>
				</div><!-- end featured resources col -->
			</div><!-- end featured resources -->
		</div><!-- end main content -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>