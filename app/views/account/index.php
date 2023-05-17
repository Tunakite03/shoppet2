<section class="content-section">
    <?php
    if (!empty($successRegister)) {
        ?>
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Đăng kí thành công </h4>
            <p>Bạn đã đăng kí thành công. Hãy đăng nhập tại đây</p>
            <hr>
        </div>
        <?php
    }
    ?>
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
    <div class="container py-5">
        <!-- ##### Login Area Start ##### -->
        <div class="vizew-login-area section-padding-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 d-md-block  d-none">
                        <img src="<?php echo _WEB_ROOT ?>/public/assets/img/login.png" alt="" width="100%">
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 ">
                        <div class="container">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold btn active" id="login-tab" data-bs-toggle="tab"
                                        data-bs-target="#login" type="button" role="tab" aria-controls="login"
                                        aria-selected="true">Login</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold btn " id="register-tab" data-bs-toggle="tab"
                                        data-bs-target="#register" type="button" role="tab" aria-controls="register"
                                        aria-selected="false">Register</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel"
                                    aria-labelledby="login-tab">
                                    <div class="login-content">
                                        <div class="section-heading">
                                            <h4 class="text-center py-2">Great to have you back!</h4>
                                            <?php
                                            if (!empty($errorsLogin)) {
                                                ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <h4 class="alert-heading">Lỗi: </h4>
                                                    <?php
                                                    foreach ($errorsLogin as $key => $error) {
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

                                            <div class="line"></div>
                                        </div>
                                        <form action="/account/login" method="post">
                                            <div class="mb-3">
                                                <label for="InputEmail1" class="form-label">Email or User
                                                    Name</label>
                                                <input type="email" class="form-control" required name="email"
                                                    id="InputEmail1" placeholder="Enter email or user name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="InputPassword1" class="form-label">Password</label>
                                                <input type="password" required class="form-control" name="password"
                                                    id="InputPassword1" placeholder="Password">
                                            </div>
                                            <div class="mb-3 form-check d-flex justify-content-between">
                                                <div class="form-check mr-auto">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlAutosizing">
                                                    <label class="form-check-label"
                                                        for="customControlAutosizing">Remember me</label>
                                                </div>
                                                <a href="<?= _WEB_ROOT?>/account/forgotpassword" class="ml-auto">Quên mật khẩu</a>
                                            </div>

                                            <button type="submit" class="btn btn-login w-100 mt-3"
                                                name="loginSubmit">Login</button>
                                        </form>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <div class="register-content">
                                        <div class="section-heading">
                                            <h4 class="text-center py-2">Create your account!</h4>
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
                                            <div class="line"></div>
                                        </div>
                                        <form action="/account/register" method="post" onsubmit="return validateForm()">
                                            <div class="mb-3">
                                                <label for="InputName" class="form-label">Full Name</label>
                                                <input required type="text" class="form-control" name="name"
                                                    id="InputName" placeholder="Enter your full name">
                                                <span class="text-danger" id="nameError"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="InputEmail2" class="form-label">Email</label>
                                                <input required type="email" class="form-control" name="email"
                                                    id="InputEmail2" placeholder="Enter your email">
                                                <span class="text-danger" id="emailError"></span>

                                            </div>
                                            <div class="mb-3">
                                                <label for="InputPassword2" class="form-label">Password</label>
                                                <input required type="password" class="form-control" name="password"
                                                    id="InputPassword2" placeholder="Password">
                                                <span class="text-danger" id="passwordError"></span>

                                            </div>
                                            <div class="mb-3">
                                                <label for="InputConfirmPassword" class="form-label">Confirm
                                                    Password</label>
                                                <input required type="password" class="form-control"
                                                    name="confirmPassword" id="InputConfirmPassword"
                                                    placeholder="Confirm Password">
                                                <span class="text-danger" id="confirmPasswordError"></span>

                                            </div>
                                            <button type="submit" class="btn btn-login w-100 mt-3"
                                                name="registerSubmit">Register</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Login Area End ##### -->
    </div>

</section>

<script>
    function validateForm() {
        let name = document.getElementById("InputName").value.trim();
        let email = document.getElementById("InputEmail2").value.trim();
        let password = document.getElementById("InputPassword2").value.trim();
        let confirmPassword = document.getElementById("InputConfirmPassword").value.trim();
        let errors = [];

        if (name === "") {
            errors.push("Please enter your full name");
            document.getElementById("nameError").textContent = "Please enter your full name";
        } else if (!/^[a-zA-Z ]+$/.test(name)) {
            errors.push("Name can only contain letters and spaces");
            document.getElementById("nameError").textContent = "Name can only contain letters and spaces";
        } else {
            document.getElementById("nameError").textContent = "";
        }

        if (email === "") {
            errors.push("Please enter your email");
            document.getElementById("emailError").textContent = "Please enter your email";
        } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,}$/.test(email)) {
            errors.push("Invalid email format");
            document.getElementById("emailError").textContent = "Invalid email format";
        } else {
            document.getElementById("emailError").textContent = "";
        }

        if (password === "") {
            errors.push("Please enter a password");
            document.getElementById("passwordError").textContent = "Please enter a password";
        } else if (password.length < 8) {
            errors.push("Password must be at least 8 characters long");
            document.getElementById("passwordError").textContent = "Password must be at least 8 characters long";
        } else if (!/\d/.test(password)) {
            errors.push("Password must contain at least one number");
            document.getElementById("passwordError").textContent = "Password must contain at least one number";
        } else if (!/[!@#$%^&*(),.?":{}|<>]/g.test(password)) {
            errors.push("Password must contain at least one special character");
            document.getElementById("passwordError").textContent = "Password must contain at least one special character";
        } else {
            document.getElementById("passwordError").textContent = "";
        }

        if (confirmPassword === "") {
            errors.push("Please confirm your password");
            document.getElementById("confirmPasswordError").textContent = "Please confirm your password";
        } else if (confirmPassword !== password) {
            errors.push("Passwords do not match");
            document.getElementById("confirmPasswordError").textContent = "Passwords do not match";
        } else {
            document.getElementById("confirmPasswordError").textContent = "";
        }

        if (errors.length > 0) {
            return false;
        } else {
            return true;
        }
    }
</script>