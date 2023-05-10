<!-- Hero Section Begin -->
<section class="hero-begin" style="padding-top:10rem;">
    <div class="container">
        <form action="<?= _WEB_ROOT ?>/shopcat/searchItem" method="post" onsubmit="return validateForm()">
            <div class="row align-items-center">
                <div class="col-lg-3 col-5">
                    <div class="nav-item dropdown justify-content-end d-flex">
                        <select name="category" id="" class="px-3 py-2 ">
                            <option value="name">Ten san pham</option>
                            <option value="id_brand">Thương hiệu</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-7">
                    <div class="hero-search d-flex justify-content-between flex-wrap">
                        <div class="hero-search-form my-2">
                            <div class="form-controll">
                                <input type="text" placeholder="Bạn cần gì...?" class="px-3 me-2 py-2" name="searchTerm" required id="searchTerm">
                                <span id="errorInput">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <button type="submit" class="site-btn border-0 text-white px-3 py-2" style="background-color: #dc3545;" name="searchSubmit">SEARCH</button>
                </div>
                <div class="col-lg-3 col-12">
                    <h2>SHOP MÈO</h2>
                </div>

            </div>
        </form>
        <?php
        //   endwhile;
        ?>

    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->

<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <!-- Search -->
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h4 class="" style="font-weight: 700;">Danh mục sản phẩm</h4>
                        <?php
                        // print_r($categories->fetchAll());
                        // print_r($type->fetchAll());
                        $listType = $type->fetchAll();
                        $listCate = $categories->fetchAll();

                        if (!empty($listCate)) {
                            foreach ($listCate as $category) {
                                echo '<div class="dropdown">';
                                echo '<a href="' . _WEB_ROOT . '/shopcat/category/' . strtolower($category['name']) . '" class="nav-link" role="button" aria-expanded="false">' . $category['name'] . '</a>';
                                echo '<div class="dropdown-content">';
                                $products = array();
                                foreach ($listType as $type_item) {
                                    if ($type_item['id_category'] == $category['id']) {
                                        $products[] = $type_item['name'];
                                    }
                                }
                                if (!empty($products)) {
                                    echo '<ul>';
                                    foreach ($products as $product) {
                                        echo '<li><a href="' . _WEB_ROOT . '/shopcat/category/' . strtolower($category['name']) . '/' . strtolower($product) . '">' . $product . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }

                        ?>
                    </div>
                    <div class="sidebar-item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input mt-3">
                                    <input disabled style="background-color: transparent;" type="text" id="minamount" min="0">
                                    <input disabled style="background-color: transparent;" type="text" id="maxamount" max="100">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Sale off -->
            <div class="col-lg-9 col-md-7">
                <?php
                if (!empty($productsSaleCat)) {
                ?>
                    <!-- Sale off -->
                    <div class="product-discount">
                        <div class="section-title product-discount-title">
                            <h2>Sale Off</h2>
                        </div>

                        <div class="row">
                            <div class="product-discount-slider owl-carousel">
                                <?php
                                while ($set = $productsSaleCat->fetch()) :
                                ?>
                                    <div class="col-lg-4 m-auto w-100 p-2 justify-content-center">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg">
                                                <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/cat/<?php echo $set["image"] ?>" alt="" width="100%">
                                                <div>
                                                    <div class="product__discount__percent">-<?php echo round((($set['price'] - $set['sale']) / $set['price']) * 100, 0) ?>%</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product__discount__item__text">
                                                <h6><a href="shopcat/detail/<?php echo $set["id"] ?>"><span><?php echo $set["name"] ?></span></a></h6>
                                                <!-- <h5><a href="#">Raisin’n’nuts</a></h5> -->
                                                <div class="product__item__price">
                                                    <p style="color: crimson;"><?php echo number_format($set["sale"], 0, ',', '.') ?>đ</p><span><?php echo number_format($set["price"], 0, ',', '.') ?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="owl-buttons"></div>

                        </div>
                    </div>
                    <hr>
                <?php } ?>

                <!-- products -->
                <?php
                if ($productsCat->rowCount() > 0) {
                ?>
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

                                    <h6><span>
                                            <?php
                                            //  $pd = new ProductModel();
                                            //  $count=$pd->$productsCountCat;
                                            // echo ":".$count;
                                            ?>
                                        </span> Products found</h6>
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
                        $productsToShow = array_slice($productsCat->fetchAll(), $from, $productsPerPage);
                        $totalProducts = $productsCat->rowCount();
                        $totalPages = ceil($totalProducts / $productsPerPage);

                        foreach ($productsToShow as $product) { ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <div class="product-item-pic set-bg">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/cat/<?php echo $product["image"] ?>" alt="" width="100%">

                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-item-text">
                                        <h6><a href="shopcat/detail/<?php echo $product["id"] ?>"><span><?php echo $product["name"] ?></span></a></h6>
                                        <?php
                                        if ($product["price"] > $product["sale"] && $product["sale"] == 0) {
                                            echo '<h5 style="color:red;">
                                        ' . number_format($product['price']) . '<sup><u>đ</u></sup></br></h5>';
                                        } else {
                                            echo '<h5 >
                                        <font color="red">' . number_format($product['sale']) . '<sup><u>đ</u></sup></font>
                                        <strike>' . number_format($product['price']) . '</strike><sup><u>đ</u></sup></br></h5>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- display the pagination links -->
                    <div class="product-pagination text-center">
                        <?php if ($currentPage > 1) : ?>
                            <a href="/shopcat/?page=<?php echo $currentPage - 1; ?>"><i class="fa fa-long-arrow-left"></i></a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <a href="/shopcat/?page=<?php echo $i; ?>" <?php if ($i === $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                        <?php endfor; ?>
                        <?php if ($currentPage < $totalPages) : ?>
                            <a href="/shopcat/?page=<?php echo $currentPage + 1; ?>"><i class="fa fa-long-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="col-12">
                            <p>Không có sản phẩm</p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>



        </div>
    </div>
    </div>
</section>
<!-- Product Section End -->

<script>
    function validateForm() {
        let name = document.getElementById("searchTerm").value.trim();
        let errors = [];
        if (name === "") {
            errors.push("Vui nhập nhập thứ bạn muốn tìm");
            document.getElementById("errorInput").textContent = "Vui nhập nhập thứ bạn muốn tìm";
        } else {
            document.getElementById("errorInput").textContent = "";
        }
        if (errors.length > 0) {
            return false;
        } else {
            return true;
        }
    }
</script>