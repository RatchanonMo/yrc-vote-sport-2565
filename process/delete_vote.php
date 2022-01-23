<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    
    $sql = "UPDATE candidate SET c_point = '0'";
    $query = mysqli_query($conn, $sql);

    $_SESSION['success'] = "deletevote";

    header('location: ../manage_candidate.php');
}
