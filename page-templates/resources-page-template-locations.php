<?php
/*
 * Template Name: PTS Resources Page Template - Locations
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row no-gutters justify-content-end">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="row no-gutters justify-content-center">
					<div class="col-9">
						<?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]'); ?>
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
				<div class="col-11 col-lg-7">
					<div class="audience-page-info-text row no-gutters">
						<?php the_field('info_text'); ?>
					</div>
					<div class="audience-page-info-text row no-gutters">
						<p class="text-bold m-0">For all inquiries or to schedule an appointment, please call 708-386-7900</p>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rect-one d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-left-1.svg" alt="">
			</div>
			<div class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-right.svg" alt="">
			</div>
			<div class="row no-gutters justify-content-center">
				<div class="map-container col-9 col-lg-8">
					<div class="d-none d-lg-flex row no-gutters">
						<?php echo do_shortcode('[wpgmza id="1"]'); ?>
					</div><!-- end map -->
					<div class="row no-gutters pt-lg-4 pb-5">
						<div class="col-12">
							<div class="row no-gutters">
								<h4 class="corp-hq-title">CORPORATE HEADQUARTERS</h4>
							</div>
							<a class="map-link" href="<?php echo the_field('google_maps_link'); ?>" target="_blank">
								<div class="row no-gutters">
									<p class="main-p">
										<?php the_field('corp_hq_address'); ?><br>
										<?php the_field('corp_hq_city') ?>, <?php the_field('corp_hq_state') ?> <?php the_field('corp_hq_zip') ?>
									</p>
								</div>
							</a>
							<a class="d-lg-none mobile-map-link" href="<?php echo the_field('google_maps_link'); ?>" target="_blank">
								Get Directions <i class="fas fa-chevron-right"></i>
							</a>
						</div>
					</div>
					<div class="row no-gutters pb-3">
						<h4 class="main-h4 branch-offices-heading">
							Branch Offices
						</h4>
					</div>
					<div class="row no-gutters">
						<?php if( have_rows('branch_office_group') ): 
							$counter = 1;	
						?>
							<?php while( have_rows('branch_office_group')): the_row(); ?>	
								<div class="col-md mb-3 mr-2">
									<div class="row no-gutters">
										<h5 class="region-title">
											<?php echo the_sub_field('region'); ?>
										</h5>
									</div>
									<?php 
										while( have_rows('branches')): the_row();
										$location_title = get_sub_field('location_title');
										$address_1 = get_sub_field('address_1');
										$address_2 = get_sub_field('address_2');
										$city = get_sub_field('city');
										$state = get_sub_field('state');
										$zip = get_sub_field('zip_code');
									?>
										<div class="row no-gutters mt-1 mb-3">
											<a class="map-link" href="<?php echo the_sub_field('google_maps_link'); ?>" target="_blank">
												<p class="main-p">
													<?php if($location_title) echo $location_title.'<br>'; ?>
													<?php echo $address_1; ?><br>
													<?php echo $address_2; ?><br>
													<?php echo $city . ", " . $state . " " . $zip ?>
												</p>
											</a>
										</div>
										<div class="row no-gutters mt-1">	
											<a class="d-lg-none mobile-map-link" href="<?php echo the_sub_field('google_maps_link'); ?>" target="_blank">
												Get Directions <i class="fas fa-chevron-right"></i>
											</a>
										</div>
									<?php endwhile; ?>
								</div>
								<?php if($counter === 5): ?>
									<div class="w-100 py-2 d-none d-lg-block"></div>
								<?php endif; ?>
								<?php if($counter % 3 === 0): ?>
									<div class="w-100 py-2 d-none d-md-block d-lg-none"></div>
								<?php endif; ?>
							<?php
								$counter += 1; 
								endwhile; 
							?>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row no-gutters justify-content-center pb-5">
				<div class="col-9 col-lg-4">
					<div class="row no-gutters justify-content-center mb-3">
						<h4 class="main-h4 text-center">
							Want to send us a message? 
						</h4>
					</div>
					<div class="row no-gutters justify-content-center mb-3">
						<button id="location-page" class="btn btn-primary main-btn" data-toggle="modal" data-target="#contactModal">
							contact us <i class="fas fa-chevron-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div><!-- main content wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>