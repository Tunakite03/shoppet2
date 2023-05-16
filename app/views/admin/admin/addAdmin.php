<section class="section-content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class=" col-md-12">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Admin</label>
                        <input type="text" class="form-control" value="" required name="name" id="name" placeholder="nhập họ và tên admin">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" class="form-control" value="" required name="email" id="email"
                            placeholder="nhập email admin">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mật khẩu</label>
                        <input type="Textarea" class="form-control" value="" required name="password" id="password"
                            placeholder="nhập mật khẩu admin">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Vai trò</label>
                        <select name="id_role" id="id_role" class="form-control">
                            <?php
                            if (isset($data_role)) {
                                foreach ($data_role as  $role) {
                            ?>
                                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <a href="/admin/admin" class="btn btn-danger"
                        style="color: white; background-color: #d9534f; border-color: #d43f3a; padding: 6px 12px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" name="addadminsubmit" class="btn btn-primary">Add</button>
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