<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $room = $_POST['room'];

    $sql = "INSERT INTO candidates (number, name, room, point) VALUES (NULL, '$name', '$room', '0')";
    $query = mysqli_query($conn, $sql);


    $_SESSION['success'] = "add";

    header('location: ../manage_candidates.php');
}
