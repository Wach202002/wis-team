<?php
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../../theme/head.php";
require_once("app/include/page/model/dangky.php");
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
</br>
</br>
</br>
</br>
<div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
            <div class="card card-signup">
              <h2 class="card-title text-center">Đăng Ký</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 ml-auto">
                    <div class="info info-horizontal">
                      <div class="icon icon-rose">
                        <i class="material-icons">security</i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">Bảo Mật Thông Tin Tối Đa</h4>
                        <p class="description">
                        Nhưng Thông Tin Sau Khi Bạn Đăng Ký Sẽ Được Mã Hóa Để Tránh Bị Đánh Cắp Dữ Liệu
                        </p>
                      </div>
                    </div>
                    <div class="info info-horizontal">
                      <div class="icon icon-primary">
                        <i class="material-icons">support_agent</i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">Hỗ Trợ Trợ 24/24</h4>
                        <p class="description">
                          Với Đội Ngũ Có Kinh Nghiêm Lâu Năm Của Chúng Tôi, Bạn Nhắn Tin Sẽ Có Người Trả Lời
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 mr-auto">
                    <form class="form" method="POST">
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">person</i>
                            </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Tài Khoản...." name="taikhoan">
                        </div>
                      </div>
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Email..." name="email">
                        </div>
                      </div>
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">password</i>
                            </span>
                          </div>
                          <input type="password" placeholder="Mật Khẩu..." class="form-control" name="matkhau">
                        </div>
                      </div>
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">password</i>
                            </span>
                          </div>
                          <input type="password" placeholder="Nhập Lại Mật Khẩu..." class="form-control" name="matkhau2">
                        </div>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" checked="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                          Tôi Đồng Ý Với
                          <a href="/terms">Điều Khoản Dich Vụ</a>.
                        </label>
                      </div>
                      <div class="text-center">
                       <button type="submit" class="btn btn-rose btn-lg" name="dangky">Đăng Ký</button>
                      </div>
                      </br>
                      <center><p>Bạn Đã Có Tài Khoản? <a href="/dang-nhap">Đăng Nhập</a></p></center>
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>