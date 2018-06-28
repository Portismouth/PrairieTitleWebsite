<?php
/*
 * Template Name: PTS Resources Page Template
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
	'post__not_in'     => array( 348, 362, 845),
);
// $posts_array = get_posts( $args );
$loop = new WP_Query($args);
?>
<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="audience-page-info-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-11 col-lg-6">
					<div class="row no-gutters">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo get_permalink($post->post_parent); ?>">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="<?php echo get_page_link()?>"><?php echo get_the_title(''); ?></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="audience-page-info-text row no-gutters pt-3">
						<?php the_field('info_text'); ?>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper py-5">
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Rectangles-Right.svg" alt="">
			</div>
			<div class="row no-gutters justify-content-center">
				<div class="col-11 col-lg-8"><!-- start main col -->
					<div class="recent-articles-wrapper">
						<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-3-posts-no-twitter.php' ); ?>
					</div><!-- Recent Articles end -->
					<!-- start featured vid -->
					<div class="featured-vid-wrapper mt-5">
						<div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
							<div class="col-lg-6 text-left p-0">
								<h2>Featured Video</h2>
							</div>
							<div class="col-6 text-right p-0 d-none d-lg-block">
								<a href="/homepage/resources/media-library/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
						<div class="row no-gutters mt-3">
							<?php if( get_field('video_title')): ?>
								<div class="col p-0">
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
						<div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
							<div class="col-12 text-center p-0 d-block d-lg-none mt-3">
								<a href="/homepage/resources/media-library/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div><!-- end featured vid -->
				</div><!-- end main col -->
			</div>
		</div><!-- end main-content wrapper -->
		<div class="testimonials-wrapper">
			<div class="circle-square-left d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Circle-Square-left.svg" alt="">
			</div>
			<div class="circle-square-right d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Circle-Square-right.svg" alt="">
			</div>
			<div class="row no-gutters justify-content-center py-4">
				<div class="col-11 col-lg-8">
					<div class="recent-articles-heading row no-gutters">
						<div class="col-lg-6 text-left p-0">
							<h2>Industry Links</h2>
						</div>
					</div>
					<div class="row no-gutters">
						<?php if(have_rows('industry_links')): ?>
							<?php while(have_rows('industry_links')): the_row(); ?>
								<div class="col-md-4 pl-0 pr-2">
									<?php if(get_sub_field('industry_links_column_one')): ?>
										<?php while( have_rows('industry_links_column_one')): the_row(); ?>
											<div class="row no-gutters py-1">
												<a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>										
								<div class="col-md-4 pl-0 pr-2">
									<?php if(get_sub_field('industry_links_column_two')): ?>
										<?php while( have_rows('industry_links_column_two')): the_row(); ?>
											<div class="row no-gutters py-1">
												<a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>										
								<div class="col-md-4 pl-0 pr-2">
									<?php if(get_sub_field('industry_links_column_three')): ?>
										<?php while( have_rows('industry_links_column_three')): the_row(); ?>
											<div class="row no-gutters py-1">
												<a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!-- testimonials end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>