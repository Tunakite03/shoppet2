<!-- Hero Section Begin -->
<section class="hero-begin" style="padding-top:10rem;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="nav-item dropdown">
                    <button class=" dropdown-toggle btn-hero" data-bs-toggle="dropdown">Tất cả danh
                        mục</button>
                    <ul class="dropdown-menu m-0" style="width: 100%;">
                        <li class="dropdown-item">Blog Grid</li>
                        <li class="dropdown-item">Our Features</li>
                        <li class="dropdown-item">Testimonial</li>
                        <li class="dropdown-item">404 Page</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="hero-search d-flex justify-content-between flex-wrap">
                    <div class="hero-search-form my-2">
                        <form action="#" class="d-flex">
                            <div class="hero-search-categories pe-2">
                                <select name="Category" id="" class="px-3 py-2">
                                    <option value="">Tất cả</option>
                                    <option value="A">A</option>
                                    <option value="A">B</option>
                                    <option value="A">C</option>
                                </select>
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do you need?" class="px-3 me-2">
                            <button type="submit" class="btn-hero border-0 text-white">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero-search-phone d-flex flex-wrap ">
                        <h2>SHOP CHÓ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->

<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h3 class="" style="font-weight: 700;">Department</h3>
                        <ul class="list-unstyled sidebar-list">
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
<li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>

                        </ul>
                    </div>
                    <div class="sidebar-item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input mt-3">
                                    <input disabled style="background-color: transparent;" type="text" id="minamount"
                                        min="0">
                                    <input disabled style="background-color: transparent;" type="text" id="maxamount"
                                        max="100">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                <!-- Sale off -->
                <div class="product-discount">
                    <div class="section-title product-discount-title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product-discount-slider owl-carousel">
                            <?php
                                    while($set = $productsSaleDog->fetch()):
                            ?>
                            <div class="col-lg-4 m-auto w-100 p-2 justify-content-center">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/dog/<?php echo $set["image"] ?>" alt="" width="100%">
                                        <div>
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
</div>

                                    </div>
                                    <div class="product__discount__item__text">
                                        <h6><a href="shopdog/detail/<?php echo $set["id"] ?>"><span><?php echo $set["name"] ?></span></a></h6>
                                        <!-- <h5><a href="#">Raisin’n’nuts</a></h5> -->
                                        <div class="product__item__price"><p style="color: crimson;"><?php echo number_format($set["sale"], 0, ',', '.')?>đ</p><span><?php echo number_format($set["price"], 0, ',', '.')?>đ</span></div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="owl-buttons"></div>

                    </div>
                </div>
                <hr>

                <!-- products -->
                <div class="filter-item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter-sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter-found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter-option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                     while($set = $productsDogNoSale->fetch()):
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-pic set-bg">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/dog/<?php echo $set["image"] ?>" alt="" width="100%">

                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
<div class="product-item-text">
                                <h6><a href="shopdog/detail/<?php echo $set["id"] ?>"><span><?php echo $set["name"] ?></span></a></h6>
                                <h5><?php echo number_format($set["price"], 0, ',', '.')?>đ</h5>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                    </div>
                </div>
                <div class="product-pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->