<?php if (get_field('info_headline')): ?>
<?php $parents = array_reverse(get_post_ancestors( $post )); ?>
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
                            <a href="<?php echo get_page_link()?>"><?php echo get_the_title(''); ?></a>
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
<?php endif; ?>