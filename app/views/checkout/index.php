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
          <?php
          if ($infoCart->rowCount() > 0) {
            foreach ($infoCart as $key => $value) {
          ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><?= $value['product_name'] ?></h6>
                  <small class="text-muted">Số lượng: <?= $value['quantity'] ?></small>
                </div>
                <span class="text-muted"><?= number_format($value['total'], 0, ".", ".") ?> VND</span>
              </li>
          <?php
            }
          }
          ?>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total </span>
            <strong><?= number_format($alltotal['alltotal'], 0, ".", ".") ?> VND</strong>
          </li>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Mã Khuyến Mãi...">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Nhập</button>
            </div>
          </div>
        </form> -->

        <!-- end giỏ hàng -->


      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Đỉa chỉ nhận hàng</h4>
        <form class="needs-validation" action="/checkout/confirm" method="post" onsubmit="return validateForm()">
          <div class=" mb-3">
            <label for="firstName">Họ và Tên</label>
            <input type="text" class="form-control" id="firstName" name="fullname" placeholder="" value="<?= $infoUser['name'] ?>">
            <div id="nameError" class="text-danger fw-bold">
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="...@gmail.com" disabled value="<?= $infoUser['email'] ?>">
            <div id="emailError" class="text-danger fw-bold">
            </div>
          </div>
          <div class="mb-3">
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="039..." required>
            <div id="phoneError" class="text-danger fw-bold">
            </div>
          </div>

          <div class="row justify-content-between ">
            <div class="col-md-5 mb-3 p-0">
              <label for="province">Tỉnh/Thành Phố</label>
              <select class="custom-select d-block w-100 form-control" id="province" name="province" required>
              </select>
              <input type="hidden" id="province-is" name="province-is">
            </div>
            <div class="col-md-4 mb-3 p-0">
              <label for="district">Quận/Huyện</label>
              <select class="custom-select d-block w-100  form-control" id="district" name="district" required>
              </select>
              <input type="hidden" id="district-is" name="district-is">
            </div>
            <div class="col-md-4 mb-3 p-0">
              <label for="ward">Xã/phường</label>
              <select class="custom-select d-block w-100  form-control" id="ward" name="ward" required>
              </select>
              <input type="hidden" id="ward-is" name="ward-is">
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Đường..." required>
            <div id="addressError" class="text-danger fw-bold">
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-secondary" type="submit" name="checkoutSubmit">Đặt hàng</button>
        </form>
      </div>
    </div>

  </div>
</section>

<script>
  function validateForm() {
    let name = document.getElementById("firstName").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let address = document.getElementById("address").value.trim();
    let errors = [];

    if (name === "") {
      errors.push("Vui lòng nhập tên");
      document.getElementById("nameError").textContent = "Vui lòng nhập tên";
    } else if (!/^[a-zA-Z ]+$/.test(name)) {
      errors.push("Tên chỉ chứa chữ, không chứa số và dấu");
      document.getElementById("nameError").textContent = "Tên chỉ chứa chữ, không chứa số và dấu";
    } else {
      document.getElementById("nameError").textContent = "";
    }
    if (phone.length !== 10 || phone.charAt(0) !== '0') {
      errors.push("Số điện thoại gồm 10 số");
      document.getElementById("phoneError").textContent = "Số điện thoại gồm 10 số";
    } else {
      document.getElementById("phoneError").textContent = "";

    }

    if (email === "") {
      errors.push("Vui lòng nhập email");
      document.getElementById("emailError").textContent = "Vui lòng nhập email";
    } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,}$/.test(email)) {
      errors.push("Email không hợp lệ");
      document.getElementById("emailError").textContent = "Email không hợp lệ";
    } else {
      document.getElementById("emailError").textContent = "";
    }

    if (address === "") {
      errors.push("Vui lòng nhập địa chỉ");
      document.getElementById("addressError").textContent = "Vui lòng nhập địa chỉ";
    } else if (!/^[a-zA-Z0-9 ]+$/.test(address)) {
      errors.push("Vui lòng không nhập dấu và kí tự đặc biệt");
      document.getElementById("addressError").textContent = "Vui lòng không nhập dấu và kí tự đặc biệt";
    } else {
      document.getElementById("addressError").textContent = "";
    }

    if (errors.length > 0) {
      return false;
    } else {
      return true;
    }
  }
</script>