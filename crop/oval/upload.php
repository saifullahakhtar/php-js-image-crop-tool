<?php

// Attach Files
include("attach/connection.php");
include("attach/classes/queries.php");

// Run Queries
$queries = new Queries;

// Get Image
$filename = 'pic_'.date('YmdHis') . '.jpg';
move_uploaded_file($_FILES["avatar"]["tmp_name"],'YOUR_SAVE_PATH/'.$filename);

$userID = "Guest";
$value = "Oval";
$imgCode = rand();

// Insert To Database
$insertQuery = "INSERT INTO `image_crop` (`image`, `user`, `value`, `code`) VALUES (?, ?, ?, ?);";
$param = [$filename, $userID, $value, $imgCode];
$runQuery = $queries->query($insertQuery,$param);

?>

