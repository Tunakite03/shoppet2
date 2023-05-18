<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Error Page</title>
    <!-- Bootstrap Core CSS -->
    <!-- Custom CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Plus Jakarta Sans", sans-serif;
            ;
        }

        .error-box {
            height: 100%;
            position: fixed;
            width: 100%
        }

        .error-box .footer {
            width: 100%;
            left: 0px;
            right: 0px
        }

        .error-body {
            padding-top: 5%
        }

        .error-body h1 {
            font-size: 210px;
            font-weight: 900;
            line-height: 210px
        }

        .btn-pri {
            --bs-btn-color: #fff;
            --bs-btn-bg: #539BFF;
            --bs-btn-border-color: #539BFF;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #4784d9;
            --bs-btn-hover-border-color: #427ccc;
            --bs-btn-focus-shadow-rgb: 109, 170, 255;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #427ccc;
            --bs-btn-active-border-color: #3e74bf;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #539BFF;
            --bs-btn-disabled-border-color: #539BFF
        }
    </style>
</head>

<body class="fix-header card-no-border">
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>403</h1>
                <h3 class="text-uppercase">Bạn không có quyền truy cập vào trang này</h3>
                <p class="text-muted m-t-30 m-b-30">Quay lại trang trước đó nhé</p>
                <a href="#" onclick="window.history.back()" class="btn btn-pri btn-rounded waves-effect waves-light m-b-40">Quay lại trang trước</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>