<?php
session_start();
include('./connect/connect.php');



if (!isset($_SESSION['s_username'])) {
    header('location: ./index.php');
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
            <div style="margin: 80px 60px 0px 60px">
                <h1 style="font-weight:700;color:white" align="left">คะแนนสูงสุดแต่ละคณะสี</h1>
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
                                        
                                      คณะสี<?php
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
                                                if($j == 1){
                                            ?>
                                           
                                                <img src="./img/<?php echo $i . "-" . $row['c_number'] ?>.png" style="border-radius:10px" class="img-fluid" alt="">

                                                <?php }else{} ?>
                                       
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include('./component/linkjs.php') ?>

</body>

</html>