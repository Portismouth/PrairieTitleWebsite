<?php
/**
 * Template Name: PTS Resources Page Template - Rate Card
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>

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
					<div class="row no-gutters">
						<p class="audience-page-info-text pt-4">
							<?php the_field('info_text'); ?>
						</p>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="main-content-wrapper">
			<div id="rate-card-rect-left" class="rect-one">
				<img src="/wp-content/uploads/2018/06/Rectangles-Left-1.svg">
			</div>
			<div id="rate-card-rect-right" class="rect-two">
				<img src="/wp-content/uploads/2018/06/Rectangles-Right-1.svg">
			</div>
			<div class="rate-card-wrapper">
				<div class="row no-gutters justify-content-center">
					<div class="col-11 col-lg-8"><!-- start main-content -->
						<div class="row no-gutters justify-content-between"><!-- start main table row -->
							<div class="col-lg-6"><!-- left col start -->
								<div class="row no-gutters mt-4"><!-- interactive table start -->
									<div class="col-7">
										<h5 class="rate-card-table-title">AMOUNT OF INSURANCE</h5>
									</div>
									<div class="col-5">
										<h6 class="ins-rate-col-title">Rate</h6>
									</div>
									<div class="col-1 text-right"></div>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-7">
										<p class="main-p">$200,000 or less</p>
									</div>
									<div class="col-4">
										<p class="main-p">$1,700</p>
									</div>
									<div class="col-1 text-right"></div>
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
										<p class="main-p">
											<?php echo "$".number_format(($main_tier + 1))." to $".number_format(($main_tier + 100000)) ;?>
										</p>
									</div>
									<div class="col-4">
										<p class="main-p">
											<?php echo "$".number_format(($base_rate))." to $".number_format(($base_rate + ($rate_interval * 9))) ;?>
										</p>
									</div>
									<div class="col-1 text-right">
										<i class="fas fa-chevron-down rotate"></i>
									</div>
								</div>
								<div id="collapse<?php echo $collapse_id; ?>" class="collapse row no-gutters justify-content-center">
									<div class="col-12">
										<?php $end_range = $main_tier + 90000; ?>
										<?php foreach (range($main_tier, $end_range, 10000) as $sub_tier) : ?>
											<div class="sub-rate-card-row row no-gutters">
												<div class="col-7" style="text-indent:15px">
													<p class="main-p sub-rate-card-p">
														<?php echo "$".number_format(($sub_tier + 1))." to $".number_format(($sub_tier + 10000)) ;?>
													</p>
												</div>
												<div class="col-5">
													<p class="main-p sub-rate-card-p">
														<?php echo '$'.number_format($base_rate) ?>
													</p>
												</div>
											</div>
										<?php $base_rate += 20; ?>
										<?php endforeach; ?>
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
										<p class="main-p">$1,000,000 or more</p>
									</div>
									<div class="col-4">
										<a href="#">Contact Us</a>
									</div>
									<div class="col-1 text-right"></div>
								</div><!-- interactive table end -->
								<div class="row no-gutters mt-4"><!-- additional fees table start -->
									<h5 class="rate-card-table-title">ADDITIONAL FEES</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Loan Policy
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$500
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Location Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Condominium Endorsement 6
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											ARML Endorsement 1
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Revolving Credit Mortgage Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											EPA Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											PUD Endorsement
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div><!-- additional fees table end -->
							</div><!-- first col end -->
							<div class="col-lg-5"><!-- second col begin -->
								<div class="row no-gutters mt-4"><!-- closing fees start -->
									<h5 class="rate-card-table-title">RESIDENTIAL CLOSING FEES</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p">
											$200,000 or less
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$1275
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											$200,001 to $250,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$1325
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											$250,001 to $300,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$1350
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											$300,001 to $400,000
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$1375
										</p>
									</div>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p">
										For insurance amounts over $500,000 please add $50 for each $50,000 increment.
									</p>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p">
										For closing services on multiple loans, there will be an additional fee of $225 per lender closing statement.
									</p>
								</div>
								<div class="row no-gutters pt-3">
									<p class="main-p">
										For closings conducted outside of the normal workday, there will be an additional minimum fee of $150.
									</p>
								</div><!-- closing fees end -->
								<div class="row no-gutters mt-4"><!-- deed and money start -->
									<h5 class="rate-card-table-title">DEED AND MONEY ESCROWS</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<p class="main-p">
										Please contact closings@prairietitle.com
									</p>
								</div><!-- deed and money end -->
								<div class="row no-gutters mt-4"><!-- Title indemnities start -->
									<h5 class="rate-card-table-title">Title Indemnities</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div><!-- Title indemnities end -->
								<div class="row no-gutters mt-4"><!-- Other fees start -->
									<h5 class="rate-card-table-title">Other Fees</h5>
								</div>
								<div class="rate-card-table-head row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Anti-Predatory Lending Certificate
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Chain of Title Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Dry Closing Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Tax Payment Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Email Delivery Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Overnight Delivery Service Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div>
								<div class="main-rate-card-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Wire Transfer Fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$175
										</p>
									</div>
								</div><!-- Other fees end -->
								<div class="row no-gutters mt-4"><!-- JOE start -->
									<h5 class="rate-card-table-title">Joint Order Escrows</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-7">
										<p class="main-p">
											Contact Us
										</p>
									</div>
									<div class="col-5 text-right">
										<p class="main-p">
											$300 minimum
										</p>
									</div>
								</div><!-- JOE end -->
								<div class="row no-gutters mt-4"><!-- chicago water start -->
									<h5 class="rate-card-table-title">City of Chicago Water Certification</h5>
								</div>
								<div class="row no-gutters">
									<p class="res">(Residential)</p>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$75
										</p>
									</div>
								</div><!-- chicago water end -->
								<div class="row no-gutters mt-4"><!-- zoning start -->
									<h5 class="rate-card-table-title">Zoning Certification</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$75
										</p>
									</div>
								</div><!-- zoning end -->
								<div class="row no-gutters mt-4"><!-- zoning start -->
									<h5 class="rate-card-table-title">Order Survey</h5>
								</div>
								<div class="rate-card-single-row row no-gutters">
									<div class="col-10">
										<p class="main-p">
											Processing fee
										</p>
									</div>
									<div class="col-2 text-right">
										<p class="main-p">
											$75
										</p>
									</div>
								</div><!-- zoning end -->
							</div><!-- end second col of rate table -->
						</div><!-- end main table row -->
						<div class="row no-gutters justify-content-center"><!-- start next row -->
							<div class="col-11 col-lg-8">
								<div class="row no-gutters justify-content-center mt-5">
									<a href="/wp-content/uploads/2018/05/12191743_10101903623739858_1122812145839677453_n.jpg" download>View Residential Title Insurance Rates as PDF</a>	
									<p class="rate-card-fine-print mt-3">
										Rates and charges set forth herein apply to routine residential orders. Additional charges may be made for extra risk or additional processing for difficult or unusual transactions.
									</p>
								</div>
								<div class="row no-gutters justify-content-center mt-5"><!-- residential refi start -->
									<div class="col-12">
										<h3 class="refinance-header text-center">Residential Refinance Rates</h3>
										<p class="main-p">
											The following rates for title insurance apply to residential refinance transactions only. Rates are subject to change. Please contact our main office for additional inquiries regarding pricing or questions about your refinance transaction.  
										</p>
										<div class="rate-card-table-head row no-gutters">
										<div class="col-10">
											<p class="main-p">
												Title Insurance (Loan Policy)
											</p>
										</div>
										<div class="col-2 text-right">
											<p class="main-p">
												$350
											</p>
										</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p">
													Closing Fee
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p">
													$350
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p">
													Closing Protection Letter
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p">
													$75
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p">
													Illinois Mandated State Policy Fee
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p">
													$3
												</p>
											</div>
										</div>
										<div class="main-rate-card-row row no-gutters">
											<div class="col-10">
												<p class="main-p">
													Estimated Recording Costs
												</p>
											</div>
											<div class="col-2 text-right">
												<p class="main-p">
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
									<a href="/wp-content/uploads/2018/05/12191743_10101903623739858_1122812145839677453_n.jpg" download>View Residential Refinance Title Insurance Rates as PDF</a>	
								</div>
								<div class="row no-gutters justify-content-center mt-5"><!-- new construction start -->
									<h3 class="refinance-header text-center">New Construction/Construction Escrows</h3>
									<p class="main-p mt-3">
										Prairie Title provides services in connection with new construction, including mechanic’s and materialman’s lien waiver examinations, interim certification and construction loan escrow. Rates will be quoted upon request.  
									</p>
									<p class="main-p font-weight-bold mt-3 w-100">Escrow maintenance fee</p>
									<p class="main-p mt-1">
										For escrows held open for more than 12 months, there will be an escrow maintenance fee of $200 per year. An hourly fee will be charged for 
										escrow inquiries.
									</p>
								</div><!-- new construction end -->
								<div class="row no-gutters justify-content-center mt-5"><!-- new construction start -->
									<h4 class="main-h4 w-100 text-center">Questions?</h4>
									<button class="btn btn-primary main-btn mt-3">Contact Us <i class="fas fa-chevron-right"></i></button>
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