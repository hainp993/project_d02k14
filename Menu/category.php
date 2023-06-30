<?php
$cate_id = $_GET['cate_id'];
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}else {
    $page = 1;
}
$row_per_page = 5;
$sqlPerRow = "SELECT * FROM tbl_product";
$total_row = mysqli_num_rows(mysqli_query($connect, $sqlPerRow));
$total_page = ceil($total_row / $row_per_page);// Tạo ra tổng số page
$per_row = ($page * $row_per_page) - $row_per_page;
$sql_category = "SELECT * FROM tbl_product 
                WHERE cate_id = '$cate_id' 
                ORDER BY prd_id DESC 
                LIMIT $per_row, $row_per_page";
$query_category = mysqli_query($connect, $sql_category);
$row = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_category WHERE cate_id = '$cate_id'"));
$num_row = mysqli_num_rows($query_category)
?>
<!--	List Product	-->
<div class="products">
    <h3><?php echo $row['cate_name']; ?> (hiện có <?php echo $num_row; ?> sản phẩm)</h3>
    <div class="product-list row">
        <?php
        while($item = mysqli_fetch_array($query_category)) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?redirect=product&prd_id=<?php echo $item['prd_id'] ?>"><img src="admin/images/<?php echo $item['prd_image']; ?>"></a>
                <h4><a href="index.php?redirect=product&prd_id=<?php echo $item['prd_id'] ?>"><?php echo $item['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($item['prd_price']); ?>đ</span></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <?php
        for(; $page <= $total_page; $page++) {
            ?>
            <li class="page-item"><a class="page-link" href="index.php?redirect=<?php echo $_GET['redirect'] ?>&cate_id=<?php echo $_GET['cate_id'] ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
            <?php
        }
        ?>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>
