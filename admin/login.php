<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location: index.php');
}else {
$connect = mysqli_connect('localhost', 'root', '', 'prj_d02k14');
if(isset($_POST['sbm'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlCheck = "SELECT username, user_pass FROM tbl_user 
                    WHERE username = '$username' AND user_pass = '$password'";
    $check = mysqli_num_rows(mysqli_query($connect, $sqlCheck));
    if($check == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location: index.php');
    }else {
        $errors = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BKACAD Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">BKACAD Shop - Administrator</div>
				<div class="panel-body">
<!--					<div class="alert alert-danger">Tài khoản không hợp lệ !</div>-->
                    <?php
                    if(isset($errors)) {
                        echo $errors;
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
<!--							<div class="checkbox">-->
<!--								<label>-->
<!--									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản-->
<!--								</label>-->
<!--							</div>-->
							<button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
<?php } ?>