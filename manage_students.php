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

<body >
    <?php include('./component/sidebar.php') ?>
    <div class="page">
        <div class="page__wrapper">
            <?php include('./component/header.php') ?>
            <div style="margin: 80px 60px 60px 60px">
                <h1 style="font-weight:700;color:white" align="left">ระบบจัดการนักเรียน</h1>
                <a data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> เพิ่มนักเรียน</a>
                <div style="background: white;border-radius:10px;margin-top:30px;padding: 30px 30px 30px 30px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                <div class="table-scrollable">

                    <table class="table table-responsive pt-2 pb-2" id="example">
                        <thead>
                            <tr>

                                <th scope="col">ชื่อ-สกุล</th>
                                <th scope="col">ห้อง</th>
                                <th scope="col">หมายเลขที่เลือก</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">เวลา</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                                <th scope="col">ลบโหวต</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users WHERE level ='m'  ";
                            $query = mysqli_query($conn, $sql);



                            while ($user = mysqli_fetch_array($query)) {
                                $sql1 = "SELECT * FROM vote WHERE users_id = " . $user['id'];
                                $query1 = mysqli_query($conn, $sql1);
                                $vote = mysqli_fetch_array($query1);
                            ?>
                                <tr>

                                    <th><?php echo $user['name'] ?></th>

                                    <td>ระดับชั้นมัธยมศึกษาปีที่ 1 ห้อง <?php echo $user['room'] ?></td>
                                    <td>
                                        <?php
                                        if (mysqli_num_rows($query1) == 1) {
                                        ?>
                                            หมายเลข <?php echo $vote['candidates_number'] ?>

                                        <?php } else { ?>
                                            ยังไม่ได้ลงคะแนนเสียง
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (mysqli_num_rows($query1) == 1) {
                                        ?>
                                            <?php echo $vote['date'] ?>

                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (mysqli_num_rows($query1) == 1) {
                                        ?>
                                            <?php echo $vote['time'] ?> น.

                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a style="font-family:'Kanit'" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $user['id'] ?>"><i class="fas fa-pencil"></i> แก้ไข</a>

                                    </td>
                                    <td>
                                        <a style="font-family:'Kanit'" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $user['id'] ?>"><i class="fas fa-trash"></i> ลบ</a>

                                    </td>
                                    <td>
                                        <?php
                                        if (mysqli_num_rows($query1) == 1) {
                                        ?>
                                            <input style="font-family:'Kanit'" class="btn btn-danger" name="submit" type="submit" data-bs-toggle="modal" data-bs-target="#modal<?php echo $user['id'] ?>" value="ลบโหวต">


                                        <?php } else { ?>
                                            <input style="font-family:'Kanit'" class="btn btn-danger disabled" name="submit" type="submit" value="ลบโหวต">

                                        <?php } ?>


                                    </td>
                                </tr>

                                <div class=" modal fade" id="modal<?php echo $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color:black" class="modal-title" id="exampleModalLabel">ยืนยันการลบคะแนนเสียง</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <h5>คุณต้องการลบคะแนนเสียงของ <strong><?php echo $user['name'] ?></strong> ใช่หรือไม่</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="./process/delete_vote.php">
                                                    <input type="text" name="number" value="<?php echo $vote['candidates_number'] ?>" hidden>

                                                    <input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
                                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                                                    <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-primary" value="ตกลง"></input>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Edit candidate -->
                                <div class=" modal fade" id="edit<?php echo $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color:black" class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลนักเรียน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./process/edit_student.php" method="post">
                                                    <input name="id" type="text" value="<?php echo $user['id'] ?>" hidden>
                                                    <h5>ชื่อ-สกุล</h5>
                                                    <input class="form-control form-control-lg" style="font-family:'Kanit'" name="name" type="text" value="<?php echo $user['name'] ?>" required>
                                                    <h5 class="mt-3">ห้อง</h5>
                                                    <input class="form-control form-control-lg" name="room" type="number" min="1" max="14"  value="<?php echo $user['room'] ?>" required>
                                                    <h5 class="mt-3">เลขประจำตัวนักเรียน</h5>
                                                    <input class="form-control form-control-lg" name="username" type="text" value="<?php echo $user['username'] ?>" required>
                                                    <h5 class="mt-3">รหัสผ่าน</h5>
                                                    <input class="form-control form-control-lg" name="password" type="text" value="<?php echo $user['password'] ?>" required>
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                                                <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-warning" value="ตกลง"></input>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete candidate -->
                                <div class=" modal fade" id="delete<?php echo $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color:black" class="modal-title" id="exampleModalLabel">ยืนยันการลบนักเรียน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>คุณต้องการลบ <strong><?php echo $user['name'] ?></strong> ใช่หรือไม่</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="./process/delete_student.php">
                                                    <input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>

                                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                                                    <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-danger" value="ตกลง"></input>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add candidate -->
    <div class=" modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:black" class="modal-title" id="exampleModalLabel">เพิ่มผู้ลงสมัคร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./process/add_student.php" method="post">
                      
                        <h5>ชื่อ-สกุล</h5>
                        <input class="form-control form-control-lg" style="font-family:'Kanit'" name="name" type="text" required>
                        <h5 class="mt-3">ห้อง</h5>
                        <input class="form-control form-control-lg" name="room" type="number" min="1" max="14"  required>
                        <h5 class="mt-3">เลขประจำตัวนักเรียน</h5>
                        <input class="form-control form-control-lg" name="username" type="text"  required>
                        <h5 class="mt-3">รหัสผ่าน</h5>
                        <input class="form-control form-control-lg" name="password" type="text"  required>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                    <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-primary" value="ตกลง"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include('./component/linkjs.php') ?>
    <?php
    if (isset($_SESSION['success']) and $_SESSION['success'] == 'add') {
    ?>
        <script>
            Swal.fire({
                title: 'เสร็จสิ้น!',
                text: 'คุณเพิ่มนักเรียนเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#198754'
            })
        </script>
    <?php } else if (isset($_SESSION['success']) and $_SESSION['success'] == 'delete') {
    ?>
        <script>
            Swal.fire({
                title: 'เสร็จสิ้น!',
                text: 'คุณลบนักเรียนเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#198754'
            })
        </script>
    <?php } else if (isset($_SESSION['success']) and $_SESSION['success'] == 'edit') {

    ?>
        <script>
            Swal.fire({
                title: 'เสร็จสิ้น!',
                text: 'คุณแก้ไขข้อมูลนักเรียนเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#198754'
            })
        </script>

    <?php }
    unset($_SESSION['success']) ?>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>