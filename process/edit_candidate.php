<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $c_title = $_POST['c_title'];
    $c_name = $_POST['c_name'];
    $c_surname = $_POST['c_surname'];
    $c_level = $_POST['c_level'];
    $c_room = $_POST['c_room'];


    $sql = "UPDATE candidate SET c_title = '$c_title', c_name = '$c_name', c_surname = '$c_surname', c_level = '$c_level', c_room = '$c_room'  WHERE c_id = '$c_id' ";
    $query = mysqli_query($conn, $sql);


    $_SESSION['success'] = "edit";

    header('location: ../manage_candidate.php');
}
