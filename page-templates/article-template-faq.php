<?php
/*
 * Template Name: FAQ
 * Template Post Type: post, page, product
 */
  
get_header();  
$post_data = get_post();
$author = get_the_author();
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
		<?php if (get_field('article_hero_image') || get_field('article_hero_title')): ?>
			<?php if(get_field('article_hero_image')): ?>
			<div class="article-hero-wrapper row no-gutters">
				<div class="jumbotron jumbotron-fluid" style="background-image:url(<?php the_field('article_hero_image'); ?>)">
					<div class="row no-gutters h-100 align-items-end">
						<div class="container">
							<div class="col mx-auto">
								<h1 class="page-hero-title text-center">
									<?php the_field('article_hero_title'); ?>
								</h1>
							</div>
						</div>
					</div>
				</div><!-- end article hero template -->
			</div><!-- End Hero Wrapper -->  
			<?php else: ?>
			<div id="no-image" class="article-hero-wrapper row no-gutters">

			</div><!-- End Hero Wrapper -->  
			<?php endif; ?>
		<?php endif; ?>
		<div class="main-article-wrapper pb-5">
			<div class="article-container row no-gutters justify-content-center py-5">
				<?php require_once( get_stylesheet_directory() . '/template-includes/article-heading.php' ); ?>					
			</div><!-- end article container -->
			<?php while( have_rows('q_&_a_group')): the_row(); ?>
				<div class="article-container row no-gutters justify-content-center mb-2">
					<div class="col-1 d-none d-lg-block pr-3">
						<h1 class="faq-h1 text-right">
							Q:
						</h1>	
					</div>
					<div class="col-11 col-lg-5">				
						<div class="row no-gutters">
							<h1 class="faq-h1">
								<span class="d-lg-none">Q: </span><?php echo the_sub_field('question'); ?>
							</h1>
						</div>
						<div class="article-content row no-gutters mt-2">
							<?php echo the_sub_field('answer'); ?>
						</div>
					</div>
					<div class="col-1 d-none d-lg-block"></div>
				</div>
			<?php endwhile; ?>					
		</div><!-- Main Article Wrapper end -->
		<div class="recent-articles-wrapper">
			<div class="recent-articles-circle-square-left d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Circle-Square-Left-Full.svg" alt="">
			</div>
			<div class="recent-articles-circle-square-right d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Circle-Square-Right-Full.svg" alt="">
			</div>
			<?php 
				if($similar_posts): 
				$sim_post_count = count($similar_posts);
			?>
				<?php require( get_stylesheet_directory() . '/template-includes/similar-articles.php' ); ?>
			<?php else: ?>
				<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
			<?php endif; ?>
		</div><!-- Recent Articles end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<script type="text/javascript">
	jQuery(document).ready(function($){
		if(document.getElementById('no-image')) {
			$('.navbar').css('height', '140px');
			$('.mega-menu-link').css('color', '#4A5155');
			$('.custom-logo-link img').attr('src', '/wp-content/uploads/2018/05/006937-1.svg');
		}
	});
</script>

<?php get_footer(); ?>