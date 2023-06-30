<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location: admin.php');
}else {
    header('location: login.php');
}
