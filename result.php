<?php
session_start();
include('./connect/connect.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <?php include('./component/link.php') ?>

</head>

<body style="background-image: url('./img/background10.jpg');
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
    <div class="page">
        <div class="container-fluid result" style="max-width: 1000px;">
            <div style="margin:80px 0px">
                <h1 style="font-weight:700;color:white" align="left">รายงานผลการเลือกตั้งประธานคณะสี </h1>
                <h5 style="color:white">ปีการศึกษา 2563</h5>
                <hr>
                <div class="row">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {

                    ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="box">
                                <div style="background:
                                <?php
                                if ($i == '1') {
                                    echo "#ffc107";
                                } else if ($i == '2') {
                                    echo "#dc3545";
                                } else if ($i == '3') {
                                    echo "#198754";
                                } else if ($i == '4') {
                                    echo "#7952b3";
                                } else if ($i == '5') {
                                    echo "#0d6efd";
                                }
                                ?>;border-radius:20px 20px 0px 0px">
                                    <h5 class="pt-3" style="color: white" align="center">

                                        ประธานคณะสี<?php
                                                    if ($i == '1') {
                                                        echo "เทอดจรรยา (สีเหลือง)";
                                                    } else if ($i == '2') {
                                                        echo "สามัคคี (สีแดง)";
                                                    } else if ($i == '3') {
                                                        echo "ศรีวัฒนา (สีเขียว)";
                                                    } else if ($i == '4') {
                                                        echo "การุณรักษ์ (สีม่วง)";
                                                    } else if ($i == '5') {
                                                        echo "ภักดิ์พิรีย์ (สีฟ้า)";
                                                    }
                                                    ?>
                                    </h5>
                                    <hr>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        $sql = "SELECT * FROM candidate WHERE c_color = '$i' ORDER BY c_point DESC";
                                        $query = mysqli_query($conn, $sql);
                                        $j = 0;
                                        while ($row = mysqli_fetch_array($query)) {
                                            $j++;

                                        ?>
                                            <?php
                                            if ($j == 1) {
                                            ?>

                                                <img src="./img/<?php echo $i . "-" . $row['c_number'] ?>.png" style="border-radius:10px" class="img-fluid" alt="">

                                            <?php } else {
                                            } ?>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xl-12">
                    <div class="box">
                        <div style="background:#d91b5c;border-radius:20px 20px 0px 0px">
                            <h5 class="p-3" style="color: white" align="center">ภาพรวมการเลือกตั้งประธานคณะสี</h5>
                        </div>
                        <div class="container-fluid pt-4" style="max-width: 900px">
                            <h5><i class="fas fa-clipboard-list" style="color:#d91b5c"></i>&nbsp;
                                จำนวนนักเรียนที่มีสิทธิ์โหวต
                                <?php
                                $sql = "SELECT s_id FROM student WHERE s_pass = '0' ";
                                $query = mysqli_query($conn, $sql);

                                echo mysqli_num_rows($query);
                                ?>

                                คน
                            </h5>
                            <h5 class="pb-4"><i class="fas fa-clipboard-list" style="color:#d91b5c"></i>&nbsp;
                                มีนักเรียนที่โหวตแล้ว

                                <?php
                                $sql = "SELECT s_id FROM student WHERE s_pass = '1' ";
                                $query = mysqli_query($conn, $sql);


                                $sql1 = "SELECT s_id FROM student ";
                                $query1 = mysqli_query($conn, $sql1);

                                $percent = (mysqli_num_rows($query) / mysqli_num_rows($query1)) * 100;

                                echo mysqli_num_rows($query);
                                ?>

                                คน &nbsp;
                                <span style="color:#d91b5c">
                                    คิดเป็นร้อยละ <?php echo round($percent, 2) ?>
                                </span>

                            </h5>
                            <p align="center">แผนภูมิแท่งแสดงจำนวนการลงคะแนนของแต่ละห้อง</p>
                            <?php
                        $query22 = "SELECT s_level, count(*) as s_pass FROM student WHERE s_pass = '1' GROUP BY s_level";
                        $result22 = mysqli_query($conn, $query22);
                        ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                                        echo "['ชั้นมัธยมศึกษาปีที่ " . $row22["s_level"] . "', " . $row22["s_pass"] . " ],";
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
                        <div id="chart_div" class=""></div>
                        <?php 
                              $date =  date("d/m/Y");
                              $time = date("H.i");
                        ?>
                        <h5 class="mt-3"><i class="fas fa-clock" style="color:#d91b5c"></i> &nbsp;ข้อมูลอัพเดทเมื่อ <?php echo $date ?> เวลา <?php echo $time ?> น.</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('./component/linkjs.php') ?>


</body>

</html>