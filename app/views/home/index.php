<section class="content-section">
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height:600px" class="w-100"
                        src="<?php echo _WEB_ROOT ?>/public/assets/img/carousel01.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height:600px" class="w-100"
                        src="<?php echo _WEB_ROOT ?>/public/assets/img/carousel02.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="<?php echo _WEB_ROOT ?>/public/assets/img/PetPosterHome.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Cửa hàng số 1 về cung cấp thức ăn, đồ dùng cho vật nuôi.</h1>
                    <p class="mb-4">Hãy an tâm khi mua hàng tại chúng tôi vì sản phẩm ở đây được nhập khẩu có nguồn gốc
                        rõ ràng, chính ngạch.
                    </p>
                    <p><i class="fa fa-check text-secondary me-3"></i>Đầy đủ thức ăn cho vật nuôi</p>
                    <p><i class="fa fa-check text-secondary me-3"></i>Cung cấp đủ đồ chơi, vật dụng cho bé cưng của bạn
                    </p>
                    <p><i class="fa fa-check text-secondary me-3"></i>Với những thương hiệu nổi tiếng trên toàn thế giới
                    </p>
                    <a class="btn btn-secondary rounded-pill py-3 px-5 mt-3" href="?action=shopcat">Shop Cat Now</a>
                    <a class="btn btn-secondary rounded-pill py-3 px-5 mt-3" href="?action=shopdog">Shop Dog Now</a>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Product New Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp " data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản phẩm mới cập nhật</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-tabs d-flex justify-content-start mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold" id="dogItem-tab" data-bs-toggle="tab"
                                data-bs-target="#dogItem" type="button" role="tab" aria-controls="dogItem"
                                aria-selected="true">Dành cho chó</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="catItem-tab" data-bs-toggle="tab"
                                data-bs-target="#catItem" type="button" role="tab" aria-controls="catItem"
                                aria-selected="false">Dành cho
                                mèo</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="dogItem" role="tabpanel" aria-labelledby="dogItem-tab">
                    <div class="row g-4">
                        <!--getListProductNew_Dog-->
                        <?php
                        while ($set = $product_new_dog->fetch()):
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100"
                                            src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/dog/<?php echo $set["image"] ?>"
                                            alt="">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">
                                            <?php echo $set["name"] ?>
                                        </a>
                                        <span class="text-secondary me-1">
                                            <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                        </span>
                                        <span class="text-body text-decoration-line-through">
                                            <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                        </span>
                                        <span class="me-1 d-block mb-2" href="">
                                            lượt mua:
                                            <?php echo $set["number_sell"] ?>
                                        </span>

                                    </div>

                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href=""><i
                                                    class="fa fa-eye text-secondary me-2"></i>Xem</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href=""><i
                                                    class="fa fa-shopping-bag text-secondary me-2"></i>Thêm vào giỏ hàng</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-secondary rounded-pill py-3 px-5" href="?action=shopcat">Xem Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="catItem" role="tabpanel" aria-labelledby="catItem-tab">
                    <div class="tab-pane fade show active" id="dogItem" role="tabpanel" aria-labelledby="dogItem-tab">
                        <div class="row g-4">
                            <!--getListProductNew_Cat-->
                            <?php
                            while ($set = $product_new_cat->fetch()):
                                ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative bg-light overflow-hidden">
                                            <img class="img-fluid w-100"
                                                src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/cat/<?php echo $set["image"] ?>"
                                                alt="">
                                            <div
                                                class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                New</div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="">
                                                <?php echo $set["name"] ?>
                                            </a>
                                            <span class="text-secondary me-1">
                                                <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                            </span>
                                            <span class="text-body text-decoration-line-through">
                                                <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                            </span>
                                            <span class="me-1 d-block mb-2" href="">
                                            lượt mua:
                                            <?php echo $set["number_sell"] ?>
                                        </span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center border-end py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-eye text-secondary me-2"></i>Xem</a>
                                            </small>
                                            <small class="w-50 text-center py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-shopping-bag text-secondary me-2"></i>Thêm vào giỏ
                                                    hàng</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            ?>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-secondary rounded-pill py-3 px-5" href="?action=shopcat">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product New End -->


    <!-- Product Trend Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản phẩm bán chạy</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-tabs d-flex justify-content-start mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold" id="dogItemNew-tab" data-bs-toggle="tab"
                                data-bs-target="#dogItemNew" type="button" role="tab" aria-controls="dogItemNew"
                                aria-selected="true">Dành cho chó</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="catItemNew-tab" data-bs-toggle="tab"
                                data-bs-target="#catItemNew" type="button" role="tab" aria-controls="catItemNew"
                                aria-selected="false">Dành cho mèo</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="dogItemNew" role="tabpanel" aria-labelledby="dogItemNew-tab">
                    <div class="row g-4">
                        <!--getListProductTrend_Dog-->
                        <?php

                        while ($set = $product_trend_dog->fetch()):
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100"
                                            src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/dog/<?php echo $set["image"] ?>"
                                            alt="">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">
                                            <?php echo $set["name"] ?>
                                        </a>
                                        <span class="text-secondary me-1">
                                            <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                        </span>
                                        <span class="text-body text-decoration-line-through">
                                            <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                        </span>
                                        <span class="me-1 d-block mb-2" href="">
                                            lượt mua:
                                            <?php echo $set["number_sell"] ?>
                                        </span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href=""><i
                                                    class="fa fa-eye text-secondary me-2"></i>Xem</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href=""><i
                                                    class="fa fa-shopping-bag text-secondary me-2"></i>Thêm vào giỏ hàng</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-secondary rounded-pill py-3 px-5" href="?action=shopcat">Xem Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="catItemNew" role="tabpanel" aria-labelledby="catItemNew-tab">
                    <div class="tab-pane fade show active" id="dogItem" role="tabpanel" aria-labelledby="dogItem-tab">
                        <div class="row g-4">
                            <!--getListProductTrend_Cat-->
                            <?php
                            while ($set = $product_trend_cat->fetch()):
                                ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="product-item">
                                        <div class="position-relative bg-light overflow-hidden">
                                            <img class="img-fluid w-100"
                                                src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/cat/<?php echo $set["image"] ?>"
                                                alt="">
                                            <div
                                                class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                New</div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="">
                                                <?php echo $set["name"] ?>
                                            </a>
                                            <span class="text-secondary me-1">
                                                <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                            </span>
                                            <span class="text-body text-decoration-line-through">
                                                <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                            </span>
                                            <span class="me-1 d-block mb-2" href="">
                                            lượt mua:
                                            <?php echo $set["number_sell"] ?>
                                        </span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center border-end py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-eye text-secondary me-2"></i>Xem</a>
                                            </small>
                                            <small class="w-50 text-center py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-shopping-bag text-secondary me-2"></i>Thêm vào giỏ
                                                    hàng</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            ?>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-secondary rounded-pill py-3 px-5" href="?action=shopcat">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Trend End -->


    <!-- Review Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-secondary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="<?php echo _WEB_ROOT ?>/public/assets/img/testimonial-1.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-secondary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="<?php echo _WEB_ROOT ?>/public/assets/img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-secondary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="<?php echo _WEB_ROOT ?>/public/assets/img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-secondary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="<?php echo _WEB_ROOT ?>/public/assets/img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Review End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Latest Blog</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="<?php echo _WEB_ROOT ?>/public/assets/img/blog-1.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in
                            own
                            firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-secondary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-secondary me-2"></i>01 Jan,
                                2045</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid" src="<?php echo _WEB_ROOT ?>/public/assets/img/blog-2.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in
                            own
                            firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-secondary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-secondary me-2"></i>01 Jan,
                                2045</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="<?php echo _WEB_ROOT ?>/public/assets/img/blog-3.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic fruits and vegetables in
                            own
                            firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-secondary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-secondary me-2"></i>01 Jan,
                                2045</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
</section>