<div class="row no-gutters justify-content-center align-self-center">
    <div class="col-11 col-lg-10">
        <div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
            <div class="col-lg-6 text-center text-lg-left">
                <h2>Recent Articles</h2>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <a href="/homepage/resources/articles/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
            </div>
        </div><!-- end recent article heading row -->
        <div class="row justify-content-center">
            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php if( get_field('article_hero_image', false, false) ): ?>
                <div class="col-lg-3 my-3">
                    <a href="<?php echo the_permalink();?>">
                        <div class="article-card row no-gutters">
                            <div class="col-4 col-lg-12" >
                                <div class="article-card-image" style="background-image: url(<?php the_field('article_hero_image') ?>);">
                                </div>
                            </div>	
                            <div class="article-card-info col-8 col-lg-12 order-first order-lg-last">
                                <h5 class="article-card-title w-100">
                                    <?php echo the_field('article_hero_title'); ?>
                                </h5>
                                <div class="article-card-tag-list mt-auto">
                                    <?php 
                                        $posttags = get_the_tags(); 
                                        $tag_count = 1;
                                    ?>
                                    <p>
                                        <?php foreach($posttags as $tag): ?>
                                            <?php
                                                if($tag_count === count($posttags)){
                                                    echo $tag->name;
                                                } else {
                                                    echo $tag->name.", "; 
                                                }
                                                $tag_count++;
                                            ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div><!-- end card -->
                <?php else: ?>
                <div class="col-lg-3 my-3">
                    <a href="<?php echo the_permalink();?>">
                        <div class="article-card-no-img">
                            <div class="row no-gutters">
                                <h5 class="article-card-title w-100">
                                    <?php echo the_field('article_hero_title'); ?>
                                </h5>
                            </div>
                            <div class="row no-gutters position-relative">
                                <?php 
                                    while( have_rows('article_content')): the_row();
                                    $summary = get_sub_field('article_text', false, false);	
                                ?>
                                <div class="text-fade-overlay"></div>
                                <p class="main-p">
                                    <?php echo substr($summary, 0, 200) . "..."; ?>	
                                </p>
                                <? endwhile; ?>
                            </div>
                            <div class="row no-gutters mt-lg-auto">
                                <div class="article-card-tag-list">
                                    <?php 
                                        $posttags = get_the_tags(); 
                                        $tag_count = 1;
                                    ?>
                                    <p>
                                        <?php foreach($posttags as $tag): ?>
                                            <?php
                                                if($tag_count === count($posttags)){
                                                    echo $tag->name;
                                                } else {
                                                    echo $tag->name.", "; 
                                                }
                                                $tag_count++;
                                            ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div><!-- end card -->					
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- end article card row -->
    </div><!-- col-10 end -->
</div><!-- end row -->
