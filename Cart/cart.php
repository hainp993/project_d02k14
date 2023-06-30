<?php
// echo count($_SESSION['cart']);
// die();
if(isset($_SESSION['cus_user']) && isset($_SESSION['cus_pass'])) {
    if(count($_SESSION["cart"]) > 0){
        if(isset($_POST["sbm"])){
            foreach($_POST["qtt"] as $prd_id=>$qtt){
    
                $_SESSION["cart"][$prd_id] = $qtt;
            }
        }
        
        $arr_id = array();
        foreach($_SESSION["cart"] as $prd_id=>$qtt){
            $arr_id[] = $prd_id;
        }
        $str_id = implode(", ", $arr_id);
        
        $sql = "SELECT * FROM tbl_product
                WHERE prd_id IN($str_id)";
        $query = mysqli_query($connect, $sql);
    
?>
<!--	Cart	-->
<div id="my-cart">
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>
    <form method="post">
        <?php
        $total_price_all = 0;
        while($item = mysqli_fetch_array($query)) {
            $total_price = $_SESSION["cart"][$item["prd_id"]]*$item["prd_price"];
            $total_price_all += $total_price;
        ?>
    <div class="cart-item row">
        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
            <img src="admin/images/<?php echo $item['prd_image']; ?>">
            <h4><?php echo $item['prd_name']; ?></h4>
        </div>

        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
            <input name="qtt[<?php echo $item["prd_id"];?>]" type="number" id="quantity" class="form-control form-blue quantity" value=<?php echo $_SESSION["cart"][$item["prd_id"]];?> min="1">
        </div>
        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($item['prd_price']); ?>đ</b><a href="Cart/delete_cart.php?prd_id=<?php echo $item["prd_id"] ?>">Xóa</a></div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
            <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
        </div>
        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($total_price_all);?>đ</b></div>
    </div>
    </form>

</div>
<!--	End Cart	-->

<!--	Customer Info	-->
<div id="customer">
    <form method="post">
    <div class="row">

        <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
            <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
        </div>
        <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
            <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
        </div>
        <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
            <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
        </div>
        <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
            <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
        </div>

    </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0988 550 553</span>
            </a>
        </div>
    </div>
</div>
<!--	End Customer Info	-->
<?php
}else {?>
<div class="alert alert-danger mt-3">Không có sản phẩm nào trong giỏ hàng!</div>

<?php } }else {
   header('location: index.php?redirect=login');
    // echo '<script>
    // window.location.href("index.php?redirect=login");
    // </script>';
}
    ?>

