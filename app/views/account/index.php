<section class="content-section">
    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="container">
                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login" type="button" role="tab" aria-controls="login"
                                    aria-selected="true">Đăng Nhập</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="register-tab" data-bs-toggle="tab"
                                    data-bs-target="#register" type="button" role="tab" aria-controls="register"
                                    aria-selected="false">Đăng Ký</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <div class="login-content">
                                    <div class="section-heading">
                                        <h4 class="text-center">Rất Vui Khi Gặp Bạn!</h4>
                                        <div class="line"></div>
                                    </div>
                                    <form action="index.html" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email Hoặc Tên Đăng Nhập</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email or user name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlAutosizing">
                                            <label class="form-check-label" for="customControlAutosizing">Nhớ Mật Khẩu</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-3">Đăng Nhập</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <div class="register-content">
                                    <div class="section-heading">
                                        <h4 class="text-center">Tạo Tài Khoản!</h4>
                                        <div class="line"></div>
                                    </div>
                                    <form action="index.html" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputName" class="form-label">Họ Và Tên</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter your full name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail2" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2"
                                                placeholder="Enter your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword2" class="form-label">Mật Khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2"
                                                placeholder="Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputConfirmPassword" class="form-label">Xác Nhận Mật Khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputConfirmPassword"
                                                placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-3">Đăng Ký</button>
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
</section>