<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class=" col-md-12">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" value="<?= $data_customer['name'] ?>" required name="name"
                            id="name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?= $data_customer['email'] ?>" required
                            name="email" id="email" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mật khẩu</label>
                        <input type="Textarea" class="form-control" value="<?= $data_customer['password'] ?>" required
                            name="password" id="password" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Địa chỉ</label>
                        <input type="Textarea" class="form-control" value="<?= $data_customer['address'] ?>" required
                            name="address" id="address" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Số điện thoại</label>
                        <input type="Textarea" class="form-control" value="<?= $data_customer['phone'] ?>" required
                            name="phone" id="phone" placeholder="">
                    </div>
                    <a href="/admin/customers" class="btn btn-danger"
                        style="color: white; background-color: #d9534f; border-color: #d43f3a; padding: 6px 12px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" name="editusersubmit" class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>
    </div>
</section>
<script>
    const fileInput = document.getElementById('image');
    const previewImg = document.getElementById('preview-image');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const url = URL.createObjectURL(file);
        previewImg.src = url;
    });

    function resetImage() {
        console.log(previewImg.dataset.source);
        previewImg.src = previewImg.dataset.source;
    }
</script>