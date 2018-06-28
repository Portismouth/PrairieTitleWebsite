<?php
/**
 * Template Name: PTS Resources Page Template - Rate Estimator
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
<div class="modal fade" id="millionModal" tabindex="-1" role="dialog" aria-labelledby="millionModal" aria-hidden="true">
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
						<?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
		<div class="audience-hero-wrapper row no-gutters">
			<?php require_once( get_stylesheet_directory() . '/template-includes/page-hero.php' ); ?>
		</div><!-- End Hero Wrapper -->
		<?php $parents = array_reverse(get_post_ancestors( $post )); ?>
		<div class="audience-page-info-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-11 col-lg-7">
					<div class="row no-gutters">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/">Home</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/homepage/for-lenders">For Lenders</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/homepage/for-consumers">For Consumers</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="<?php echo get_page_link()?>"><?php echo wp_title(''); ?></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="audience-page-info-text row no-gutters py-4">
						<?php the_field('info_text'); ?>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rate-estimator-wrapper my-5">
				<div class="row no-gutters">
					<div class="col-11 col-lg-8 mx-auto">
						<div class="rate-estimator" style="min-height: 827px">
							<div class="estimator-input-row row no-gutters justify-content-center">
								<div class="col-lg-6">
									<div class="row no-gutters justify-content-center">
										<h4 class="estimator-col-header">enter property value</h4>
									</div>
									<div class="row no-gutters justify-content-center">
										<input type="number" name="estimator-value" id="estimator-value">
									</div>
								</div>
							</div>
							<div class="estimator-main row no-gutters justify-content-center">
								<div class="col-10">
									<div class="row no-gutters">
										<div class="col-lg-6 pr-lg-4">
											<div class="row no-gutters">
												<h4 class="estimator-col-header">Buyer's Charges</h4>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Title Insurance:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="b-title-ins" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Closing Fee:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="b-closing-fee" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Other Estimate fees:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="b-other-total" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="parent col-10">
													<p id="closingProLetterLeft" class="estimator-other-fee-text">Closing Protection Letter</p>
												</div>
												<div class="col-2">
													<p id="b-closing-letter" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="ilStatePolFeeLeft" class="estimator-other-fee-text">IL State Policy Fee</p>
												</div>
												<div class="col-2">
													<p id="b-il-state-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">IL Anti-Predatory Lending Cert</p>
												</div>
												<div class="col-2">
													<p id="b-ap-lender-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Email Fee</p>
												</div>
												<div class="col-2">
													<p id="b-email-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Overnight Processing Fee</p>
												</div>
												<div class="col-2">
													<p id="b-ovn-proc-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Wire Fee</p>
												</div>
												<div class="col-2">
													<p id="b-wire-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="chainTitleFeeLeft" class="estimator-other-fee-text">Chain of Title Fee</p>
												</div>
												<div class="col-2">
													<p id="b-chain-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="policyUpdateFeeLeft" class="estimator-other-fee-text">Policy Update Fee</p>
												</div>
												<div class="col-2">
													<p id="b-pol-upd-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="commitUpdateFeeLeft" class="estimator-other-fee-text">Commitment Update Fee</p>
												</div>
												<div class="col-2">
													<p id="b-comm-upd-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="recordingFeeBuyer" class="estimator-other-fee-text">Recording Fees (estimated)</p>
												</div>
												<div class="col-2">
													<p id="b-rec-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="estimator-total-row row no-gutters mt-2 pt-2">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Estimate Total:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="b-total"class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
										</div>
										<div class="col-lg-6 pl-lg-4">
											<div class="row no-gutters">
												<h4 class="estimator-col-header">Seller's Charges</h4>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Title Insurance:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="s-title-ins" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Closing Fee:
													</p>
												</div>
												<div class="col-2 text-right">
													<p class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Other Estimate fees:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="s-other-total" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="closingProLetterRight" class="estimator-other-fee-text">Closing Protection Letter</p>
												</div>
												<div class="col-2">
													<p id="s-closing-letter" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="ilStatePolFeeRight" class="estimator-other-fee-text">IL State Policy Fee</p>
												</div>
												<div class="col-2">
													<p id="s-il-state-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">IL Anti-Predatory Lending Cert</p>
												</div>
												<div class="col-2">
													<p id="s-ap-lender-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Email Fee</p>
												</div>
												<div class="col-2">
													<p class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Overnight Processing Fee</p>
												</div>
												<div class="col-2">
													<p class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p class="estimator-other-fee-text">Wire Fee</p>
												</div>
												<div class="col-2">
													<p id="s-wire-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="chainTitleFeeRight" class="estimator-other-fee-text">Chain of Title Fee</p>
												</div>
												<div class="col-2">
													<p class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="policyUpdateFeeRight" class="estimator-other-fee-text">Policy Update Fee</p>
												</div>
												<div class="col-2">
													<p class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="commitUpdateFeeRight" class="estimator-other-fee-text">Commitment Update Fee</p>
												</div>
												<div class="col-2">
													<p id="s-comm-update-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-10">
													<p id="recordingFeeSeller" class="estimator-other-fee-text">Recording Fees (estimated)</p>
												</div>
												<div class="col-2">
													<p id="s-rec-fee" class="rate-estimator-num--other">
														$0
													</p>
												</div>
											</div>
											<div class="estimator-total-row row no-gutters mt-2 pt-2">
												<div class="col-10">
													<p class="main-p font-weight-bold">
														Estimate Total:
													</p>
												</div>
												<div class="col-2 text-right">
													<p id="s-total" class="rate-estimator-num">
														$0
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="estimator-contact-row row no-gutters justify-content-center">
								<div class="col-10 col-lg-9 col-xl-8">
									<div class="row no-gutters justify-content-lg-center">
										<p class="estimator-contact-head text-center font-weight-bold">
											Would you like to review this later? Email it to yourself or someone else.
										</p>
									</div>
									<div class="row no-gutters justify-content-lg-center">
										<?php echo do_shortcode('[gravityform id="5" title="false" description="false"]'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end rate card wrapper -->
			</div>
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-11 col-lg-7">
					<p class="disclaimer-text">
						This is a non-binding estimate of rates based on limited information and only as may apply to routine residential orders. Additional charges may be required for extra risk or additional processing of difficult or unusual transactions. Additional fees may include state and county transfer taxes and municipal transfer taxes if applicable.  Please call for more details.
					</p>
				</div>
			</div>
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-9 col-lg-4">
					<div class="row no-gutters justify-content-center mb-3">
						<h4 class="main-h4 text-center">
							Questions? Ready to move forward? 
						</h4>
					</div>
					<div class="row no-gutters justify-content-center mb-3">
						<button id="" class="btn btn-primary main-btn" data-toggle="modal" data-target="#contactModal">
							contact us <i class="fas fa-chevron-right"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-11 col-lg-7">
					<div class="row no-gutters justify-content-center">
						<h4 class="main-h4 text-center">
							Please call us at 708-386-7900 for a rate estimate on a commercial or new construction property. 
						</h4>
					</div>
				</div>
			</div>
		</div><!-- end main content wrapper -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->
<script type="text/javascript" src="/wp-content/themes/understrap-child-master/js/ajax-form-handler.js"></script>
<script type="text/javascript" src="/wp-content/themes/understrap-child-master/js/rate-estimator-popover.js"></script>
<script type="text/javascript" src="/wp-content/themes/understrap-child-master/js/rate-estimator.js"></script>

<?php get_footer(); ?>