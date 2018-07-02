<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="footer">
		<div class="row no-gutters justify-content-center">
			<div class="col-11 col-lg-10">
				<div class="row">
					<div class="col-12 col-md-4 col-lg-2">
						<div class="row no-gutters justify-content-center justify-content-md-start">
							<a href="/">
								<img src="/wp-content/uploads/2018/05/006937.svg" alt="">
							</a>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg">
						<div class="row mt-3 mt-md-0">
							<div class="col-12 col-lg p-lg-0">
								<div class="row no-gutters justify-content-center justify-content-md-start">
									<a class="map-link" href="https://goo.gl/maps/zKp2pL4T3EB2" target="_blank">
										<h5 class="footer-address text-center text-md-left">
											6821 North Avenue<br>
											Oak Park, IL 60302
										</h5>
									</a>
								</div>
							</div>
							<div class="col-12 pt-2 pt-md-4 col-lg p-lg-0">
								<div class="row no-gutters justify-content-center justify-content-md-start">
									<div class="col-12">
										<div class="row no-gutters justify-content-center justify-content-md-start">
											<h5 class="footer-fax">
												Closing Dept Fax: 708-386-9334
											</h5>
										</div>
									</div>
									<div class="col-12">
										<div class="row no-gutters justify-content-center justify-content-md-start">
											<h5 class="footer-fax">
												Title Dept Fax: 708-386-7939
											</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg">
						<div class="row mt-3 mt-md-0">
							<div class="col-12 col-lg">
								<div class="row no-gutters justify-content-between justify-content-lg-center">
									<div class="col-5 col-md-12 col-lg-4 p-lg-0 text-lg-center">
										<a class="footer-social-link" href="https://www.facebook.com/prairietitle/" target="_blank">
											<img src="/wp-content/uploads/2018/05/C-Facebook.svg" alt="">
											<p class="d-inline-block d-lg-none m-0 align-middle">
												Praire Title
											</p>
										</a>	
									</div>
									<div class="col-5 col-md-12 pt-0 pt-md-1 col-lg-4 p-lg-0 text-lg-center">
										<a class="footer-social-link" href="https://twitter.com/prairietitle" target="_blank">
											<img src="/wp-content/uploads/2018/05/C-Twitter.svg" alt="">
											<p class="d-inline-block d-lg-none m-0 align-middle">@PraireTitle</p>
										</a>
									</div>
								</div>
							</div>
							<div class="col-12 pt-3 col-lg pt-lg-0">
								<div class="row no-gutters justify-content-center justify-content-md-start">
									<a href="https://www.bbb.org/chicago/business-reviews/title-agent/prairie-title-services-inc-in-oak-park-il-19003136" target="_blank">
										<img class="footer-bbb" src="/wp-content/uploads/2018/05/bbb.png" alt="">
									</a>
								</div>
								<div class="row no-gutters justify-content-center justify-content-md-start mt-2">
									<a class="p-policy" href="/privacy-policy/">Privacy Policy</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- row end -->
	</div><!-- footer content end -->


</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<!-- <script type="text/javascript" src="/wp-content/themes/understrap-child-master/js/menu-scripts.js"></script> -->
</body>

</html>

