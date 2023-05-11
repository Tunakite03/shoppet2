<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s" style="box-shadow: 2px 2px 2px #ccc;">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-5 px-5 text-start">
            <small>Giao Hàng Toàn Quốc</small>
            <small class="ms-4">Mua Hàng(7h-22h)</small>

        </div>
        <div class="col-lg-4 px-5 ">

        </div>
        <div class="col-lg-3 px-5 text-end">
            <small><i class="bi bi-telephone-fill"></i><a style="color: red;"> 0987654321</a></small>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0"><img src="<?php echo _WEB_ROOT ?>/public/assets/img/logo.png" alt=""></a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Trang Chủ</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/shopdog" role="button" aria-expanded="false">
                        Shop Chó
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="/shopdog" class="dropdown-item">Thức Ăn Cho Chó</a>
                        <a href="/shopdog" class="dropdown-item">Đồ Dùng Cho Chó</a>
                        <a href="/shopdog" class="dropdown-item">Đồ Chơi Cho Chó</a>
                        <a href="/shopdog" class="dropdown-item">Phụ Kiện Cho Chó</a>
                        <a href="/shopdog" class="dropdown-item">Chuồng Lồng Cho Chó</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="/shopcat" class="nav-link dropdown-toggle" role="button" aria-expanded="false">Shop
                        Mèo</a>
                    <div class="dropdown-menu m-0">
                        <a href="/shopcat" class="dropdown-item">Thức Ăn Cho Mèo</a>
                        <a href="/shopcat" class="dropdown-item">Đồ Dùng Cho Mèo</a>
                        <a href="/shopcat" class="dropdown-item">Đồ Chơi Cho Mèo</a>
                        <a href="/shopcat" class="dropdown-item">Phụ Kiện Cho Mèo</a>
                        <a href="/shopcat" class="dropdown-item">Chuồng Lồng Cho Mèo</a>
                    </div>
                </div>
                <a href="/news" class="nav-item nav-link">Tin Tức</a>
                <a href="/contact" class="nav-item nav-link">Liên Hệ</a>

            </div>
            <div class="d-none d-lg-flex ms-2">
                <!-- <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a> -->
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="/cart">
                    <small> <?php
                            if (isset($_SESSION['loggedID'])) {
                                echo ($_SESSION['countCart']['count']);
                            }
                            ?> <i class="fa fa-shopping-bag text-body"></i></small>
                </a>


                <?php
                if (!empty($_SESSION['loggedID'])) {
                ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa fa-user"></span> <?= $_SESSION['loggedUserName'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/account/logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <!-- <span class="btn-sm-square bg-white rounded-circle ms-3">
                        <small class="fa fa-user text-body"><?= $_SESSION['loggedUserName'] ?></small>
                    </span> -->
                <?php
                } else {
                ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="/account">
                        <small class="fa fa-user text-body"></small>
                    </a>
                <?php
                } ?>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->