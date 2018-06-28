<?php
/*
 * Template Name: PTS Resources Page Template - Articles
 * Description: Used as a page template to show page contents 
 */
$tags = get_tags(array('hide_empty' => false));

get_header();

if(!$_GET['tag']) {
	$active_tags = array();
	foreach($tags as $tag) {
		if(strlen($tag->slug) > 1) {
			array_push($active_tags, $tag->slug);
		}
	}
} else {
	$active_tags = array();
	array_push($active_tags, $_GET['tag']);
} 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'posts_per_page'   => 9,
	'paged'            => $paged,
	'offset'           => (($paged -1) * 9),
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'post__not_in'     => array( 348, 362, 845),
	'tag'              => $active_tags,
);
$wp_query = new WP_Query($args);
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="main-content-wrapper row no-gutters justify-content-center py-5">
			<div class="rect-one d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Left.svg" alt="">
			</div>
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right.svg" alt="">
			</div>
			<div class="col-11 col-lg-8"><!-- main page col start -->
				<div class="explore-topic-wrapper row no-gutters">
					<h3 class="media-section-header w-100">Explore Topics</h3>
						<?php foreach($tags as $tag): ?>
							<?php if(strlen($tag->slug) > 1): ?>
								<?php if(in_array($tag->slug, $active_tags)) :?>
									<div class="post-tag-selector active">
										<a href="/homepage/resources/articles/?tag=<?php echo $tag->slug ?>">
											<?php echo $tag->name ?>
										</a>
									</div>
								<?php else: ?>
									<div class="post-tag-selector inactive">
										<a href="/homepage/resources/articles/?tag=<?php echo $tag->slug ?>">
											<?php echo $tag->name ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
				</div><!-- end topic filter wrapper -->
				<div class="posts-wrapper row mt-4">
					<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<?php if( get_field('article_hero_image', false, false) ): ?>
						<div class="article-card-container col-lg-4 my-3">
							<a href="<?php echo the_permalink();?>">
								<div class="article-card row no-gutters">
									<div class="col-4 col-lg-12" >
										  <?php if ( has_post_thumbnail() ): ?>
											<div class="article-card-image" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
											</div>
										<?php else: ?>
											<div class="article-card-image" style="background-image: url(<?php the_field('article_hero_image'); ?>);">
											</div>
										<?php endif; ?>
									</div>	
									<div class="article-card-info col-8 col-lg-12 order-first order-lg-last">
										<h5 class="article-card-title w-100">
											<?php echo the_field('article_hero_title'); ?>
										</h5>
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
						</div><!-- end card -->
						<?php else: ?>
						<div class="article-card-container col-lg-4 my-3">
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
											<?php if( strlen(get_field('article_hero_title')) < 50): ?>
												<p class="main-p">
													<?php echo substr($summary, 0, 200) . "..."; ?>	
												</p>
											<?php else: ?>
												<p class="main-p">
													<?php echo substr($summary, 0, 150) . "..."; ?>	
												</p>
											<?php endif; ?>	
											<? 
												endwhile;     
											?>
									</div>
									<div class="row no-gutters mt-3 mt-lg-auto">
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
						</div><!-- end card -->					
						<?php endif; ?>
					<?php endwhile; ?>

					<?php
						else: 
						echo "nothing here"; 
					?>
					<?php endif; ?>
				</div><!-- Posts wrapper end -->
				<div class="row no-gutters justify-content-center mt-5"><!-- pagination row start -->
					<div class="col-6">
						<nav class="pagination justify-content-between">
							<?php
								$big = 999999999; // need an unlikely integer
								$prev = "<i class='fas fa-chevron-left'></i>";
								$next = "<i class='fas fa-chevron-right'></i>";
								echo paginate_links( array(
									'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									// 'current' => max( 1, get_query_var('paged') ),
									'total' => $wp_query->max_num_pages,
									'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>',
									'prev_text' => $prev,
									'next_text' => $next	
								) );
							?>
						</nav>
					</div>
				</div><!-- pagination row end -->
				<?php wp_reset_query(); ?>
			</div><!-- main page col end -->
		</div><!-- main-content-wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>