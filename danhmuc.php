<?php
require_once __DIR__."/../config/database.php";
require_once __DIR__."/../../theme/head.php";
require_once __DIR__."/../../theme/header.php";
$loai = (int)$get_data[0];


if( mysqli_num_rows(mysqli_query($connect, "SELECT * FROM danhmuc WHERE id = '$loai'")) < 1 ){
	header('location: /');
}

?>
<div class="container" style="margin-top: 80px;">
	<div class="row">
		<?php
		$result = mysqli_query($connect, "SELECT * FROM danhsachcode WHERE id_danhmuc = '$loai'");
		while($row = mysqli_fetch_assoc($result)){
			?>
			<!-- Thẻ 1 -->
      <div class="col-md-3 col-lg-3 col-6 col-sm-6 mt-3">
        <div class="card card-chart">
          <div class="card-header card-header-rose" data-header-animation="true">
               <img src="<?php echo $row['thumbnail']; ?>" class="card-img-top" alt="HOANGNAM_DEV"
          />
          </div>
          <div class="card-body">
              <h4 class="card-title text-center"><?php echo $row['ten']; ?></h4>
              <p class="card-category"><?php echo $row['mota']; ?></p>
              <center><p class="card-text"><b class="text-danger"><?php
    if($row['gia'] > 0){
        echo number_format($row['gia']); ?><sub>VNĐ</sub></span><?php
    } else {
        ?>Miễn phí</span><?php
    }
?></b>
                        </p></center>
          </div>
          <div class="card-footer">
              <a href="/tao-web/<?php echo $row['id']; ?>" class="btn btn-primary btn-rounded" style="width:100%;background: linear-gradient(
        45deg,
        rgba(29, 236, 197, 0.5),
        rgba(91, 14, 214, 0.5) 100%
      );">Xem ngay</a>
          </div>
      </div>
    </div>
    <!-- Hết Thẻ 1 -->
			<?php
		}
		?>			
	</div>
</div>

<?php
require_once __DIR__."/../../theme/footer.php";
?>