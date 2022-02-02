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

<div class="container" style="margin-top: 85px;">
    <div class="row">
        <div class="col-md-65 col-sm-5 mt-3">
            <div class="card shadow">
                    <h4 class="text-center">Báo Lỗi</h4>
                    <hr>
                    <div class="card-body">
    <form action method="POST">
   <!-- Name input -->
   <div class="form-group bmd-form-group">
  <input type="text" class="form-control" name="hoten" placeholder="Nhập Họ Và Tên">
</div>

  <!-- Email input -->
<div class="form-group bmd-form-group">
  <input type="email" class="form-control" name="email" placeholder="Nhập Email">
</div>

  <!-- Message input -->
  <div class="form-group bmd-form-group">
    <textarea class="form-control" id="form4Example3" rows="4" name="loinhan"></textarea>
    <label class="form-label" for="form4Example3">Nội Dung Báo Lỗi</label>
  </div>

  <!-- Submit button -->
  <button type="submit" name="guiyeucau" class="btn btn-primary btn-block mb-4">Gửi</button>
        </form>
        </div>
        </div>
        </div>
      <div class="col-md-65 col-sm-5 mt-3">
<div class="text-center py-5 container overflow-auto" style="overflow: scroll">


			<table class="table table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Họ Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nội Dung</th>
                                        <th scope="col">Trả Lời</th>
                                        <th scope="col">Thời Gian Gửi Ticket</th>
                                        <th scope="col">Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
$query = mysqli_query($connect, "SELECT * FROM baoloi WHERE uid = '".$user['id']."' ORDER BY id ASC");
                  $dem = 0;
                  while($row = mysqli_fetch_assoc($query)){
                    $dem = $dem + 1;
 ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['id']; ?></td>
<td><?php echo $row['hoten']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['loinhan']; ?></td>
<td><?php echo $row['traloi']; ?></td>
<td><?php echo date('d/m/Y - H:i:s', $row['time'] ); ?></td>
<td><?php echo check_trangthaidon($row['trangthaidon']); ?></td>
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
if(isset($_POST['guiyeucau'])){
  if(!empty($_POST['hoten']) && !empty($_POST['email']) && !empty($_POST['loinhan']) ){
      
    $hoten = xss($_POST['hoten']);
    $email = xss($_POST['email']);
    $loinhan = xss($_POST['loinhan']);

	
              mysqli_query($connect, "INSERT INTO `baoloi` (`id`, `uid`, `hoten`, `email`, `loinhan`, `time`, `trangthaidon`) VALUES (NULL, '".$user['id']."', '$hoten', '$email', '$loinhan', '".time("H:i d/m/Y")."', '0')");
    

 	echo"<script>let timerInterval
Swal.fire({
  icon: 'success',
  title: 'Thông Báo',
  html: 'Báo Lỗi Thành Công!</br>Thông Báo Sẽ Đóng Trong <b></b>',
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