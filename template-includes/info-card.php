<?php if ( have_rows('info_card_group')): ?>
<div class="row no-gutters justify-content-center">
    <div class="col-11 col-lg-9">
        <div class="row no-gutters justify-content-center justify-content-md-between justify-content-lg-around">
            <?php while( have_rows('info_card_group')): the_row(); ?>
                <?php 
                    $link = get_sub_field('info_card_link_url', false, false);
                    $title = get_sub_field('info_card_title', false, false);
                    $off_page = $title == "PrairieSecure";
                ?>
                <a href="<?php echo $link['url']; ?>">
                    <div class="info-card col-12 col-md-5 py-5 mb-4 mb-lg-0" data-aos="fade-up">
                        <div class="row no-gutters justify-content-center py-3">
                            <img src="<?php echo the_sub_field('info_card_image'); ?>" alt="">
                        </div>
                        <div class="row no-gutters justify-content-center">
                            <h3 class="main-h3">
                                <?php echo the_sub_field('info_card_title'); ?>
                            </h3>
                        </div>
                        <div class="row no-gutters justify-content-center">
                            <div class="col-10 col-lg-8">
                                <p class="main-p">
                                    <?php echo the_sub_field('info_card_text'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="row no-gutters mt-auto justify-content-center">
                            <div class="card-link col-10 col-lg-8">
                                <a href="<?php echo $link['url'] ?>" target="_blank">
                                    <?php echo $link['title'] ?> <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>