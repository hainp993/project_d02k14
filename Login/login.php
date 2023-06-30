<?php
if(isset($_POST['sbm'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlcheck = "SELECT * FROM tbl_custommer
                    WHERE cus_username = '$username' AND cus_pass = '$password'";
    $count = mysqli_num_rows(mysqli_query($connect, $sqlcheck));
    if($count == 1) {
        $_SESSION['cus_user'] = $username;
        $_SESSION['cus_pass'] = $password;
        header('location: index.php?redirect=cart');
    }else {
        $errors = '<div class="alert alert-danger text-danger">Tài khoản hoặc mật khẩu không đúng!</div>';
    }
}
?>
<div id="login">
    <div class="panel-heading text-center"><b>Đăng nhập</b></div>
    <div class="panel-body bg-light">
        <?php
        if(isset($errors)) {
            echo $errors;
        }elseif (isset($success)) {
            echo $success;
        }
        ?>
        <form role="form" method="post">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Tài khoản" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                </div>
                <div class="text-center">
                    <button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
                    <a class="btn btn-info" href="index.php?redirect=register">Đăng ký</a>
                    <a class="text-primary" href="index.php?redirect=reset_pass"><u>Quên mật khẩu?</u></a>
                </div>
            </fieldset>
        </form>
    </div>
</div>