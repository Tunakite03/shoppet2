<section class="content-section">
    <div class="container-lg my-5">
        <?php 
                if($set = $productsCat->fetch()):  
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="product-image-slider">
                    <div class="zoom-overlay">
                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/cat/<?php echo $set["image"] ?>" alt="Ảnh sản phẩm">
                    </div>
                    <!-- <div class="slider-main">
                        <img src="https://via.placeholder.com/600x400" alt="Ảnh sản phẩm">
                    </div> -->
                    <!-- <div class="slider-nav">
                        <button class="active"><img src="https://via.placeholder.com/80x80" alt="Ảnh sản phẩm"></button>
                        <button><img src="https://via.placeholder.com/80x80" alt="Ảnh sản phẩm"></button>
                        <button><img src="https://via.placeholder.com/80x80" alt="Ảnh sản phẩm"></button>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="mb-4"><span><?php echo $set["name"] ?></h1>
                <p class="text-muted">Mã sản phẩm: <span><?php echo $set["id"] ?></p>
               <h2> <p>Giá sản phẩm:<?php echo"<span  style='color: crimson;'>".number_format($set["sale"], 0, ',', '.')."đ</span>"?></p></h2>
                <form>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input style="width: auto;" type="number" class="form-control" id="quantity" name="quantity"
                            value="1">
                    </div>
                    <div class="product-action">
                        <button type="submit" class="btn btn-danger mx-2">Mua hàng</button>
                        <button type="submit" class="btn btn-warning">Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-description">
                    <h3 class="my-4">Mô tả sản phẩm</h3>
                    <p><?php echo $set["des"] ?></p>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>