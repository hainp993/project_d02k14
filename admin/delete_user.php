<?php
include_once('Master/header.php');
$user_id = $_GET['id'];
mysqli_query($connect, "
            DELETE FROM tbl_user WHERE user_id = '$user_id'
");
header('location: user.php');
?>