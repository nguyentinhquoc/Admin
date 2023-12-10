<?php
include "../../model/pdo.php";

if ($_POST['mabd'] == 1) {
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
    ";
}
if ($_POST['mabd'] == 2) {
    $sql = "SELECT 
                month_list.month 'time',
                COALESCE(SUM(chitietdh.thanhtien), 0) AS tongtien
            FROM 
                (
                    SELECT '01' AS month
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
                ) AS month_list
            LEFT JOIN 
                chitietdh ON MONTH(chitietdh.date) = month_list.month
                      AND YEAR(chitietdh.date) = YEAR(CURRENT_DATE())
            GROUP BY 
                month_list.month
            ORDER BY 
                month_list.month;";
}
?>
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

           
                <?php
                if ($_POST['mabd'] == 1) { 
                    ?>
                    title: 'Biểu đồ thể hiện doanh thu theo Ngày',
                    subtitle: 'Biểu đồ dười đây thể hiện doanh thu theo ngày với đơn vị VND'
                <?php }
                if ($_POST['mabd'] == 2) { ?>
                    title: 'Biểu đồ thể hiện doanh thu theo Tháng',
                    subtitle: 'Biểu đồ dười đây thể hiện doanh thu theo tháng với đơn vị VND'
                <?php  }
                ?>
                <?php 
                if ($_POST['mabd'] == 3) { ?>
                    title: 'Biểu đồ thể hiện doanh thu theo Tháng',
                    subtitle: 'Biểu đồ dười đây thể hiện doanh thu theo tháng với đơn vị VND'
                <?php  }
                ?>

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