<?php
/*
 * Template Name: PTS Resources Page Template - Order Title
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">			
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row no-gutters justify-content-end">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="row no-gutters justify-content-center pb-4">
					<div class="col-9">
						<div class="row no-gutters justify-content-center">
							<h2 class="alliance-h2 text-center">Oops...</h2>
						</div>
						<div class="row no-gutters">
							<p class="main-p">Looks like there is something wrong with your submission. Please try again.</p>
						</div>
						<div class="row no-gutters justify-content-center mt-3">
							<button class="btn btn-primary main-btn w-50" type="button" data-dismiss="modal" aria-label="Close">
								Close
							</button>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="resource-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<div class="audience-page-info-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-11 col-lg-6">
					<div class="audience-page-info-text row no-gutters">
						<?php the_field('info_text'); ?>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="row no-gutters justify-content-center py-5">
				<div class="col-11 col-lg-4">
					<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
				</div>
			</div>
		</div>	
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<script type="text/javascript" src="/wp-content/themes/understrap-child-master/js/ajax-form-handler.js"></script>

<?php get_footer(); ?>