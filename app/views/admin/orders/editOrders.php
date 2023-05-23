
        <table class="table table-bordered" border="0">

          <td colspan="4">
            <h2 style="color:orangered; text-align: center;">HÓA ĐƠN</h2>
          </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn:
              <?= $order_id['id_order'] ?>
            </td>
            <td colspan="2"> Ngày lập:
              <?=$order_id['date'] ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên: <?=$order_id['customer_name'] ?> </td>
            <td colspan="2">

            </td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: <?=$order_id['address'] ?></td>
            <td colspan="2">

            </td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại: <?= $order_id['phone'] ?></td>
            <td colspan="2">
              <?php  ?>
            </td>
          </tr>

        </table>
        <!-- Thông tin sản phầm -->
        <table class="table table-bordered">
          <thead>
            <tr class="bg-secondary text-light">
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
                <td><img width="100px" src="<?= _WEB_ROOT ?>/public/assets/img/img_pet/<?=$item['image'] ?>" /></td>
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
                  <?=number_format($item['total_money'])." VND" ?>
                </b>
              </td>
            </tr>
          </tbody>
        </table>
      </form>