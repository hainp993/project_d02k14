<!-- Header -->
<?php
include_once('Master/header.php');
?>
<!-- ./Header -->
<!-- Sidebar -->
<?php
include_once('Master/sidebar.php');
?>
<!-- ./Sidebar -->
<?php
$prd_id = $_GET['prd_id'];
$row = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_product WHERE prd_id = '$prd_id'"));
$sqlCate = "SELECT * FROM tbl_category ORDER BY cate_id ASC";
$queryCate = mysqli_query($connect, $sqlCate);
if(isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_quantity = $_POST['prd_quantity'];
    $cate_id = $_POST['cate_id'];
    $prd_decription = $_POST['prd_decription'];
    if($_FILES['prd_image']['name'] == '') {
        $prd_image = $row['prd_image'];
    }else {
        $prd_image = $_FILES['prd_image']['name'];
        $tmp_image = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($tmp_image, 'images/'.$prd_image);
    }
    $sql = "UPDATE tbl_product SET
            prd_name = '$prd_name', prd_price = $prd_price, prd_quantity = $prd_quantity,
            cate_id = $cate_id, prd_decription = '$prd_decription', prd_image = '$prd_image'
            WHERE prd_id = '$prd_id'";
    mysqli_query($connect, $sql);
    header('location: product.php');
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active"><?php echo $row['prd_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $row['prd_name'] ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $row['prd_name'] ?>"  placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" required value="<?php echo $row['prd_price'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" name="prd_quantity" required value="<?php echo $row['prd_quantity'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="prd_image">
                                    <br>
                                    <div>
                                        <img src="images/<?php echo $row['prd_image'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cate_id" class="form-control">
                                        <?php
                                        while($row_cate = mysqli_fetch_array($queryCate)) {
                                        ?>
                                        <option <?php if($row['cate_id'] == $row_cate['cate_id']) {echo 'selected';} ?> value=<?php echo $row_cate['cate_id'] ?>>
                                            <?php echo $row_cate['cate_name'] ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea id="prd_decription" name="prd_decription" required class="form-control" rows="3">
                                            <?php echo $row['prd_decription'] ?>
                                        </textarea>
                                    <script>CKEDITOR.replace('prd_decription')</script>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->
<?php
include_once('Master/footer.php');
?>
