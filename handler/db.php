<?php 

    $url = "localhost";
    $user = "root";
    $pass = "";
    $database = "blog";
    $conn = mysqli_connect($url,$user,$pass,$database);

    if(!$conn)
        die($conn);
    

?>