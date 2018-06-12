<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
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

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="homepage-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/main-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-one d-none d-lg-block">
					<img src="/wp-content/uploads/2018/06/Rectangles-Left.svg" alt="">
			</div>
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Rectangles-Right.svg" alt="">
			</div>
			<div class="info-rows-wrapper row no-gutters justify-content-center">
				<?php require( get_stylesheet_directory() . '/template-includes/info-rows.php' ); ?>
			</div><!-- info-rows-wrapper end -->
		</div><!-- End Main Content Wrapper -->
		<div class="underwriter-hero-wrapper">
			<?php require( get_stylesheet_directory() . '/template-includes/underwriter-hero.php' ); ?>
		</div><!-- underwriter-wrapper end -->
		<div class="recent-articles-wrapper">
			<div class="recent-articles-circle-square-left d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Circle-Square-Left.svg" alt="">
			</div>
			<div class="recent-articles-circle-square-right d-none d-lg-block">
				<img src="/wp-content/uploads/2018/05/Circle-Square-Right.svg" alt="">
			</div>
			<?php require( get_stylesheet_directory() . '/template-includes/recent-articles-4-posts.php' ); ?>
		</div><!-- Recent Articles end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
