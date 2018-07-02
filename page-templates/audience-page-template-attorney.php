<?php
/**
 * Template Name: PTS Audience Page Template - Attorney
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
$args = array(
	'posts_per_page'   => 3,
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
<div class="modal fade" id="allianceModal" tabindex="-1" role="dialog" aria-labelledby="allianceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row no-gutters justify-content-end">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="row no-gutters justify-content-center">
					<div class="col-9">
						<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="audience-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="audience-page-info-wrapper">
			<?php require_once( get_stylesheet_directory() . '/template-includes/audience-page-info.php' ); ?>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-one d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Rectangles-Left.svg" alt="">
			</div>
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Rectangles-Right.svg" alt="">
			</div>
			<div class="audience-page-cards-wrapper">
				<?php require_once( get_stylesheet_directory() . '/template-includes/info-card.php' ); ?>
			</div><!-- End Cards Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center mb-5">
				<?php if ( have_rows('audience_info_row')): ?>
					<div class="col-10 col-lg-9">
						<div class="row no-gutters">
							<?php while( have_rows('audience_info_row')): the_row(); ?>
								<div class="col-12 pb-3">
									<h2 class="main-h2 aud-info-row-main-title text-lg-center">
										<?php echo the_sub_field('audience_info_row_main_title'); ?>
									</h2>
								</div>
								<div class="col-12">
									<div class="row no-gutters justify-content-lg-center mb-3">
										<div class="col col-lg-9">
											<p class="aud-info-row-main-summary">
												<?php echo the_sub_field('audience_info_row_main_summary'); ?>
											</p>
										</div>
									</div>
								</div>
								<div class="info-image-holder col-lg-7">
								<div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('audience_info_row_image') ?>)">
								</div>
								<div class="aud-info-row-shadow-left col-12 d-none d-lg-block"></div>
								</div>
								<div class="info-text col-lg-5 mt-md-5 mt-lg-0">
									<div class="row no-gutters">
										<?php echo the_sub_field('audience_info_content') ?>
									</div>
									<div class="row no-gutters justify-content-center justify-content-lg-start mt-3">
										<button id="alliance-btn" class="btn btn-primary main-btn info-rows-btn" data-toggle="modal" data-target="#allianceModal">
											JOIN the ALLIANCE <i class="fas fa-chevron-right"></i>
										</button>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div><!-- End Aud Info Row Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php require( get_stylesheet_directory() . '/template-includes/info-rows.php' ); ?>
			</div><!-- info-rows-wrapper end -->
			<!-- Recent Articles with Twitter Feed -->
			<div class="recent-articles-wrapper-b row no-gutters justify-content-center mt-5 mt-lg-0">
				<div class="col-11 col-lg-9">
					<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-3-posts-twitter.php' ); ?>
				</div>
			</div><!-- Recent Articles with Twitter Feed End -->
		</div><!-- Main Content end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>