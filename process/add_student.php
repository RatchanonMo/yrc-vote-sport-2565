<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $room = $_POST['room'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (id, username, password, name, room, level, point) VALUES (NULL, '$username', '$password', '$name', '$room', 'm', '1')";
    $query = mysqli_query($conn, $sql);


    $_SESSION['success'] = "add";

    header('location: ../manage_students.php');
}
