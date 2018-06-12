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
			<div class="rect-two">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right-2.svg" alt="">
			</div>
			<div class="audience-page-cards-wrapper">
				<?php require_once( get_stylesheet_directory() . '/template-includes/info-card.php' ); ?>
			</div><!-- End Cards Wrapper -->
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php if ( have_rows('info_row') ): 
					$counter = 0;    
				?>
					<div class="col-md-11 col-lg-9">
						<?php while( have_rows('info_row')): the_row(); ?>
							<div class="info-row row no-gutters">
							<?php if($counter % 2 == 0): ?>
								<div class="info-text col-md-6 col-lg-4">
									<h1><?php echo the_sub_field('info_text_title') ?></h1>
									<p><?php echo the_sub_field('info_text') ?></p>
									<?php $button = get_sub_field('button_link_text'); ?>
									<a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn"><?php echo $button['button_text']; ?>  <i class="fas fa-chevron-right"></i></a>
								</div>
								<div class="info-image-holder col-md-5 col-lg-7 offset-1">
									<div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
									</div>
									<div class="aud-info-row-shadow-right col-12"></div>
								</div>
							<?php else: ?>
								<div class="info-image-holder col-md-5 col-lg-7">
								<div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
								</div>
								<div class="aud-info-row-shadow-left col-12"></div>
								</div>
								<div class="info-text col-md-6 col-lg-4 offset-1">
									<h1><?php echo the_sub_field('info_text_title') ?></h1>
									<p><?php echo the_sub_field('info_text') ?></p>
									<?php $button = get_sub_field('button_link_text'); ?>
									<a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn"><?php echo $button['button_text']; ?>  <i class="fas fa-chevron-right"></i></a>
								</div>
							<? endif; ?>
							</div>
							<?php $counter++; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div><!-- End Aud Info Row Wrapper -->
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-7 align-items-center">
					<div class="row no-gutters justify-content-center">
						<div class="glossary-link-container col-10 px-5">
							<h3 class="main-h3" style="line-height: 47px;">
								Glossary
							</h3>
							<p class="main-p">
								Get familiar with all the title insurance jargon with our A to Z glossary.
							</p>
							<a href="#">Start reading&nbsp;</a>
						</div>
					</div>
				</div>
			</div>
			<div class="recent-articles-wrapper row no-gutters">
				<div id="consumer-page-left-rect" class="recent-articles-circle-square-left">
					<img src="/wp-content/uploads/2018/06/Rectangles-left.svg" alt="">
				</div>
				<div class="recent-articles-circle-square-right">
					<img src="/wp-content/uploads/2018/05/Circle-Square-Right.svg" alt="">
				</div>
				<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
			</div><!-- Recent Articles end -->
			<div class="featured-resources-wrapper row no-gutters justify-content-center">
				<div class="col-10">
					<div class="row no-gutters justify-content-center">
						<div class="col-9">
							<div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
							<div class="col-6 text-left">
								<h2>Featured Resources</h2>
							</div>
							<div class="col-6 text-right">
								<a href="/homepage/resources/articles/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
						<div class="row justify-content-between">

						</div>
						</div>
						<div class="col-3 pl-4">
							<?php echo do_shortcode('[custom-twitter-feeds]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>