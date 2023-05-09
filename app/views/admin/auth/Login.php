<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/img/logos/dark-logo.svg" width="180" alt="">
                        </a>
                        <p class="text-center">Login Account To Enter</p>

                        <form action="/admin/login" method="post" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="InputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                                <span class="errorText text-danger fw-bold" id="emailError"></span>
                            </div>
                            <div class="mb-4">
                                <label for="InputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="InputPassword">
                                <span class="errorText text-danger fw-bold" id="passwordError"></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label text-dark" for="flexCheckChecked">
                                        Remeber this Device
                                    </label>
                                </div>
                                <a class="text-primary fw-bold" href="/admin">Forgot Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        let email = document.getElementById("InputEmail").value.trim();
        let password = document.getElementById("InputPassword").value.trim();
        let errors = [];
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