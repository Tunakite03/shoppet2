<section class="content-section"><!-- chỉnh sửa account văn 23/06  -->
<div class="text-center mt-5 mb-5">
    <h3 class="title_sp ">
        <span class="bg bg-white text-danger">
            <img src="https://banner2.cleanpng.com/20180626/fhs/kisspng-avatar-user-computer-icons-software-developer-5b327cc98b5780.5684824215300354015708.jpg" height="40px" width="40px" alt="">
            Thông tin tài khoản
        </span>
    </h3>
</div>
<div class="container rounded bg-white mt-5 mb-5">
    <?php
    $row = $profile
    ?>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <!-- <img class="rounded-circle mt-5" width="120px" src="assets/images/—Pngtree—green check mark icon design_6109371.png"> -->
                <img name="avatar" class="rounded-circle mt-5" width="150px" height="150px" src=" https://banner2.cleanpng.com/20180626/fhs/kisspng-avatar-user-computer-icons-software-developer-5b327cc98b5780.5684824215300354015708.jpg">
                <span class="font-weight-bold"><?php echo $row['fullname']; ?></span>
                <span class="text-black-50"><?php if (isset($row['email'])) {
                                                echo $row['email'];
                                            } else {
                                                echo "email chưa được cập nhật";
                                            } ?></span>
                <!-- click model -->
                <span>
                    <div>
                        <button style="background: none;border: none;" data-bs-toggle="modal" data-bs-target="#edit_profile"><a> <svg width="12" height="12" viewBox="0 0 12 12" style="margin-right: 4px;">
                                    <path d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48"></path>
                                </svg>Cập nhật hồ sơ</a></button>
                    </div>
                </span>
            </div>
        </div>
        <!-- model chỉnh sửa hồ sơ  -->
        <div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="edit_profileLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60% !important;">
                <div class="modal-content">
                    <form action="index.php?action=login&act=update_profile&id=<?php echo $id ?>" method="POST">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <!-- xử lý hình ảnh  -->
                                    <!-- <div>
                                        <label for="file"><img class="rounded-circle mt-5" width="150px" height="150px" id="image_url" src="<?php 
                                                                                                                                            // if (isset($row['avatar'])) {
                                                                                                                                            //     echo $row['avatar'];
                                                                                                                                            // } else {
                                                                                                                                            //     echo "../assets/images/avatar_img/no-avatar.png";
                                                                                                                                            // } 
                                                                                                                                            ?>"></label>
                                        <input type="text" id="link_url" value="<?php 
                                        echo $row['avatar'] ?>" hidden name="link_url">
                                        <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
                                        <div id="upload_img" class="btn btn-primary mb-3 ">cập nhật hình</div>
                                    </div>
                                    <span class="error "><?php
                                    //  if (isset($avatarErr)) echo $avatarErr; 
                                     ?></span> -->
                                    <span class="font-weight-bold"><?php 
                                    // echo $row['fullname']; 
                                    ?></span>
                                </div>
                            </div>
                            <!-- model chỉnh sửa hồ sơ  -->
                            <div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="edit_profileLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60% !important;">
                                    <div class="modal-content">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5" style="   margin-left: 132px;margin-right: -179px;">

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Chỉnh Sửa Hồ Sơ Của Bạn</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <h6>Họ và tên :</h6><input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>">
                                        </div>
                                        <span class="error "><?php if (isset($row['fullname'])) echo $row['fullname']; ?></span>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h6>Email :</h6><input type="email" class="form-control" name="email" value="<?php if (isset($row['email'])) {
                                                                                                                                echo $row['email'];
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>">
                                        </div>
                                        <span class="error "><?php if (isset($row['email'])) {
                                                                    echo $row['email'];
                                                                } else {
                                                                    echo "";
                                                                } ?></span>
                                        <div class="col-md-12">
                                            <h6>Số điện thoại :</h6><input type="text" class="form-control" name="phone" value="<?php if (isset($row['phone'])) {
                                                                                                                                    echo $row['phone'];
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>">
                                        </div>
                                        <span class="error "><?php if (isset($row['phone'])) {
                                                                    echo $row['phone'];
                                                                } else {
                                                                    echo "";
                                                                } ?></span>
                                        <!-- <div class="col-md-6">
                                            <h6>Giới tính :</h6>
                                            <select name="gioi_tinh_kh" id="gioi_tinh_kh">
                                                <option value="nam" selected>nam</option>
                                                <option value="nữ">nữ</option>
                                                <option value="khác">khác</option>
                                            </select>
                                        </div> -->
                                        <!-- <span class="error "><?php
                                                                    // if (isset($gioi_tinh_khErr)) echo $gioi_tinh_khErr; 
                                                                    ?></span> -->
                                    </div>
                                    <!-- <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Ngày đăng ký :</h6><input type="text" class="form-control" value="<?php
                                                                                                                    //  echo $row['ngay_dk']; 
                                                                                                                    ?>" readonly="false">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <h6>Địa chỉ giao hàng :</h6><textarea class="form-control" name="dia_chi_kh" id="" cols="30" rows="10"><?php if (isset($row['street']) && isset($row['ward']) && isset($row['district']) && isset($row['province'])) {
                                                                                                                                                    echo $row['street'] . ',' . $row['ward'] . ',' . $row['district'] . ',' . $row['province'];
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?></textarea>
                                    </div>
                                    <span class="error"><?php if (isset($row['street']) && isset($row['ward']) && isset($row['district']) && isset($row['province'])) {
                                                            echo $row['street'] . ',' . $row['ward'] . ',' . $row['district'] . ',' . $row['province'];
                                                        } else {
                                                            echo "";
                                                        } ?></span>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="submit">Cập nhật</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Thoát</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <style>
            .error {
                color: red;
            }
        </style>
        <!--  -->
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"> thông tin hồ sơ</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h6>Họ và tên :</h6><input type="text" class="form-control" value="<?php echo $row['fullname']; ?>" readonly="false">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6>Email :</h6><input type="email" class="form-control" value="<?php if (isset($row['email'])) {
                                                                                            echo $row['email'];
                                                                                        } else {
                                                                                            echo "chưa cập nhật";
                                                                                        } ?>" disabled>
                    </div>
                    <div class="col-md-12">
                        <h6>Số điện thoại :</h6><input type="text" class="form-control" value="<?php if (isset($row['phone'])) {
                                                                                                    echo $row['phone'];
                                                                                                } else {
                                                                                                    echo "chưa cập nhật";
                                                                                                } ?>" readonly="false">
                    </div>
                    <!-- <div class="col-md-6">
                        <h6>Giới tính :</h6> 
                        <input type="text" class="form-control" 
                        value="<?php
                                // if (isset($row['gioi_tinh_kh'])) {
                                //     echo $row['gioi_tinh_kh'];
                                // } else {
                                //     echo "chưa cập nhật";
                                // }
                                ?>" readonly="false">
                    </div> -->
                </div>
                <div class="row mt-3">
                    <!-- <div class="col-md-6">
                        <h6>Ngày đăng ký :</h6><input type="text" class="form-control" value="<?php
                                                                                                // if (isset($row['ngay_dk'])) {
                                                                                                //     echo $row['ngay_dk'];
                                                                                                // } else {
                                                                                                //     echo "chưa cập nhật";
                                                                                                // } 
                                                                                                ?>" readonly="false">
                    </div> -->
                </div>
                <div class="col-md-12">
                    <h6>Địa chỉ giao hàng :</h6><textarea class="form-control" name="" id="" cols="30" rows="10" readonly="false"><?php if (isset($row['street']) && isset($row['ward']) && isset($row['district']) && isset($row['province'])) {
                                                                                                                                        echo $row['street'] . ',' . $row['ward'] . ',' . $row['district'] . ',' . $row['province'];;
                                                                                                                                    } else {
                                                                                                                                        echo "chưa cập nhật";
                                                                                                                                    } ?></textarea>
                </div>
                <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">sửa hồ sơ</button></div> -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12">
                    <div class="kul4+s">
                        <div class="rhmIbk">
                            <div class="stardust-dropdown">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="#">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/bef078ae6ee56116ab5faa69b62659a5"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Ưu đãi dành riêng cho bạn</span><span class="_7udlQ7"><svg width="32" height="18" viewBox="0 0 32 18" fill="none">
                                                </svg></span></div>
                                    </a></div>
                            </div>
                            <div class="stardust-dropdown stardust-dropdown--open">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/ba61750a46794d8847c3f463c5e71cc4"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Tài khoản của tôi</span></div>
                                    </a></div>

                            </div>
                            <div class="stardust-dropdown">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="<?= _WEB_ROOT ?>/checkout/index/<?php echo $product["id"] ?>">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/f0049e9df4e536bc3e7f140d071e9078"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Đơn Mua</span></div>
                                    </a></div>
                                <div class="stardust-dropdown__item-body">
                                    <div class="Yu7gVR"></div>
                                </div>
                            </div>
                            <div class="stardust-dropdown">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="#">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/e10a43b53ec8605f4829da5618e0717c"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Thông báo</span></div>
                                    </a></div>
                            </div>
                            <div class="stardust-dropdown">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="#">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/84feaa363ce325071c0a66d3c9a88748"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Kho Voucher</span></div>
                                    </a></div>
                                <div class="stardust-dropdown__item-body">
                                    <div class="Yu7gVR"></div>
                                </div>
                            </div>
                            <div class="stardust-dropdown">
                                <div class="stardust-dropdown__item-header"><a class="+1U02e" href="#">
                                        <div class="bfikuD"><img src="https://cf.shopee.vn/file/a0ef4bd8e16e481b4253bd0eb563f784"></div>
                                        <div class="DlL0zX"><span class="adF7Xs">Shop Xu</span></div>
                                    </a></div>
                                <div class="stardust-dropdown__item-body">
                                    <div class="Yu7gVR"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    
</section>