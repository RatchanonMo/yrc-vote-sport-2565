<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    
    $delete = "DELETE FROM users WHERE id = '$id' ";
    $query = mysqli_query($conn, $delete);

    $point = "SELECT * FROM vote WHERE users_id = '$id' ";
    $query1 = mysqli_query($conn, $point);
    $row = mysqli_fetch_array($query1);
    $minus = "UPDATE candidates SET point = point - '1' WHERE number =  ". $row['candidates_number'];
    $query2 = mysqli_query($conn, $minus);

    $delete_vote = "DELETE FROM vote WHERE users_id = '$id'";
    $query3 = mysqli_query($conn, $delete_vote);




  

    $_SESSION['success'] = "delete";

    header('location: ../manage_students.php');
}
