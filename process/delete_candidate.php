<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $c_color = $_POST['c_color'];
    $c_number = $_POST['c_number'];

    

    $delete = "DELETE FROM candidate WHERE c_id = '$c_id' ";
    $query = mysqli_query($conn, $delete);


    $pass = "SELECT * FROM student WHERE s_color = '$c_color' AND s_select = '$c_number'  ";
    $query1 = mysqli_query($conn, $pass);

    while($row = mysqli_fetch_array($query1)){
        $plus = "UPDATE student SET pass = pass = '0' WHERE s_id =  ". $row['s_id'];
        $query2 = mysqli_query($conn, $plus);
    }
    
  

    $_SESSION['success'] = "delete";

    header('location: ../manage_candidate.php');
}
