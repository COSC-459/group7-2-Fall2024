<?php
//all units with dishwasher//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE dishwasher = 1");

$stmt->execute();

$dw_units = $stmt->get_result();//[]
?>