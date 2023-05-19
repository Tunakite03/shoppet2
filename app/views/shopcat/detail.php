<section class="content-section">
    <div class="container-lg my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image-slider">
                    <div class="zoom-overlay">
                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/<?php echo $product["image"] ?>" alt="Ảnh sản phẩm">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="mb-4"><span><?php echo $product["name"] ?></h1>
                <p class="text-muted">Mã sản phẩm: <span><?php echo $product["id"] ?></p>
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
                <form action="/cart/addtocart/<?= $product["id"] ?>" method="post">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input style="width: auto;" type="number" class="form-control" id="quantity" name="quantity" value="1">
                    </div>
                    <div class="product-action">
                        <button type="submit" class="btn btn-warning">Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-description">
                    <h3 class="my-4">Mô tả sản phẩm</h3>
                    <p><?php echo $product["des"] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>