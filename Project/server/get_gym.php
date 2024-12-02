<?php
//all units gym in building//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE gym = 1");

$stmt->execute();

$gym_units = $stmt->get_result();//[]
?>