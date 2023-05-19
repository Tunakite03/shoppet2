<div class="container-fluid">
    <?php
    if (!empty($data_chart)) {
        $data_chart = $data_chart->fetchAll();
    }
    if (!empty($data_circle_chart)) {
        $data_circle_chart = $data_circle_chart->fetchAll();
    }

    $selected = isset($_GET['select_con']) ? $_GET['select_con'] : 'year';
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
                                        <option value="date" <?php if ($selected === 'date') echo 'selected'; ?>>Ngày</option>
                                        <option value="month" <?php if ($selected === 'month') echo 'selected'; ?>>Tháng</option>
                                        <option value="year" <?php if ($selected === 'year') echo 'selected'; ?>>Năm</option>
                                    </select>
                                </div>
                                <div class="w-75">
                                    <input class="form-control month-input" type="<?= isset($_GET['select_con']) ?  $_GET['select_con'] : 'year' ?>" id="sales-date" required name="data" value="<?php if (isset($_GET['data'])) echo  $_GET['data'] ?>">
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
                            <h5 class="card-title mb-9 fw-semibold">Earning Yearly</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3" id="earning-year"></h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-success"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0" id="profit"></p>
                                        <p class="fs-3 mb-0">last year</p>
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
            </div>
        </div>
    </div>
    <div class="row">
        <h4 class="card-title mb-9 fw-semibold">Best Sale</h4>
        <?php
        if (!empty($data_products_best_sale)) {
            $data_products_best_sale = $data_products_best_sale->fetchAll();
            foreach ($data_products_best_sale as $key => $value) {
        ?>
                <div class="col-sm-6 col-xl-3 col-12">
                    <div class="card overflow-hidden rounded-2">
                        <div class="position-relative">
                            <a href="javascript:void(0)"><img src="<?php echo _WEB_ROOT ?>/public/assets/img/img_pet/<?= $value['image'] ?>" class="card-img-top rounded-0" alt="..."></a>
                        </div>
                        <div class="card-body pt-3 p-4">
                            <h6 class="fw-semibold fs-4"><?= $value['name'] ?></h6>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold fs-4 mb-0"><?= number_format($value['price'], 0, ',', '.') ?> ₫<span class="ms-2 fw-normal text-muted fs-3"><del><?= number_format($value['sale'], 0, ',', '.') ?> ₫</del></span></h6>
                                <ul class="list-unstyled d-flex align-items-center mb-0">
                                    <li>Số lượng bán: <?= $value['number_sell'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <?php      }
        }
        ?>
    </div>
</div>
<script>
    var intervalSelect = document.querySelector('#interval-select');
    var salesDateInput = document.querySelector('#sales-date');

    dselect(intervalSelect, {
        search: true,
        maxHeight: '200px'
    });

    intervalSelect.addEventListener('change', function() {
        var selectedValue = intervalSelect.value;
        if (selectedValue === 'date') {
            salesDateInput.type = 'date';
        } else if (selectedValue === 'year') {
            salesDateInput.setAttribute('min', '2000');
            salesDateInput.setAttribute('max', '2099');
            salesDateInput.type = 'number';
        } else {
            salesDateInput.type = 'month';
        }
    });

    $(function() {
        var data = <?= json_encode($data_chart) ?>;
        if (data === null || data.length === 0) {
            document.querySelector("#chart").textContent = "Không có dữ liệu";
        } else {
            var number_sell = [];
            var name_product = [];
            data.forEach(sub => {
                number_sell.push(parseInt(sub.number_sell_product));
                name_product.push(sub.product_name);
            });
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
        }



        // =====================================
        // earning
        // =====================================
        var data_circle_chart = <?= json_encode($data_circle_chart) ?>;
        if (data_circle_chart === null || data_circle_chart.length === 0) {
            document.querySelector("#breakup").textContent = "Không có dữ liệu";
        } else {
            var earning_year = [];
            var year = [];
            data_circle_chart.forEach(sub => {
                earning_year.push(parseInt(sub.earning));
                year.push(sub.year);
            });
            var earningYear = earning_year[earning_year.length - 1];
            var formattedEarningYear = new Intl.NumberFormat("vi-VN", {
                style: "currency",
                currency: "VND"
            }).format(earningYear);
            $("#earning-year").text(formattedEarningYear);

            if (earning_year.length > 1) {
                var compare = earning_year[earning_year.length - 1] - earning_year[earning_year.length - 2];
                var percent = (compare !== 0) ? (compare / Math.abs(earning_year[earning_year.length - 2])) * 100 : 0;
                percent = parseFloat(percent.toFixed(2)) + "%"; // Round to 2 decimal places
                $("#profit").text(percent);

            }

            var earning = {
                color: "#adb5bd",
                series: earning_year,
                labels: year,
                chart: {
                    width: 200,
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

            var chart = new ApexCharts(document.querySelector("#breakup"), earning);
            chart.render();
        }

   

    })
</script>