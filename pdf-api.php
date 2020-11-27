<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'connection.php';
global $connect;

$query = 'SELECT * FROM `pdf`';
$response = mysqli_query($connect, $query) or die(mysqli_error($connect));
$result = mysqli_fetch_all($response, MYSQLI_ASSOC);
echo json_encode($result);