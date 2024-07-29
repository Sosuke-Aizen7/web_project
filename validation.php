<?php
    session_start();

    // Database connection settings
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_form";

    // Establish a database connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if POST data is set
    if(isset($_POST['mail']) && isset($_POST['pass'])){
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];

        // Debugging output for POST data
        echo "Email: " . $mail . "<br>";
        echo "Password: " . $pass . "<br>";

        // Corrected SQL query string
        $s = "SELECT * FROM register WHERE email = '$mail' AND password = '$pass'";

        // Execute the query
        $result = mysqli_query($con, $s);

        // Check if query execution is successful
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        // Get the number of rows returned by the query
        $num = mysqli_num_rows($result);

        // Debugging output for number of rows
        echo "Number of rows: " . $num . "<br>";

        // Redirect based on query result
        if ($num == 1) {
            echo "Redirecting to home.php";
            header('Location: home.php');
            exit();
        } else {
            echo "Redirecting to index.php";
            header('Location: index.php');
            exit();
        }
    } else {
        die("Post data not set.");
    }
?>
