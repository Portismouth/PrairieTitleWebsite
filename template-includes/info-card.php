<?php if ( have_rows('info_card_group')): ?>
<div class="row no-gutters justify-content-center">
    <div class="col-11 col-lg-9">
        <div class="row no-gutters justify-content-around">
            <?php while( have_rows('info_card_group')): the_row(); ?>
            <div class="info-card col-5">
                <div class="row no-gutters justify-content-center pb-3">
                    <img src="<?php echo the_sub_field('info_card_image'); ?>" alt="">
                </div>
                <div class="row no-gutters justify-content-center">
                    <h3 class="main-h3">
                        <?php echo the_sub_field('info_card_title'); ?>
                    </h3>
                </div>
                <div class="row no-gutters">
                    <p class="main-p">
                        <?php echo the_sub_field('info_card_text'); ?>
                    </p>
                </div>
                <div class="row no-gutters pt-3">
                    <?php $link = get_sub_field('info_card_link_url'); ?>
                    <a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?> <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>