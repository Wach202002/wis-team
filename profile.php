<?php
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

if(!isset($_SESSION['user'])){
    echo"<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Vui Lòng Đăng Nhập Để Xem!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
 setTimeout(() => {
    location.href = '/';
    }, 2000);
</script>";
	exit;
}

$info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM setting_email "));
// Thư viện mailer
include  "library/phpmailer/src/PHPMailer.php";
include  "library/phpmailer/src/Exception.php";
include  "library/phpmailer/src/OAuth.php";
include  "library/phpmailer/src/POP3.php";
include  "library/phpmailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// End
// Mail config
   $mail = new PHPMailer(true);  
    
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Mailer = "smtp";
    $mail->Host = $info['serveremail'];  // host gửi mail 
    $mail->SMTPAuth = true;                               // Kích hoạt tài khoản
    $mail->Username = $info['taikhoanemail'];                 // SMTP tên đăng nhập
    $mail->Password = $info['matkhauemail'];                           // SMTP Mật khẩu
    $mail->SMTPSecure = 'tls';                            // mã hóa mail
    $mail->Port = $info['cong'];  // Port gửi mail 


?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header ">
                  <h4 class="card-title">Quản Lý Tài Khoản
                  </h4>
                </div>
                <div class="card-body ">
                  <ul class="nav nav-pills nav-pills-warning" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#thongtin" role="tablist">
                        Thông Tin Tài Khoản
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#changepass" role="tablist">
                        Đổi Mật Khẩu
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                        Lịch Sử
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content tab-space">
                    <div class="tab-pane active" id="thongtin">
                     <div class="form-group">
                        <label>Tên tài khoản: </label>
                        <input type="text" class="form-control" readonly value="<?= $user['taikhoan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="text" class="form-control" readonly value="<?= $user['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Cash: </label>
                        <input type="text" class="form-control" readonly value="<?= number_format($user['tien']) ?>">
                    </div>
                    <div class="form-group">
                        <label>Level: </label>
                        <input type="text" class="form-control" readonly value="<?php if ($user['chucvu'] == '9' or $user['chucvu'] == ''){
                            echo 'Quản Trị Viên';
                        }else{
                            echo 'Thành Viên';
                        } 
                        ?>">
                    </div>
                    <div class="form-group">
                        <label>IP Hiện Tại: </label>
                        <input type="text" class="form-control" readonly value="<?php echo $ip = $_SERVER['REMOTE_ADDR'];
 ?>">
                    </div>
                    </div>
                    <div class="tab-pane" id="changepass">
                     <form method="post">
						<div class="form-group mt-1">
							<label>Mật khẩu cũ: </label>
							<input type="password" name="matkhau" class="form-control">
						</div>
						<div class="form-group mt-1">
							<label>Mật khẩu mới: </label>
							<input type="password" name="newmatkhau" class="form-control">
						</div>
						<div class="form-group mt-1">
							<label>Nhập lại mật khẩu: </label>
							<input type="password" name="newmatkhau2" class="form-control">
						</div>
						<div class="form-group mt-3">
							<center>
								<button type="submit" name="doimatkhau_sumbit" class="btn btn-primary">Đổi Mật Khẩu</button>
							</center>
						</div>
					</form>
                    </div>
                    <div class="tab-pane" id="link3">
                        <center>
                      <a href="/profile/lich-su-tao-web"><button class="btn btn-info">Lịch sử tạo web</button></a>
                      </br>
                      <a href="/profile/lich-su-mua-source-code"><button class="btn btn-info">Lịch sử mua code</button></a>
                      </br>
                      <a href="/profile/lich-su-mua-hosting"><button class="btn btn-info">Lịch sử mua hosting</button></a>
                      </br>
                      <a href="/profile/lich-su-gui-otp"><button class="btn btn-info">Lịch sử gửi otp</button></a>
                      </br>
                      <a href="/profile/lich-su-reset-pass"><button class="btn btn-info">Lịch sử reset pass</button></a>
                      </center>
                    </div>
                  </div>
                </div>
                </div>
                </div>
            <div class="col-md-6">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../../assets/img/faces/marc.jpg" />
                </div>
                  </a>
                <div class="card-body">
                  <h6 class="card-category text-gray">Chức Vụ: <?php if ($user['chucvu'] == '9'){
                            echo 'Quản Trị Viên';
                        }else{
                            echo 'Thành Viên';
                        } 
                        ?></h6>
                  <h4 class="card-title"><?= $user['taikhoan']; ?></h4>
                  <p class="card-description"><a href="https://fb.com/nam2006.vn"><button class="btn btn-info">Hỗ Trợ Trực Tuyến: <i class="material-icons">support_agent</i></button></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
if(isset($_POST['doimatkhau_sumbit'])){
	$matkhau = xss($_POST['matkhau']);
	$newmatkhau = xss($_POST['newmatkhau']);
	$newmatkhau2 = xss($_POST['newmatkhau2']);
if($user['verify_code'] == 'verified'){

	$taikhoantam = $user['taikhoan'];
	$result = mysqli_query($connect, "SELECT * FROM user WHERE taikhoan = '$taikhoantam' AND matkhau = MD5('$matkhau')");
	if(mysqli_num_rows($result) >= 1){
		if($newmatkhau == $newmatkhau2 ){
			$check = mysqli_query($connect, "UPDATE user SET matkhau = md5('$newmatkhau') WHERE taikhoan = '$taikhoantam'");
			if($check){
				echo "<script>let timerInterval
Swal.fire({
  icon: 'success',
  title: 'Thông Báo',
  html: 'Đổi Mật Khẩu Thành Công!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
</script>";
				unset($_SESSION['user']);
				
				
			} else {
				echo "<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Có Lỗi Xảy Ra!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
</script>";
			}
		} else {
				echo "<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Nhập Lại Mật Khẩu Mới Không Đúng!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
</script>";
		}
	} else {
	echo "<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Mật Khẩu Cũ Không Đúng!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
</script>";
	}
} else {
   	echo "<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Vui Lòng Xác Minh Email Trước Khi Đổi!</br>Thông Báo Sẽ Đóng Trong <b></b>',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getHtmlContainer()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
});
</script>";
}


}
?>
<?php
require_once __DIR__."/../../theme/footer.php";
?>