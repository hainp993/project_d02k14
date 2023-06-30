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
$sql = "SELECT * FROM tbl_order ORDER BY ord_status ASC";
$query = mysqli_query($connect, $sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng</h1>
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
                            <th data-field="id" data-sortable="true">Mã đơn</th>
                            <th data-field="name"  data-sortable="true">Ngày mua</th>
                            <th data-field="price" data-sortable="true">Họ & tên</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A123</td>
                                <td>01/06/2023</td>
                                <td>Nguyễn Văn A</td>
                                <td class="text-danger"><b>22.000.000đ</b></td>
                                <td class="text-secondary"><b>Chưa duyệt</b></td>
                                <td><a class="btn btn-primary" href="#">Xem chi tiết</a></td>
                            </tr>
                            <tr>
                                <td>A034</td>
                                <td>01/06/2023</td>
                                <td>Nguyễn Văn B</td>
                                <td class="text-danger"><b>22.000.000đ</b></td>
                                <td class="text-success"><b>Thành công</b></td>
                                <td><a class="btn btn-primary" href="#">Xem chi tiết</a></td>
                            </tr>
                            <tr>
                                <td>A098</td>
                                <td>01/06/2023</td>
                                <td>Nguyễn Văn B</td>
                                <td class="text-danger"><b>22.000.000đ</b></td>
                                <td class="text-primary"><b>Đang giao hàng</b></td>
                                <td><a class="btn btn-primary" href="#">Xem chi tiết</a></td>
                            </tr>
                            <tr>
                                <td>A056</td>
                                <td>01/06/2023</td>
                                <td>Nguyễn Văn A</td>
                                <td class="text-danger"><b>22.000.000đ</b></td>
                                <td class="text-warning"><b>Đã duyệt</b></td>
                                <td><a class="btn btn-primary" href="#">Xem chi tiết</a></td>
                            </tr>
<!--                        --><?php
//                        $stt = 1;
//                        while($item = mysqli_fetch_array($query)) {
//                            ?>
<!--                            <tr>-->
<!--                                <td style="">--><?php //echo $stt; ?><!--</td>-->
<!--                                <td style="">--><?php //echo $item['fullname']; ?><!--</td>-->
<!--                                <td style="">--><?php //echo $item['username']; ?><!--</td>-->
<!--                                --><?php
//                                if($item['user_level'] == 1) {
//                                    echo '<td><span class="label label-danger">Admin</span></td>';
//                                }else {
//                                    echo '<td><span class="label label-warning">Nhân viên</span></td>';
//                                }
//                                ?>
<!--                                <td class="form-group">-->
<!--                                    <a href="edit_user.php?id=--><?php //echo $item['user_id']; ?><!--" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>-->
<!--                                    <a onClick="confirm('Xác nhận xóa?')" href="delete_user.php?id=--><?php //echo $item['user_id']; ?><!--" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            --><?php
//                            $stt++;
//                        }
//                        ?>
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
