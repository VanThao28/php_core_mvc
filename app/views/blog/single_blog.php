<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?php
                foreach ($singleBlog as $singleBlogs) {
                ?>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" style="width: 850px; height: 350px;" src="<?php echo _WEB_ROOT;?>/<?php echo $singleBlogs['image_post']?>" alt="">
                        </div>
                        <div class="blog_details">
                            <h2><?php echo $singleBlogs['tbl_title']?></h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> <?php echo $singleBlogs['tbl_name']?></a></li>
                            </ul>
                            <p>
                                <?php echo $singleBlogs['tbl_connent']?>
                            </p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>