
        <div class="site-main-container" >
            <!-- Start latest-post Area -->
            <section class="latest-post-area ">
                <div class=" no-padding">
                    <div class="row">
                        <div class="col-lg-8 post-list">
                            <!-- Start latest-post Area -->
                            <div class="latest-post-wrap">
                                <h4 class="cat-title">Tin mới</h4>
                                
                                <!-- start item-->
                                <?php $i=0; foreach ($tintucs as $tintuc) : $i++;?>
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="<?php echo base_url(); ?>assets/tintuc/img/l1.jpg" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="#">Lifestyle</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="<?php echo base_url(); ?>tintuc/front/<?php echo $tintuc['id'];;?>">
                                            <h4><?php echo $tintuc['tieude']; ?> </h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?php echo $tintuc['username']; ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $tintuc['ngaytao']; ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                                        </ul>
                                        <p class="excert">
                                            <?php echo $tintuc['mota']; ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <?php endforeach; ?>
                                <!-- end item-->

                                <div class="load-more">
                                    <a href="#" class="primary-btn">Load More Posts</a>
                                </div>
                                
                            </div>
                            <!-- End latest-post Area -->
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebars-area">
                                
                                <div class="single-sidebar-widget most-popular-widget">
                                    <h6 class="title">Most Popular</h6>
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>assets/tintuc/img/m1.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h6>Help Finding Information
                                                Online is so easy</h6>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                                <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>assets/tintuc/img/m2.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h6>Compatible Inkjet Cartr
                                                world famous</h6>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                                <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>assets/tintuc/img/m3.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                                <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <img src="<?php echo base_url(); ?>assets/tintuc/img/m4.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="image-post.html">
                                                <h6>5 Tips For Offshore Soft
                                                Development </h6>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                                <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End latest-post Area -->
        </div>
    