<?php
require_once __DIR__."/../config/database.php";

require_once __DIR__."/../../theme/head.php";
require_once("app/include/page/model/dangnhap.php");
if(isset($_SESSION['user'])){
    header('location: /');
}
?>
<style>
body {
    background-image: url("../assets/img/restaurant.png");
}
</style>
<h3 class="mt-3 ml-3"><a href="/" class="text-white"><i class="fas fa-home"></i></a></h3>
 <!-- End Navbar -->
 </br>
 </br>
 </br>
 </br>
<div class="content">
        <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST">
              <div class="card card-login card-hidden card-under">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Đăng Nhập</h4>
                </div>
                <div class="card-body">
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">person</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Tài Khoản" name="taikhoan">
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">password</i>
                        </span>
                      </div>
                      <input type="password" class="form-control" placeholder="Mật Khẩu" name="matkhau">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-rose btn-lg" name="dangnhap">Đăng Nhập</a>
                </div>
                <center><p>Bạn Chưa Có Tài Khoản? <a href="/dang-ky">Đăng Ký</a></p></center>
                <center><p>Bạn Quên Mật Khẩu? <a href="/quen-mat-khau">Quên Mật Khẩu</a></p></center>
              </div>
            </form>
          </div>
          </div>
          </div>
          