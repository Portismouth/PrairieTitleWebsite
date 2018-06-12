<?php
/*
 * Template Name: PTS Resources Page Template - Locations
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
			<div class="row no-gutters justify-content-center">
				<div class="map-container col-8">
					<div class="row no-gutters">
						<?php echo do_shortcode('[wpgmza id="1"]'); ?>
					</div>
					<div class="row no-gutters pt-4 pb-5">
						<div class="col">
							<div class="row no-gutters">
								<h4 class="corp-hq-title">CORPORATE HEADQUARTERS</h4>
							</div>
							<div class="row no-gutters">
								<p class="main-p">
									<?php the_field('corp_hq_address'); ?><br>
									<?php the_field('corp_hq_city') ?>, <?php the_field('corp_hq_state') ?> <?php the_field('corp_hq_zip') ?>
								</p>
							</div>
						</div>
					</div>
					<div class="row no-gutters pb-1">
						<h4 class="main-h4 branch-offices-heading">
							Branch Offices
						</h4>
					</div>
					<div class="row no-gutters">
					<?php if( have_rows('branch_office_group') ): 
						$counter = 1;	
					?>
						<?php while( have_rows('branch_office_group')): the_row(); ?>	
							<div class="col">
								<div class="row no-gutters">
									<h5 class="region-title">
										<?php echo the_sub_field('region'); ?>
									</h5>
								</div>
								<?php while( have_rows('branches')): the_row(); ?>
								<?php	
									$location_title = get_sub_field('location_title');
									$address_1 = get_sub_field('address_1');
									$address_2 = get_sub_field('address_2');
									$city = get_sub_field('city');
									$state = get_sub_field('state');
									$zip = get_sub_field('zip_code');
								?>
									<div class="row no-gutters">
										<div class="row no-gutters">
											<p class="main-p pb-3">
												<?php if($location_title) echo $location_title.'<br>'; ?>
												<?php echo $address_1; ?><br>
												<?php echo $address_2; ?><br>
												<?php echo $city . ", " . $state . " " . $zip ?>
											</p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php if($counter === 5): ?>
							<div class="w-100 py-2"></div>
						<?php endif; ?>
						<?php $counter += 1; ?>
						<?php endwhile; ?>
						<div class="col"></div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div><!-- underwriter-wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>