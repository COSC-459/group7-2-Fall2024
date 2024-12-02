<?php
//all units allowing pets//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE pets = 1");

$stmt->execute();

$pet_units = $stmt->get_result();//[]
?>