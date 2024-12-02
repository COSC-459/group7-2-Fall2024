<?php
//all units with washer & dryer//
include('connection.php');

$stmt = $conn->prepare(query: "SELECT * FROM units WHERE washer_dryer = 1");

$stmt->execute();

$wd_units = $stmt->get_result();//[]
?>