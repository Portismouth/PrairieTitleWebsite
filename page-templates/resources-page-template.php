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
	'post__not_in'     => array( 348, ),
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
				<div class="col-6">
					<div class="row no-gutters">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo get_permalink($post->post_parent); ?>">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="<?php echo get_page_link()?>"><?php echo wp_title(''); ?></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="row no-gutters pt-3">
						<p class="audience-page-info-text">
							<?php the_field('info_text'); ?>
						</p>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-two">
				<img src="/wp-content/uploads/2018/05/Rectangles-Right.svg" alt="">
			</div>
			<div class="row no-gutters justify-content-center">
				<div class="col-7">
					<div class="recent-articles-heading row justify-content-between align-items-center">
						<div class="col-6 text-left p-0">
							<h2>Recent Articles</h2>
						</div>
						<div class="col-6 text-right p-0">
							<a href="/homepage/resources/articles/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<div class="posts-wrapper row">
						<div class="row justify-content-between">
							<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php if( get_field('article_hero_image', false, false) ): ?>
								<div class="col-lg-4 my-3">
									<a href="<?php echo the_permalink();?>">
										<div class="article-card row no-gutters">
											<div class="col-4 col-lg-12" >
												<div class="article-card-image" style="background-image: url(<?php the_field('article_hero_image') ?>);">
												</div>
											</div>	
											<div class="article-card-info col-8 col-lg-12 order-first order-lg-last">
												<h5 class="article-card-title w-100"><?php echo the_field('article_hero_title'); ?></h5>
												<div class="article-card-tag-list mt-auto">
													<?php 
														$posttags = get_the_tags(); 
														$tag_count = 1;
													?>
													<p>
														<?php foreach($posttags as $tag): ?>
															<?php
																if($tag_count === count($posttags)){
																	echo $tag->name;
																} else {
																	echo $tag->name.", "; 
																}
																$tag_count++;
															?>
														<?php endforeach; ?>
													</p>
												</div>
											</div>
										</div>
									</a>
								</div>
								<?php else: ?>
								<div class="col-lg-4 my-3">
									<a href="<?php echo the_permalink();?>">
										<div class="article-card-no-img">
											<div class="row no-gutters">
												<h5 class="article-card-title w-100">
													<?php echo the_field('article_hero_title'); ?>
												</h5>
											</div>
											<div class="row no-gutters position-relative">
												<?php 
													while( have_rows('article_content')): the_row();
													$summary = get_sub_field('article_text', false, false); 	
												?>
												<div class="text-fade-overlay"></div>
												<p class="main-p">
													<?php echo substr($summary, 0, 200) . "..."; ?>	
												</p>
												<? endwhile; ?>
											</div>
											<div class="row no-gutters mt-lg-auto">
												<div class="article-card-tag-list">
													<?php 
														$posttags = get_the_tags(); 
														$tag_count = 1;
													?>
													<p>
														<?php foreach($posttags as $tag): ?>
															<?php
																if($tag_count === count($posttags)){
																	echo $tag->name;
																} else {
																	echo $tag->name.", "; 
																}
																$tag_count++;
															?>
														<?php endforeach; ?>
													</p>
												</div>
											</div>
										</div>
									</a>
								</div>						
								<?php endif; ?>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div><!-- end article card row -->
					</div>
					<div class="recent-articles-heading row justify-content-between align-items-center">
						<div class="col-6 text-left p-0">
							<h2>Featured Video</h2>
						</div>
						<div class="col-6 text-right p-0">
							<a href="#">VIEW MORE<i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="testimonials-wrapper">
			<div class="circle-square-left">
				<img src="/wp-content/uploads/2018/05/Circle-Square-left.svg" alt="">
			</div>
			<div class="circle-square-right">
				<img src="/wp-content/uploads/2018/05/Circle-Square-right.svg" alt="">
			</div>
			<div class="row no-gutters justify-content-center py-4">
				<div class="col-7">
					<div class="recent-articles-heading row justify-content-between align-items-center">
						<div class="col-6 text-left p-0">
							<h2>Industry Links</h2>
						</div>
					</div>
					<div>
						
					</div>
				</div>
			</div>
		</div><!-- testimonials end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>