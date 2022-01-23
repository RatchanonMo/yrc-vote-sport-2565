<?php
session_start();
include('./connect/connect.php');

if (!isset($_SESSION['username'])) {
    header('location: ./index.php');
}

$check5 = "SELECT * FROM users WHERE id = " . $_SESSION['id'];
$m5 = mysqli_query($conn, $check5);

if (mysqli_num_rows($m5) == 1) {
    $num = mysqli_fetch_array($m5);
    $point = $num['point'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <?php include('./component/link.php') ?>

</head>

<body>
    <?php include('./component/sidebar.php') ?>
    <div class="page">
        <div class="page__wrapper">
            <?php include('./component/header.php') ?>
            <div style="margin: 80px 60px 60px 60px">
                <h1 style="font-weight:700;color:white" align="left">ภาพรวมการเลือก</h1>



                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



                <div class="container pt-5 pb-5" style="background: white;border-radius:10px;margin-top:30px;padding:0rem 3rem 0rem 3rem;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">


                <div class="d-none d-md-block d-lg-block d-xl-block d-xxl-block">
                    <h5> 
                        จำนวนนักเรียนที่มีสิทธิ์โหวต
                        <?php
                        $sql = "SELECT id FROM users WHERE point = '1' ";
                        $query = mysqli_query($conn, $sql);

                        echo mysqli_num_rows($query);
                        ?>

                        คน
                    </h5>
                    <h5 class="pb-4"> 
                        มีนักเรียนที่โหวตแล้ว

                        <?php
                        $sql = "SELECT id FROM users WHERE point = '0' ";
                        $query = mysqli_query($conn, $sql);


                        $sql1 = "SELECT id FROM users ";
                        $query1 = mysqli_query($conn, $sql1);

                        $percent = (mysqli_num_rows($query) / mysqli_num_rows($query1)) * 100;

                        echo mysqli_num_rows($query);
                        ?>

                        คน &nbsp;
                        <span style="color:#d91b5c">
                            คิดเป็นร้อยละ <?php echo round($percent, 2) ?>
                        </span>

                    </h5>

                    <h5 align="center">แผนภูมิแท่งแสดงจำนวนการลงคะแนนของแต่ละห้อง</h5>
                    </div>

                    

                    <div class="d-md-none d-lg-none d-xl-none d-xxl-none">
                    <p> 
                        จำนวนนักเรียนที่มีสิทธิ์โหวต
                        <?php
                        $sql = "SELECT id FROM users WHERE point = '1' ";
                        $query = mysqli_query($conn, $sql);

                        echo mysqli_num_rows($query);
                        ?>

                        คน
                    </p>
                    <p class="pb-4"> 
                        มีนักเรียนที่โหวตแล้ว

                        <?php
                        $sql = "SELECT id FROM users WHERE point = '0' ";
                        $query = mysqli_query($conn, $sql);


                        $sql1 = "SELECT id FROM users ";
                        $query1 = mysqli_query($conn, $sql1);

                        $percent = (mysqli_num_rows($query) / mysqli_num_rows($query1)) * 100;

                        echo mysqli_num_rows($query);
                        ?>

                        คน &nbsp;
                        <span style="color:#d91b5c">
                            คิดเป็นร้อยละ <?php echo round($percent, 2) ?>
                        </span>

                    </p>

                    <p align="center">แผนภูมิแท่งแสดงจำนวนการลงคะแนนของแต่ละห้อง</p>
                    </div>

                    <div id="chart_div" class=""></div>



                </div>




            </div>
        </div>
    </div>
    </div>

    <?php
    $query22 = "SELECT room, count(*) as point FROM users WHERE point = '0' GROUP BY room ORDER BY room ASC";
    $result22 = mysqli_query($conn, $query22);
    ?>


    <?php include('./component/linkjs.php') ?>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'จำนวนผู้โหวต');
            data.addColumn('number', 'จำนวนผู้โหวต');




            data.addRows([
                <?php
                while ($row22 = mysqli_fetch_array($result22)) {
                    echo "['ม.1/" . $row22["room"] . "', " . $row22["point"] . " ],";
                }
                ?>

            ]);

            var options = {

                hAxis: {
                    title: 'นักเรียนที่มาโหวต',
                    fontSize: 100,
                },

            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('chart_div'));

            chart.draw(data, options);
        }

        $(window).resize(function() {
            drawBasic();

        });
    </script>
</body>

</html>