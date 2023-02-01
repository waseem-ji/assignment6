<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "todoApp";

// $conn = mysqli_connect($servername,$username,$password,$database);

// // if ($conn->connect_error) {
// //     die("Connection failed: " . $conn->connect_error);
// //   }

function dbconnect() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "todoApp";

    $conn = mysqli_connect($servername,$username,$password,$database);

    return $conn;

}