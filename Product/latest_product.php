<?php
$sql_latest_product = "SELECT * FROM tbl_product ORDER BY prd_id DESC LIMIT 6";
$query_latest_product = mysqli_query($connect, $sql_latest_product);
?>
<!--	Latest Product	-->
<div class="products">
    <h3>Sản phẩm Mới</h3>
    <div class="product-list row">
        <?php
        while($item = mysqli_fetch_array($query_latest_product)) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="?redirect=product&prd_id=<?php echo $item['prd_id']; ?>"><img src="admin/images/<?php echo $item['prd_image']; ?>"></a>
                <h4><a href="?redirect=product&prd_id=<?php echo $item['prd_id']; ?>"><?php echo $item['prd_name']; ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($item['prd_price']); ?>đ</span></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<!--	End Latest Product	-->