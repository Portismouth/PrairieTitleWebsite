<?php if (get_field('article_hero_image') || get_field('article_hero_title')): ?>
    <?php if(get_field('article_hero_image')): ?>
    <div class="audience-hero-wrapper row no-gutters">
        <div class="jumbotron jumbotron-fluid" style="background-image:url(<?php the_field('article_hero_image'); ?>)">
            <div class="row no-gutters h-100 align-items-end">
                <div class="container">
                    <div class="col-7 mx-auto">
                        <h1 class="page-hero-title text-center">
                            <?php the_field('article_hero_title'); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div><!-- end article hero template -->
    </div><!-- End Hero Wrapper -->  
    <?php else: ?>
    <div id="no-image" class="audience-hero-wrapper row no-gutters">
        <div class="jumbotron jumbotron-fluid" style="background-image:url(<?php the_field('article_hero_image'); ?>)">
            <div class="row no-gutters h-100 align-items-end">
                <div class="container">
                    <div class="col-7 mx-auto">
                        <h1 class="page-hero-title text-center">
                            <?php the_field('article_hero_title'); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div><!-- end article hero template -->
    </div><!-- End Hero Wrapper -->  
    <?php endif; ?>
<?php endif; ?>