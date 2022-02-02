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


?>

<?php
if( isset($get_data[0]) ){
    $id_giahan = (int)$get_data[0];
    
			if( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM hosting WHERE id = '$id_giahan' AND uid = '".$user['id']."' LIMIT 1")) < 1 ){
				header('location: /');
			} else {
			    
			    
			    
				?>

				<div class="container py-5">
					<div class="row">

						<div class="col-12 col-md-12 mb-3">


							<form action method="POST">
								<h2 class="mb-3 text-uppercase font-weight-light text-info text-center">Gia hạn hosting</h2>
								<select class="form-control mb-3" name="thanhtoan">
									<option value="">Gia hạn:</option>
									<option value="1">1 Tháng</option>
									<option value="2">3 Tháng</option>
									<option value="3">6 Tháng</option>
									<option value="4">12 Tháng</option>
									<option value="5">24 Tháng</option>
									<option value="6">36 Tháng</option>
								</select>
								<button type="submit" name="giahan" class="btn btn-info mb-3" style="width: 100%">Gia hạn</button>
								
								<a href="/profile/lich-su-mua-hosting">
									<button type="button" class="btn btn-success mb-3" style="width: 100%">Trở về</button>
								</a>

							</form>
					
					</div>
					
					</div>
					
					</div>
					
					
					
					
							<?php
							if(isset($_POST['giahan'])){
								echo '<meta http-equiv="refresh" content="1;url=">';

								$thanhtoans = [
									'1' => 1,
									'2' => 3,
									'3' => 6,
									'4' => 12,
									'5' => 24,
									'6' => 36,
								];
								
								        $danhsach_goi = [
            'hosterweb_CP-1' => 20000,
            'hosterweb_CP-2' => 50000,
            'hosterweb_CP-3' => 100000
        ];

								if( !empty($_POST['thanhtoan']) ){
									$tt = $_POST['thanhtoan'];
									$thanhtoan = $thanhtoans[$tt];

									if(isset($thanhtoans[$tt])){



										$info_sp = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM hosting WHERE id = '$id_giahan' LIMIT 1"));

										$tienphaitra = $danhsach_goi[$info_sp['goi']] * $thanhtoan;

										if($user['tien'] >= $tienphaitra){											
											mysqli_query($connect, "UPDATE user SET tien = tien - $tienphaitra WHERE id = '".$user['id']."'");
											
											mysqli_query($connect, "UPDATE hosting SET hsd = hsd  + $thanhtoan WHERE id = '$id_giahan'");
											


										echo"<script>let timerInterval
Swal.fire({
  icon: 'success',
  title: 'Thông Báo',
  html: 'Gia Hạn Thành Công!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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
  html: 'Bạn Không Đủ Tiền!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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
							
							
			        
			    
			}
    
} else {
    header('location: /');
}
?>

<?php
require_once __DIR__."/../../theme/footer.php";
?>