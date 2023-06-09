<section class="content-section" style="background-color: #f5f5f7;">
    <div class="container-fluid">
        <?php
        if (!empty($errorsCart)) {
            ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Lỗi: </h4>
                <?php
                foreach ($errorsCart as $key => $error) {
                    ?>
                    <p>
                        <?= $error ?>
                    </p>
                <?php }
                ?>
                <hr>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <?php
            if ($products->rowCount() == 0) {
                ?>
                <div class="col-12 p-5">
                    <h4 class="text-center px4 py-3">Giỏ hàng của bạn đang trống !!</h4>
                    <div class="text-center py-2">
                        <a href="/shopcat" class="btn btn-login text-center w-25 m-auto">Mua sắm ngay </a>
                    </div>
                </div>
                <?php
            } else {

                ?>
                <h1 class="text-center">Giỏ Hàng Của Bạn</h1>
                <div class="col-lg-9 col-12 mt-4 ">
                    <div class="container p-2 py-4" style="background-color: #fff;">
                        <form action="/cart/updateCart" method="post">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th style="width: 300px">Tên Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng cộng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($products as $key => $product) {
                                        ?>
                                        <tr>
                                            <td><img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/<?php echo $product['image'] ?>"
                                                    alt="" width="100">
                                            </td>
                                            <td>
                                                <?= $product['product_name'] ?>
                                            </td>
                                            <td>
                                                <?= number_format($product['price'], 0, ".", ".") ?> VND
                                            </td>
                                            <td><input type="number" value="<?= $product['quantity'] ?>" min="1"
                                                    style="width: 60px; padding: 0 5px;" class="no-spinners"
                                                    name="quantity[<?= $product['id'] ?>]"></td>
                                            <td>
                                                <?= number_format($product['total'], 0, ".", ".") ?> VND
                                            </td>
                                            <td><a class="ri-delete-bin-line" style="cursor: pointer"
                                                    href="/cart/deleteItem/<?= $product['id'] ?>"> </a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="text-end mt-4">
                                <button class="btn btn-outline-success" style="border-radius: 5px;" type="submit"
                                    name='updateCart'>Cập nhật giỏ hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mt-4">
                    <div class="total-info px-2 py-4" style="background-color: #fff;">
                        <h4 class="py-3 text-center">Thông tin thanh toán</h4>
                        <table class="cart-total table">
                            <tbody>
                                <tr class="order-subtotal ">
                                    <td class="cart-total-left"><label>Tổng phụ:</label></td>
                                    <td class="cart-total-right"><span class="value-summary">
                                            <?= number_format($totalMoney['totalMoney'], 0, ".", ".") ?> VND
                                        </span></td>
                                </tr>
                                <tr class="order-total">
                                    <td class="cart-total-left"><label>Tổng cộng:</label></td>
                                    <td class="cart-total-right"><span class="value-summary">
                                            <?= number_format($totalMoney['totalMoney'], 0, ".", ".") ?> VND
                                        </span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end mt-4">
                            <a href="/checkout" class="btn btn-login confirm-order" style="border-radius: 5px;">Tiến hành thanh
                                toán</a>
                        </div>
                        <a href="<?php // Chuỗi trước đó
                            $previous_url = $_SERVER['HTTP_REFERER'];

                            // Tìm kiếm chuỗi '/detail' trong chuỗi $previous_url
                            $pos = strstr($previous_url, '/detail');

                            // Nếu tìm thấy chuỗi '/detail'
                            if ($pos !== false) {

                                // Cắt chuỗi phía trước của '/detail' và loại bỏ chuỗi '/detail'
                                $previous_url = rtrim(substr($previous_url, 0, strpos($previous_url, '/detail')), '/');

                                // In ra chuỗi phía trước của '/detail'
                                echo $previous_url;
                            } ?>" class=" my-5">Tiếp tục mua hàng...!</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    </div>
</section>
<script>
    // Add an event listener to the delete button
    document.querySelectorAll('.confirm-order').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Bạn có chắc chắn muốn đặt sản phẩm này?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                // If the user clicked "OK", redirect to the delete URL
                if (result.isConfirmed) {
                    window.location.href = button.href;
                }
            });
        });
    });
</script>