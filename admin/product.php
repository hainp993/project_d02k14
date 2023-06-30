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
$sql = "SELECT * FROM tbl_product
        INNER JOIN tbl_category ON tbl_product.cate_id = tbl_category.cate_id
        ORDER BY prd_quantity ASC
        LIMIT $per_row, $row_per_page";
$query = mysqli_query($connect, $sql);
?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách sản phẩm</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="add_product.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" class="table" data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">STT</th>
                                    <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                    <th data-field="price" data-sortable="true">Giá</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Danh mục</th>
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
                                    <td style=""><?php echo $item['prd_name']; ?></td>
                                    <td style=""><?php echo number_format($item['prd_price']); ?> vnd</td>
                                    <td style="text-align: center" id="product-img"><img width="90" height="120"
                                            src="images/<?php echo $item['prd_image']; ?>" /></td>
                                    <td><span class=""><?php echo $item['prd_quantity']; ?></span></td>
                                    <td><?php echo $item['cate_name']; ?></td>
                                    <td class="form-group">
                                        <a href="edit_product.php?prd_id=<?php echo $item['prd_id']; ?>" class="btn btn-primary"><i
                                                class="glyphicon glyphicon-pencil"></i></a>
                                        <a onClick="confirm('Xác nhận xóa?')" href="delete_product.php?prd_id=<?php echo $item['prd_id']; ?>" class="btn btn-danger"><i
                                                class="glyphicon glyphicon-remove"></i></a>
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
                                <li class="page-item"><a class="page-link" href="product.php?page=<?php
                                        if($page < 1) {
                                            $page = 1;
                                        }else {
                                            $page--;
                                        }
                                    ?>">&laquo;</a></li>
                                <?php
                                    for(; $page <= $total_page; $page++) {
                                ?>
                                <li class="page-item"><a class="page-link" href="product.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="product.php?page=<?php
                                    if($page > $total_page) {
                                        $page = $total_page;
                                    }else {
                                        $page++;
                                    }
                                    ?>">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
<?php
include_once('Master/footer.php');
?>