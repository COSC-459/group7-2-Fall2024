<?php
//all units close to schools//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE school_close = 1");

$stmt->execute();

$school_units = $stmt->get_result();//[]
?>