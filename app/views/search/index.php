<?php
if (!empty($_GET['table']) && !empty($_GET['key'])) {
    $table = $_GET['table'];
    $key = $_GET['key'];
    $count = $result_search->rowCount();
    $_CURRENT_URL = $_SERVER['REQUEST_URI'];
    $ListToShow = array_slice($result_search->fetchAll(), $from, $productsPerPage);
    $totalPages = ceil($count / $productsPerPage);
    $page_pos = strpos($_CURRENT_URL, "&page");

    if ($page_pos !== false) {
        // Cắt chuỗi từ đầu đến vị trí "&page="
        $_CURRENT_URL = substr($_CURRENT_URL, 0, $page_pos);
    }
}
?>
<section class="" style="padding-top:10rem;">
    <div class="container">
        <?php
        if ($count > 0) {
            ?>
            <div class="row">
                <h3>Có <span>
                        <?= $count ?>
                    </span> kết quả phù hợp với từ khóa "<span>
                        <?= $key ?>
                    </span>"</h3>
            </div>
            <div class="row">
                <?php
                if ($table == 'products') {
                    foreach ($ListToShow as $product) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-item">
                                <div class="product-item-pic set-bg">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/<?php echo $product["image"] ?>"
                                        alt="" width="100%">

                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-item-text">
                                    <h6><a href="/shop<?php echo $product["id_pet"] == 1 ? "dog" : ($product["id_pet"] == 2 ? "cat" : "");?>/detail/<?php echo $product["id"] ?>"><span>
                                                <?php echo $product["name"] ?>
                                            </span></a></h6>
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
                } ?>
                <?php
                if ($table == 'news') {
                    foreach ($ListToShow as $news) {
                        ?>
                        <div class="col-sm-4">
                            <div class="noi_dung">
                                <div class="img"><a href="">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_news/<?php echo $news["img_news"] ?>"
                                            alt="" width="100%"></a></div>
                                <h3><a href="">
                                        <?php echo $news["name"] ?>&nbsp;
                                    </a></h3>
                                <p class="expert">
                                    <?php echo $news["des_news"] ?>
                                </p>
                                <a href="" class="xem_the">Xem thêm</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?php }
                } ?>
                <div class="product-pagination text-center">
                    <?php if ($currentPage > 1): ?>
                        <a href="<?= $_CURRENT_URL ?>&page=<?php echo $currentPage - 1; ?>"><i
                                class="fa fa-long-arrow-left"></i></a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                        <a href="<?= $_CURRENT_URL ?>&page=<?php echo $i; ?>" <?php if ($i === $currentPage)
                                 echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="<?= $_CURRENT_URL ?>&page=<?php echo $currentPage + 1; ?>"><i
                                class="fa fa-long-arrow-right"></i></a>
                    <?php endif; ?>
                </div>

            <?php } else { ?>
                <div class="row">
                    <h3>Không có kết quả phù hợp với từ khóa "
                        <?= $key ?>"
                    </h3>
                </div>
            <?php }
        ?>
        </div>
    </div>
</section>