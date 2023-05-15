<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png"
        href="<?php echo _WEB_ROOT ?>/public/assets/img/logos/faviconAdmin.png" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
</head>
<style>
    .newsadmin {
        word-wrap: break-word;
        white-space: normal;
        overflow: hidden;
        display: -webkit-box;
        text-overflow: ellipsis;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
</style>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/tableExport.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/data-table-active.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/data-table/bootstrap-table-export.js"></script> -->
    <!--  editable JS
        ============================================ -->
    <!-- <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/jquery.mockjax.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/mock-active.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/select2.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/moment.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/bootstrap-editable.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/editable/xediable-active.js"></script> -->



    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table_products').DataTable();
        });
    </script>
    <script>
        // 
    </script>
</body>

</html>