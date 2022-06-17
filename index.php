<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <?php include('./component/link.php') ?>

</head>

<body style="background:url('./img/paper.jpg');background-size:cover">
    <div class="center">
        <div >
            <div class="container-fluid">
            <div class="card pt-4 pb-4" style="max-width:600px;box-shadow:none">
                <div class="card-body">
                    <div class="container">
                        <p align="center">

                            <img src="./img/yrc_logo.png" class="img-fluid mb-2" width="30%" alt="">
                        </p>
                        <h3 align="center" style="font-weight:700">ระบบเลือกตั้งประธานสี</h3>
                        <p align="center">ประจำปีการศึกษา 2565</p>
                        <form style="padding:0 40px 0 40px" action="./process/login.php" method="post">
                            <hr>

                            <label for="exampleInputPassword1" class="form-label">เลขประจำตัวนักเรียน</label>
                            <input type="text" class="form-control" name="username">
                            <input name="submit" style="font-family: 'Mitr', sans-serif;" type="submit" class="form-control btn btn-primary mt-3" value="ลงชื่อเข้าใช้">
                            <hr>
                            <p align="center">

                                <a href="./graph.php" style="color:#7c7575">รายงานผลการเลือกตั้ง</a>
                            </p>
                            <p align="center" style="color:#7c7575">© 2021 YRC TECH - Ratchanon Mookkaew
                            </p>

                        </form>
                    </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <?php include('./component/linkjs.php') ?>

</body>

</html>