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
$sql = "SELECT * FROM tbl_custommer ORDER BY cus_id DESC";
$query = mysqli_query($connect, $sql);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách khách hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách khách hàng</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">#</th>
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="phone" data-sortable="true">Số điện thoại</th>
                                <th>Địa chỉ</th>
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
                                    <td style=""><?php echo $item['fullname']; ?></td>
                                    <td style=""><?php echo $item['cus_phone']; ?></td>
                                    <td style=""><?php echo $item['cus_address']; ?></td>
                                    <td class="form-group">
                                        <a href="edit_customer.php?id=<?php echo $item['cus_id']; ?>" class="btn btn-primary">Reset mật khẩu</a>
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
