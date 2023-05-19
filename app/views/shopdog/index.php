<!-- Hero Section Begin -->

<section class="hero-begin" style="padding-top:10rem;">
    <div class="container">


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
                        <h4 class="" style="font-weight: 700;">Danh mục sản phẩm</h4>

                        <?php
                        // print_r($categories->fetchAll());
                        // print_r($type->fetchAll());
                        $listType = $type->fetchAll();
                        $listCate = $categories->fetchAll();

                        if (!empty($listCate)) {
                            foreach ($listCate as $category) {
                                echo '<div class="dropdown">';
                                echo '<a href="' . _WEB_ROOT . '/shopdog/category/' . strtolower($category['name']) . '" class="nav-link" role="button" aria-expanded="false">' . $category['name'] . '</a>';
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
                                        echo '<li><a href="' . _WEB_ROOT . '/shopdog/category/' . strtolower($category['name']) . '/' . strtolower($product) . '">' . $product . '</a></li>';
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
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="1500000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input mt-3 d-flex justify-content-between">
                                    <input type="number" id="minamount" min="0" value="0" class="px-2" style="width: fit-content !important; outline: none;" readonly>
                                    <input type="number" id="maxamount" value="1500000" class="px-2" style="width: fit-content !important; outline: none;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <?php
                if (isset($productsSaleDog)) {
                ?>
                    <!-- Sale off -->
                    <div class="product-discount">
                        <div class="section-title product-discount-title">
                        <h2><img src="https://seeklogo.com/images/H/hot-sale-mexico-logo-726E38BE8E-seeklogo.com.png" alt="Sale Off" width="150px" height="150px" srcset=""></h2>
                        </div>
                        <div class="row">
                            <div class="product-discount-slider owl-carousel">
                                <?php
                                while ($set = $productsSaleDog->fetch()) :
                                ?>
                                    <div class="col-lg-4 m-auto w-100 p-2 justify-content-center">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg">
                                                <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/<?php echo $set["image"] ?>" alt="" width="100%">
                                                <div>
                                                    <div class="product__discount__percent">-
                                                        <?php echo round((($set['price'] - $set['sale']) / $set['price']) * 100, 0) ?>%
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product__discount__item__text">
                                                <h6><a href="shopdog/detail/<?php echo $set["id"] ?>"><span>
                                                            <?php echo $set["name"] ?>
                                                        </span></a></h6>
                                                <!-- <h5><a href="#">Raisin’n’nuts</a></h5> -->
                                                <div class="product__item__price">
                                                    <p style="color: crimson;">
                                                        <?php echo number_format($set["sale"], 0, ',', '.') ?>đ
                                                    </p><span>
                                                        <?php echo number_format($set["price"], 0, ',', '.') ?>đ
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;

                                ?>
                            </div>
                            <div class="owl-buttons"></div>

                        </div>
                    </div>
                <?php } ?>
                <hr>
                <?php
                if ($productsDog->rowCount() > 0) {
                ?>
                    <div class="filter-item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter-sort">
                                    <span>Xem Theo:</span>
                                    <select>
                                        <option value="0">Tăng Dần</option>
                                        <option value="0">Giảm Dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter-found">


                                    <h6><span>
                                            <?php
                                            $totalProducts = $productsDog->rowCount();
                                            echo $totalProducts;
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
                        $productsToShow = array_slice($productsDog->fetchAll(), $from, $productsPerPage);
                        $totalPages = ceil($totalProducts / $productsPerPage);
                        foreach ($productsToShow as $product) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <div class="product-item-pic set-bg">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/dog/<?php echo $product["image"] ?>"
                                            alt="" width="100%">

                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-item-text">
                                    <h6><a href="<?= _WEB_ROOT ?>/shopdog/detail/<?php echo $product["id"] ?>"><span><?php echo $product["name"] ?></span></a></h6>

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
                            <?php }
                            ?>
                            <!-- display the pagination links -->
                            <div class="product-pagination text-center mt-4">
                                Trang:
                                <?php if ($currentPage > 1) : ?>
                                    <a href="#" onclick="filterData(<?php echo $currentPage - 1; ?>)"><i class="fa fa-long-arrow-left"></i></a>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <a href="#" onclick="filterData(<?php echo $i; ?>)" <?php if ($i === $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                                <?php endfor; ?>
                                <?php if ($currentPage < $totalPages) : ?>
                                    <a href="#" onclick="filterData(<?php echo $currentPage + 1; ?>)"><i class="fa fa-long-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
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
    $(document).ready(function() {
        var minVal = parseInt($('#minamount').val());
        var maxVal = parseInt($('#maxamount').val());
        var select_price = $('#select-price').val();

        function filterData() {
            $.ajax({
                url: "<?= _WEB_ROOT ?>/shopdog/filter",
                type: "POST",
                data: {
                    minPrice: minVal,
                    maxPrice: maxVal,
                    select_price: select_price,
                },
                success: function(data) {
                    $("#product-container").html(data);
                }
            });
        }
        $("#select-price").on("change", function() {
            select_price = $(this).val();
            minVal = parseInt($('#minamount').val());
            maxVal = parseInt($('#maxamount').val());
            filterData();
        });

        $('#minamount, #maxamount').change(function() {
            minVal = parseInt($('#minamount').val());
            maxVal = parseInt($('#maxamount').val());
        });
        $('.price-range').slider({
            range: true,
            min: parseInt($('.price-range').data('min')),
            max: parseInt($('.price-range').data('max')),
            values: [minVal, maxVal],
            slide: function(event, ui) {
                $('#minamount').val(ui.values[0]);
                $('#maxamount').val(ui.values[1]);
                minVal = ui.values[0];
                maxVal = ui.values[1];
                filterData();
            },
        });
    });
</script>