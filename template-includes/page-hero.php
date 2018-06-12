<?php if (get_field('page_hero_image')): ?>
    <div class="jumbotron jumbotron-fluid" style="background-image:url(<?php the_field('page_hero_image'); ?>)">
        <div class="row no-gutters h-100 align-items-end">
            <div class="container">
                <div class="col-6 mx-auto">
                    <h1 class="page-hero-title text-center">
                        <?php the_field('page_hero_title'); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div><!-- end main hero template -->
<?php endif; ?>