<?php
//all units parking//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE parking = 1");

$stmt->execute();

$parking_units = $stmt->get_result();//[]
?>