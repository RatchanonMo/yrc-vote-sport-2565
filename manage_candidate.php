<?php
session_start();
include('./connect/connect.php');
include('./function.php');

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
            <div style="margin: 80px 60px 60px 60px">
                <h1 style="font-weight:700;color:white" align="left">ระบบจัดการผู้ลงสมัคร</h1>
                <a data-bs-toggle="modal" data-bs-target="#reset" class="btn btn-danger mt-4"><i class="fas fa-trash"></i> รีเซ็ตผลคะแนน</a>
                <div style="background: white;border-radius:10px;margin-top:30px;padding: 10px 30px 30px 30px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                    <div class="table-scrollable">
                        <table class="table table-responsive pb-2 " id="example">
                            <thead>
                                <tr>
                                    <th style="display:none" scope="col">id</th>
                                    <th scope="col">เบอร์</th>
                                    <th scope="col">ชื่อ-สกุล</th>
                                    <th scope="col">ชั้น</th>
                                    <th scope="col">คณะสี</th>
                                    <th scope="col">คะแนนที่ได้</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM candidate ORDER BY c_color ASC";
                                $query = mysqli_query($conn, $sql);



                                while ($cand = mysqli_fetch_array($query)) {


                                ?>
                                    <tr>
                                        <th style="display:none"><?php echo $cand['c_id'] ?></th>
                                        <th><?php echo $cand['c_number'] ?></th>
                                        <th><?php echo $cand['c_title'] . $cand['c_name'] . " " . $cand['c_surname'] ?></th>
                                        <td>

                                            ระดับชั้นมัธยมศึกษาปีที่ <?php echo $cand['c_level'] ?> ห้อง <?php echo $cand['c_room'] ?>


                                        </td>
                                        <td>

                                            <?php
                                            if ($cand['c_color'] == '1') {
                                                echo "เทอดจรรยา (สีเหลือง)";
                                            } else if ($cand['c_color'] == '2') {
                                                echo "สามัคคี (สีแดง)";
                                            } else if ($cand['c_color'] == '3') {
                                                echo "ศรีวัฒนา (สีเขียว)";
                                            } else if ($cand['c_color'] == '4') {
                                                echo "การุณรักษ์ (สีม่วง)";
                                            } else if ($cand['c_color'] == '5') {
                                                echo "ภักดิ์พิรีย์ (สีฟ้า)";
                                            }
                                            ?>


                                        </td>
                                        <td>
                                            <?php echo $cand['c_point'] ?>
                                        </td>
                                        <td>
                                            <a style="font-family:'Kanit'" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $cand['c_id'] ?>"><i class="fas fa-pencil"></i> แก้ไข</a>

                                        </td>
                                        <td>

                                            <a style="font-family:'Kanit'" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $cand['c_id'] ?>"><i class="fas fa-trash"></i> ลบ</a>

                                        </td>
                                    </tr>


                                    <!-- Edit candidate -->
                                    <div class=" modal fade" id="edit<?php echo $cand['c_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="color:black" class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลผู้ลงสมัคร</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="./process/edit_candidate.php" method="post">
                                                        <input name="c_id" type="text" value="<?php echo $cand['c_id'] ?>" hidden>
                                                        <h5 class="mt-3">คำนำหน้า</h5>
                                                        <input class="form-control form-control-lg" style="font-family:'Kanit'" name="c_title" type="text" value="<?php echo $cand['c_title'] ?>" required>
                                                        <h5 class="mt-3">ชื่อ</h5>
                                                        <input class="form-control form-control-lg" style="font-family:'Kanit'" name="c_name" type="text" value="<?php echo $cand['c_name'] ?>" required>
                                                        <h5 class="mt-3">สกุล</h5>
                                                        <input class="form-control form-control-lg" style="font-family:'Kanit'" name="c_surname" type="text" value="<?php echo $cand['c_surname'] ?>" required>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5 class="mt-3">ระดับชั้น</h5>
                                                                <input class="form-control form-control-lg" name="c_level" type="number" min="1" max="14" value="<?php echo $cand['c_level'] ?>" disabled required>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mt-3">ห้อง</h5>
                                                                <input class="form-control form-control-lg" name="c_room" type="number" min="1" max="14" value="<?php echo $cand['c_room'] ?>" required>
                                                            </div>
                                                        </div>


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
                                    <div class=" modal fade" id="delete<?php echo $cand['c_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="color:black" class="modal-title" id="exampleModalLabel">ยืนยันการลบผู้ลงสมัคร</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>คุณต้องการลบ <strong><?php echo $cand['c_title'] . $cand['c_name'] . " " . $cand['c_surname'] ?></strong> ใช่หรือไม่</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="./process/delete_candidate.php">
                                                        <input type="text" name="number" value="<?php echo $cand['c_id'] ?>" hidden>
                                                        <input type="text" name="number" value="<?php echo $cand['c_color'] ?>" hidden>
                                                        <input type="text" name="number" value="<?php echo $cand['c_number'] ?>" hidden>

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

    <div class=" modal fade" id="reset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:black" class="modal-title" id="exampleModalLabel">ยืนยันการรีเซ็ตผลคะแนน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>คุณต้องการลบผลคะแนนทั้งหมดใช่หรือไม่</h5>
                </div>
                <div class="modal-footer">
                    <form method="post" action="./process/delete_vote.php">

                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                        <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-danger" value="ตกลง"></input>
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
                text: 'คุณเพิ่มผู้ลงสมัครเรียบร้อยแล้ว',
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
                text: 'คุณลบผู้ลงสมัครเรียบร้อยแล้ว',
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
                text: 'คุณแก้ไขข้อมูลผู้ลงสมัครเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#198754'
            })
        </script>

<?php } else if (isset($_SESSION['success']) and $_SESSION['success'] == 'deletevote') {

?>
    <script>
        Swal.fire({
            title: 'เสร็จสิ้น!',
            text: 'คุณรีเซ็ตผลโหวตทั้งหมดแล้ว',
            icon: 'success',
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#198754'
        })
    </script>

<?php }
unset($_SESSION['success']);
?>



    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [5, "asc"]
                ]
            });
        });
    </script>
</body>

</html>