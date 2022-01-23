<?php 
    $conn = mysqli_connect('localhost','whitemalt','nonnahee','yrc_vote_sport');

    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }

    mysqli_set_charset($conn,"utf8");

?>