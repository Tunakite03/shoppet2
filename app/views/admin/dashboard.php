<div class="container-fluid">
    <?php
    $data_chart = $data_chart->fetchAll();
    ?>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Tổng quan bán hàng</h5>
                        </div>
                        <form action="/admin" method="get">
                            <div class="d-sm-flex gap-4 d-block align-items-center justify-content-around mb-9 py-4">
                                <div class="w-25">
                                    <h5>Duyệt theo: </h5>
                                </div>
                                <div class="w-75">
                                    <select class="form-select" id="interval-select" name="select_con">
                                        <option value="day" <?= (isset($_GET['select_con'])  && $_GET['select_con'] == 'day') ? "selected" : "" ?>>Ngày</option>
                                        <option value="month" <?= (isset($_GET['select_con']) && $_GET['select_con'] == 'month') ? "selected" : "" ?>>Tháng</option>
                                        <option value="year" <?php if (!isset($_GET['select_con']) || $_GET['select_con'] == 'year') {
                                                                    echo  "selected";
                                                                } else echo ""; ?>>Năm</option>
                                    </select>
                                </div>
                                <div class="w-75">
                                    <input class="form-control month-input" type="year" id="sales-date" required name="data" value="<?php if (isset($_GET['data'])) echo  $_GET['data'] ?> ">
                                </div>
                                <div class="w-25">
                                    <button class="btn btn-light-primary" name="submitChart" type="submit">Thống kê</button>
                                </div>
                            </div>
                        </form>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">$36,358</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2023</span>
                                        </div>
                                        <div>
                                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                            <span class="fs-2">2023</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                    <h4 class="fw-semibold mb-3">$6,820</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">$650 <span class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">$150 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?php echo _WEB_ROOT ?>/public/assets/admin/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">$285 <span class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var intervalSelect = document.querySelector('#interval-select');
    var salesDateInput = document.querySelector('#sales-date');

    dselect(intervalSelect, {
        search: true,
        maxHeight: '200px'
    });

    // Set initial values
    intervalSelect.value = 'year';
    var currentDate = new Date();

    intervalSelect.addEventListener('change', function() {
        var selectedValue = intervalSelect.value;

        if (selectedValue === 'day') {
            salesDateInput.type = 'date';
            salesDateInput.type = 'date';
            salesDateInput.value = new Date().toISOString().substr(0, 10);
        } else if (selectedValue === 'year') {
            salesDateInput.setAttribute('min', '2000');
            salesDateInput.setAttribute('max', '2099');
            salesDateInput.value = currentDate.getFullYear().toString();
            salesDateInput.type = 'number';
        } else {
            salesDateInput.type = 'month';
        }
    });

    $(function() {
        var data;
        data = <?= json_encode($data_chart) ?>;
        var number_sell = [];
        var name_product = [];
        data.forEach(sub => {
            number_sell.push(parseInt(sub.number_sell_product));
            name_product.push(sub.product_name);
        });
        var total = number_sell.reduce((acc, val) => acc + val, 0);
        var chartOptions = {
            color: "#adb5bd",
            series: number_sell,
            labels: name_product,
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: "15px",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    fontWeight: "bold",
                    colors: ["#fff"],
                },
            },
            chart: {
                type: "pie",
                fontFamily: "Plus Jakarta Sans', sans-serif",
                foreColor: "#adb0bb",
                toolbar: {
                    show: true,
                    tools: {
                        download: true,
                    },
                    download: {
                        csv: {
                            filename: 'data.csv',
                            columnDelimiter: ',',
                            headerCategory: 'Product Name',
                            headerValue: 'Number Sold'
                        },
                    },
                },
            },

            tooltip: {
                theme: "dark",
                fillSeriesColor: true,
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), chartOptions);
        chart.render();



        // =====================================
        // Breakup
        // =====================================
        var breakup = {
            color: "#adb5bd",
            series: [38, 40, 25],
            labels: ["2022", "2021", "2020"],
            chart: {
                width: 180,
                type: "donut",
                fontFamily: "Plus Jakarta Sans', sans-serif",
                foreColor: "#adb0bb",
            },
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    donut: {
                        size: '75%',
                    },
                },
            },
            stroke: {
                show: false,
            },

            dataLabels: {
                enabled: false,
            },

            legend: {
                show: false,
            },
            colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

            responsive: [{
                breakpoint: 991,
                options: {
                    chart: {
                        width: 150,
                    },
                },
            }, ],
            tooltip: {
                theme: "dark",
                fillSeriesColor: false,
            },
        };

        var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
        chart.render();

        // =====================================
        // Earning
        // =====================================
        var earning = {
            chart: {
                id: "sparkline3",
                type: "area",
                height: 60,
                sparkline: {
                    enabled: true,
                },
                group: "sparklines",
                fontFamily: "Plus Jakarta Sans', sans-serif",
                foreColor: "#adb0bb",
            },
            series: [{
                name: "Earnings",
                color: "#49BEFF",
                data: [25, 66, 20, 40, 12, 58, 20],
            }, ],
            stroke: {
                curve: "smooth",
                width: 2,
            },
            fill: {
                colors: ["#f3feff"],
                type: "solid",
                opacity: 0.05,
            },

            markers: {
                size: 0,
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: true,
                    position: "right",
                },
                x: {
                    show: false,
                },
            },
        };
        new ApexCharts(document.querySelector("#earning"), earning).render();
    })
</script>