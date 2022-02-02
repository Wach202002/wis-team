<?php
require_once __DIR__."/../config/database.php";

require_once __DIR__."/../../theme/head.php";
require_once("app/include/page/model/forgotpassword.php");

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
                  <h4 class="card-title">Quên Mật Khẩu</h4>
                </div>
                <div class="card-body">
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" name="sumbit" class="btn btn-rose btn-lg">Gửi Lại Mật Khẩu</button>
                </div>
              </div>
            </form>
          </div>
          </div>
          </div>
          