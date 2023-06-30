<?php
include_once('Master/header.php');
$prd_id = $_GET['prd_id'];
mysqli_query($connect, "DELETE FROM tbl_product WHERE prd_id = '$prd_id'");
header('location: product.php');
?>