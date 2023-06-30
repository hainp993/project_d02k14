<?php
if(isset($_POST['sbm'])) {
    $cus_username = $_POST['cus_username'];
    $cus_phone = $_POST['cus_phone'];
    $sql_check = "SELECT * FROM tbl_custommer 
                    WHERE cus_username = '$cus_username' AND cus_phone = '$cus_phone'";
    $count = mysqli_num_rows(mysqli_query($connect, $sql_check));
    if($count > 0) {
        $sql = "UPDATE tbl_custommer SET cus_pass = '123456' 
                     WHERE cus_username = '$cus_username'";
        mysqli_query($connect, $sql);
        $success = '<div class="alert alert-success text-success">Mật khẩu của bạn là 123456, vui lòng đổi lại mật khẩu sau khi đăng nhập thành công!</div>';
        header('location: index.php?redirect=login');
    }else {
        header('location: index.php?redirect=register');
    }
}
?>

<div id="login">
    <div class="panel-heading text-center"><b>Lấy lại mật khẩu</b></div>
    <div class="panel-body bg-light">
        <form role="form" method="post">
            <fieldset>
                <div class="form-group">
                    <input id="username" class="form-control" placeholder="Tài khoản" name="cus_username" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input id="phone" class="form-control" placeholder="Số điện thoại" name="cus_phone" type="text" value="">
                </div>
                <div class="text-center">
                    <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>