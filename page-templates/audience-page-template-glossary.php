<?php
/**
 * Template Name: PTS Audience Page Template - Glossary
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
$post_args = array(
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
$loop = new WP_Query($post_args);
$parents = array_reverse(get_post_ancestors( $post ));
$tags = get_tags(array('hide_empty' => false));
?>
<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="audience-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right-2.svg" alt="">
			</div>
			<div class="article-container row no-gutters justify-content-center py-5">
				<div class="col-11 col-lg-5">
					<div class="row no-gutters">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							<?php foreach($parents as $key => $val) : ?>
								<li class="breadcrumb-item">
									<a href="<?php echo get_permalink($val); ?>"><?php echo get_the_title($val)?></a>
								</li>
							<?php endforeach ?>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="<?php echo get_page_link()?>"><?php echo get_the_title(''); ?></a>
								</li>
							</ol>
						</nav>
					</div><!-- end breadcrumbs -->
					<div class="glossary-info mt-5">
						<div class="row no-gutters">
							<h1 class="article-h1">
								A Word About Title Language
							</h1>
						</div>
						<div class="article-content row no-gutters mt-3">
							<p>
								The title industry has its own language. Many of its words and idioms are derived from the language of the law while others are common words given special meaning related to land titles. There are also words and phrases coined over the years by the title industry itself.
							</p>
						</div>
					</div>
					<div class="glossary-filter row mb-3">
						<?php foreach($tags as $tag): ?>
							<?php if(strlen($tag->slug) < 2): ?>
								<div class="col-2 col-sm-1">
									<a class="glossary-filter-link" href="/homepage/for-consumers/glossary/?letter=<?php echo $tag->slug; ?>">
										<h1 class="glossary-letter">
											<?php echo $tag->name ?>
										</h1>
									</a>
								</div>
							<?php endif; ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>	
			<div class="article-container row no-gutters justify-content-center pb-5">
				<div class="col-11 col-lg-5">
					<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$tag = isset($_GET['letter']) ? $_GET['letter'] : '';
						$args = array(
							'post_type'      => 'glossary',
							'paged'          => $paged,
							'orderby'        => 'title',
							'order'          => 'ASC',
							'posts_per_page' => 14,
							'tag'            => $tag
						);
						$terms = new WP_Query($args);
						$tag_count = 1;
					?>
					<?php if ( $terms->have_posts() ) : ?> 
						<?php while ( $terms->have_posts() ) : $terms->the_post(); ?>
							<div class="row no-gutters mb-4">
								<div class="col">
									<?php 
										$taggy_tag = get_the_tags();
										if( $tag_count === 1 || $current_tag !== $taggy_tag[0]->name): 
									?>
										<div class="glossary-index row no-gutters my-3">
											<h1>
												<?php echo $taggy_tag[0]->name; ?>
											</h1>
										</div>	
									<?php 
										$current_tag = $taggy_tag[0]->name;
										$tag_count++;
										endif; 
									?>
									<div class="glossary-entry-h1 row no-gutters">
										<h1 class="glossary-entry-h1">
											<?php the_title(); ?>
										</h1>
									</div>
									<div class="glossary-entry-p row no-gutters">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="row no-gutters justify-content-center mb-5 mt-lg-5">
				<div class="col-11 col-lg-4">
					<nav class="pagination justify-content-between">
						<?php
							$big = 999999999; // need an unlikely integer
							$prev = "<i class='fas fa-chevron-left'></i>";
							$next = "<i class='fas fa-chevron-right'></i>";
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $terms->max_num_pages,
								'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>',
								'prev_text' => $prev,
								'next_text' => $next	
							) );
						?>
					</nav>
				</div>
			</div>
			<!-- First page - 5 results, 14 results following -->
			<div class="recent-articles-wrapper row no-gutters">
				<div class="recent-articles-circle-square-left d-none d-lg-block">	
					<img src="/wp-content/uploads/2018/06/Circle-Square-Left-Full.svg" alt="">
				</div>
				<div class="recent-articles-circle-square-right d-none d-lg-block">
					<img src="/wp-content/uploads/2018/06/Circle-Square-Right-Full.svg" alt="">
				</div>
				<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
			</div><!-- Recent Articles end -->
		</div><!-- main content wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>