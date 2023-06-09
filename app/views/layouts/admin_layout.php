<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo _WEB_ROOT ?>/public/assets/img/logos/faviconAdmin.png" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/dselect.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/udvxoabzgnph4592lfkgld10g2tnk8sq4re5btpht9c54o2g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/jquery/dist/jquery.min.js"></script>
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?php
        if (!(strtolower($_SERVER['PATH_INFO']) == "/adminlogin")) {
            $this->render('template/navbarside');
        }
        ?>

        <?php
        if (!(strtolower($_SERVER['PATH_INFO']) == "/adminlogin")) {
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
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/app.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/libs/simplebar/dist/simplebar.js"></script>
    <!-- <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/dashboard.js"></script> -->



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_products').DataTable();
        });
        $(document).ready(function() {
            if ($("#province").length) {
                const host = "https://provinces.open-api.vn/api/";
                var callAPI = (api) => {
                    return $.ajax({
                        url: api,
                        method: "GET",
                        dataType: "json"
                    }).done(function(response) {
                        renderData(response, "province");
                        callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
                    });
                };
                callAPI("https://provinces.open-api.vn/api/?depth=1");
                var callApiDistrict = (api) => {
                    $("#province-is").val(
                        $(`#province option[value="${$("#province").val()}"]`).data("name")
                    );
                    return $.ajax({
                        url: api,
                        method: "GET",
                        dataType: "json"
                    }).done(function(response) {
                        renderData(response.districts, "district");
                        callApiWard(host + "d/" + $("#district").val() + "?depth=2");
                    });
                };
                var callApiWard = (api) => {
                    $("#district-is").val(
                        $(`#district option[value="${$("#district").val()}"]`).data("name")
                    );
                    return $.ajax({
                        url: api,
                        method: "GET",
                        dataType: "json"
                    }).done(function(response) {
                        renderData(response.wards, "ward");
                        $("#ward-is").val(
                            $(`#ward option[value="${$("#ward").val()}"]`).data("name")
                        );
                    });
                };

                var renderData = (array, select) => {
                    let row = "";
                    const postition = JSON.parse(localStorage.getItem("address"));
                    array.forEach((element, index) => {
                        if (postition) {
                            row += `<option value="${element.code}" ${
            postition[select] && postition[select] == element.name ? "selected" : null
          } data-name="${element.name}">${element.name}</option>`;
                        } else {
                            row += `<option value="${element.code}" data-name="${element.name}">${element.name}</option>`;
                        }
                    });
                    $("#" + select).html(row);
                };


                $("#province").change(function() {
                    callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
                });
                $("#district").change(function() {
                    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
                });
                $("#ward").change(function() {
                    $("#ward-is").val($(`#ward option[value="${$("#ward").val()}"]`).data("name"));
                });
            }

        });
    </script>

</body>

</html>