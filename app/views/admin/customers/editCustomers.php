<section class="section-content">
    <div class="container-fluid">
        <?php
        if (!empty($successEdit)) {
        ?>
            <div class="alert alert-success text-center" role="alert">
                <h4 class="alert-heading">Chỉnh sửa thành công</h4>
                <p>Bạn đã chỉnh sửa thành công.</p>
                <hr>
            </div>
        <?php
        }
        ?>
        <?php
        if (!empty($errorsEdit)) {
        ?>
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="alert-heading">Chỉnh sửa không thành công</h4>
                <p><?= $errorsEdit ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" value="<?= $data_customer['name'] ?>" required name="name" id="name" placeholder="">
                    </div>
                    <div class="row justify-content-between mb-3">
                        <div class="col-md-5 mb-3 p-0">
                            <label for="province">Tỉnh/Thành Phố</label>
                            <select class="custom-select d-block w-100 form-control" id="province" name="province" required>
                            </select>
                            <input type="hidden" id="province-is" name="province-is" value="<?= $data_customer['province'] ?>">
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
                        <div class="col-md-4 mb-3 p-0">
                            <label for="street">Tên đường</label>
                            <input type="text" id="street-is" class="form-control" name="street-is" required value="<?= $data_customer['street'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" value="<?= $data_customer['phone'] ?>" required name="phone" id="phone" placeholder="">
                    </div>
                    <a href="/admin/customers" class="btn btn-danger" style="color: white; background-color: #d9534f; border-color: #d43f3a; padding: 6px 12px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" name="editusersubmit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');
</script>