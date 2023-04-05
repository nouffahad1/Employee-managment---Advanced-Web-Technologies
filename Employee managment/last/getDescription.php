<?php


include("connect.php");

$id = $_POST['id'];
$query = "SELECT * FROM request where id=$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$desc = $row['request_description'];
echo json_encode($desc);
?>