<?php
//all units with close public transit//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE public_trans = 1");

$stmt->execute();

$transit_units = $stmt->get_result();//[]
?>