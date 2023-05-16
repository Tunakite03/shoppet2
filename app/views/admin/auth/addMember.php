<section class="section-content">
    <div class="row justify-content-center w-100">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <?php
                    if (isset($errorsRegister) && !empty($errorsRegister)) {
                    ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Lỗi: </h4>
                            <?php
                            foreach ($errorsRegister as $key => $error) {
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
                    if (isset($successRegister) && !empty($successRegister)) {
                    ?>
                        <div class="alert alert-success text-center" role="alert">
                            <h4 class="alert-heading">Hoàn thành</h4>
                            <p>Bạn đã thêm quản trị viên mới thành công.</p>
                            <hr>
                        </div>
                    <?php
                    }
                    ?>
                    <form action="/admin/addmember" method="post" id='form-register-admin' onsubmit="return validateForm()">
                        <div class="d-flex gap-4">
                            <div class="mb-3 flex-grow-1 ">
                                <label for="inputtext1" class="form-label">Tên</label>
                                <input required name="name" type="text" class="form-control w-100 " id="inputtext1" aria-describedby="textHelp">
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="mb-3 flex-grow-1">
                                <label for="inputEmail1" class="form-label">Email</label>
                                <input required name="email" type="email" class="form-control w-100 " id="inputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" id="emailError"></span>
                            </div>
                        </div>
                        <div class="d-flex gap-4">
                            <div class="mb-5 flex-grow-1">
                                <label for="inputPassword1" class="form-label">Mật khẩu</label>
                                <input required name="password" type="password" class="form-control w-100" id="inputPassword1">
                                <span class="text-danger" id="passwordError"></span>
                            </div>
                            <div class="mb-5 flex-grow-1">
                                <label for="role" class="form-label">Quyền hạn</label>
                                <select name="role" id="role">
                                    <?php
                                    if (!empty($data_role)) {
                                        $data = $data_role->fetchAll();
                                        foreach ($data as $key => $value) {
                                    ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="registerSubmit" class="btn btn-primary w-25 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var selectBoxElement = document.querySelector('#role');

    dselect(selectBoxElement, {
        search: true,
        maxHeight: '200px'
    });

    function validateForm() {
        let name = document.getElementById("inputtext1").value.trim();
        let email = document.getElementById("inputEmail1").value.trim();
        let password = document.getElementById("inputPassword1").value.trim();
        let errors = [];
        if (name === "") {
            errors.push("Vui lòng nhập vào ô tên");
            document.getElementById("nameError").textContent = "Vui lòng nhập vào ô tên";
        } else if (!/^[a-zA-Z0-9 ]+$/.test(name)) {
            errors.push("Tên chỉ chứa chữ, dấu cách và số, không chứa dấu");
            document.getElementById("nameError").textContent = "Tên chỉ chứa chữ và dấu cách, không chứa dấu";
        } else {
            document.getElementById("nameError").textContent = "";
        }
        if (email === "") {
            errors.push("Vui lòng nhập vào ô email");
            document.getElementById("emailError").textContent = "Vui lòng nhập vào ô email";
        } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,}$/.test(email)) {
            errors.push("Vui lòng nhập đúng định dạng emal");
            document.getElementById("emailError").textContent = "Vui lòng nhập đúng định dạng emal";
        } else {
            document.getElementById("emailError").textContent = "";
        }

        if (password === "" || password.length < 6) {
            errors.push("Vui lòng nhập password");
            document.getElementById("passwordError").textContent = "Vui lòng nhập password. Độ dài password phải từ 6 kí tự trở lên";
        } else {
            document.getElementById("passwordError").textContent = "";
        }

        if (errors.length > 0) {
            return false;
        } else {
            return true;
        }
    }
</script>