<section class="content-section">

    <div class="container">
  <div class="py-5 text-center">
    <h2 style="color: orangered;">THÔNG TIN VẬN CHUYỂN</h2>
  </div>
 <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <!-- Hiện thị giỏ hàng -->
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Giỏ Hàng của bạn</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Tên sản phẩm</h6>
            <small class="text-muted">Mô tả ngắn</small>
          </div>
          <span class="text-muted">$</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Mã Khuyến Mãi...">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Nhập</button>
          </div>
        </div>
      </form>
      <!-- end giỏ hàng -->
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Đỉa chỉ nhận hàng</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class=" mb-3">
            <label for="firstName">Họ và Tên</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="...@gmai.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Số Điện Thoại</label>
          <input type="email" class="form-control" id="email" placeholder="+34">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Địa chỉ</label>
          <input type="text" class="form-control" id="address" placeholder="Đường..." required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Tỉnh/Thành Phố</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Lựa chọn</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Quận/Huyện</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Lựa chọn</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Mã Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">
Địa chỉ giao hàng giống với địa chỉ thanh toán</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info"> Lưu thông tin này cho lần sau</label>
        </div>
        <button class="btn btn-secondary" type="submit">Hoàn Thành</button>
      </form>
    </div>
  </div>

</div>
</section>