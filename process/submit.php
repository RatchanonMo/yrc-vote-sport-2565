<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $c_number = $_POST['c_number'];
    $s_id = $_SESSION['s_id'];

    $pass = "UPDATE student SET s_pass = '1' WHERE s_id = '$s_id' ";
    $query3 = mysqli_query($conn, $pass);
    $select = "UPDATE student SET s_select = '$c_number' WHERE s_id = '$s_id' ";
    $query3 = mysqli_query($conn, $select);
    $point = "UPDATE candidate SET c_point = c_point + '1' WHERE c_id = '$c_id' ";
    $query4 = mysqli_query($conn, $point);

    $_SESSION['success'] = "1";

    header('location: ../vote.php');
}
