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
				<div class="row">
					<h1>MODAL!</h1>
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
				<div class="col-7">
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
					<div class="row no-gutters py-4">
						<p class="audience-page-info-text">
							<?php the_field('info_text'); ?>
						</p>
						<a href="/homepage/for-attorneys/rate-card/">Click here for our rate cards</a>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div class="rate-estimator-wrapper my-5">
					<div class="col-10 col-lg-8 mx-auto">
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
							<div class="estimator-main row no-gutters justify-content-between">
								<div class="col-lg-6 pr-4">
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
											<p id="closingProLetter" class="estimator-other-fee-text">Closing Protection Letter</p>
										</div>
										<div class="col-2">
											<p id="b-closing-letter" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">IL State Policy Fee</p>
										</div>
										<div class="col-2">
											<p id="b-il-state-fee" class="rate-estimator-num--other">
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
											<p class="estimator-other-fee-text">Chain of Title Fee</p>
										</div>
										<div class="col-2">
											<p id="b-chain-fee" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Policy Update Fee</p>
										</div>
										<div class="col-2">
											<p id="b-pol-upd-fee" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Commitment Update Fee</p>
										</div>
										<div class="col-2">
											<p id="b-comm-upd-fee" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Recording Fees (estimated)</p>
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
								<div class="col-lg-6 pl-4">
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
											<p class="estimator-other-fee-text">Closing Protection Letter</p>
										</div>
										<div class="col-2">
											<p id="s-closing-letter" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">IL State Policy Fee</p>
										</div>
										<div class="col-2">
											<p id="s-il-state-fee" class="rate-estimator-num--other">
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
											<p class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Chain of Title Fee</p>
										</div>
										<div class="col-2">
											<p class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Policy Update Fee</p>
										</div>
										<div class="col-2">
											<p class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Commitment Update Fee</p>
										</div>
										<div class="col-2">
											<p id="s-comm-update-fee" class="rate-estimator-num--other">
												$0
											</p>
										</div>
									</div>
									<div class="row no-gutters">
										<div class="col-10">
											<p class="estimator-other-fee-text">Recording Fees (estimated)</p>
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
							<div class="estimator-contact-row row no-gutters justify-content-center">
								<div class="col-8">
									<div class="row no-gutters">
										<p class="estimator-contact-head font-weight-bold">
											Would you like to review this later? Email it to yourself or someone else.
										</p>
									</div>
									<div class="row no-gutters">
										<?php echo do_shortcode('[gravityform id="5" title="false" description="false"]'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end rate card wrapper -->
			</div>
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-7">
					<p class="disclaimer-text">
						This is a non-binding estimate of rates based on limited information and only as may apply to routine residential orders. Additional charges may be required for extra risk or additional processing of difficult or unusual transactions. Additional fees may include state and county transfer taxes and municipal transfer taxes if applicable.  Please call for more details.
					</p>
				</div>
			</div>
			<div class="row no-gutters justify-content-center mb-5">
				<div class="col-4">
					<div class="row no-gutters justify-content-center mb-3">
						<h4 class="main-h4">
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
				<div class="col-7">
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
<script type="text/javascript">
	jQuery(document).ready(function($){
		let charges = {
			'il-state-fee': 3,
			'buyers' : {
				'title-ins': 500,
				'closing-letter': 50,
				'email-fee': 40,
				'ovn-proc-fee': 25,
				'wire-fee': 40,
				'chain-fee': 125,
				'pol-upd-fee': 125,
				'rec-fee': 125
			},
			'sellers': {
				'closing-letter': 50,
				'comm-upd-fee': 125,
				'rec-fee': 125,
			}
		}
		let count = 0;
		$( '#estimator-value' ).keyup(function( event ) { 
			event.keyCode === 8 ? count-- : count++;
			let val = $('#estimator-value').val();
			let closingFee = 1275;
			if(parseInt(val) > 1000000) {
				//reset amounts if val exceeds 1000000
				$( '#b-closing-fee' ).text('$0').css('opacity', .5);
				$( '#b-title-ins' ).text('$0').css('opacity', .5);
				$( '#b-other-total' ).text('$0').css('opacity', .5);
				$( '#b-il-state-fee' ).text('$0').css('opacity', .5);
				$( '#b-closing-letter' ).text('$0').css('opacity', .5);
				$( '#b-email-fee' ).text('$0').css('opacity', .5);
				$( '#b-ovn-proc-fee' ).text('$0').css('opacity', .5);
				$( '#b-wire-fee' ).text('$0').css('opacity', .5);
				$( '#b-chain-fee' ).text('$0').css('opacity', .5);
				$( '#b-pol-upd-fee' ).text('$0').css('opacity', .5);
				$( '#b-rec-fee' ).text('$0').css('opacity', .5);
				$( '#b-total' ).text('$0').css('opacity', .5);
				$( '#s-title-ins' ).text('$0').css('opacity', .5);
				$( '#s-other-total' ).text('$0').css('opacity', .5);
				$( '#s-il-state-fee' ).text('$0').css('opacity', .5);
				$( '#s-closing-letter' ).text('$0').css('opacity', .5);
				$( '#s-comm-update-fee' ).text('$0').css('opacity', .5);
				$( '#s-rec-fee' ).text('$0').css('opacity', .5);
				$( '#s-total' ).text('$0').css('opacity', .5);
				alert('Nope');
			} else if(count >= 6) {
				//Grabs Buyer's closing fee
				if (parseInt(val) < 200001) { $( '#b-closing-fee' ).text('$' + closingFee) }
				if (parseInt(val) > 200000 && parseInt(val) < 250001 ) { closingFee = 1325 }
				if (parseInt(val) > 250001 && parseInt(val) < 300001 ) { closingFee = 1350 } 
				if (parseInt(val) > 300001 && parseInt(val) < 400001 ) { closingFee = 1375 } 
				if (parseInt(val) > 400001 ) {
					closingFee = 1375;
					for(let n = 400001; n < val; n+=50000) {
						closingFee += 50;
					}
				}
				//Calculates Buyer's Other fee total
				let bOtherSum = 0;
				$( '#b-other-total' ).text(function () {
					for(let amt in charges['buyers']) {
						if(amt == 'title-ins'){
							continue;
						} else {
							bOtherSum += charges['buyers'][amt];
						}
					}
					bOtherSum += parseInt(charges['il-state-fee']);
					return '$' + bOtherSum;
				}).css('opacity', 1);
				//Calculates Sellers Title Insurance
				let insRate = 1700;
				if (val > 200000){
					for(let n = 200000; n < val; n+= 10000) {
						if(n === 500000){
							insRate += 45;
						} else {
							insRate += 20;
						}
					}
				}
				let sOtherSum = 0;
				$( '#s-other-total' ).text(function () {
					for(let amt in charges['sellers']) {
						sOtherSum += charges['sellers'][amt];
					}
					sOtherSum += parseInt(charges['il-state-fee']);
					return '$' + sOtherSum;
				}).css('opacity', 1);
				//Individual buyer amounts
				$( '#b-closing-fee' ).text('$' + closingFee).css('opacity', 1);
				$( 'input#input_5_3' ).val('$' + closingFee);
				$( '#b-title-ins' ).text('$' + charges['buyers']['title-ins']).css('opacity', 1);
				$( '#b-closing-letter' ).text('$' + charges['buyers']['closing-letter']).css('opacity', 1);	
				$( '#b-il-state-fee' ).text('$' + charges['il-state-fee']).css('opacity', 1);
				$( '#b-email-fee' ).text('$' + charges['buyers']['email-fee']).css('opacity', 1);
				$( '#b-ovn-proc-fee' ).text('$' + charges['buyers']['ovn-proc-fee']).css('opacity', 1);
				$( '#b-wire-fee' ).text('$' + charges['buyers']['wire-fee']).css('opacity', 1);
				$( '#b-chain-fee' ).text('$' + charges['buyers']['chain-fee']).css('opacity', 1);
				$( '#b-pol-upd-fee' ).text('$' + charges['buyers']['pol-upd-fee']).css('opacity', 1);
				$( '#b-rec-fee' ).text('$' + charges['buyers']['rec-fee']).css('opacity', 1);	
				$( '#b-total' ).text('$' + (bOtherSum + closingFee + charges['buyers']['title-ins'])).css('opacity', 1);		//Individiual seller amounts
				$( '#s-title-ins' ).text('$' + insRate).css('opacity', 1);
				$( 'input#input_5_17' ).val('$' + insRate);
				$( '#s-other-total' ).text('$' + sOtherSum ).css('opacity', 1);
				$( '#s-il-state-fee' ).text('$' + charges['il-state-fee']).css('opacity', 1);
				$( '#s-closing-letter' ).text('$' + charges['sellers']['closing-letter']).css('opacity', 1);
				$( '#s-comm-update-fee' ).text('$' + charges['sellers']['comm-upd-fee']).css('opacity', 1);
				$( '#s-rec-fee' ).text('$' + charges['sellers']['rec-fee']).css('opacity', 1);
				$( '#s-total' ).text('$' + (insRate + sOtherSum)).css('opacity', 1);
			} else if(count < 6) {
				//reset amounts if field is cleared
				$( '#b-closing-fee' ).text('$0').css('opacity', .5);
				$( '#b-title-ins' ).text('$0').css('opacity', .5);
				$( '#b-other-total' ).text('$0').css('opacity', .5);
				$( '#b-il-state-fee' ).text('$0').css('opacity', .5);
				$( '#b-closing-letter' ).text('$0').css('opacity', .5);
				$( '#b-email-fee' ).text('$0').css('opacity', .5);
				$( '#b-ovn-proc-fee' ).text('$0').css('opacity', .5);
				$( '#b-wire-fee' ).text('$0').css('opacity', .5);
				$( '#b-chain-fee' ).text('$0').css('opacity', .5);
				$( '#b-pol-upd-fee' ).text('$0').css('opacity', .5);
				$( '#b-rec-fee' ).text('$0').css('opacity', .5);
				$( '#b-total' ).text('$0').css('opacity', .5);
				$( '#s-title-ins' ).text('$0').css('opacity', .5);
				$( '#s-other-total' ).text('$0').css('opacity', .5);
				$( '#s-il-state-fee' ).text('$0').css('opacity', .5);
				$( '#s-closing-letter' ).text('$0').css('opacity', .5);
				$( '#s-comm-update-fee' ).text('$0').css('opacity', .5);
				$( '#s-rec-fee' ).text('$0').css('opacity', .5);
				$( '#s-total' ).text('$0').css('opacity', .5);
			}
		});
		$( '#closingProLetter' ).popover({content: "Fee required by law to guaranty escrow funds are safe.", trigger: "hover", placement: 'left'});
	});
</script>
<?php get_footer(); ?>