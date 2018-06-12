<?php
/*
 * Template Name: PTS Resources Page Template - Order Title
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="audience-page-info-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-7">
					<div class="row no-gutters">
						<p class="audience-page-info-text">
							<?php the_field('info_text'); ?>
						</p>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="row no-gutters justify-content-center py-5">
				<div class="col-4">
					<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
				</div>
			</div>
		</div>	
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>