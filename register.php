<?php

    session_start();
    header('location:index.php');

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    mysqli_select_db($con, 'login_form');

    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Corrected SQL query string
    $s = "select * from register where username = '$user'";
    $s = "select * from register where email = '$mail'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result); // Corrected function name to mysqli_num_rows

    if($num == 1){
        echo "User already taken";
    }
    else{
        $reg = "insert into register (username, email, password) values ('$user', '$mail', '$pass')"; // Added missing insert into and email field
        mysqli_query($con, $reg);
        echo "New register successful";
    }
?>
