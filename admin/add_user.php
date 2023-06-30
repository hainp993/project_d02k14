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
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $user_pass = $_POST['user_pass'];
    $user_re_pass = $_POST['user_re_pass'];
    $user_level = $_POST['user_level'];
    if($user_pass == $user_re_pass) {
        $checkUsername = mysqli_num_rows(
                mysqli_query($connect,
                    "SELECT username FROM tbl_user WHERE username = '$username'"
                )
        );
        if($checkUsername == 0) {
            $sql = "INSERT INTO tbl_user (fullname, username, user_pass, user_level)
                    VALUES
                    ('$fullname', '$username', '$user_pass', $user_level)";
            mysqli_query($connect, $sql);
            header('location: user.php');
        }else {
            $errors = '<div class="alert alert-danger">Tài khoản đã tồn tại !</div>';
        }
    }else {
        $errors = '<div class="alert alert-danger">Nhập lại mật khẩu không khớp !</div>';
    }
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
<!--                            	<div class="alert alert-danger">Email đã tồn tại !</div>-->
                                <?php
                                if(isset($errors)) {
                                    echo $errors;
                                }
                                ?>
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="fullname" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tài khoản</label>
                                    <input name="username" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Nhân viên</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->
<?php
include_once('Master/footer.php');
?>
