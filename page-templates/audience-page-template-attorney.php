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
	'post__not_in'     => array( 348, 362),
);
// $posts_array = get_posts( $args );
$loop = new WP_Query($args);
?>
<div class="modal fade" id="allianceModal" tabindex="-1" role="dialog" aria-labelledby="allianceModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
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
			<div class="rect-one">
				<img src="/wp-content/uploads/2018/05/Rectangles-Left.svg" alt="">
			</div>
			<div class="rect-two">
				<img src="/wp-content/uploads/2018/05/Rectangles-Right.svg" alt="">
			</div>
			<div class="audience-page-cards-wrapper">
				<?php require_once( get_stylesheet_directory() . '/template-includes/info-card.php' ); ?>
			</div><!-- End Cards Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php if ( have_rows('audience_info_row')): ?>
					<div class="col-md-11 col-lg-9">
						<?php while( have_rows('audience_info_row')): the_row(); ?>
							<div class="row no-gutters justify-content-center pb-3">
								<h1 class="main-h2 aud-info-row-main-title">
									<?php echo the_sub_field('audience_info_row_main_title'); ?>
								</h1>
							</div>
							<div class="row no-gutters justify-content-center">
								<div class="col-9">
									<p class="aud-info-row-main-summary">
										<?php echo the_sub_field('audience_info_row_main_summary'); ?>
									</p>
								</div>
							</div>
							<div class="aud-info-row row no-gutters">
								<div class="info-image-holder col-md-5 col-lg-7">
								<div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('audience_info_row_image') ?>)">
								</div>
								<div class="aud-info-row-shadow-left col-12"></div>
								</div>
								<div class="info-text col-md-6 col-lg-5">
									<?php echo the_sub_field('audience_info_content') ?>
									<button id="alliance-btn" class="btn btn-primary main-btn" data-toggle="modal" data-target="#allianceModal">
										JOIN the ALLIANCE <i class="fas fa-chevron-right"></i>
									</button>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div><!-- End Aud Info Row Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php require( get_stylesheet_directory() . '/template-includes/info-rows.php' ); ?>
			</div><!-- info-rows-wrapper end -->
			<!-- Recent Articles with Twitter Feed -->
			<div class="recent-articles-wrapper-b row no-gutters justify-content-center">
				<div class="col-10">
					<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-3-posts-twitter.php' ); ?>
				</div>
			</div><!-- Recent Articles with Twitter Feed End -->
		</div><!-- Main Content end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>