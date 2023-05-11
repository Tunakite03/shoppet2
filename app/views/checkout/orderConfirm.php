<section class="content-section px-5">
  <div class="table-responsive">
    <?php
    if (!empty($successOrder)) {
    ?>
      <div class="alert alert-success text-center" role="alert">
        <h4 class="alert-heading">Đặt hàng thành công </h4>
        <p>Bạn đã đặt hàn thành công</p>
        <hr>
      </div>
    <?php
    }
    ?>
    <?php
    if (!empty($orderErrors)) {
    ?>
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Lỗi: </h4>
        <?php
        foreach ($orderErrors as $key => $error) {
        ?>
          <p>
            <?= $error ?>
          </p>
        <?php }
        ?>
        <hr>
      </div>
    <?php
    } else {

    ?>


      <form action="" method="post">

        <table class="table table-bordered" border="0">

          <td colspan="4">
            <h2 style="color:orangered    ; text-align: center;">HÓA ĐƠN</h2>
          </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn:
              <?= $checkoutConfirmUser['id_order'] ?>
            </td>
            <td colspan="2"> Ngày lập:
              <?= $checkoutConfirmUser['date'] ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên: <?= $checkoutConfirmUser['customer_name'] ?> </td>
            <td colspan="2">

            </td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: <?= $checkoutConfirmUser['address'] ?></td>
            <td colspan="2">

            </td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại: <?= $checkoutConfirmUser['phone'] ?></td>
            <td colspan="2">
              <?php  ?>
            </td>
          </tr>

        </table>
        <!-- Thông tin sản phầm -->
        <table class="table table-bordered">
          <thead>
            <tr style="background-color: orangered;color:antiquewhite;text-align: center;">
              <th>Số TT</th>
              <th>Hình ảnh</th>
              <th>Sản Phẩm</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $checkoutConfirmProducts = $checkoutConfirmProducts->fetchAll();
            foreach ($checkoutConfirmProducts as $key => $item) {
            ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><img width="100px" src="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?= strtolower($item['pet_name']) . '/' . $item['image'] ?>" /></td>
                <td>
                  <?= $item['product_name'] ?>
                </td>
                <td class="text-center">
                  <?= $item['quantity'] ?>
                </td>
                <td class="text-end">
                  <?= number_format($item["price"], 0, ',', '.') . " VND" ?>
                </td>
              </tr>
            <?php
            }
            ?>
            <tr>
              <td colspan="4">
                <b>Tổng Tiền</b>
              </td>
              <td style="float: right;">
                <b>
                  <?= number_format($checkoutConfirmUser['total_money'], 0, ',', '.') . " VND" ?>
                </b>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    <?php } ?>
  </div>

</section>