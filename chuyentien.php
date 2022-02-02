<?php
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";

$info = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user "));

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
?>
<div class="container" style="margin-top: 85px;">
    <div class="row">
        <div class="col-md-65 col-sm-5 mt-3">
            <div class="card shadow">
                    <h4 class="text-center">Chuyển Tiền</h4>
                    <center><h6>Số Tiền Hiện Có:</h6> <h4><font color="red"><?php echo number_format($info['tien']); ?> VNĐ</font></h4></center>
                    <hr>
                    <div class="card-body">
                    <form method="post">
                         <div class="form-group bmd-form-group">
							<input type="text" name="nguoichuyen" class="form-control" value="<?php echo $user['taikhoan']; ?>" readonly>
							</div>
							<div class="form-group bmd-form-group">
						<input type="number" name="sotien" class="form-control" placeholder="Số Tiền Cần Chuyển">
						</div>
						<div class="form-group bmd-form-group">
							<input type="text" name="nguoinhan" class="form-control" placeholder="Người Nhận">
                                 </div>
							<button type="submit" name="chuyentien_submit" class="btn btn-success" style="width: 100%">Chuyển Tiền</button>
						</form>
					</div>
<p class="note note-primary">
  <strong>Lưu Ý:</strong>Vui Lòng Nhập Đúng Tên Người Nhận, Nhập Sai Tiền Sẽ Không Được Cộng Lại.
</p>
			</div>
		</div>
        
       <div class="col-md-65 col-sm-5 mt-3">
           <div class="text-center py-5 container overflow-auto" style="overflow: scroll">
				<table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Người Chuyển</th>
                                        <th>Số Tiền</th>
                                        <th>Người Nhận</th>
                                        <th>Thời Gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
						$hn1 = $user['id'];
						$hn2 = $user['taikhoan'];
                  $query = mysqli_query($connect, "SELECT * FROM lichsu_chuyentien where `nguoichuyen` = '$hn1' or `nguoinhan` = '$hn2'  ORDER BY id DESC  LIMIT 50");
                  $dem = 0;
                  while($row = mysqli_fetch_assoc($query)){
                    $dem = $dem + 1;
                    ?>
                    <?php
                 $vohoangnam = $row['nguoichuyen'];
                 $queryhoangnam = mysqli_fetch_array(mysqli_query($connect, "SELECT taikhoan FROM `user` WHERE `id` = '$vohoangnam'"));
                 $hoten = $queryhoangnam['taikhoan'];
?>
                                    <tr>
                                        <td> <?php echo $hoten; ?> </td>
                      <td> <?php echo number_format($row['sotien']); ?> </td>
                      <td> <?php echo $row['nguoinhan']; ?> </td>
                      <td> <?php echo date('d/m/Y - H:i:s', $row['time'] ); ?> </td>
                                    </tr>
                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<div class="py-4"></div>
    <?php
if(isset($_POST['chuyentien_submit'])){
  echo '<meta http-equiv="refresh" content="1;url= /chuyen-tien">';
  if(!empty($_POST['nguoichuyen']) && !empty($_POST['sotien']) && !empty($_POST['nguoinhan']) ){
    $nguoichuyen = xss($_POST['nguoichuyen']);
    $sotien = xss(intval(abs((int)$_POST['sotien'])));
    $nguoinhan = xss($_POST['nguoinhan']);
    $total = $sotien;
	if($user['tien'] >= $total){
	
    mysqli_query($connect, "UPDATE user SET `tien` = `tien` - '$total' WHERE id = '".$user['id']."'");
     mysqli_query($connect, "UPDATE user SET `tien` = `tien` + '$total' WHERE taikhoan = '$nguoinhan'");
    mysqli_query($connect, "INSERT INTO `lichsu_chuyentien` (`nguoichuyen`, `sotien`, `nguoinhan`, `time`) VALUES ('".$user['id']."', '$sotien', '$nguoinhan', '".time("H:i d/m/Y")."')");
    

  	echo"<script>let timerInterval
Swal.fire({
  icon: 'success',
  title: 'Thông Báo',
  html: 'Chuyển Tiền Thành Công Cho $nguoinhan!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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
  } else {
		echo"<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Bạn Không Đủ Tiền Để Chuyển Cho $nguoinhan!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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
    	echo"<script>let timerInterval
Swal.fire({
  icon: 'error',
  title: 'Thông Báo',
  html: 'Vui Lòng Nhập Đầy Đủ Thông Tin!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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