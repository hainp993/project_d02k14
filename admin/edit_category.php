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
$cate_id = $_GET['cate_id'];
$sqlId = "SELECT * FROM tbl_category WHERE cate_id = '$cate_id'";
$row = mysqli_fetch_array(mysqli_query($connect, $sqlId));
if(isset($_POST['sbm'])) {
    $cate_name = $_POST['cate_name'];
    $checkCategoryName = mysqli_num_rows(
        mysqli_query($connect,
            "SELECT username FROM tbl_category WHERE cate_name = '$cate_name'"
        )
    );
    if(checkCategoryName == 0) {
        $sql = "UPDATE tbl_category SET 
                cate_name = '$cate_name'
                WHERE cate_id = '$cate_id'";
        mysqli_query($connect, $sql);
        header('location: category.php');
    }else {
        $errors = '<div class="alert alert-danger">Tên danh mục đã tồn tại !</div>';
    }
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Danh mục 1</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:Danh mục 1</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            if(isset($errors)) {
                                echo $errors;
                            }
                            ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="cate_name" required value="<?php echo $row['cate_name'] ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->
<?php
include_once('Master/footer.php');
?>
