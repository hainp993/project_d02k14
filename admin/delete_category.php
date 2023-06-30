<?php
include_once('Master/header.php');
$cate_id = $_GET['cate_id'];
mysqli_query($connect, "
            DELETE FROM tbl_category WHERE cate_id = '$cate_id'
");
header('location: category.php');
?>