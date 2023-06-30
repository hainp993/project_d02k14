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
$sql = "SELECT * FROM tbl_category ORDER BY cate_id ASC";
$query = mysqli_query($connect, $sql);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="add_category.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">STT</th>
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>
                                    <?php
                                    $stt = 1;
                                    while($item = mysqli_fetch_array($query)) {
                                    ?>
										<tr>
											<td style=""><?php echo $stt; ?></td>
											<td style=""><?php echo $item['cate_name']; ?></td>
											<td class="form-group">
												<a href="edit_category.php?cate_id=<?php echo $item['cate_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
												<a onClick="confirm('Xác nhận xóa!')" href="delete_category.php?cate_id=<?php echo $item['cate_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
											</td>
										</tr>
                                    <?php
                                        $stt++;
                                    }
                                    ?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php
include_once('Master/footer.php');
?>
