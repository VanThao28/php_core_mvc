<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <?php
                foreach ($list_blog as $list_blogs) {
                    
                ?>
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" style="width: 750px; height: 450px;" src="<?php echo _WEB_ROOT;?>/<?php echo $list_blogs['image_post']?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <p><?php echo $list_blogs['tbl_date']?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php echo _WEB_ROOT;?>/home/singleBlog/<?php echo $list_blogs['id']?>">
                                    <h2><?php echo $list_blogs['tbl_title']?></h2>
                                </a>
                                <p><?php echo substr($list_blogs['tbl_connent'],0,150)?>...</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?php echo $list_blogs['tbl_name']?></a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>