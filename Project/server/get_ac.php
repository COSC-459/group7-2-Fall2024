<?php
//all units with ac//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE air_cond = 1");

$stmt->execute();

$ac_units = $stmt->get_result();//[]
?>