<?php
//all units with untilities included//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE utilites_inc = 1");

$stmt->execute();

$utilities_units = $stmt->get_result();//[]
?>