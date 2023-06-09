<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">


    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- OwlCarousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

</head>

<body>
    <?php
    $this->render('template/header')
    ?>
    <!-- Content here -->
    <div>
        <?php
        $this->render($content, $sub_content)
        ?>
    </div>
    <?php
    $this->render('template/footer')
    ?>

    <!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/wow/wow.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/easing/easing.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <script>
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