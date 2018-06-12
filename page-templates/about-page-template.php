<?php
/**
 * Template Name: PTS About Page Template
 * Description: Used as a page template to show page contents 
 */

get_header();
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
?>
<div class="modal fade" id="employeeBioModal" tabindex="-1" role="dialog" aria-labelledby="employeeBioModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-4">
						<div class="row no-gutters">
							<img class="employee-modal-image" src="/wp-content/uploads/2018/05/Frank-Pellegrini.png" alt="employee headshot">
						</div>
						<div class="row no-gutters mt-3">
							<p class="emp-modal-number"></p>
						</div>
					</div>
					<div class="col-8">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="row no-gutters">
							<h1 class="emp-modal-h1"></h1>
						</div>
						<div class="row no-gutters mt-1">
							<p class="emp-modal-title main-p"></p>
						</div>
						<div class="row no-gutters">
							<div class="emp-modal-bio main-p mt-3"></div>
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
		<div class="audience-page-info-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-7">
					<div class="row no-gutters justify-content-center">
						<h2 class="audience-page-info-headline">
							<?php the_field('info_headline'); ?>
						</h2>
					</div>
					<div class="row no-gutters">
						<p class="audience-page-info-text">
							<?php the_field('info_text'); ?>
						</p>
					</div>
				</div>
			</div>
		</div><!-- End Info Wrapper -->
		<div class="team-member-wrapper">
			<div class="row no-gutters justify-content-center">
				<div class="col-7">
					<h2 class="main-h2 text-center">
						<?php echo the_field('team_content_title'); ?>
					</h2>
					<p class="main-p mt-2">
						<?php echo the_field('team_content_summary'); ?>
					</p>	
				</div>
				<div class="col-10 col-lg-9">
					<div class="row no-gutters justify-content-center">
					</div>
					<div class="row">
						<?php 
							$args = array('post_type' => 'team_member');
							$loop = new WP_Query($args);
							//Array of all team member posts
							$team_array = array();
						?>
						<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php 
							//Team info to load into array
							$headshot = get_field('employee_headshot', false);
							$employee_name = get_field('employee_name', false);
							$employee_title = get_field('employee_title', false);
							$employee_phone = get_field('phone_number', false);
							$phone_extension = get_field('phone_extension', false);
							$employee_bio = get_field('employee_bio', false);
							//ID to create associative array and to pass as a data attribute on link click
							$team_post_id = get_the_ID();
							//Creates array element with the key of the post ID
							$team_array[$team_post_id] = array(
								"headshot" => $headshot,
								"employee_name" => $employee_name,
								"employee_title" => $employee_title,
								"employee_phone" => $employee_phone,
								"phone_extension" => $phone_extension,
								"employee_bio" => $employee_bio
							)
						?>
						<div class="employee-bio-container col-md-6 col-lg-4 pt-5">
							<div class="employee-sub-container">
								<a type="image" data-toggle="modal" data-target="#employeeBioModal" data-postid="<?php echo $team_post_id; ?>">
									<div class="headshot-container row no-gutters" style="background-image:url(<?php echo $headshot; ?>)"></div>
								</a>
								<h2 class="main-h4 employee-name">
									<?php echo $employee_name; ?>
								</h2>
								<p class="main-p employee-title pb-2">
									<?php echo $employee_title; ?>
								</p>
								<p class="main-p employee-phone">
									<?php echo $employee_phone; ?> x <?php echo $phone_extension; ?>
								</p>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div><!-- Team Members end -->
		<div class="testimonials-wrapper">
			<div class="circle-square-left">
				<img src="/wp-content/uploads/2018/05/Circle-Square-left.svg" alt="">
			</div>
			<div class="circle-square-right">
				<img src="/wp-content/uploads/2018/05/Circle-Square-right.svg" alt="">
			</div>
			<div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
				<?php 
					if(have_rows('testimonials')) {
						$li_count=0;
						$first = true; 
					}
				?>
				<ol class="carousel-indicators mx-0">
					<?php while(have_rows('testimonials')): the_row(); ?>
						<?php if($li_count == 0): ?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $li_count; ?>" class="active"></li>
						<?php else: ?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $li_count; ?>"></li>
						<?php endif; ?>
						<?php $li_count++; ?>
					<?php endwhile; ?>
				</ol>
				<div class="carousel-inner h-100">
					<?php while(have_rows('testimonials')): the_row(); ?>
						<?php if($first): ?>
							<div class="carousel-item h-100 active">
								<div class="row justify-content-center h-100">
									<div class="col my-auto">
										<div class="row no-gutters justify-content-center">
											<div class="col-1 text-center">
												<p class="testimonial-quote">"</p>
											</div>
											<div class="col-6 my-auto">
												<p class="testimonial-text">
													<?php the_sub_field('testimonial'); ?>
												</p>
											</div>
											<div class="col-1"></div>
										</div>
										<div class="row no-gutters justify-content-center">
											<?php 
												$attestant_name = get_sub_field('attestant_name', false);
												$attestant_company = get_sub_field('attestant_company', false);
												$attestant_position = get_sub_field('attestant_position', false);
												$attestant_info = array();
												
												($attestant_name && array_push($attestant_info, $attestant_name));
												($attestant_company && array_push($attestant_info, $attestant_company));
												($attestant_position && array_push($attestant_info, $attestant_position));
											?>
											<div class="col-1"></div>
											<p class="main-p col-6">
												<?php echo implode(", ", $attestant_info); ?>
											</p>
											<div class="col-1 text-center">
												<p class="testimonial-quote closing">"</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php else: ?>
							<div class="carousel-item h-100">
								<div class="row justify-content-center h-100">
									<div class="col my-auto">
										<div class="row no-gutters justify-content-center">
											<div class="col-1 text-center">
												<p class="testimonial-quote">"</p>
											</div>
											<div class="col-6 my-auto">
												<p class="testimonial-text">
													<?php the_sub_field('testimonial'); ?>
												</p>
											</div>
											<div class="col-1"></div>
										</div>
										<div class="row no-gutters justify-content-center">
											<?php 
												$attestant_name = get_sub_field('attestant_name', false);
												$attestant_company = get_sub_field('attestant_company', false);
												$attestant_position = get_sub_field('attestant_position', false);
												$attestant_info = array();
												
												($attestant_name && array_push($attestant_info, $attestant_name));
												($attestant_company && array_push($attestant_info, $attestant_company));
												($attestant_position && array_push($attestant_info, $attestant_position));
											?>
											<div class="col-1"></div>
											<p class="main-p col-6">
												<?php echo implode(", ", $attestant_info); ?>
											</p>
											<div class="col-1 text-center">
												<p class="testimonial-quote closing">"</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php $first = false; ?>
					<?php endwhile; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div><!-- testimonials end -->
		<div class="underwriter-hero-wrapper">
			<?php require( get_stylesheet_directory() . '/template-includes/underwriter-hero.php' ); ?>
		</div><!-- underwriter-wrapper end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#employeeBioModal').on('show.bs.modal', function (event) {
			//instantiate target element obj
			let link = $(event.relatedTarget);
			//stores post ID
			let postId = link.data('postid');
			//Grabs the team array and converts it to JSON
			let post = <?php echo json_encode($team_array, JSON_FORCE_OBJECT); ?>;

			//Populates modal with team memeber data
			$('.employee-modal-image').attr('src', post[postId]['headshot']);
			$('.emp-modal-h1').text(post[postId]['employee_name']);
			$('.emp-modal-h1').text(post[postId]['employee_name']);
			$('.emp-modal-title').text(post[postId]['employee_title']);
			$('.emp-modal-number').text(post[postId]['employee_phone'] + " x " + post[postId]['phone_extension']);
			if(post[postId]['employee_bio']) {
				$('.emp-modal-bio').html(post[postId]['employee_bio']);
			} else {
				$('.emp-modal-bio').text('Bio coming soon!');
			}
		});
	});
</script>

<?php get_footer(); ?>