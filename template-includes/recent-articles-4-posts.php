<div class="row no-gutters justify-content-center align-self-center w-100">
    <div class="col-11 col-lg-8     col-xl-10">
        <div class="recent-articles-heading row no-gutters justify-content-between align-items-center">
            <div class="col-lg-6 text-center text-lg-left">
                <h2>Recent Articles</h2>
            </div>
            <div class="col-lg-6 text-center text-lg-right d-none d-lg-block">
                <a href="/homepage/resources/articles/">VIEW MORE<i class="fas fa-chevron-right"></i></a>
            </div>
        </div><!-- end recent article heading row -->
        <div class="row justify-content-center justify-content-lg-between">
            <?php
                $count = 1;
                $offset = 0;
            ?>
            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php if( get_field('article_hero_image', false, false) ): ?>
                <?php 
                    if($count > 1) {
                        echo '<div class="article-card-container col-12 col-lg-6 col-xl-3 my-3" data-aos="fade-up" data-aos-delay=' . $offset . '>';
                    } else {
                        echo '<div class="article-card-container col-12 col-lg-6 col-xl-3 my-3" data-aos="fade-up">';
                    }
                ?>
                    <a href="<?php echo the_permalink();?>">
                        <div class="article-card row no-gutters">
                            <div class="col-4 col-lg-12" >
                                <?php if ( has_post_thumbnail() ): ?>
                                    <div class="article-card-image" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
                                    </div>
                                <?php else: ?>
                                    <div class="article-card-image" style="background-image: url(<?php the_field('article_hero_image'); ?>);">
                                    </div>
                                <?php endif; ?>
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
                <?php 
                    if($count > 1) {
                        echo '<div class="article-card-container col-12 col-lg-6 col-xl-3 my-3" data-aos="fade-up" data-aos-delay=' . $offset . '>';
                    } else {
                        echo '<div class="article-card-container col-12 col-lg-6 col-xl-3 my-3" data-aos="fade-up">';
                    }
                ?>
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
                                    <?php if( strlen(get_field('article_hero_title')) < 50): ?>
                                        <p class="article-card-prev main-p">
                                            <?php echo substr($summary, 0, 225) . "..."; ?>	
                                        </p>
                                    <?php else: ?>
                                        <p class="article-card-prev main-p">
                                            <?php echo substr($summary, 0, 150) . "..."; ?>	
                                        </p>
                                    <?php endif; ?>	
                                <? endwhile; ?>
                            </div>
                            <div class="row no-gutters mt-3 mt-lg-auto">
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
            <?php 
                $count++;
                $offset += 250;
                endwhile; 
            ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- end article card row -->
        <div class="col-lg-6 text-center text-lg-right d-block d-lg-none my-3">
            <a href="/homepage/resources/articles/">VIEW MORE <i class="fas fa-chevron-right"></i></a>
        </div>
    </div><!-- col-10 end -->
</div><!-- end row -->
