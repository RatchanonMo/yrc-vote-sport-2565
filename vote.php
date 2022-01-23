<?php
session_start();
include('./connect/connect.php');
include('./function.php');

if (!$_SESSION['s_username']) {
    header('location:index.php');
} else {
    $check5 = "SELECT * FROM student WHERE s_id = " . $_SESSION['s_id'];
    $m5 = mysqli_query($conn, $check5);

    if (mysqli_num_rows($m5) == 1) {
        $num = mysqli_fetch_array($m5);
        $s_pass = $num['s_pass'];
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

                    <h1 style="font-weight:700;color:white" align="left">ระบบเลือกตั้งประธานคณะสี</h1>
                    <p style="color: white;">โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่</p>

                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="box" style="padding-top:20px">
                                <div class="container">
                                    <h5 align="center" style="color:#d91b5c">ข้อมูลผู้มีสิทธิ์เลือกตั้ง</h5>
                                    <hr>
                                    <p>
                                    <i class="fas fa-user" style="color:#d91b5c"></i> &nbsp; ชื่อ : <?php echo $_SESSION['s_title'] . $_SESSION['s_name'] . " " . $_SESSION['s_surname'] ?>
                                    </p>
                                    <p>
                                    <i class="fas fa-chart-line" style="color:#d91b5c"></i> &nbsp;  ชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION['s_level'] . "/" . $_SESSION['s_room'] ?>
                                    </p>
                                    <p>
                                    <i class="fas fa-poll" style="color:#d91b5c"></i> &nbsp;  คณะสี : <?php colorstatus() ?>
                                    </p>
                                    <?php
                                    if ($s_pass < 1) {
                                    ?>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class="btn btn-danger " style="pointer-events: none;">ยังไม่ได้ลงคะแนน</a>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class="btn btn-success " style="pointer-events: none;">ลงคะแนนเรียบร้อยแล้ว</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <?php
                            if ($s_pass > 0) {
                            ?>
                               
                            <?php }else{ ?>
                                <div class="box">
                                    <div style="background:<?php color() ?>;border-radius:20px 20px 0px 0px">
                                        <h5 class="p-3" style="color: white" align="center">การแถลงนโยบายคณะสี<?php colorstatus(); ?></h5>
                                    </div>
                                    <div class="container">
                                        <div class="ratio ratio-16x9">
                                            <?php video(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <div class="box">
                                <div style="background:<?php color() ?>;border-radius:20px 20px 0px 0px">
                                    <h5 class="p-3" style="color:white" align="center">
                                        <?php
                                        if ($s_pass > 0) {
                                        ?>
                                            หมายเลขที่คุณลงคะแนน
                                        <?php } else { ?>
                                            รายละเอียดผู้สมัคร คณะสี<?php colorstatus(); ?>
                                        <?php } ?>
                                    </h5>
                                </div>
                                <div class="container">
                                    <?php
                                    if ($s_pass > 0) {
                                        $sql1 = "SELECT * FROM student WHERE s_id = " . $_SESSION['s_id'];
                                        $query1 = mysqli_query($conn, $sql1);
                                        $student = mysqli_fetch_array($query1);
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-4 "></div>
                                            <div class="col-xl-4 ">
                                                <img src="./img/<?php echo $_SESSION['s_color'] . "-" . $student['s_select'] ?>.png" class="img-fluid candidate_img" style="border-radius: 20px" alt="">
                                                <div class="d-grid gap-2 mt-2">
                                                    <a style="font-family: 'Kanit';pointer-events: none;" class="btn btn-<?php colorbtn() ?>">คุณได้ลงคะแนนเสียงเบอร์นี้</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 "></div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="row">
                                            <?php
                                            $sql = "SELECT * FROM candidate WHERE c_color = " . $_SESSION['s_color'];
                                            $query = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <div class="col-xl-4 col-md-4 col-sm-4 col-xs-6 mb-3">
                                                    <img src="./img/<?php echo $_SESSION['s_color'] . "-" . $row['c_number'] ?>.png" class="img-fluid candidate_img" style="border-radius: 20px;" alt="">
                                                    <div class="d-grid gap-2 mt-2">
                                                        <a style="font-family: 'Kanit';" class="btn btn-<?php colorbtn() ?>" data-bs-toggle="modal" data-bs-target="#vote<?php echo $row['c_id'] ?>">ลงคะแนน</a>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="vote<?php echo $row['c_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลงคะแนน</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                คุณต้องการลงคะแนนให้<strong> เบอร์ <?php echo $row['c_number'] . " " . $row['c_title'] . " " . $row['c_name'] . " " . $row['c_surname']  ?></strong> ใช่หรือไม่
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="./process/submit.php" method="post">
                                                                    <input type="text" name="c_id" value="<?php echo $row['c_id'] ?>" hidden>
                                                                    <input type="text" name="c_number" value="<?php echo $row['c_number'] ?>" hidden>
                                                                    <button style="font-family: 'Kanit';" type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                                    <input style="font-family: 'Kanit';" type="submit" name="submit" class="btn btn-<?php colorbtn() ?>" value="ตกลง">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php include('./component/linkjs.php') ?>
                <?php
                if (isset($_SESSION['success'])) {
                ?>
                    <script>
                        Swal.fire({
                            title: 'เสร็จสิ้น!',
                            text: 'คุณลงคะแนนเสียงเรียบร้อยแล้ว',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            confirmButtonColor: '#198754'
                        })
                    </script>
                <?php }
                unset($_SESSION['success']);
                ?>
    </body>

    </html>
<?php } ?>