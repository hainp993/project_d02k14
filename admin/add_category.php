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
if(isset($_POST['sbm'])) {
    $cate_name = $_POST['cate_name'];
    $checkCategoryName = mysqli_num_rows(
        mysqli_query($connect,
            "SELECT cate_name FROM tbl_category WHERE cate_name = '$cate_name'"
        )
    );
    if($checkCategoryName == 0) {
        $sql = "INSERT INTO tbl_category (cate_name)
                VALUES
                ('$cate_name')";
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
				<li class="active">Thêm danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm danh mục</h1>
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
                                <input required type="text" name="cate_name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
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
