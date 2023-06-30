<?php
session_start();
unset($_SESSION['cus_user']);
unset($_SESSION['cus_pass']);
 header('location: ../index.php');

?>