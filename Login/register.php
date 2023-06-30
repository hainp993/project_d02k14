<?php
if(isset($_POST['sbm'])) {
    $cus_username = $_POST['cus_username'];
    $cus_pass = $_POST['cus_pass'];
    $re_password = $_POST['re_password'];
    $fullname = $_POST['fullname'];
    $cus_address = $_POST['cus_address'];
    $cus_phone = $_POST['cus_phone'];
    if($re_password == $cus_pass) {
        $sql = "INSERT INTO tbl_custommer 
                (cus_username, cus_pass, fullname, cus_address, cus_phone)
                VALUES
                ('$cus_username', '$cus_pass', '$fullname', '$cus_address', '$cus_phone')";
        mysqli_query($connect, $sql);
        header('location: index.php?redirect=login');
    }else {
        $error = '<div class="alert alert-danger text-danger">Nhập lại mật khẩu không đúng!</div>';
    }
}

?>
<!--<div class="bg-danger text-danger">Nhập lại mật khẩu không đúng!</div>-->
<div id="register">
    <h1 class="text-center">Đăng ký tài khoản</h1>
    <form method="post">
        <div class="mb-3">
            <label for="cus_username" class="form-label">Tài khoản</label>
            <input type="text" name="cus_username" class="form-control" id="cus_username" required>
        </div>
        <div class="mb-3">
            <label for="cus_pass" class="form-label">Mật khẩu</label>
            <input type="password" name="cus_pass" class="form-control" id="cus_pass" required>
        </div>
        <?php
        if(isset($error)) {
            echo $error;
        }
        ?>
        <div class="mb-3">
            <label for="re_password" class="form-label">Nhập lại mật khẩu</label>
            <input type="password" name="re_password" class="form-control" id="re_password">
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" name="fullname" class="form-control" id="fullname">
        </div>
        <div class="mb-3">
            <label for="cus_address" class="form-label">Địa chỉ</label>
            <input type="text" name="cus_address" class="form-control" id="cus_address">
        </div>
        <div class="mb-3">
            <label for="cus_phone" class="form-label">Số điện thoại</label>
            <input type="text" name="cus_phone" class="form-control" id="cus_phone">
        </div>
        <button type="submit" name="sbm" class="btn btn-primary">Đăng ký</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
    </form>
</div>