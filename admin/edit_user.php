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
$user_id = $_GET['id'];
$sqlId = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$row = mysqli_fetch_array(mysqli_query($connect, $sqlId));
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
            $sql = "UPDATE tbl_user SET 
                    fullname = '$fullname', 
                    username = '$username',
                    user_pass = '$user_pass',
                    user_level = $user_level
                    WHERE user_id = '$user_id'";
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
				<li class="active"><?php echo $row['fullname']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row['fullname']; ?></h1>
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
                                    <label>Họ & Tên</label>
                                    <input type="text" name="fullname" required class="form-control" value="<?php echo $row['fullname']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tài khoản</label>
                                    <input type="text" name="username" required value="<?php echo $row['username']; ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1 <?php if($row['user_level'] == 1) {echo 'selected';} ?>>Admin</option>
                                        <option value=2 <?php if($row['user_level'] == 2) {echo 'selected';} ?>>Nhân viên</option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
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
