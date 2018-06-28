<?php if ( have_rows('info_row')): 
    $counter = 0;    
?>
    <div class="col-10 col-md-11 col-lg-9">
        <?php while( have_rows('info_row')): the_row(); ?>
            <div class="info-row row no-gutters">
                <?php if($counter % 2 == 0): ?>
                    <div class="info-text col-md-6 col-lg-4 order-1 order-md-0 p-0 pr-md-3 p-lg-0">
                        <div class="row no-gutters">
                            <h1 class="info-text-title">
                                <?php echo the_sub_field('info_text_title') ?>
                            </h1>
                        </div>
                        <div class="row no-gutters">
                            <p class="info-text">
                                <?php echo the_sub_field('info_text') ?>
                            </p>
                        </div>
                        <div class="row no-gutters">
                            <?php $button = get_sub_field('button_link_text'); ?>
                            <a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn info-rows-btn">
                                <?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i>
                            </a>
                        </div> 
                    </div>
                    <?php if($counter == 0 && is_page( 42 )): ?>
                        <div class="info-image-holder col-md-6 col-lg-7 offset-lg-1 order-0 order-md-1 p-0 pl-md-3 p-lg-0 d-none d-sm-block">
                    <?php else: ?>
                        <div class="info-image-holder col-md-6 col-lg-7 offset-lg-1 order-0 order-md-1 p-0 pl-md-3 p-lg-0">
                    <?php endif; ?>            
                        <div class="row no-gutters">
                            <div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
                            </div>
                            <div class="info-row-shadow-right col-12"></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="info-image-holder col-md-6 col-lg-6 p-0 pr-md-3 p-lg-0">
                        <div class="row no-gutters">
                            <div class="info-image col-12" style="background-image:url(<?php echo the_sub_field('info_image') ?>)">
                            </div>
                            <div class="info-row-shadow-left col-12"></div>
                        </div>
                    </div>
                    <div class="info-text col-md-6 col-lg-5 offset-lg-1 p-0 pl-md-3 p-lg-0">
                        <div class="row no-gutters">
                            <h1 class="info-text-title">
                                <?php echo the_sub_field('info_text_title') ?>
                            </h1>
                        </div>
                        <div class="row no-gutters">
                            <p class="info-text">
                                <?php echo the_sub_field('info_text') ?>
                            </p>
                        </div>
                        <div class="row no-gutters">
                            <?php 
                                $button = get_sub_field('button_link_text'); 
                                if($button['button_text'] === 'frequently asked questions'):
                            ?>
                                <a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn info-rows-btn w-100">
                                    <?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo $button['button_link']; ?>" class="btn btn-primary main-btn info-rows-btn">
                                    <?php echo $button['button_text']; ?><i class="fas fa-chevron-right"></i>
                                </a>
                            <?php endif; ?>
                        </div> 
                    </div>
                <? endif; ?>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>