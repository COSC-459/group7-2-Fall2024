<?php
//all gated units//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE gated = 1");

$stmt->execute();

$gated_units = $stmt->get_result();//[]
?>