<?php
ob_start();
session_start();
$connect = mysqli_connect("localhost", "root", "", "prj_d02k14");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<?php
// echo $_SESSION['cus_user'];
// die();
?>
<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
        	<div id="logo" class="col-lg-3 col-md-3 col-sm-12">
            	<h1><a href="index.php"><img class="img-fluid" src="images/logo.png"></a></h1>
            </div>
            <div id="search" class="col-lg-6 col-md-6 col-sm-12">
<!--                Search-->
                <?php include_once('Search/search_box.php'); ?>
            </div>
            <div id="cart" class="col-lg-1 col-md-1 col-sm-12">
<!--            	Cart-->
                <?php include_once('Cart/cart_notify.php'); ?>
            </div>
            <?php
            if(!isset($_SESSION['cus_user']) && !isset($_SESSION['cus_pass'])) {
            ?>
                <div id="login" class="col-lg-2 col-md-2 col-sm-12">
                    <a href="?redirect=login">Đăng nhập/Đăng ký</a>
                </div>
            <?php
            }else {
            ?>
                <div id="login" class="col-lg-2 col-md-2 col-sm-12">
                    <a href="index.php?redirect=history_order&customer=<?php echo $_SESSION['cus_user'] ?>">Lịch sử đơn hàng |</a>
                    <a href="Login/logout.php">Đăng xuất</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<nav>
<!--                	Menu-->
                    <?php include_once('Menu/menu.php'); ?>
                </nav>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slide-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide-2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide-3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!--	End Slider	-->
                
                <!-- Master Page Layout -->
                <?php
                if(isset($_GET['redirect'])) {
                    switch($_GET['redirect']) {
                        case "category": include_once("Menu/category.php"); break;
                        case "login": include_once("Login/login.php"); break;
                        case "cart": include_once("Cart/cart.php"); break;
                        case "success": include_once("Cart/success.php"); break;
                        case "product": include_once("Product/product.php"); break;
                        case "search": include_once("Search/search.php"); break;
                        case "history_order": include_once("Cart/history_order.php"); break;
                        case "register": include_once("Login/register.php"); break;
                        case "reset_pass": include_once("Login/reset_pass.php"); break;
                    }
                }else {
                    include_once("Product/latest_product.php");
                }
                ?>
            </div>
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<div id="banner">
                	<div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-1.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-2.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-3.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-4.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-5.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img width="100%" class="img-fluid" src="images/banner-6.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
        	<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
            	<h2><a href="#"><img src="images/logo.png"></a></h2>
                <p>
                    Chương trình Học viện Công nghệ BKACAD, Đại học Bách Khoa Hà Nội tiền thân là Học viện mạng Cisco Bách Khoa được thành lập theo Quyết định số 4251/QĐ-ĐHBK-TTĐTSĐH do Hiệu trưởng trường ĐH Bách Khoa HN ký ngày 05/11/2004. Đây là Chương trinh hợp tác chính thức của Trường Đại học Bách khoa Hà Nội với Tập đoàn Cisco Systems.
                </p>
            </div>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
                <h3>Địa chỉ</h3>
                <p>Tòa nhà A17 Bách Khoa, 17 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội </p>
            </div>
            <div id="service" class="col-lg-3 col-md-6 col-sm-12">
                <h3>Dịch vụ</h3>
                <p>Bảo hành rơi vỡ, ngấm nước Care Diamond</p>
                <p>Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi mới</p>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
                <h3>Hotline</h3>
                <p>Phone Sale: 024 6650 7260</p>
                <p>Website: bkacad.edu.vn</p>
            </div>
        </div>
    </div>
</div>

<!--	Footer	-->
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<p>
                    2023 © BKACAD Academy. All rights reserved. Developed by Hainp(Instrutor).
                </p>
            </div>
        </div>
    </div>
</div>
<!--	End Footer	-->
</body>
</html>
