<?php
/*
 * Template Name: PTS Resources Page Template - Articles
 * Description: Used as a page template to show page contents 
 */
// remove_filter( 'the_content', 'wpautop' );
// remove_filter('the_excerpt', 'wpautop');
$tags = get_tags(array('hide_empty' => false));

// if(isset($_COOKIE['tags'])) {
// 	$active_tags = json_decode($_COOKIE['tags']);
// 	var_dump($active_tags);
// }

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
get_header();
$args = array(
	'posts_per_page'   => 9,
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
	'author'	       => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'fields'           => '',
	'post__not_in'     => array( 348, 362),
	'tag'              => $active_tags 
);
// $posts_array = get_posts( $args );
$loop = new WP_Query($args);
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="main-content-wrapper row no-gutters justify-content-center">
			<div class="col-10 col-lg-7 col-xl-6">
				<div class="explore-topic-wrapper row">
					<h3 class="main-h3 w-100">Explore Topics</h3>
					<?php foreach($tags as $tag): ?>
						<?php if(strlen($tag->slug) > 1): ?>
							<?php if(in_array($tag->slug, $active_tags)) :?>
							<div class="post-tag-selector active">
								<a href="/homepage/resources/articles/?tag=<?php echo $tag->slug ?>"><?php echo $tag->name ?>
							</div>
							<?php else: ?>
							<div class="post-tag-selector inactive">
								<a href="/homepage/resources/articles/?tag=<?php echo $tag->slug ?>"><?php echo $tag->name ?></a>
							</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="posts-wrapper row">
					<div class="row">
						<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php if( get_field('article_hero_image', false, false) ): ?>
							<div class="col-lg-4 my-3">
								<a href="<?php echo the_permalink();?>">
									<div class="article-card">
										<div class="row no-gutters">
											<div class="col-4 col-lg-12" >
												<div class="article-card-image" style="background-image: url(<?php the_field('article_hero_image') ?>)">
												</div>
											</div>	
										</div>
										<div class="row no-gutters">
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
						<?php the_posts_pagination(); ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
						<div class="row no-gutters justify-content-center mt-5">
							<div class="col-7">
								<nav class="pagination justify-content-between">
									<?php
										$big = 999999999; // need an unlikely integer
										$prev = "<i class='fas fa-chevron-left'></i>";
										$next = "<i class='fas fa-chevron-right'></i>";
										echo paginate_links( array(
											'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											'format' => '?paged=%#%',
											'current' => max( 1, get_query_var('paged') ),
											'total' => $loop->max_num_pages,
											'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>',
											'prev_text' => $prev,
											'next_text' => $next	
										) );
									?>
								</nav>
							</div>
						</div>
					</div><!-- end article card row -->
				</div>
			</div>
		</div><!-- main-content-wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<!-- <script type="text/javascript">
	jQuery(document).ready(function($) {
		let filters = [];
		$(".post-tag-selector").change(function(){
			filters.push($(this).find('input').val());
			console.log(filters);
			$(this).addClass('active').removeClass('inactive');
			$(this).nextUntil('.active').addClass('inactive');
		})
	});
</script> -->

<?php get_footer(); ?>