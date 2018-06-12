<?php if (get_field('main_hero_image')): ?>
    <div class="jumbotron jumbotron-fluid" style="background-image:url(<?php the_field('main_hero_image'); ?>)">
        <div class="row no-gutters h-100 align-items-end align-items-lg-center justify-content-center">
            <div class="col-11 col-lg-9">
                <h1 class="main-hero-title">
                    <?php the_field('main_hero_title'); ?>
                </h1>
                <h4 class="main-hero-subtitle">
                    <?php the_field('main_hero_subtitle'); ?>
                </h4>
            </div>
        </div>
    </div><!-- end main hero template -->
<?php endif; ?>