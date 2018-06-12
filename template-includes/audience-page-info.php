<?php if (get_field('info_headline')): ?>
<?php $parents = array_reverse(get_post_ancestors( $post )); ?>
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
            <div class="row no-gutters justify-content-center py-4">
                <h2 class="main-h2 audience-page-info-headline">
                    <?php the_field('info_headline'); ?>
                </h2>
            </div>
            <div class="row no-gutters">
                <p class="main-p audience-page-info-text pb-3">
                    <?php the_field('info_text'); ?>
                </p>
            </div>
            <div class="row no-gutters">
                <p class="main-p audience-page-info-text">
                    For all inquiries or to schedule an appointment, please call 708-386-7900 or <a href="#">email us.</a>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>