<section class="section-content">
    <div class="row justify-content-center w-100">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <?php
                    if (!empty($errorsRegister)) {
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
                    ?>
                    <form action="/admin/registerAdmin" method="post" id='form-register-admin' onsubmit="return validateForm()">
                        <div class="d-flex gap-4">
                            <div class="mb-3 flex-grow-1 ">
                                <label for="inputtext1" class="form-label">Name</label>
                                <input required name="name" type="text" class="form-control w-100 " id="inputtext1" aria-describedby="textHelp">
                                <span id="nameError"></span>
                            </div>
                            <div class="mb-3 flex-grow-1">
                                <label for="inputEmail1" class="form-label">Email Address</label>
                                <input required name="email" type="email" class="form-control w-100 " id="inputEmail1" aria-describedby="emailHelp">
                                <span id="emailError"></span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword1" class="form-label">Password</label>
                            <input required name="password" type="password" class="form-control w-50" id="inputPassword1">
                            <span id="passwordError"></span>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label">Quyền hạn</label>
                            <select name="role" id="role"></select>
                            <span id="passwordError"></span>
                        </div>
                        <button type="submit" name="registerSubmit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function validateForm() {
        let name = document.getElementById("inputtext1").value.trim();
        let email = document.getElementById("inputEmail1").value.trim();
        let password = document.getElementById("inputPassword1").value.trim();
        let errors = [];
        if (name === "") {
            errors.push("Vui lòng nhập vào ô tên");
            document.getElementById("nameError").textContent = "Vui lòng nhập vào ô tên";
        } else if (!/^[a-zA-Z ]+$/.test(name)) {
            errors.push("Tên chỉ chứa chữ và dấu cách, không chứa dấu");
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

        if (password === "") {
            errors.push("Vui lòng nhập password");
            document.getElementById("passwordError").textContent = "Vui lòng nhập password";
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