<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <?php include('./component/link.php') ?>
    <style>
        input::placeholder {
            font-family: 'Kanit';
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .button {
            background-color: #d91b5c;
            color: white;
            font-family: 'Kanit';
            transition: transform 80ms ease-in;
        }

        .button:active {
            transform: scale(0.95);
        }

        .button:focus {
            outline: none;
        }



        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            background: #e1e1e1;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }


        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background-image: url('./img/index2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }



        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        @media screen and (max-width: 770px) {
            .sign-in-container {
                left: 0;
                width: 70%;
                z-index: 2;
            }

            .overlay-container {
                width: 30%;
                left: 70%;
            }

            .overlay-panel {
                width: 30%;

            }
        }

        @media screen and (max-width: 420px) {
            .sign-in-container {
                left: 0;
                width: 100%;
                z-index: 2;
            }

            .overlay-container {
                display: none;
            }

            .overlay-panel {
                display: none;

            }

        }
    </style>
</head>

<body style="background-image:url('./img/background10.jpg');
	background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; padding:30px">

    <div class="container mt-5" id="container">
        <div class="form-container sign-in-container">
            <form action="./process/login.php" method="post">
                <img src="./img/yrc_logo.png" class="img-fluid mb-2" width="40%" alt="">
                <h3 style="font-weight:700">ระบบเลือกตั้งประธานสี</h3>
                <p>ประจำปีการศึกษา 2564</p>
                <hr>
                <input type="text" name="username" placeholder="เลขประจำตัวนักเรียน" />
                <input class="button" type="submit" name="submit" value="ลงชื่อเข้าใช้" />
                <a href="./graph.php" style="color:#7c7575">รายงานผลการเลือกตั้ง</a>
                <p style="color:#7c7575">© 2021 YRC TECH - Ratchanon Mookkaew 
                </p>
            </form>

        </div>
        <div class="overlay-container ">
            <div class="overlay">

                <div class="overlay-panel overlay-right">

                </div>
            </div>
        </div>
    </div>



    <?php include('./component/linkjs.php') ?>
    <?php
    if ($_GET['error']) {
    ?>
        <script>
            Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'เลขประจำตัวไม่ถูกต้อง',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#f27474'
            })
        </script>
    <?php }

    ?>
</body>

</html>