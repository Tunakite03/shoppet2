<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo _WEB_ROOT ?>/public/assets/img/logos/faviconAdmin.png" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/styles.min.css" />
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?php
        if (!($_SERVER['PATH_INFO'] == "/admin/login")) {
            $this->render('template/navbarside');
        }
        ?>

        <?php
        if (!($_SERVER['PATH_INFO'] == "/admin/login")) {
        ?>
            <!--  Main wrapper -->
            <div class="body-wrapper">
                <?php
                $this->render('template/headerAdmin');
                ?>
                <!-- Content -->
                <?php
                $this->render($content, $sub_content);
                ?>
                <!-- Content end -->
            </div>
            <!-- Main End -->
        <?php
        } else {
            $this->render($content, $sub_content);
        }
        ?>


    </div>
    <!-- Body End -->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/app.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/dashboard.js"></script>
    <script>
        // 
    </script>
</body>

</html>