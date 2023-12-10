<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <?php

                            $sql = "SELECT danhmuc.name,SUM(luotxem) 'luotxem' FROM sanpham JOIN danhmuc ON sanpham.iddm=danhmuc.id GROUP BY sanpham.iddm;";
                            $luotxem = pdo_query($sql);
                            ?>
                            <h4 class="header-title mt-0 mb-4">Lượt xem</h4>
                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <div id="donut_single" style="width:200px;"></div>
                                    <script type="text/javascript">
                                        google.charts.load('current', {
                                            'packages': ['corechart']
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Effort', 'Amount given'],
                                                <?php
                                                $tonglx = 0;
                                                foreach ($luotxem as $key => $value) {
                                                    $tonglx += $value['luotxem'];
                                                ?>['<?= $value['name'] ?>', <?= $value['luotxem'] ?>],
                                                <?php
                                                }
                                                ?>
                                            ]);

                                            var options = {
                                                pieHole: 0.5,
                                                pieSliceTextStyle: {
                                                    color: 'black',
                                                },
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1" style="width: 200px;"> <?= $tonglx ?> </h2>
                                    <p class="text-muted mb-1">Tổng lượt xem</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <?php

                            $sql = "SELECT danhmuc.name,SUM(luotban) 'luotban' FROM sanpham JOIN danhmuc ON sanpham.iddm=danhmuc.id JOIN bienthe ON bienthe.idsp=sanpham.id GROUP BY sanpham.iddm;";
                            $luotban = pdo_query($sql);
                            ?>
                            <h4 class="header-title mt-0 mb-4">Lượt bán</h4>
                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <div id="donut_single2" style="width:200px;"></div>
                                    <script type="text/javascript">
                                        google.charts.load('current', {
                                            'packages': ['corechart']
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {

                                            var data = google.visualization.arrayToDataTable([
                                                ['Effort', 'Amount given'],
                                                <?php
                                                $tonglb = 0;
                                                foreach ($luotban as $key => $value) {
                                                    $tonglb += $value['luotban'];
                                                ?>['<?= $value['name'] ?>', <?= $value['luotban'] ?>],
                                                <?php
                                                }
                                                ?>
                                            ]);

                                            var options = {
                                                pieHole: 0.5,
                                                pieSliceTextStyle: {
                                                    color: 'black',
                                                },
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('donut_single2'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1" style="width: 200px;"> <?= $tonglb ?></h2>
                                    <p class="text-muted mb-1">Tổng lượt bán</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <?php

                            $sql = "SELECT danhmuc.name,COUNT(binhluan.id) 'binhluan' FROM `binhluan` JOIN sanpham ON sanpham.id= binhluan.idsp JOIN danhmuc ON danhmuc.id=sanpham.iddm GROUP BY sanpham.iddm";
                            $binhluan = pdo_query($sql);
                            ?>
                            <h4 class="header-title mt-0 mb-4">Bình luận</h4>
                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <div id="donut_single3" style="width:200px;"></div>
                                    <script type="text/javascript">
                                        google.charts.load('current', {
                                            'packages': ['corechart']
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {

                                            var data = google.visualization.arrayToDataTable([
                                                ['Effort', 'Amount given'],
                                                <?php $tongbl = 0;
                                                foreach ($binhluan as $key => $value) {
                                                    $tongbl += $value['binhluan']; ?>['<?= $value['name'] ?>', <?= $value['binhluan'] ?>],
                                                <?php
                                                }
                                                ?>
                                            ]);

                                            var options = {
                                                pieHole: 0.5,
                                                pieSliceTextStyle: {
                                                    color: 'black',
                                                },
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('donut_single3'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1" style="width: 200px;"> <?= $tongbl ?> </h2>
                                    <p class="text-muted mb-1">Tổng bình luận</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <?php

                            $sql = "SELECT danhmuc.name,COUNT(danhgia.id)'danhgia' FROM `danhgia` JOIN bienthe ON danhgia.idbienthe=bienthe.id JOIN sanpham ON sanpham.id=bienthe.idsp JOIN danhmuc ON danhmuc.id=sanpham.iddm GROUP BY sanpham.iddm;";
                            $danhgia = pdo_query($sql);
                            ?>
                            <h4 class="header-title mt-0 mb-4"> Đánh giá</h4>
                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <div id="donut_single4" style="width:200px;"></div>
                                    <script type="text/javascript">
                                        google.charts.load('current', {
                                            'packages': ['corechart']
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Effort', 'Amount given'],
                                                <?php $tongdg = 0;
                                                foreach ($danhgia as $key => $value) {
                                                    $tongdg += $value['danhgia'];  ?>['<?= $value['name'] ?>', <?= $value['danhgia'] ?>],
                                                <?php
                                                }
                                                ?>
                                            ]);

                                            var options = {
                                                pieHole: 0.5,
                                                pieSliceTextStyle: {
                                                    color: 'black',
                                                },
                                                legend: 'none'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('donut_single4'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1" style="width: 200px;"><?= $tongdg ?> </h2>
                                    <p class="text-muted mb-1">Tổng đánh giá</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->


            </div>
            <!-- end row -->
      
            <div class="doanhthu" style="background-color: white; margin:20px 0px; padding: 50px;">
            <?php
            // $time='month';

            $sql = "
SELECT 
            month_list.day 'time',
            COALESCE(SUM(chitietdh.thanhtien), 0) AS tongtien
        FROM 
            (
                SELECT '01' AS day
                UNION SELECT '02'
                UNION SELECT '03'
                UNION SELECT '04'
                UNION SELECT '05'
                UNION SELECT '06'
                UNION SELECT '07'
                UNION SELECT '08'
                UNION SELECT '09'
                UNION SELECT '10'
                UNION SELECT '11'
                UNION SELECT '12'
                UNION SELECT '13'
                UNION SELECT '14'
                UNION SELECT '15'
                UNION SELECT '16'
                UNION SELECT '17'
                UNION SELECT '18'
                UNION SELECT '19'
                UNION SELECT '20'
                UNION SELECT '21'
                UNION SELECT '22'
                UNION SELECT '23'
                UNION SELECT '24'
                UNION SELECT '25'
                UNION SELECT '26'
                UNION SELECT '27'
                UNION SELECT '28'
                UNION SELECT '29'
                UNION SELECT '30'
                UNION SELECT '31'
            ) AS month_list
        LEFT JOIN 
            chitietdh ON DAY(chitietdh.date) = month_list.day
                  AND MONTH(chitietdh.date) = MONTH(CURRENT_DATE())
        GROUP BY 
            month_list.day
        ORDER BY 
            month_list.day;
"



            ?>

                <select class="form-select" aria-label="Default select example" onchange="doibd(this.value)">
                    <option value="1">Thống kê theo ngày</option>
                    <option value="2">Thống kê theo tháng</option>
                </select>

                <div id="option1Content" class="option1-content">

                </div>

                <script>
                    function doibd(mabd) {
                        $.post("ajax/bieudo.php", {
                            mabd: mabd,
                        }, function(data) {
                            $("#line_top_x").html(data);
                        });
                    }
                </script>
                <div id="line_top_x" style="width: 50%;"></div>

                <?php
                $bieudo = pdo_query($sql);

                ?>
                <script>
                    google.charts.load('current', {
                        'packages': ['line']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = new google.visualization.DataTable();
                        data.addColumn('number', '');
                        data.addColumn('number', 'Doanh thu');
                        data.addRows([
                            <?php
                            foreach ($bieudo as $key => $value) {
                            ?>[<?= $value['time'] ?>, <?= $value['tongtien'] ?>],

                            <?php
                            }
                            ?>

                        ]);

                        var options = {
                            chart: {
                                title: 'Biểu đồ thể hiện doanh thu theo Ngày',
                                subtitle: 'Biểu đồ dười đây thể hiện doanh thu theo ngày với đơn vị VND'
                            },
                            width: 900,
                            height: 500,
                            axes: {
                                x: {
                                    0: {
                                        side: 'top'
                                    }
                                }
                            }
                        };

                        var chart = new google.charts.Line(document.getElementById('line_top_x'));

                        chart.draw(data, google.charts.Line.convertOptions(options));
                    }
                </script>
            </div>
            <table class="table table-bordered" style="background-color: white;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>


            <div class="row">
                <div class="col-xl-4">
                    <div class="card" style="height: 420px;">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0">Daily Sales</h4>


                            <div class="widget-chart text-center">
                                <div id="donutchart5" style="height: 355px; width: 300px;;"></div>
                                <script type="text/javascript">
                                    google.charts.load("current", {
                                        packages: ["corechart"]
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Task', 'Hours per Day'],
                                            ['Work', 11],
                                            ['Eat', 2],
                                            ['Commute', 2],
                                            ['Watch TV', 2],
                                            ['Sleep', 7]
                                        ]);

                                        var options = {
                                            pieHole: 0.3,
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById('donutchart5'));
                                        chart.draw(data, options);
                                    }
                                </script>


                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card" style="height: 420px; width: 720px;">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>
                            <h4 class="header-title mt-0">Statistics</h4>
                            <div id="chart_div" style="height: 360px; width: 680px;"></div>

                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawVisualization);

                                function drawVisualization() {
                                    // Some raw data (not necessarily accurate)
                                    var data = google.visualization.arrayToDataTable([
                                        ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
                                        ['2004/05', 165, 938, 522, 998, 450, 614.6],
                                        ['2005/06', 135, 1120, 599, 1268, 288, 682],
                                        ['2006/07', 157, 1167, 587, 807, 397, 623],
                                        ['2007/08', 139, 1110, 615, 968, 215, 609.4],
                                        ['2008/09', 136, 691, 629, 1026, 366, 569.6]
                                    ]);

                                    var options = {
                                        title: 'Monthly Coffee Production by Country',
                                        vAxis: {
                                            title: 'Cups'
                                        },
                                        hAxis: {
                                            title: 'Month'
                                        },
                                        seriesType: 'bars',
                                        series: {
                                            5: {
                                                type: 'line'
                                            }
                                        }
                                    };

                                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>
                        </div>
                    </div>
                </div><!-- end col -->



                <div class="row" style="width: 100%;">
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="width: 500px;">
                            <div class="card-body widget-user">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-lg me-3">
                                        <img src="assets/images/users/admin.jpg" class="img-fluid rounded-circle" alt="user">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="mt-0 mb-1">Nguyễn Quốc Tình</h5>
                                        <p class="text-muted mb-2 font-13 text-truncate">nguyentinh140321@gmail.com</p>
                                        <small class="text-warning"><b>Nhóm trưởng</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="width: 500px; margin-left: 300px;">

                            <div class="card-body widget-user">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar-lg me-3">
                                        <img src="assets/images/users/duong.jpg" class="img-fluid rounded-circle" alt="user">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="mt-0 mb-1">HOÀNG VĂN DƯƠNG</h5>
                                        <p class="text-muted mb-2 font-13 text-truncate">hoangvanduong@gmail.com</p>
                                        <small class="text-warning"><b>Thành viên</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->


                </div>
                <!-- end row -->


            </div> <!-- container-fluid -->

        </div> <!-- content -->