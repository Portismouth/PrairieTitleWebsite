<?php
/*
 * Template Name: Standard Article
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
	'post__not_in'     => array( 348, 362),
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
							<div class="col-7 mx-auto">
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
		<div class="main-article-wrapper">
			<div class="article-container row no-gutters justify-content-center py-5">
				<div class="col-5">
					<?php if(!get_field('article_hero_image')): ?>
					<div class="row no-gutters">
						<h1 class="no-img-article-h1">
							<?php the_field('article_hero_title'); ?>
						</h1>
					</div>
					<?php endif; ?>
					<div class="row no-gutters">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/">Home</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/homepage/resources">Resources</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/homepage/resources/articles">Articles</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/homepage/for-consumers">For Consumers</a>
								</li>
							</ol>
						</nav>
					</div><!-- end breadcrumbs -->
					<?php while( have_rows('article_content')): the_row(); ?>
						<div class="row no-gutters pt-3">
							<h1 class="article-h1"><?php echo the_sub_field('article_title'); ?></h1>
						</div>
						<div class="row no-gutters pt-3">
							<p class="main-p">By <?php echo $author; ?></p>
						</div>
						<div class="row no-gutters pt-3">
							<a class="article-social-link pr-3" href="#">
								<img src="/wp-content/uploads/2018/05/C-Facebook.svg" alt="">
							</a>	
							<a class="article-social-link pl-2" href="#">
								<img src="/wp-content/uploads/2018/05/C-Twitter.svg" alt="">
							</a>
						</div>
						<div class="article-content row no-gutters pt-4">
							<?php echo the_sub_field('article_text'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div><!-- end article container -->
			<div class="recent-articles-wrapper">
				<div class="recent-articles-circle-square-left">
					<img src="/wp-content/uploads/2018/05/Circle-Square-Left.svg" alt="">
				</div>
				<div class="recent-articles-circle-square-right">
					<img src="/wp-content/uploads/2018/05/Circle-Square-Right.svg" alt="">
				</div>
				<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
			</div><!-- Recent Articles end -->
		</div><!-- Main Article Wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<script type="text/javascript">
	jQuery(document).ready(function($){
		if(document.getElementById('no-image')) {
			console.log('sup?')
			$('.navbar').css('height', '140px');
			$('.mega-menu-link').css('color', '#4A5155');
			$('.custom-logo-link img').attr('src', '/wp-content/uploads/2018/05/006937-1.svg');
		}
	});
</script>

<?php get_footer(); ?>