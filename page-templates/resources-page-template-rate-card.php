<?php
/**
 * Template Name: PTS Resources Page Template - Rate Card
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
							<?php foreach($parents as $key => $val) : ?>
								<li class="breadcrumb-item">
									<a href="<?php echo get_permalink($val); ?>"><?php echo get_the_title($val)?></a>
								</li>
							<?php endforeach ?>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="<?php echo get_page_link()?>"><?php echo wp_title(''); ?></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="row no-gutters justify-content-center py-4">
						<h2 class="main-h2 audience-page-info-headline">
							<?php the_field('info_headline'); ?>
						</h2>
					</div>
					<div class="audience-page-info-text pb-3 row no-gutters">
						<?php the_field('info_text'); ?>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div id="rate-card-rect-left" class="rect-one d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Left-1.svg">
			</div>
			<div id="rate-card-rect-right" class="rect-two d-none d-lg-block">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right-1.svg">
			</div>
			<div class="rate-card-wrapper">
				<div class="row no-gutters justify-content-center">
					<div class="col-11 col-md-9 col-lg-8"><!-- start main-content -->
						<div class="row no-gutters justify-content-between"><!-- start main table row -->
							<div class="col-lg-6 pr-lg-4"><!-- left col start -->
								<div class="row no-gutters mt-4"><!-- interactive table start -->
									<div class="col-10 col-lg-7">
										<h5 class="rate-card-table-title">AMOUNT OF INSURANCE</h5>
									</div>
									<div class="col-2 col-lg-5">
										<h6 class="ins-rate-col-title text-right text-lg-left">Rate</h6>
									</div>
									<div class="col-1 text-right d-none d-lg-block"></div>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10 col-lg-7">
										<p class="main-p--rate-card">$200,000 or less</p>
									</div>
									<div class="col-2 col-lg-4">
										<p class="main-p--rate-card text-right text-lg-left">$1,700</p>
									</div>
									<div class="col-1 text-right d-none d-lg-block"></div>
								</div>
								<!-- Start dynamically generating expandable rate table -->
								<?php //main variables 
									$collapse_id = 1; //for bootstrap collapse target
									$base_rate = 1720; //for subtier rows
									$rate_interval = 20;
								?>
								<?php foreach (range(200000, 900000, 100000) as $main_tier) : ?>
								<div data-toggle="collapse" data-target="#collapse<?php echo $collapse_id; ?>" class="main-rate-card-row row no-gutters">
									<div class="col-7">
										<p class="main-p--rate-card">
											<?php echo "$".number_format(($main_tier + 1))." to $".number_format(($main_tier + 100000)) ;?>
										</p>
									</div>
									<div class="col-4">
										<p class="main-p--rate-card text-right text-lg-left">
											<?php echo "$".number_format(($base_rate))." to $".number_format(($base_rate + ($rate_interval * 9))) ;?>
										</p>
									</div>
									<div class="col-1 text-right">
										<i class="fas fa-chevron-down rotate"></i>
									</div>
								</div>
								<div id="collapse<?php echo $collapse_id; ?>" class="collapse row no-gutters justify-content-center">
									<div class="col-11">
										<?php 
											$end_range = $main_tier + 90000;
											$first_sub_row = true; 
										?>
										<?php foreach (range($main_tier, $end_range, 10000) as $sub_tier) : ?>
											<?php if($first_sub_row): ?>
												<div class="sub-rate-card-row-first row no-gutters">
													<div class="col-7" style="text-indent:15px">
														<p class="main-p--rate-card sub-rate-card-p">
															<?php echo "$".number_format(($sub_tier + 1))." to $".number_format(($sub_tier + 10000)) ;?>
														</p>
													</div>
													<div class="col-5 text-right text-lg-left">
														<p class="main-p--rate-card sub-rate-card-p">
															<?php echo '$'.number_format($base_rate) ?>
														</p>
													</div>
												</div>
											<?php else: ?>
												<div class="sub-rate-card-row row no-gutters">
													<div class="col-7" style="text-indent:15px">
														<p class="main-p--rate-card sub-rate-card-p">
															<?php echo "$".number_format(($sub_tier + 1))." to $".number_format(($sub_tier + 10000)) ;?>
														</p>
													</div>
													<div class="col-5 text-right text-lg-left">
														<p class="main-p--rate-card sub-rate-card-p">
															<?php echo '$'.number_format($base_rate) ?>
														</p>
													</div>
												</div>
											<?php endif; ?>
										<?php 
											$base_rate += 20;
											$first_sub_row = false; 
											endforeach;
										?>
									</div>
								</div>
								<?php
									if($main_tier === 400000) {
										$base_rate += 25;
									} 
									$collapse_id++; 
								?>
								<?php endforeach; ?>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-7">
										<p class="main-p--rate-card">$1,000,000 or more</p>
									</div>
									<div class="col-5 text-right text-lg-left">
										<a href="#" data-toggle="modal" data-target="#contactModal">Contact Us</a>
									</div>
								</div><!-- interactive table end -->
								<div class="row no-gutters mt-5"><!-- additional fees table start -->
									<h5 class="rate-card-table-title">ADDITIONAL FEES</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Loan Policy
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$500
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Location Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Condominium Endorsement 6
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											ARML Endorsement 1
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Revolving Credit Mortgage Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											EPA Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											PUD Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div><!-- additional fees table end -->
							</div><!-- first col end -->
							<div class="col-lg-6 mt-5 mt-lg-0 pl-lg-4"><!-- second col begin -->
								<div class="row no-gutters mt-lg-4"><!-- closing fees start -->
									<h5 class="rate-card-table-title">RESIDENTIAL CLOSING FEES</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											$200,000 or less
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$1275
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											$200,001 to $250,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$1325
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											$250,001 to $300,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$1350
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											$300,001 to $400,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$1375
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											$400,001 to $500,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$1400
										</p>
									</div>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p--rate-card">
										For insurance amounts over $500,000 please add $50 for each $50,000 increment.
									</p>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p--rate-card">
										For closing services on multiple loans, there will be an additional fee of $225 per lender closing statement.
									</p>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p--rate-card">
										For closings conducted outside of the normal workday, there will be an additional minimum fee of $150.
									</p>
								</div><!-- closing fees end -->
								<div class="row no-gutters mt-5"><!-- deed and money start -->
									<h5 class="rate-card-table-title">DEED AND MONEY ESCROWS</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<p class="main-p--rate-card">
										Please contact <a href="mailto:closings@prairietitle.com">closings@prairietitle.com</a>
									</p>
								</div><!-- deed and money end -->
								<div class="row no-gutters mt-5"><!-- Title indemnities start -->
									<h5 class="rate-card-table-title">Title Indemnities</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div><!-- Title indemnities end -->
								<div class="row no-gutters mt-5"><!-- Other fees start -->
									<h5 class="rate-card-table-title">Other Fees</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Anti-Predatory Lending Certificate
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Chain of Title Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Dry Closing Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Tax Payment Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Email Delivery Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Overnight Delivery Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Wire Transfer Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$175
										</p>
									</div>
								</div><!-- Other fees end -->
								<div class="row no-gutters mt-5"><!-- JOE start -->
									<h5 class="rate-card-table-title">Joint Order Escrows</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-7">
										<p class="main-p--rate-card">
											Contact Us
										</p>
									</div>
									<div class="col-5 text-right">
										<p class="main-p--rate-card">
											$300 minimum
										</p>
									</div>
								</div><!-- JOE end -->
								<div class="row no-gutters mt-5"><!-- chicago water start -->
									<h5 class="rate-card-table-title">City of Chicago Water Certification</h5>
								</div>
								<div class="row no-gutters">
									<p class="res">(Residential)</p>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$75
										</p>
									</div>
								</div><!-- chicago water end -->
								<div class="row no-gutters mt-5"><!-- zoning start -->
									<h5 class="rate-card-table-title">Zoning Certification</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$75
										</p>
									</div>
								</div><!-- zoning end -->
								<div class="row no-gutters mt-5"><!-- zoning start -->
									<h5 class="rate-card-table-title">Order Survey</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p--rate-card">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p--rate-card">
											$75
										</p>
									</div>
								</div><!-- zoning end -->
							</div><!-- end second col of rate table -->
						</div><!-- end main table row -->
						<div class="row no-gutters justify-content-center"><!-- start next row -->
							<div class="col-12 col-lg-8">
								<div class="row no-gutters justify-content-center mt-5">
									<a href="/wp-content/uploads/2018/06/Rate-Card.pdf" target="_blank">View Residential Title Insurance Rates as PDF</a>	
									<p class="rate-card-fine-print mt-3">
										Rates and charges set forth herein apply to routine residential orders. Additional charges may be made for extra risk or additional processing for difficult or unusual transactions.
									</p>
								</div>
								<div class="row no-gutters justify-content-center mt-5"><!-- residential refi start -->
									<div class="col-12">
										<h3 class="refinance-header text-center">
											Residential Refinance Rates
										</h3>
										<p class="main-p--rate-card">
											The following rates for title insurance apply to residential refinance transactions only. Rates are subject to change. Please <a href="#" data-toggle="modal" data-target="#contactModal">contact</a> our main office for additional inquiries regarding pricing or questions about your refinance transaction.  
										</p>
										<div class="rate-card-table-head row no-gutters mt-4">
										<div class="col-10">
											<p class="main-p--rate-card">
												Title Insurance (Loan Policy)
											</p>
										</div>
										<div class="col-2 text-right">
											<p class="main-p--rate-card">
												$350*
											</p>
										</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p--rate-card">
													Closing Fee
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p--rate-card">
													$350*
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p--rate-card">
													Closing Protection Letter
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p--rate-card">
													$75
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p--rate-card">
													Illinois Mandated State Policy Fee
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p--rate-card">
													$3
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p--rate-card">
													Estimated Recording Costs
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p--rate-card">
													$125
												</p>
											</div>
										</div>
										<div class="row no-gutters">
											<p class="flat-rate w-100">*flat rate up to $600,000</p>
										</div>
									</div>
								</div><!-- residential refi end -->
								<div class="row no-gutters justify-content-center mt-5 w-100">
									<a class="text-center" href="/wp-content/uploads/2018/06/Refinace-Rate-Card.pdf" target="_blank">View Residential Refinance Title Insurance Rates as PDF</a>	
								</div>
								<div class="row no-gutters justify-content-center mt-5"><!-- new construction start -->
									<h3 class="refinance-header text-center">
										New Construction/<span class="mobile-break">Construction Escrows</span>	
									</h3>
									<p class="main-p--rate-card mt-3">
										Prairie Title provides services in connection with new construction, including mechanic’s and materialman’s lien waiver examinations, interim certification and construction loan escrow. Rates will be quoted upon request.  
									</p>
									<p class="main-p--rate-card font-weight-bold mt-3 w-100">Escrow maintenance fee</p>
									<p class="main-p--rate-card mt-1">
										For escrows held open for more than 12 months, there will be an escrow maintenance fee of $200 per year. An hourly fee will be charged for 
										escrow inquiries.
									</p>
								</div><!-- new construction end -->
								<div class="row no-gutters justify-content-center mt-5"><!-- new construction start -->
									<h4 class="main-h4 w-100 text-center">Questions?</h4>
									<button class="btn btn-primary main-btn mt-3" data-toggle="modal" data-target="#contactModal">Contact Us <i class="fas fa-chevron-right"></i></button>
								</div><!-- new construction end -->
							</div>
						</div><!-- end next row -->
					</div><!-- end main-content -->
				</div><!-- end main content row -->
			</div><!-- end rate card wrapper -->
		</div>
	</div><!-- Container end -->
</div><!-- Wrapper end -->
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(".main-rate-card-row").click(function(){
			$(this).find(".rotate").toggleClass("down"); 
		});
	});
</script>
<?php get_footer(); ?>