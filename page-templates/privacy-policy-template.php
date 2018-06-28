<?php
/*
 * Template Name: Privacy Policy
 * Template Post Type: post, page, product
 */
  
get_header();  
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
				<div class="col-11 col-lg-5">
					<?php if(!get_field('article_hero_image')): ?>
					<div class="row no-gutters">
						<h1 class="no-img-article-h1">
							<?php the_field('article_hero_title'); ?>
						</h1>
					</div>
					<?php endif; ?>
					<?php while( have_rows('article_content')): the_row(); ?>
						<div class="row no-gutters pt-3">
							<h1 class="article-h1"><?php echo the_sub_field('article_title'); ?></h1>
						</div>
						<div class="article-content row no-gutters pt-4">
							<?php echo the_sub_field('article_text'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div><!-- end article container -->
		</div><!-- Main Article Wrapper end -->
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