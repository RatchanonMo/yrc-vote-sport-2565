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

<body style="background-image:url('./img/background2.jpg');
	background-size:cover;">
    <?php include('./component/sidebar.php') ?>
    <div class="page">
        <div class="page__wrapper">
            <?php include('./component/header.php') ?>
            <div style="margin: 30px 60px 60px 60px">

            </div>
        </div>
    </div>


    <?php include('./component/linkjs.php') ?>

</body>

</html>