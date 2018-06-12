<div class="col-11 col-lg-5">
    <?php if(!get_field('article_hero_image')): ?>
    <div class="row no-gutters">
        <h1 class="no-img-article-h1">
            <?php the_field('article_hero_title'); ?>
        </h1>
    </div>
    <?php endif; ?>
    <div class="row no-gutters">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/homepage/resources">Resources</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/homepage/resources/articles">Articles</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/homepage/for-consumers">For Consumers</a>
                </li>
            </ol>
        </nav>
    </div><!-- end breadcrumbs -->
    <div class="row no-gutters pt-3">
        <h1 class="article-h1">
            Frequently Asked Questions
        </h1>
    </div>
    <div class="row no-gutters pt-3">
        <p class="main-p">By <?php echo $author; ?></p>
    </div>
    <div class="row no-gutters pt-3">
        <a class="article-social-link pr-3" href="#">
            <img src="/wp-content/uploads/2018/05/C-Facebook.svg" alt="">
        </a>	
        <a class="article-social-link pl-2" href="#">
            <img src="/wp-content/uploads/2018/05/C-Twitter.svg" alt="">
        </a>
    </div>
</div>