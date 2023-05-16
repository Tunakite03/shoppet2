<section class="py-5">
    <div class="container py-6">
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <?php
                            if (isset($success)): ?>
                                <a href="<?= _WEB_ROOT ?>/account">
                                    <h3><i class="bi bi-arrow-left"></i></h3>
                                </a>
                                <div class="form-floating mb-3 my-3">
                                    <h3 class="card-title text-center mb-4">Mật khẩu mới đã gửi vào email của bạn
                                        !!Vui lòng vào mail để xem lại. </h3>
                                </div>
                            <?php endif ?>
                            <?php if (!isset($success)): ?>


                                <a href="<?= _WEB_ROOT ?>/account">
                                    <h3><i class="bi bi-arrow-left"></i></h3>
                                </a>
                                <h3 class="card-title text-center mb-4">Đặt lại mật khẩu</h3>
                                <?php
                                if (!empty($error)) {
                                    echo '<p style="color:red;">Email chưa liên kết tài khoản !!</p>';
                                }
                                ?>
                                <div class="form-floating mb-3 my-3">
                                    <input class="form-control" type="email" placeholder="Email" autocomplete="off"
                                        name="email" maxlength="128" value="">
                                    <label for="email">Nhập Email</label>
                                </div>
                                <button type="submit" name="submitforgotpass" id="submitforgotpass"
                                    class="btn btn-secondary w-100">Tiếp theo</button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>