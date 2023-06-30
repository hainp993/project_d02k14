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
$sqlCate = "SELECT * FROM tbl_category ORDER BY cate_id ASC";
$queryCate = mysqli_query($connect, $sqlCate);
if(isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_quantity = $_POST['prd_quantity'];
    $cate_id = $_POST['cate_id'];
    $prd_decription = $_POST['prd_decription'];
    $prd_image = $_FILES['prd_image']['name'];
    $tmp_image = $_FILES['prd_image']['tmp_name'];
    $sql = "INSERT INTO tbl_product 
            (prd_name, prd_price, prd_quantity, prd_image, cate_id, prd_decription)
            VALUES
            ('$prd_name', $prd_price, $prd_quantity, '$prd_image', $cate_id, '$prd_decription')";
    mysqli_query($connect, $sql);
    move_uploaded_file($tmp_image, 'images/'.$prd_image);
    header('location: product.php');
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm</h1>
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
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input required name="prd_quantity" type="text" class="form-control">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input required name="prd_image" type="file">
                                    <br>
<!--                                    <div>-->
<!--                                        <img src="img/download.jpeg">-->
<!--                                    </div>-->
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cate_id" class="form-control">
                                        <?php
                                        while($item = mysqli_fetch_array($queryCate)) {
                                        ?>
                                        <option value=<?php echo $item['cate_id']; ?>><?php echo $item['cate_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea id="prd_decription" required name="prd_decription" class="form-control" rows="3"></textarea>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->
<script>CKEDITOR.replace('prd_decription')</script>
<?php
include_once('Master/footer.php');
?>
