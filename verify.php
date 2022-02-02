<?php
require_once __DIR__."/../config/database.php";
date_default_timezone_set("Asia/Ho_Chi_Minh");

session_destroy();
// Kiểm tra code có tồn tại? 

if (isset($_GET['code'])) {
	if (trim($_GET['code']) == 'verified') {
		echo 'Tài khoản đã kích hoạt hoặc mã không tồn tại';
	}else{
		if ($_GET['code'] != null) {
			$code = $_GET['code'];
			$sql = "SELECT * FROM `user` WHERE `verify_code` = '".$code."'; ";
			$QUERY = $connect->query($sql);
		// Bắt lỗi nếu query thất bại 
			if (!$QUERY) {
				trigger_error('Invalid query: ' . $CONN->error);
			}
		// end bắt lỗi

			if ($QUERY->num_rows <= 0) {
				echo 'Tài khoản đã kích hoạt hoặc mã không tồn tại';
			}else{
				$row = $QUERY->fetch_array();
				$email = $row['email'];
				$sql = "UPDATE user SET `verify_code` = 'verified' WHERE `email` = '$email'";
				$connect->query($sql);
		echo 'Kích Hoạt Tài Khoản Thành Công. Mời Bạn Đăng Nhập!';
				header("Location: dang-nhap?sms=1");
			}
		}
	}
}

?>