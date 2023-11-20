<?php 
    ob_start();
    if(!isset($_SESSION)) {
        session_start();
    }
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php-project";
    
    $connection = mysqli_connect($hostname, $username, $password, $dbname) ;

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
     //   echo "Connected successfully to the database!";
    }
?>