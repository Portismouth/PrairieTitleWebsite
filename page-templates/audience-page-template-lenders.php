<?php
/**
 * Template Name: PTS Audience Page Template - For Lenders
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
$args = array(
	'posts_per_page'   => 6,
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
				<img src="/wp-content/uploads/2018/05/Rectangles-Right-1.svg" alt="">
			</div>
			<div class="audience-page-cards-wrapper">
				<div class="row no-gutters justify-content-center">
					<div class="col-11 col-lg-9">
						<div class="row no-gutters justify-content-around">
							<div class="info-image-holder col-md-5 col-lg-6">
								<div class="info-image col-12" style="background-image:url(/wp-content/uploads/2018/05/lenders-commercial.png)">
								</div>
							<div class="aud-info-row-shadow-left-2 col-12"></div>
							</div>
							<?php while( have_rows('info_card_group')): the_row(); ?>
							<div class="info-card col-5">
								<div class="row no-gutters justify-content-center pb-3">
									<img src="<?php echo the_sub_field('info_card_image'); ?>" alt="">
								</div>
								<div class="row no-gutters justify-content-center">
									<h3>
										<?php echo the_sub_field('info_card_title'); ?>
									</h3>
								</div>
								<div class="row no-gutters">
									<p>
										<?php echo the_sub_field('info_card_text'); ?>
									</p>
								</div>
								<div class="row no-gutters">
									<?php $link = get_sub_field('info_card_link_url'); ?>
									<a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?> <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div><!-- End Cards Wrapper -->
			<!-- Recent Articles with Twitter Feed -->
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