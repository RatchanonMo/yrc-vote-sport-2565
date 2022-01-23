<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $room = $_POST['room'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET name = '$name', room = '$room', username = '$username', password = '$password'  WHERE id = '$id' ";
    $query = mysqli_query($conn, $sql);


    $_SESSION['success'] = "edit";

    header('location: ../manage_students.php');
}
