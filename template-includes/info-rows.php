<?php if ( have_rows('info_row')): 
    $counter = 0;    
?>
    <div class="col-md-11 col-lg-8">
        <?php while( have_rows('info_row')): the_row(); ?>
            <div class="info-row row no-gutters">
            <?php if($counter % 2 == 0): ?>
                <div class="info-text col-md-6 col-lg-4">
                <h1 class="info-text-title">
                    <?php echo the_sub_field('info_text_title') ?>
                </h1>
                <p class="info-text">
                    <?php echo the_sub_field('info_text') ?>
                </p>
                <?php $button = get_sub_field('button_link_text'); ?>
                <a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn"><?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="info-image-holder col-md-5 col-lg-7 offset-1">
                    <div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
                    </div>
                    <div class="info-row-shadow-right col-12"></div>
                </div>
            <?php else: ?>
                <div class="info-image-holder col-md-5 col-lg-7">
                <div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
                </div>
                <div class="info-row-shadow-left col-12"></div>
                </div>
                <div class="info-text col-md-6 col-lg-4 offset-1">
                    <h1><?php echo the_sub_field('info_text_title') ?></h1>
                    <p><?php echo the_sub_field('info_text') ?></p>
                    <?php $button = get_sub_field('button_link_text'); ?>
                    <a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn"><?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i></a>
                </div>
            <? endif; ?>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>