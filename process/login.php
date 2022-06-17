<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $username =  mysqli_real_escape_string($conn, $_POST['username']);

    $sql = "SELECT * FROM student WHERE s_username = '$username'  ";
    $m4 = mysqli_query($conn, $sql);

    if (mysqli_num_rows($m4) == 1) {
        $row4 = mysqli_fetch_array($m4);        

        $_SESSION['s_id'] = $row4['s_id'];
        $_SESSION['s_title'] = $row4['s_title'];
        $_SESSION['s_name'] = $row4['s_name'];
        $_SESSION['s_surname'] = $row4['s_surname'];
        $_SESSION['s_username'] = $row4['s_username'];
        $_SESSION['s_level'] = $row4['s_level'];
        $_SESSION['s_room'] = $row4['s_room'];
        $_SESSION['s_color'] = $row4['s_color'];
        $_SESSION['s_pass'] = $row4['s_pass'];
        $_SESSION['s_permission'] = $row4['s_permission'];

        if ($row4['s_permission'] > 0) {
            header('location:../manage_candidate.php ');
        } else {
            header('location:../vote.php ');
        }
    } else {

        header('location: ../index.php?error=1');
    }
}
