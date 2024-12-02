<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "final_project";

$conn = mysqli_connect(hostname: $servername, username: $username, password: $password, database: $databasename);

if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

$sql_p = "SELECT unit_img, unit_name, unit_rent FROM units LIMIT 4";
$pop_units = $conn->query(query: $sql_p);

$sql_u = "SELECT unit_img, unit_name, unit_rent FROM units";
$units = $conn->query(query: $sql_u);




?>